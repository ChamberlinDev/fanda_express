@extends('layout.app')
@section('content')

<div class="container my-5">
    <h2 class="mb-4 text-center"> + Ajouter un nouvel blog</h2>

    <div class="card shadow-sm p-4">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Titre --}}
            <div class="form-group col-6">
                <label for="titre" class="form-label">Titre de l'article</label>
                <input type="text" class="form-control" id="titre" name="titre" value="" required>
            </div>

            {{-- Auteur --}}
            <div class="form-group col-6">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" value="" required>
            </div>

            {{-- Image --}}
            <div class="form-group mb-3 col-6">
                <label for="image" class="form-label">Image de couverture</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>

            {{-- Contenu --}}
            <div class="form-group mb-3 col-6">
                <label for="contenu" class="form-label">Contenu</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="6" required></textarea>
            </div>

            {{-- Boutons --}}
            <div class="d-flex justify-content-between col-6">
                <a href="/home" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-primary">Publier</button>
            </div>
        </form>
    </div>
</div>

@endsection
