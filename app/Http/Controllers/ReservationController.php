<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\etablissement_mod;
use App\Models\Hotel;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index() {
        return view('admin.reservations.liste');
    }

    public function create($id)
    {
        $hotel = Hotel::findOrFail($id);
        $appartement = Appartement::finfOrFail($id);
        return view('reservations.create', compact('hotel', 'appartement'));
    }
}
