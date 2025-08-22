@extends('layout.app')
@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Informations de l'établissement :
            <span class="text-primary">{{ $etab->nom }}</span>
        </h2>
        <a href="#" class="btn btn-primary">+ Ajouter une chambre</a>
    </div>

    <p><strong>Description :</strong> {{ $etab->description ?? 'Aucune description disponible.' }}</p>

    <hr>

    <p><strong>Adresse :</strong> {{ $etab->adresse ?? 'Non renseignée' }}</p>
    <p><strong>Ville :</strong> {{ $etab->ville ?? 'Non renseignée' }}</p>
    <p><strong>Type :</strong> {{ $etab->type ?? 'Non renseigné' }}</p>

    @if($etab->classement)
    <p>
        <strong>Classement :</strong>
        @for($i=1; $i<=5; $i++)
            @if($i <=$etab->classement)
            <i class="bi bi-star-fill text-warning"></i>
            @else
            <i class="bi bi-star text-warning"></i>
            @endif
            @endfor
    </p>
    @endif

    {{-- Image --}}
    <div class="mt-4">
        <a href="{{ $etab->images ? asset('storage/'.$etab->images) : asset('default.jpg') }}" target="_blank">
            <img src="{{ $etab->images ? asset('storage/'.$etab->images) : asset('default.jpg') }}"
                class="img-fluid rounded shadow-sm d-block mx-auto"
                style="max-height:350px; object-fit:fixed; width:60%; max-width:100%; cursor:pointer;"
                alt="image etablissement">
        </a>

    </div>
    <hr>

    <h2></h2>
    <hr>

</div>
@endsection