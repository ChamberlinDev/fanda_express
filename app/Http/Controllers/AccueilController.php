<?php

namespace App\Http\Controllers;

use App\Models\etablissement_mod;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //

    public function accueil(){

        $etab= etablissement_mod::all();
        return view('accueil', compact('etab'));
    }
}
