@extends('admin.layout.app')
@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Informations de l'établissement :
            <span class="text-primary">{{ $appart->nom }}</span>

        </h2>
    </div>
    <h2>
    </h2>


    <hr>

    <p><strong>Adresse :</strong> {{ $appart->adresse ?? 'Non renseignée' }}</p>
    <p><strong>Ville :</strong> {{ $appart->ville ?? 'Non renseignée' }}</p>

    <p><strong>Description :</strong> {{ $appart->description ?? 'Aucune description disponible.' }}</p>

    {{-- Image --}}
    @php
    // Si la colonne images n'est pas vide, on la décode
    $images = $appart->images ? json_decode($appart->images, true) : [];
    @endphp

    <div class="container-fluid my-5">
        @if(!empty($images))
        {{-- Affiche la première image --}}
        <a href="{{ asset('storage/'.$images[0]) }}" target="_blank">
            <img src="{{ asset('storage/'.$images[0]) }}"
                class="img-fluid rounded shadow-sm d-block mx-auto"
                style="max-height:500px; object-fit:cover; width:50%; max-width:50%; cursor:pointer;"
                alt="image établissement">
        </a>
        @else
        {{-- Image par défaut si aucune image --}}
        <a href="{{ asset('default.jpg') }}" target="_blank">
            <img src="{{ asset('default.jpg') }}"
                class="img-fluid rounded shadow-sm d-block mx-auto"
                style="max-height:500px; object-fit:cover; width:50%; max-width:50%; cursor:pointer;"
                alt="image établissement">
        </a>
        @endif
    </div>

    <a href="/etablissement" class="btn btn-primary">Retour</a>
    <a href="#" class="btn btn-warning">Modifier</a>

    <hr>

</div>
<hr>

</div>
@endsection