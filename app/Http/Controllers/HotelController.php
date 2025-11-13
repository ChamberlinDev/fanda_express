<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Hotel;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::id();
        // On récupère seulement les hôtels et appartements de l'utilisateur connecté
        $hotels = Hotel::where('user_id', $userId)->paginate(6);
        $apparts = Appartement::where('user_id', $userId)->paginate(6);
        return view('admin.etablissements.index', compact('hotels', 'apparts'));
    }
    public function Ajouter_hotel()
    {
        return view('admin.etablissements.ajouter_hotel');
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.etablissements.modif', compact('hotel'));
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
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $hotel = new Hotel();
        $hotel->nom = $request->nom;
        $hotel->ville = $request->ville;
        $hotel->adresse = $request->adresse;
        $hotel->description = $request->description;

        // Équipements
        $equipements = $request->equipements ?? [];
        if ($request->equipements_autres) {
            $equipements[] = $request->equipements_autres;
        }
        $hotel->equipements = !empty($equipements) ? implode(',', $equipements) : null;

        $hotel->user_id = Auth::id();

        // Images multiples
        $imagesPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('hotels', 'public');
                    $imagesPaths[] = $path;
                }
            }
        }

        $hotel->images = !empty($imagesPaths) ? json_encode($imagesPaths) : null;

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
        return view('admin.etablissements.show', compact('hotel'));
    }



    public function details($id)
    {
        $hotel = Hotel::with('chambres')->findOrFail($id);
        return view('hotels.details', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        // Validation de base
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'equipements' => 'nullable|array',
            'equipements_autres' => 'nullable|string|max:255',
        ]);

        // === GESTION DES IMAGES ===
        $oldImages = json_decode($hotel->images, true) ?? [];

        if ($request->hasFile('images')) {
            $newImages = [];
            foreach ($request->file('images') as $file) {
                $path = $file->store('hotels', 'public');
                $newImages[] = $path;
            }

            // Fusion ancienne + nouvelle
            $validatedData['images'] = json_encode(array_merge($oldImages, $newImages));
        } else {
            // On garde les anciennes images si aucune nouvelle n’est ajoutée
            $validatedData['images'] = json_encode($oldImages);
        }

        // === GESTION DES ÉQUIPEMENTS ===
        $equipements = $request->input('equipements', []);
        if (in_array('Autres', $equipements) && $request->filled('equipements_autres')) {
            $equipements[] = $request->equipements_autres;
        }
        $validatedData['equipements'] = json_encode($equipements);

        // Mise à jour de l’hôtel
        $hotel->update($validatedData);

        return redirect('/etablissement')->with('success', 'Hôtel mis à jour avec succès.');
    }



    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        // Supprimer les images du stockage si elles existent
        $images = json_decode($hotel->images, true) ?? [];
        foreach ($images as $img) {
            if (Storage::disk('public')->exists($img)) {
                Storage::disk('public')->delete($img);
            }
        }

        // Supprimer l’hôtel
        $hotel->delete();

        return redirect('/etablissement')->with('success', 'Hôtel supprimé avec succès.');
    }


    public function reservations($id)
    {
        $hotel = Hotel::with(['reservations.chambre'])->findOrFail($id);
        return view('admin.hotels.reservations', compact('hotel'));
    }
}
