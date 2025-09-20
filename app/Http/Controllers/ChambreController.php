<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Chambre;
use App\Models\etablissement_mod;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChambreController extends Controller
{
    //
    public function create($id)
    {
        $hotel = Auth::user()->hotel;
        $hotel = Hotel::findOrFail($id);
        return view('admin.chambres.ajouter', compact('hotel'));
    }


    public function store(Request $request, $hotelId)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $chambre = new Chambre($request->only(['nom', 'capacite', 'prix']));
        $chambre->hotel_id = $hotelId;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('chambres', 'public');
            $chambre->image = $path;
        }

        $chambre->save();

        return redirect()->route('etablissements.show', $hotelId)
            ->with('success', 'Chambre ajoutée avec succès !');
    }
    
}
