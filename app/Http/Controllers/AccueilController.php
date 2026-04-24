<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Blog;
use App\Models\Commentaire_app;
use App\Models\etablissement_mod;
use App\Models\Hotel;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //
    public function accueil()
    {
        // Filtrer les hôtels dont le propriétaire n'est pas bloqué
        $hotels = Hotel::whereHas('user', function ($q) {
            $q->where('is_blocked', false);
        })
            ->paginate(12);

        // Filtrer les appartements dont le propriétaire n'est pas bloqué
        $apparts = Appartement::whereHas('user', function ($q) {
            $q->where('is_blocked', false);
        })
            ->paginate(12);

        $blogs = Blog::latest()->take(6)->get();
        // $avis=Commentaire_app::latest()->take(3)->get();

        return view('accueil', compact('hotels', 'apparts', 'blogs'));
    }

    // Page détails d'un établissement ()
    public function show($id)
    {
        $hotels = Hotel::findOrFail($id);
        return view('hotels.details', compact('hotels'));
    }
}
