<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\etablissement_mod;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //

    public function accueil()
    {
        $etab   = etablissement_mod::all();
        $blogs  = Blog::latest()->take(10)->get(); // <- on récupère les blogs

        return view('accueil', compact('etab', 'blogs')); // <- on les passe à la vue
    }

    // Page détails d'un établissement ()
    public function show($id)
    {
        $etab = etablissement_mod::findOrFail($id);
        return view('hotels.details', compact('etab'));
    }

}
