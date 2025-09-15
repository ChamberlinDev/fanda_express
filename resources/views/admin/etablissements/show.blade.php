@extends('layout.app')
@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Informations de l'établissement :
            <span class="text-primary">{{ $etab->nom }}</span>

        </h2>
        <a href="/chambres/{{ $etab->id}}" class="btn btn-primary">+ Ajouter une chambre</a>
    </div>
    <h2>
    </h2>

    {{-- Image --}}
    <div class="mt-4">
        <a href="{{ $etab->images ? asset('storage/'.$etab->images) : asset('default.jpg') }}" target="_blank">
            <img src="{{ $etab->images ? asset('storage/'.$etab->images) : asset('default.jpg') }}"
                class="img-fluid rounded shadow-sm d-block mx-auto"
                style="max-height:250px; object-fit:fixed; width:50%; max-width:50%; cursor:pointer;"
                alt="image etablissement">
        </a>


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



    <hr>

    <h3>Chambres disponibles</h3>

    @if($etab->chambres->count() > 0)
    <div class="row">
        @foreach($etab->chambres as $chambre)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if($chambre->image)
                <img src="{{ asset('storage/' . $chambre->image) }}"
                    class="card-img-top" alt="{{ $chambre->nom }}">
                @else
                <img src="{{ asset('images/default-room.jpg') }}"
                    class="card-img-top" alt="Default room">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $chambre->nom }}</h5>
                    <p class="card-text">
                        <strong>Capacité :</strong> {{ $chambre->capacite }} personnes <br>
                        <strong>Prix :</strong> {{ number_format($chambre->prix, 0, ',', ' ') }} XOF / nuit
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>Aucune chambre ajoutée pour cet établissement.</p>
    @endif
</div>
<hr>

</div>
@endsection