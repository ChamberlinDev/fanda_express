<?php

namespace App\Http\Controllers;

use App\Models\etablissement_mod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class Etablissement extends Controller
{
    // Afficher le formulaire
    public function createForm()
    {
        return view('admin.etablissements.ajouter');
    }

    // Lister les établissements de l'utilisateur connecté
    public function index()
    {
        $etablissements = Auth::user()->etablissements;
        return view('admin.etablissements.index', compact('etablissements'));
    }

    // Enregistrer un établissement
    public function create(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'nom' => 'required|string|max:255',
            'ville' => 'nullable|string',
            'adresse' => 'required|string',
            'classement' => 'nullable|integer',
            'nbre_chambre' => 'nullable|integer',
            'surface' => 'nullable|integer',
            'description' => 'nullable|string',
            'equipements' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Gestion de l'image
        $imagePath = null;
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('etablissements', 'public');
        }

        // Création de l'établissement avec user_id
        etablissement_mod::create([
            'type' => $request->type,
            'nom' => $request->nom,
            'ville' => $request->ville,
            'adresse' => $request->adresse,
            'classement' => $request->classement,
            'nbre_chambre' => $request->nbre_chambre,
            'surface' => $request->surface,
            'description' => $request->description,
            'equipements' => $request->equipements,
            'images' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect('/etablissement')->with('success', 'Établissement ajouté avec succès');
    }



    



    public function destroy($id)
    {
        $etab = etablissement_mod::findOrFail($id);

        // Suppression de l'image du storage si elle existe
        if ($etab->images && Storage::disk('public')->exists($etab->images)) {
            Storage::disk('public')->delete($etab->images);
        }

        $etab->delete();

        return redirect('etablissements.index')->with('success', 'Établissement supprimé avec succès !');
    }
}
