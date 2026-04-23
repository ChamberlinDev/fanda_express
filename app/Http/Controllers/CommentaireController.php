<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Blog;
use App\Models\Commentaire;
use App\Models\Commentaire_app;
use App\Models\Hotel;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    //
    public function index()
    {

        return view('accueil');
    }

    public function create()
    {

        return view();
    }
    public function store(Request $request)
    {

        $request->validate([
            'avis' => 'required|string'
        ]);

        $commentaire = new Commentaire();
        $commentaire->avis = $request->avis;
        $commentaire->save();

        return view('accueil');
    }

    // public function create_app($id)
    // {
    //     $appart = Appartement::findOrFail($id);
    //     return view('hotels.appart_details', compact('appart'));
    // }

    public function store_app(Request $request)
    {
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

        $request->validate([
            'avis' => 'required|string',
        ]);
        $commentaire = new Commentaire_app();
        $commentaire->avis = $request->avis;
        // $commentaire->id_etablissement = $request->appart;

        $commentaire->save();

        return view('accueil', compact('hotels', 'apparts', 'blogs'));
    }
}
