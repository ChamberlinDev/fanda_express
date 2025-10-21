@extends('admin.layout.app')

@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Informations de l'établissement :
            <span class="text-primary">{{ $hotel->nom }}</span>
        </h2>
        <a href="{{ url('/chambres/' . $hotel->id) }}" class="btn btn-primary">
            + Ajouter une chambre
        </a>
    </div>

    <hr>

    <p><strong>Adresse :</strong> {{ $hotel->adresse ?? 'Non renseignée' }}</p>
    <p><strong>Ville :</strong> {{ $hotel->ville ?? 'Non renseignée' }}</p>
    <p><strong>Description :</strong> {{ $hotel->description ?? 'Aucune description disponible.' }}</p>

    {{-- Image principale de l’hôtel --}}
    @php
        // Si tu stockes les images en JSON dans ta base
        $imagePath = null;
        if (!empty($hotel->images)) {
            $decoded = json_decode($hotel->images, true);
            if (is_array($decoded) && count($decoded) > 0) {
                $imagePath = $decoded[0];
            }
        }
    @endphp

    <div class="container-fluid my-5">
        <a href="{{ $imagePath ? asset('storage/'.$imagePath) : asset('images/default-hotel.jpg') }}" target="_blank">
            <img src="{{ $imagePath ? asset('storage/'.$imagePath) : asset('images/default-hotel.jpg') }}"
                 class="img-fluid rounded shadow-sm d-block mx-auto"
                 style="max-height:500px; object-fit:cover; width:50%; max-width:50%; cursor:pointer;"
                 alt="image etablissement">
        </a>
    </div>

    <hr>

    <h3>Chambres disponibles</h3>

    @if($hotel->chambres && $hotel->chambres->count() > 0)
        <div class="row">
            @foreach($hotel->chambres as $chambre)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $chambre->image ? asset('storage/' . $chambre->image) : asset('images/default-room.jpg') }}"
                             class="card-img-top" alt="{{ $chambre->nom }}">
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
