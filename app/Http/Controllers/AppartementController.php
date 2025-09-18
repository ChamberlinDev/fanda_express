<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppartementController extends Controller
{
    //
    // public function index()
    // {
    //     $apparts = Appartement::with('user')->latest()->paginate(9);
    //     return view('admin.etablissements.index', compact('apparts'));
    // }

    public function Ajouter_appart()
    {
        return view('admin.etablissements.ajouter_appart');
    }

    public function create(Request $request)
    {

        $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:500',
            'description' => 'nullable|string',
            'equipements' => 'nullable|array',
            'nbre_chambre' => 'integer',
            'equipements.*' => 'string|max:255',
            'equipements_autres' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $appart = new Appartement();
        $appart->nom = $request->nom;
        $appart->ville = $request->ville;
        $appart->adresse = $request->adresse;
        $appart->nbre_chambre = $request->nbre_chambre;
        $appart->description = $request->description;

        // Gestion équipements
        $equipements = $request->equipements ?? [];
        if ($request->equipements_autres) {
            $equipements[] = $request->equipements_autres;
        }
        $appart->equipements = !empty($equipements) ? implode(',', $equipements) : null;

        $appart->user_id = Auth::id();

        // Gestion image
        if ($request->hasFile('image')) {
            $appart->image = $request->file('image')->store('appartements', 'public');
        }

        $appart->save();

        return redirect('/etablissement')->with('success', 'Appartement ajouté avec succès !');
    }
}
