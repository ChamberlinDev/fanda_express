<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
   
    //
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('admin.blog.index', compact('blogs'));
    }

    public function ajout_form()
    {
        return view('admin.blog.ajouter');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        // associer l'auteur automatiquement
        $validated['user_id'] =Auth::id();

        Blog::create($validated);

        return redirect('/blog')->with('success', 'Blog ajouté avec succès.');
    }
}


