<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    //caisse

    public function index()
    {
        return view('admin.caisse.index');
    }

    // rapport
    public function rapport_index()
    {
        $rapports = Rapport::with('user')->orderBy('date_rapport', 'desc')->get();
        return view('admin.rapport.index', compact('rapports'));
    }

    public function create_rapport()
    {
        return view('admin.rapport.create');
    }

    public function store_rapport(Request $request)
    {
        // Validation des données du rapport
        $validatedData = $request->validate([
            'type_rapport' => 'required|string|max:255',
            'montant_entrees' => 'required|numeric|min:0',
            'montant_sorties' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'date_rapport' => 'required|date',
        ]);

            $validatedData['id_user'] = Auth::id();

        // Création du rapport dans la base de données
        $rapport = Rapport::create($validatedData);
        // Redirection vers la page de liste des rapports avec un message de succès
        return redirect()->route('admin.rapport')->with('success', 'Rapport créé avec succès.');
    }
}
