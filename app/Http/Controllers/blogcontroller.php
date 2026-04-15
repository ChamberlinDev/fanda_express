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
        // chaque user ne voit que ses propres blogs
        Auth::user()->is_admin ? $blogs = Blog::latest()->paginate(6) :
            $blogs = Blog::where('user_id', Auth::id())->latest()->paginate(6);
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
        $validated['user_id'] = Auth::id();

        Blog::create($validated);

        return redirect('/blog')->with('success', 'Blog ajouté avec succès.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect('/blog')->with('success', 'Blog supprimé avec succès.');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.modif', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($validated);

        return redirect('/blog')->with('success', 'Blog mis à jour avec succès.');
    }

    public function liste()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('superadmin.blogs.liste', compact('blogs'));
    }



// Superadmin functions

    public function ajouter()
    {
        return view('superadmin.blogs.ajouter');
    }

    public function create(Request $request)
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
        $validated['user_id'] = Auth::id();

        Blog::create($validated);

        return redirect('/blog_sup')->with('success', 'Blog ajouté avec succès.');
    }

    public function supprimer($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect('/blog_sup')->with('success', 'Blog supprimé avec succès.');
    }

    public function details($id)
    {
        $blog = Blog::findOrFail($id);
        return view('superadmin.blogs.show', compact('blog'));
    }

    public function modif_view($id)
    {
        $blog = Blog::findOrFail($id);
        return view('superadmin.blogs.modif', compact('blog'));
    }

    public function update_blog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($validated);

        return redirect('/blog_sup')->with('success', 'Blog mis à jour avec succès.');
    }

    public function liste_blog()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('superadmin.blogs.liste', compact('blogs'));
    }
}
