<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppartementController extends Controller
{
    //
    // Exemple dans AppartementController@index
    public function index()
    {
        $apparts = Appartement::latest()->paginate(6);

        // Décoder les images JSON pour chaque appartement
        foreach ($apparts as $appart) {
            $appart->images_array = $appart->images ? json_decode($appart->images, true) : [];
        }

        return view('admin.etablissements.index', compact('apparts'));
    }


    public function Ajouter_appart()
    {
        return view('admin.etablissements.ajouter_appart');
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:500',
            'description' => 'nullable|string',
            'nbre_chambre' => 'nullable|integer',
            'equipements' => 'nullable|array',
            'equipements.*' => 'string|max:255',
            'prix' => 'required',
            'equipements_autres' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Création de l'appartement
        $appart = new Appartement();
        $appart->nom = $request->nom;
        $appart->ville = $request->ville;
        $appart->adresse = $request->adresse;
        $appart->prix = $request->prix;
        $appart->nbre_chambre = $request->nbre_chambre;
        $appart->description = $request->description;

        $equipements = $request->equipements ?? [];
        if ($request->equipements_autres) {
            $equipements[] = $request->equipements_autres;
        }
        $appart->equipements = !empty($equipements) ? implode(',', $equipements) : null;

        $appart->user_id = $user->id;
        $appart->save();

         $imagesPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('appartements', 'public');
                    $imagesPaths[] = $path;
                }
            }
        }

        $appart->images = !empty($imagesPaths) ? json_encode($imagesPaths) : null;

        $appart->save();
        return redirect('/etablissement')->with('success', 'Appartement ajouté avec succès !');
    }

    public function show($id)
    {
        $appart = Appartement::findOrFail($id);
        return view('admin.etablissements.show_appart', compact('appart'));
    }

    public function details($id)
    {
        $appart = Appartement::find($id);
        return view('hotels.appart_details', compact('appart'));
    }
}
