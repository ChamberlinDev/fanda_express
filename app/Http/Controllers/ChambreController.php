<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Chambre;
use App\Models\etablissement_mod;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $chambre = new Chambre($request->only(['nom', 'capacite', 'prix']));
        $chambre->hotel_id = $hotelId;

        $imagesPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('hotels', 'public');
                    $imagesPaths[] = $path;
                }
            }
        }

        $chambre->images = !empty($imagesPaths) ? json_encode($imagesPaths) : null;


        $chambre->save();

        return redirect()->route('etablissements.show', $hotelId)
            ->with('success', 'Chambre ajoutée avec succès !');
    }

    public function edit($id)
    {
        $chambre = Chambre::findOrFail($id);
        $hotel   = $chambre->hotel;
        return view('admin.chambres.modif', compact('chambre', 'hotel'));
    }

    public function update(Request $request, $id)
    {
        $chambre = Chambre::findOrFail($id);

        $request->validate([
            'nom'      => 'required|string',
            'capacite' => 'required|integer|min:1',
            'prix'     => 'required|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nom.required'      => 'Veuillez sélectionner un type de chambre.',
            'capacite.required' => 'La capacité est obligatoire.',
            'prix.required'     => 'Le prix est obligatoire.',
        ]);

        $chambre->nom      = $request->nom;
        $chambre->capacite = $request->capacite;
        $chambre->prix     = $request->prix;

        // Gestion des images
        if ($request->hasFile('images')) {
            // Supprimer les anciennes images
            $anciennesImages = $chambre->images ? json_decode($chambre->images, true) : [];
            foreach ($anciennesImages as $ancienne) {
                Storage::disk('public')->delete($ancienne);
            }

            // Enregistrer les nouvelles
            $nouvellesImages = [];
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $nouvellesImages[] = $image->store('chambres', 'public');
                }
            }
            $chambre->images = json_encode($nouvellesImages);
        }

        $chambre->save();

        return redirect()->route('etablissements.show', $chambre->hotel_id)
            ->with('success', 'Chambre modifiée avec succès !');
    }

    public function destroy($id)
    {
        $chambre = Chambre::findOrFail($id);
        $hotelId = $chambre->hotel_id;

        // Supprimer les images
        $images = $chambre->images ? json_decode($chambre->images, true) : [];
        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }

        $chambre->delete();

        return redirect()->route('etablissements.show', $hotelId)
            ->with('success', 'Chambre supprimée avec succès !');
    }
}
