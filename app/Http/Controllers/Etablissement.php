<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Etablissement extends Controller
{
    //
    public function Ajout_form (){
        return view('admin.etablissements.ajouter');
    }

    public function index(){
        return view('admin.etablissements.index');
    }

    public function create(Request $request){
         $request->validate([
            'type' => 'required',
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

        $imagePath = null;
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('etablissements', 'public');
        }

        Etablissement::create([
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
        ]);

        return redirect()->route('etablissements.index')->with('success', 'Établissement ajouté avec succès ✅');
    }


    
}
