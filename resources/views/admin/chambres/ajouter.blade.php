@extends('layout.app')
@section('content')
<div class="container my-5">
    <h3>Ajouter une chambre à <mark>{{ $etablissement->nom }}</mark></h3>
    <form action="{{ route('chambres.store', $etablissement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Choix du type de chambre -->
        <div class="mb-3">
            <label for="nom" class="form-label">Type de chambre</label>
            <select class="form-select" id="nom" name="nom" required>
                <option value="" disabled selected>-- Sélectionnez un type de chambre --</option>
                <option value="Standard">Chambre Standard</option>
                <option value="Familiale">Chambre Familiale</option>
                <option value="VIP">Chambre VIP</option>
                <option value="Suite">Suite</option>
                <option value="Deluxe">Chambre Deluxe</option>
            </select>
        </div>

        <!-- Capacité -->
        <div class="mb-3">
            <label for="capacite" class="form-label">Capacité</label>
            <input type="number" class="form-control" id="capacite" name="capacite" required>
        </div>

        <!-- Prix -->
        <div class="mb-3">
            <label for="prix" class="form-label">Prix par nuit (XOF)</label>
            <input type="number" class="form-control" id="prix" name="prix" required>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Image (optionnel)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter la chambre</button>
    </form>
</div>
@endsection
