@extends('admin.layout.app')

@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Informations de l'établissement :
            <span class="text-primary">{{ $hotel->nom }}</span>
        </h2>
        <a href="{{ url('/chambres/' . $hotel->id) }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Ajouter une chambre
        </a>
    </div>

    <hr>

    <p><strong>Adresse :</strong> {{ $hotel->adresse ?? 'Non renseignée' }}</p>
    <p><strong>Ville :</strong> {{ $hotel->ville ?? 'Non renseignée' }}</p>
    <p><strong>Description :</strong> {{ $hotel->description ?? 'Aucune description disponible.' }}</p>

    @php
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

    {{-- Succès --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h3 class="mb-4">
        <i class="bi bi-door-open me-2"></i>Mes chambres
        <span class="badge bg-primary ms-2 text-white">{{ $hotel->chambres->count() }}</span>
    </h3>

    @if($hotel->chambres && $hotel->chambres->count() > 0)
        <div class="row">
            @foreach($hotel->chambres as $chambre)
            @php
                $images     = $chambre->images ? json_decode($chambre->images, true) : [];
                $firstImage = !empty($images) ? $images[0] : null;
            @endphp

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">

                    {{-- Image --}}
                    @if($firstImage)
                        <a href="{{ asset('storage/'.$firstImage) }}" target="_blank">
                            <img src="{{ asset('storage/'.$firstImage) }}"
                                 class="card-img-top"
                                 style="height: 220px; object-fit: cover;"
                                 alt="image_chambre">
                        </a>
                    @else
                        <img src="{{ asset('images/default-room.jpg') }}"
                             class="card-img-top"
                             style="height: 220px; object-fit: cover;"
                             alt="image_par_defaut">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $chambre->nom }}</h5>
                        <p class="card-text mb-1">
                            <i class="bi bi-people text-info me-1"></i>
                            <strong>Capacité :</strong> {{ $chambre->capacite }} personnes
                        </p>
                        <p class="card-text text-success fw-bold">
                            <i class="bi bi-cash-stack me-1"></i>
                            {{ number_format($chambre->prix, 0, ',', ' ') }} FCFA / nuit
                        </p>
                    </div>

                    {{-- Boutons modifier / supprimer --}}
                    <div class="card-footer bg-white border-0 d-flex gap-2 pb-3">
                        <a href="{{ route('chambres.edit', $chambre->id) }}"
                           class="btn btn-warning btn-sm ">
                            <i class="bi bi-pencil me-1 "></i>
                        </a>

                        <form action="{{ route('chambres.destroy', $chambre->id) }}"
                              method="POST"
                              onsubmit="return confirm('Supprimer cette chambre ?')"
                              >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-2">
                                <i class="bi bi-trash me-1"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
            <p>Aucune chambre ajoutée pour cet établissement.</p>
            <a href="{{ url('/chambres/' . $hotel->id) }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i> Ajouter une chambre
            </a>
        </div>
    @endif

</div>
<hr>
@endsection