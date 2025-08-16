@extends('layout.app')
@section('content')

<h1 class="text-center">Ajouter un etablissement</h1>

<form action="#" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-white shadow-sm">
    @csrf

    <div class="row">
    <!-- Type d'établissement -->
    <div class="col-6">
        <label for="type" class="form-label">Type d'établissement</label>
        <select name="type" id="type" class="form-select" required>
            <option value="">-- Sélectionner --</option>
            <option value="hotel">Hôtel</option>
            <option value="appartement">Appartement</option>
        </select>
    </div>

    <!-- Nom -->
    <div class="col-6">
        <label for="nom" class="form-label">Nom de l'établissement</label>
        <input type="text" name="nom" id="nom" class="form-control" required>
    </div>
    </div>

    <!-- Ville -->
     <div class="row">
    <div class="col-6">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" name="ville" id="ville" class="form-control" required>
    </div>

    <!-- Adresse -->
    <div class="col-6">
        <label for="adresse" class="form-label">Adresse</label>
        <textarea name="adresse" id="adresse" class="form-control" rows="2" required></textarea>
    </div>
    </div>

    <!-- Prix par nuit -->
     <div class="row">
    <div class="col-6">
        <label for="prix" class="form-label">Prix par nuit (XOF)</label>
        <input type="number" name="prix" id="prix" class="form-control" required>
    </div>

    <!-- Capacité -->
    <div class="col-6">
        <label for="capacite" class="form-label">Capacité (nombre de personnes)</label>
        <input type="number" name="capacite" id="capacite" class="form-control" required>
    </div>
    </div>

    <!-- CHAMPS POUR HÔTEL UNIQUEMENT -->
    <div id="hotel-fields" style="display:none;">
        <div class="col-6">
            <label for="classement" class="form-label">Classement (étoiles)</label>
            <select name="classement" id="classement" class="form-select">
                <option value="">-- Sélectionner --</option>
                <option value="1">1 étoile</option>
                <option value="2">2 étoiles</option>
                <option value="3">3 étoiles</option>
                <option value="4">4 étoiles</option>
                <option value="5">5 étoiles</option>
            </select>
        </div>
    </div>

    <!-- CHAMPS POUR APPARTEMENT UNIQUEMENT -->
    <div id="appartement-fields" style="display:none;">
        <div class="col-6">
            <label for="nb_sdb" class="form-label">Nombre de salles de bain</label>
            <input type="number" name="nb_sdb" id="nb_sdb" class="form-control">
        </div>
        <div class="row">
        <div class="col-6">
            <label for="surface" class="form-label">Surface (m²)</label>
            <input type="number" name="surface" id="surface" class="form-control">
        </div>
    </div>

    <!-- Équipements -->
    <div class="col-6">
        <label for="equipements" class="form-label">Équipements</label>
        <textarea name="equipements" id="equipements" class="form-control" rows="2" placeholder="Wi-Fi, Piscine, Climatisation..."></textarea>
    </div>
    </div>

    <!-- Images -->
     <div class="row">
    <div class="col-6">
        <label for="images" class="form-label">Images</label>
        <input type="file" name="images[]" id="images" class="form-control" multiple>
    </div>

    <!-- Description -->
    <div class="col-6">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
    </div>
    </div>

    <!-- Bouton -->
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<!-- SCRIPT POUR RENDRE LE FORMULAIRE DYNAMIQUE -->
<script>
document.getElementById('type').addEventListener('change', function () {
    let hotelFields = document.getElementById('hotel-fields');
    let appartementFields = document.getElementById('appartement-fields');

    if (this.value === 'hotel') {
        hotelFields.style.display = 'block';
        appartementFields.style.display = 'none';
    } else if (this.value === 'appartement') {
        hotelFields.style.display = 'none';
        appartementFields.style.display = 'block';
    } else {
        hotelFields.style.display = 'none';
        appartementFields.style.display = 'none';
    }
});
</script>


@endsection