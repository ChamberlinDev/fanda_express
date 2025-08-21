@extends('clients.layout.app')
@section('content')
<div class="container my-5">
    <h3>Ajouter une chambre à {{ $etablissement->nom }}</h3>
    <form action="{{ route('chambres.store', $etablissement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la chambre</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="capacite" class="form-label">Capacité</label>
            <input type="number" class="form-control" id="capacite" name="capacite" required>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix par nuit (XOF)</label>
            <input type="number" class="form-control" id="prix" name="prix" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image (optionnel)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter la chambre</button>
    </form>
</div>
@endsection
