<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\etablissement_mod;
use App\Models\Hotel;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //
    public function accueil()
    {
        $hotels = Hotel::paginate(12); // 12 hôtels par page

        // $blogs  = Blog::latest()
        //     ->take(10)
        //     ->get()
        //     ->unique('titre'); // <- supprime doublons par titre

        return view('accueil', compact('hotels'));
    }


    // Page détails d'un établissement ()
    public function show($id)
    {
        // $etab = etablissement_mod::with('chambres')->findOrFail($id);
        // return view('hotels.details', compact('etab'));
    }
}
