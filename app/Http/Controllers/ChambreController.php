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
        $etablissements = Auth::user()->etablissements;

        $hotel = Hotel::findOrFail($id);
        $appart = Appartement::findOrFail($id);

        return view('admin.chambres.ajouter', compact('etablissement', 'appart'));
    }


    public function store(Request $request, $etablissementId)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $chambre = new Chambre($request->only(['nom', 'capacite', 'prix']));
        $chambre->etablissement_id = $etablissementId;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('chambres', 'public');
            $chambre->image = $path;
        }

        $chambre->save();

        return redirect('etablissements', $etablissementId)
            ->with('success', 'Chambre ajoutée avec succès !');
    }
}
