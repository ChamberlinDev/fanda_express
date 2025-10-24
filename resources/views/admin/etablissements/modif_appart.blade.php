@extends('admin.layout.app')
@section('content')

<h1 class="text-center mb-4">Modifier l'appartement</h1>
<hr>
<p class="text-center">
    Mettez à jour les informations de votre appartement pour garantir aux visiteurs des informations fiables et à jour.
</p>
<hr>

<form action="{{ route('modif_appart', $appartement->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-white shadow-sm">
    @csrf

    <!-- Nom & Ville -->
    <div class="row mb-3">
        <div class="col-md-6 text-dark">
            <label for="nom" class="form-label">Nom de l'appartement</label>
            <input type="text" name="nom" id="nom" class="form-control"
                   value="{{ old('nom', $appartement->nom) }}" required>
        </div>
        <div class="col-md-6">
            <label for="ville" class="form-label">Ville</label>
            <select name="ville" id="ville" class="form-select">
                <option value="pointe-noire" {{ $appartement->ville == 'pointe-noire' ? 'selected' : '' }}>Pointe-Noire</option>
                <option value="brazzaville" {{ $appartement->ville == 'brazzaville' ? 'selected' : '' }}>Brazzaville</option>
                <option value="dolisie" {{ $appartement->ville == 'dolisie' ? 'selected' : '' }}>Dolisie</option>
            </select>
        </div>
    </div>

    <!-- Adresse & Description -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="adresse" class="form-label">Adresse</label>
            <textarea name="adresse" id="adresse" class="form-control" rows="2" required>{{ old('adresse', $appartement->adresse) }}</textarea>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $appartement->description) }}</textarea>
        </div>
    </div>

    <!-- Champs spécifiques Appartement -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="nbre_chambre" class="form-label">Nombre de chambres</label>
            <input type="number" name="nbre_chambre" id="nbre_chambre" class="form-control"
                   value="{{ old('nbre_chambre', $appartement->nbre_chambre) }}">
        </div>

        <div class="col-md-6">
            <label for="prix" class="form-label">Prix (FCFA)</label>
            <input type="number" name="prix" id="prix" class="form-control"
                   value="{{ old('prix', $appartement->prix) }}">
        </div>
    </div>

    <!-- Images -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="images" class="form-label">Images (vous pouvez en ajouter de nouvelles)</label>
            <input type="file" name="images[]" id="images" multiple class="form-control">
            <small class="text-muted d-block mt-2">Images actuelles :</small>

            <div class="mt-2 d-flex flex-wrap gap-2">
                @php
                    $images = is_array($appartement->images)
                        ? $appartement->images
                        : (json_decode($appartement->images, true) ?? explode(',', $appartement->images));
                @endphp

                @foreach($images as $img)
                    @if(!empty(trim($img)))
                        <img src="{{ asset('storage/' . trim($img)) }}" alt="image"
                             class="rounded border" width="100" height="100">
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Équipements -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="equipements" class="form-label">Équipements</label>
            @php
                $equipements = is_array($appartement->equipements)
                    ? $appartement->equipements
                    : (json_decode($appartement->equipements, true) ?? explode(',', $appartement->equipements));
            @endphp
            <select name="equipements[]" id="equipements" class="form-select" multiple>
                <option value="Wi-Fi" {{ in_array('Wi-Fi', $equipements) ? 'selected' : '' }}>Wi-Fi</option>
                <option value="Climatisation" {{ in_array('Climatisation', $equipements) ? 'selected' : '' }}>Climatisation</option>
                <option value="Parking" {{ in_array('Parking', $equipements) ? 'selected' : '' }}>Parking</option>
                <option value="Cuisine équipée" {{ in_array('Cuisine équipée', $equipements) ? 'selected' : '' }}>Cuisine équipée</option>
                <option value="Balcon" {{ in_array('Balcon', $equipements) ? 'selected' : '' }}>Balcon</option>
                <option value="Autres" {{ in_array('Autres', $equipements) ? 'selected' : '' }}>Autres</option>
            </select>
            <small class="form-text text-muted">Maintenez Ctrl (ou Cmd) pour sélectionner plusieurs options.</small>

            <!-- Champ texte pour "Autres" -->
            <div id="autres_input" class="mt-2 {{ in_array('Autres', $equipements) ? '' : 'd-none' }}">
                <input type="text" name="equipements_autres" class="form-control"
                       placeholder="Saisir un autre équipement"
                       value="{{ old('equipements_autres', $appartement->equipements_autres) }}">
            </div>
        </div>
    </div>

    <!-- Bouton -->
    <div class="text-end">
        <a href="/etablissement" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Mettre à jour
        </button>
    </div>
</form>

<!-- Script pour afficher le champ "Autres" -->
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
