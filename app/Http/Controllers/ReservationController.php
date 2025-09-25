<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Chambre;
use App\Models\etablissement_mod;
use App\Models\Hotel;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('admin.reservations.liste');
    }

    public function create($id)
    {
        // Récupérer la chambre choisie
        $chambre = Chambre::findOrFail($id);

        // Envoyer à la vue reservation.blade.php
        return view('admin.reservations.ajouter', compact('chambre'));
    }
}
