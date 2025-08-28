@extends('layout.app')
@section('content')
<div class="container my-5">

    {{-- Bouton Ajouter --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center">Nos Blogs</h2>
        <a href="/ajouter_blog" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Ajouter un blog
        </a>
    </div>
    <hr>

    <p>
        Bienvenue dans notre section blog. Retrouvez ici des articles récents publiés par nos auteurs.
    </p>
    <hr>

    {{-- Grille des cartes --}}
    <div class="row g-4">
        @forelse($blogs as $blog)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                {{-- Image de couverture --}}
                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('default.jpg') }}"
                    class="card-img-top" alt="Image"
                    style="height:200px; object-fit:cover;">

                <div class="card-body">
                    <!-- Titre -->
                    <h5 class="card-title">{{ $blog->titre }}</h5>

                    <!-- Auteur et date -->
                    <p class="card-text text-muted" style="font-size: 0.85em;">
                        Publié par <strong>{{ $blog->auteur }}</strong>
                        le {{ $blog->created_at->format('d/m/Y') }}
                    </p>

                    <!-- Extrait -->
                    <p>{{ Str::limit($blog->contenu, 100, '...') }}</p>
                </div>

                <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                    <!-- Boutons -->
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>

                    <form action="#" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer ce blog ?')">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p>Aucun blog trouvé.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $blogs->links() }}
    </div>

</div>
@endsection