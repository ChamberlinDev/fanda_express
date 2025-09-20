@extends('admin.layout.app')
@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Informations de l'établissement :
            <span class="text-primary">{{ $hotel->nom }}</span>

        </h2>
        <a href="/chambres/{{ $hotel->id}}" class="btn btn-primary">+ Ajouter une chambre</a>
    </div>
    <h2>
    </h2>

  
    <hr>
    <p><strong>Adresse :</strong> {{ $hotel->adresse ?? 'Non renseignée' }}</p>
    <p><strong>Ville :</strong> {{ $hotel->ville ?? 'Non renseignée' }}</p>

    <p><strong>Description :</strong> {{ $hotel->description ?? 'Aucune description disponible.' }}</p>

      {{-- Image --}}
    <div class="container-fluid my-5">
        <a href="{{ $hotel->images ? asset('storage/'.$hotel->image) : asset('default.jpg') }}" target="_blank">
            <img src="{{ $hotel->image ? asset('storage/'.$hotel->image) : asset('default.jpg') }}"
                class="img-fluid rounded shadow-sm d-block mx-auto"
                style="max-height:500px; object-fit:fixed; width:50%; max-width:50%; cursor:pointer;"
                alt="image etablissement">
        </a>
    </div>


    <hr>

    <h3>Chambres disponibles</h3>

    @if($hotel->chambres->count() > 0)
    <div class="row">
        @foreach($hotel->chambres as $chambre)
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
@endsection