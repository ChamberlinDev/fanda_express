<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Chambre;
use App\Models\etablissement_mod;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function store(Request $request)
    {
        $validated = $request->validate([
            'chambre_id' => 'required|exists:chambres,id',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:50',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        // Vérifie si la chambre est déjà réservée sur la même période
        $dejaReservee = Reservation::where('chambre_id', $validated['chambre_id'])
            ->where(function ($q) use ($validated) {
                $q->whereBetween('date_debut', [$validated['date_debut'], $validated['date_fin']])
                    ->orWhereBetween('date_fin', [$validated['date_debut'], $validated['date_fin']]);
            })
            ->exists();

        if ($dejaReservee) {
            return back()->with('error', 'Cette chambre est déjà réservée pour cette période.');
        }

        Reservation::create($validated);

        return back()->with('success', 'Votre réservation a bien été enregistrée !');
    }
}
