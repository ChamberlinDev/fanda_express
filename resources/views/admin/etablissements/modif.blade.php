@extends('admin.layout.app')
@section('content')

<h1 class="text-center mb-4">Modifier l'hôtel</h1>
<hr>
<p class="text-center">
    Modifiez les informations de votre établissement afin de les maintenir à jour et d’offrir une meilleure expérience aux visiteurs.
</p>
<hr>

<form action="{{ route('modif_save', $hotel->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-white shadow-sm">
    @csrf

    <!-- Nom & Ville -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="nom" class="form-label">Nom de l'hôtel</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $hotel->nom) }}" required>
        </div>
        <div class="col-md-6">
            <label for="ville" class="form-label">Ville</label>
            <select name="ville" id="ville" class="form-select">
                <option value="pointe-noire" {{ $hotel->ville == 'pointe-noire' ? 'selected' : '' }}>Pointe-Noire</option>
            </select>
        </div>
    </div>

    <!-- Adresse & Description -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="adresse" class="form-label">Adresse</label>
            <textarea name="adresse" id="adresse" class="form-control" rows="2" required>{{ old('adresse', $hotel->adresse) }}</textarea>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $hotel->description) }}</textarea>
        </div>
    </div>

    <!-- Images -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="images" class="form-label">Ajouter de nouvelles images</label>
            <input type="file" name="images[]" id="images" multiple class="form-control">

            <small class="text-muted d-block mt-2">Images actuelles :</small>
            <div class="mt-2 d-flex flex-wrap gap-2">
                @php
                    $images = json_decode($hotel->images, true) ?? [];
                @endphp
                @foreach($images as $img)
                    @if(!empty(trim($img)))
                        <img src="{{ asset('storage/' . trim($img)) }}" alt="image" class="rounded border" width="100" height="100">
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
                $equipements = json_decode($hotel->equipements, true) ?? [];
            @endphp
            <select name="equipements[]" id="equipements" class="form-select" multiple>
                <option value="Wi-Fi" {{ in_array('Wi-Fi', $equipements) ? 'selected' : '' }}>Wi-Fi</option>
                <option value="Piscine" {{ in_array('Piscine', $equipements) ? 'selected' : '' }}>Piscine</option>
                <option value="Climatisation" {{ in_array('Climatisation', $equipements) ? 'selected' : '' }}>Climatisation</option>
                <option value="Autres" {{ in_array('Autres', $equipements) ? 'selected' : '' }}>Autres</option>
            </select>

            <div id="autres_input" class="mt-2 {{ in_array('Autres', $equipements) ? '' : 'd-none' }}">
                <input type="text" name="equipements_autres" class="form-control"
                       placeholder="Saisir un autre équipement"
                       value="{{ old('equipements_autres') }}">
            </div>
        </div>
    </div>

    <!-- Boutons -->
    <div class="text-end">
        <a href="/etablissement" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Mettre à jour
        </button>
    </div>
</form>

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
