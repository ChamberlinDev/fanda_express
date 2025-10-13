<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Hotel;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    //
    public function index()
    {
        $hotels = Hotel::paginate(6);
        $apparts = Appartement::paginate(6);

        return view('admin.etablissements.index', compact('hotels', 'apparts'));
    }
    public function Ajouter_hotel()
    {
        return view('admin.etablissements.ajouter_hotel');
    }
    public function create(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:500',
            'description' => 'nullable|string',
            'equipements' => 'nullable|array',
            'equipements.*' => 'string|max:255',
            'equipements_autres' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $hotel = new Hotel();
        $hotel->nom = $request->nom;
        $hotel->ville = $request->ville;
        $hotel->adresse = $request->adresse;
        $hotel->description = $request->description;

        // Gestion des équipements
        $equipements = $request->equipements ?? [];
        if ($request->equipements_autres) {
            $equipements[] = $request->equipements_autres;
        }
        $hotel->equipements = !empty($equipements) ? implode(',', $equipements) : null;

        $hotel->user_id = Auth::id();

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $hotel->image = $request->file('image')->store('hotels', 'public');
        }

        $hotel->save();

        return redirect('/etablissement')->with('success', 'Hôtel ajouté avec succès !');
    }

    public function search_hotel()
    {

        $hotels = Hotel::all();
        $apparts = Appartement::all();
        return view('hotels.liste', compact('hotels', 'apparts'));
    }


    public function show($id)
    {
        $hotel = Hotel::with('chambres')->findOrFail($id);
        return view('etablissements.show', compact('hotel'));
    }


    public function destroy() {}




    public function reservations($id)
    {
        $hotel = Hotel::with(['reservations.chambre'])->findOrFail($id);
        return view('admin.hotels.reservations', compact('hotel'));
    }
    
}
