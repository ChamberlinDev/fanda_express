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

        // Si l'utilisateur n'a pas encore d'hôtel
        if (!$hotel) {
            // On retourne une vue avec un message explicite
            return view('admin.reservations.liste', [
                'reservations' => collect(), // liste vide
                'message' => 'Aucun hôtel associé à votre compte. Veuillez créer un établissement pour voir vos réservations.'
            ]);
        }

        // Sinon, on récupère les réservations liées à son hôtel
        $reservations = Reservation::whereHas('chambre', function ($q) use ($hotel) {
            $q->where('hotel_id', $hotel->id);
        })
            ->with(['chambre.hotel'])
            ->latest()
            ->get();
        return view('admin.reservations.liste', compact('reservations'));
    }




    public function create($id)
    {
        // Récupérer la chambre choisie 
        $chambre = Chambre::with('hotel')->findOrFail($id);
        // Envoyer à la vue reservation.blade.php
        return view('admin.reservations.ajouter', compact('chambre'));
    }

    public function create_appart($id)
    {
        $appart = Appartement::findOrFail($id);
        return view('admin.reservations.ajouter_appart', compact('appart'));
    }




    public function store(Request $request)
    {
        $validated = $request->validate([
            'chambre_id' => 'required|exists:chambres,id',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:50',
            'email' => 'nullable|email', // client peut laisser vide
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        // Vérification si la chambre est déjà réservée
        $dejaReservee = Reservation::where('chambre_id', $validated['chambre_id'])
            ->where(function ($q) use ($validated) {
                $q->whereBetween('date_debut', [$validated['date_debut'], $validated['date_fin']])
                    ->orWhereBetween('date_fin', [$validated['date_debut'], $validated['date_fin']]);
            })
            ->exists();

        if ($dejaReservee) {
            return back()->with('error', 'Cette chambre est déjà réservée pour cette période.');
        }

        // Création de la réservation
        $reservation = Reservation::create($validated);

        // 1️⃣ Mail au client (si email renseigné)
        if (!empty($reservation->email)) {
            Mail::to($reservation->email)->send(new ReservationMail($reservation));
        }

        // 2️⃣ Mail aux utilisateurs de l'hôtel
        $hotel = $reservation->chambre->hotel; // récupère l'hôtel via la chambre
        if ($hotel && $hotel->user && !empty($hotel->user->email)) {
            Mail::to($hotel->user->email)->send(new ReservationAdmin($reservation));
        }
        return back()->with('success', 'Votre réservation a bien été enregistrée !');
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
}
