@extends('admin.layout.app')

@section('content')
<div class="container my-5">
    {{-- En-tête --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Informations de l'établissement : 
            <span class="text-primary">{{ $appart->nom }}</span>
        </h2>
    </div>

    <hr>

    {{-- Informations de base --}}
    <div class="mb-4">
        <p><strong>Adresse :</strong> {{ $appart->adresse ?? 'Non renseignée' }}</p>
        <p><strong>Ville :</strong> {{ $appart->ville ?? 'Non renseignée' }}</p>
        <p><strong>Description :</strong> {{ $appart->description ?? 'Aucune description disponible.' }}</p>
    </div>

    {{-- Section Image --}}
    @php
        $images = $appart->images ? json_decode($appart->images, true) : [];
    @endphp

    <div class="my-4">
        @if(!empty($images))
            <a href="{{ asset('storage/' . $images[0]) }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('storage/' . $images[0]) }}"
                     class="img-fluid rounded shadow-sm d-block mx-auto"
                     style="max-height: 500px; object-fit: cover; width: 50%; cursor: pointer;"
                     alt="Image de {{ $appart->nom }}">
            </a>
        @else
            <a href="{{ asset('default.jpg') }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('default.jpg') }}"
                     class="img-fluid rounded shadow-sm d-block mx-auto"
                     style="max-height: 500px; object-fit: cover; width: 50%; cursor: pointer;"
                     alt="Image par défaut">
            </a>
        @endif
    </div>

    <hr>

    {{-- Boutons d'action --}}
    <div class="d-flex gap-2 mb-4">
        <a href="/etablissement" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
        <a href="{{ route('modif_appart', $appart->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Modifier
        </a>
    </div>
</div>
@endsection