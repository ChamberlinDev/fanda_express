@extends('admin.layout.app')
@section('content')

<h1 class="text-center mb-4">Ajouter un hôtel</h1>
<hr>
<p class="text-center">
    Ajoutez facilement votre établissement (hôtel) à notre plateforme de réservation.
    Renseignez les informations essentielles telles que le nom, l’adresse, la description,
    les services disponibles et vos coordonnées. Cela permettra aux clients de découvrir
    votre établissement, de consulter vos offres et de réserver directement en ligne.
    Plus vos informations sont complètes et précises, plus vous augmentez vos chances
    d’attirer de nouveaux voyageurs.
</p>
<hr>

<form action="{{ route('etablissement.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-white shadow-sm">
    @csrf

    <!-- Nom & Ville -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="nom" class="form-label">Nom de l'hôtel</label>
            <input type="text" name="nom" id="nom" class="form-control" placeholder="Veuillez saisir le nom de l'hôtel" required>
        </div>
        <div class="col-md-6">
            <label for="ville" class="form-label">Ville</label>
            <select name="ville" id="ville" class="form-select">
                <option value="pointe-noire">Pointe-Noire</option>
            </select>
        </div>
    </div>

    <!-- Adresse & Description -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="adresse" class="form-label">Adresse</label>
            <textarea name="adresse" id="adresse" class="form-control" rows="2" placeholder="Veuillez saisir l'adresse" required></textarea>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Vous pouvez parler de l'hôtel en quelques lignes" rows="4"></textarea>
        </div>
    </div>

    <!-- Images -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="image" class="form-label">Images</label>
            <input type="file" name="image" id="image" class="form-control" multiple>
        </div>
    </div>

    <!-- Équipements -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="equipements" class="form-label">Équipements</label>
            <select name="equipements[]" id="equipements" class="form-select" multiple>
                <option value="Wi-Fi">Wi-Fi</option>
                <option value="Piscine">Piscine</option>
                <option value="Climatisation">Climatisation</option>
                <option value="Autres">Autres</option>
            </select>
            <small class="form-text text-muted">Maintenez la touche Ctrl (ou Cmd) pour sélectionner plusieurs options.</small>

            <!-- Champ texte pour "Autres" -->
            <div id="autres_input" class="mt-2 d-none">
                <input type="text" name="equipements_autres" class="form-control" placeholder="Saisir un autre équipement">
            </div>
        </div>
    </div>





    <!-- Bouton -->
    <div class="text-end">
        <a href="/etablissement" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Enregistrer
        </button>
    </div>
</form>

<!-- Script pour afficher le champ si "Autres" est coché -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const select = document.getElementById('equipements');
        const autresInput = document.getElementById('autres_input');

        select.addEventListener('change', function() {
            if (Array.from(select.selectedOptions).some(opt => opt.value === 'Autres')) {
                autresInput.classList.remove('d-none');
            } else {
                autresInput.classList.add('d-none');
            }
        });
    });
</script>

@endsection