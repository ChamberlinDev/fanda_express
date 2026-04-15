@extends('admin.layout.app')
@section('content')

<div class="container my-5">
    <h2 class="mb-4 text-center"> + Ajouter un nouvel blog</h2>

    <div class="card shadow-sm p-4">
        <form action="/ajout_save" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" name="titre" required>
            </div>

            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu</label>
                <textarea class="form-control" name="contenu" rows="5" required></textarea>
            </div>

           

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Publier</button>
        </form>

    </div>
</div>

@endsection