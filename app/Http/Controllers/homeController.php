<?php

namespace App\Http\Controllers;

use App\Models\etablissement_mod;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    //
    public function show($id)
    {
        $etab = Hotel::with('chambres')->findOrFail($id);
        return view('admin.etablissements.show', compact('etab'));
    }



    

    public function update(Request $request, $id)
    {
        $etab = Hotel::findOrFail($id);

        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string',
            'ville' => 'required|string',
            'classement' => 'nullable|integer|min:1|max:5',
            'description' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Mise à jour
        $etab->nom = $request->nom;
        $etab->type = $request->type;
        $etab->ville = $request->ville;
        $etab->classement = $request->classement;
        $etab->description = $request->description;

        // Upload image si changée
        if ($request->hasFile('images')) {
            $path = $request->file('images')->store('etablissements', 'public');
            $etab->images = $path;
        }

        $etab->save();

        return redirect('/etablissement')->with('success', 'Établissement mis à jour avec succès.');
    }
}
