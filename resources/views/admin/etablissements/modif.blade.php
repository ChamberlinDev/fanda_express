@extends('admin.layout.app')
@section('content')
<div class="container my-5">

    <h2 class="mb-4 text-primary">
        <i class="bi bi-pencil-square"></i> Modifier l'établissement
    </h2>

    {{-- Formulaire --}}
    <form action="/modif_save/{{$etab->id}}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-white">
        @csrf

        {{-- Nom --}}
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'établissement</label>
            <input type="text" name="nom" id="nom"
                value="{{ old('nom', $etab->nom) }}"
                class="form-control @error('nom') is-invalid @enderror" required>
            @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Type --}}
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select">
                <option value="Hotel" {{ $etab->type == 'Hotel' ? 'selected' : '' }}>Hôtel</option>
                <option value="Villa" {{ $etab->type == 'Appartement' ? 'selected' : '' }}>Appartement</option>
            </select>
        </div>

        {{-- Ville --}}
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" id="ville"
                value="{{ old('ville', $etab->ville) }}"
                class="form-control @error('ville') is-invalid @enderror" required>
            @error('ville') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Classement --}}
        <div class="mb-3">
            <label for="classement" class="form-label">Classement (1 à 5 étoiles)</label>
            <input type="number" name="classement" id="classement"
                value="{{ old('classement', $etab->classement) }}"
                min="1" max="5"
                class="form-control @error('classement') is-invalid @enderror">
            @error('classement') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="4"
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $etab->description) }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="images" class="form-label">Image</label>
            <input type="file" name="images" id="images"
                class="form-control @error('images') is-invalid @enderror">
            @error('images') <div class="invalid-feedback">{{ $message }}</div> @enderror

            {{-- Aperçu de l'image actuelle --}}
            @if($etab->images)
            <div class="mt-3">
                <p>Image actuelle :</p>
                <img src="{{ asset('storage/'.$etab->images) }}"
                    class="img-thumbnail"
                    style="max-height: 200px;">
            </div>
            @endif
        </div>

        {{-- Boutons --}}
        <div class="d-flex justify-content-between mt-4">
            <a href="/etablissement" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Enregistrer
            </button>
        </div>
    </form>

</div>
@endsection