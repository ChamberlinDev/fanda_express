<?php

namespace App\Http\Controllers;

use App\Models\etablissement_mod;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //

    public function accueil()
    {
        $etab = etablissement_mod::all();
        return view('accueil', compact('etab'));
    }

    // Page détails d'un établissement ()
    public function show($id)
    {
        $etab = etablissement_mod::findOrFail($id);
        return view('hotels.details', compact('etab'));
    }

   
}
