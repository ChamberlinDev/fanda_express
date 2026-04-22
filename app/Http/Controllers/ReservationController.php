<?php

namespace App\Http\Controllers;

use App\Mail\ReservationAccept;
use App\Mail\ReservationAdmin;
use App\Mail\ReservationMail;
use App\Mail\ReservationRefus;
use App\Models\Appartement;
use App\Models\Chambre;
use App\Models\etablissement_mod;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Reservation_appart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $hotel = $user->hotel;
        $appart = $user->appartement;

        if (!$hotel && !$appart) {
            return view('admin.reservations.liste', [
                'reservations' => collect(),
                'reservations_appart' => collect(),
                'message' => 'Aucun établissement associé à votre compte.'
            ]);
        }

        $reservations = collect();
        $reservations_appart = collect();

        if ($hotel) {
            $reservations = Reservation::whereHas('chambre', function ($q) use ($hotel) {
                $q->where('hotel_id', $hotel->id);
            })
                ->with(['chambre.hotel'])
                ->latest()
                ->get();
        }

        if ($appart) {
            $reservations_appart = Reservation_appart::where('appartement_id', $appart->id)
                ->with('appartement')
                ->latest()
                ->get();
        }

        return view('admin.reservations.liste', compact('reservations', 'reservations_appart'));
    }




    public function create($id)
    {
        // Récupérer la chambre choisie 
        $chambre = Chambre::with('hotel')->findOrFail($id);
        // Envoyer à la vue reservation.blade.php
        return view('clients.reservations.create', compact('chambre'));
    }

    public function create_appart($id)
    {
        $appart = Appartement::findOrFail($id);
        return view('clients.reservations.create_app', compact('appart'));
    }

    public function store_appart(Request $request)
    {
        $validated = $request->validate([
            'appartement_id' => 'required|exists:appartements,id',
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'telephone'      => 'required|string|max:50',
            'email'          => 'nullable|email',
            'date_debut'     => 'required|date|after_or_equal:today',
            'date_fin'       => 'required|date|after:date_debut',
            
        ]);

        // Génération code unique
        do {
            $code = 'RES-' . mt_rand(100000, 999999);
        } while (Reservation_appart::where('code_reservation', $code)->exists());

        $validated['code_reservation'] = $code;
        $validated['type']             = 'appartement';

        $reservation = Reservation_appart::create($validated);

        if (!empty($reservation->email)) {
            Mail::to($reservation->email)->send(new ReservationMail($reservation));
        }

        return back()->with('success', 'Réservation confirmée ! Code : ' . $code);
    }

    public function accepter_appart($id)
    {
        $reservations_appart = Reservation_appart::findOrFail($id);
        $reservations_appart->update(['statut' => 'acceptée']);

        if ($reservations_appart->email) {
            Mail::to($reservations_appart->email)->send(new ReservationAccept($reservations_appart));
        }


        return redirect()->back()->with('success', 'Réservation acceptée et mail envoyé.');
    }

    public function refuser_appart($id)
    {
        $reservations_appart = Reservation_appart::findOrFail($id);
        $reservations_appart->update(['statut' => 'refusée']);

        if ($reservations_appart->email) {
            Mail::to($reservations_appart->email)->send(new ReservationRefus($reservations_appart));
        }
        return redirect()->back()->with('success', 'Réservation refusée et mail envoyé.');
    }

    public function updateStatut_appart(Request $request, $id)
    {
        $reservations_appart = Reservation_appart::findOrFail($id);
        $ancienStatut = $reservations_appart->statut;
        $reservations_appart->update(['statut' => $request->statut]);

        if ($reservations_appart->email) {
            if ($request->statut === 'acceptée' && $ancienStatut !== 'acceptée') {
                Mail::to($reservations_appart->email)->send(new ReservationAccept($reservations_appart));
            } elseif ($request->statut === 'refusée' && $ancienStatut !== 'refusée') {
                Mail::to($reservations_appart->email)->send(new ReservationRefus($reservations_appart));
            }
        }

        return redirect()->back()->with('success', 'Statut de la réservation mis à jour.');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'chambre_id' => 'required|exists:chambres,id',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:50',
            'email' => 'nullable|email',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        // Vérification disponibilité
        $dejaReservee = Reservation::where('chambre_id', $validated['chambre_id'])
            ->where(function ($q) use ($validated) {
                $q->whereBetween('date_debut', [$validated['date_debut'], $validated['date_fin']])
                    ->orWhereBetween('date_fin', [$validated['date_debut'], $validated['date_fin']]);
            })
            ->exists();

        if ($dejaReservee) {
            return back()->with('error', 'Cette chambre est déjà réservée pour cette période.');
        }

        // Génération code UNIQUE
        do {
            $code = 'RES-' . mt_rand(100000, 999999);
        } while (Reservation::where('code_reservation', $code)->exists());

        //  Ajout du code dans les données
        $validated['code_reservation'] = $code;

        // Création réservation
        $reservation = Reservation::create($validated);

        // Mail client
        if (!empty($reservation->email)) {
            Mail::to($reservation->email)->send(new ReservationMail($reservation));
        }

        // Mail hôtel
        $hotel = $reservation->chambre->hotel;
        if ($hotel && $hotel->user && !empty($hotel->user->email)) {
            Mail::to($hotel->user->email)->send(new ReservationAdmin($reservation));
        }

        return back()->with('success', 'Réservation confirmée ! Code : ' . $code);
    }

    public function accepter($id)
    {
        $reservation = Reservation::with('chambre.hotel')->findOrFail($id);

        // Met à jour le statut
        $reservation->update(['statut' => 'acceptée']);

        // Envoi du mail de confirmation au client
        if ($reservation->email) {
            Mail::to($reservation->email)->send(new ReservationAccept($reservation));
        }

        return redirect()->back()->with('success', 'Réservation acceptée et mail envoyé.');
    }

    public function refuser($id)
    {
        $reservation = Reservation::with('chambre.hotel')->findOrFail($id);

        // Mise à jour du statut
        $reservation->update(['statut' => 'refusée']);

        // Envoi du mail de refus
        if ($reservation->email) {
            Mail::to($reservation->email)->send(new ReservationRefus($reservation));
        }
        return redirect()->back()->with('success', 'Réservation refusée et mail envoyé.');
    }


    public function updateStatut(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $ancienStatut = $reservation->statut;
        $reservation->update(['statut' => $request->statut]);

        // Envoi du mail selon le nouveau statut
        if ($reservation->email) {
            if ($request->statut === 'acceptée' && $ancienStatut !== 'acceptée') {
                Mail::to($reservation->email)->send(new ReservationAccept($reservation));
            } elseif ($request->statut === 'refusée' && $ancienStatut !== 'refusée') {
                Mail::to($reservation->email)->send(new ReservationRefus($reservation));
            }
        }

        return redirect()->back()->with('success', 'Statut de la réservation mis à jour.');
    }

    public function reservation_admin()
    {
        $hotel = Hotel::where('user_id', Auth::id())->first();

        $chambres = Chambre::where('hotel_id', $hotel->id)->get();

        return view('reservation_admin', compact('chambres'));
    }
}
