@extends('superadmin.layout.app')

@section('content')

<div class="container-fluid py-4 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold mb-1">🏢 Liste des établissements</h2>
            <p class="text-muted small mb-0">
                {{ count($hotels) + count($apparts) }} établissement(s) au total
            </p>
        </div>
    </div>

    <hr class="mb-4">

    {{-- HOTELS --}}
    @if(count($hotels) > 0)
    <h5 class="fw-bold mb-3">Hôtels <span class="badge bg-primary  text-white ms-1">{{ count($hotels) }}</span></h5>
    <div class="row g-3 mb-5">
        @foreach($hotels as $hotel)
        @php
            $hotelImages = json_decode($hotel->images, true);
            $firstImage  = (!empty($hotelImages) && is_array($hotelImages)) ? $hotelImages[0] : null;
        @endphp
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">

                <div class="position-relative">
                    <img src="{{ asset('storage/' . $firstImage) }}" 
                            class="card-img-top rounded-top" 
                            alt="{{ $hotel->nom }}" 
                            style="height:280px; object-fit:cover;">
                         
                    </span>
                </div>

                <div class="card-body px-3 py-3">
                    <h6 class="fw-bold text-dark mb-1">{{ $hotel->nom }}</h6>
                    <p class="text-muted small mb-1"> {{ $hotel->ville }}</p>
                    <p class="text-muted small mb-2"> {{ $hotel->adresse }}</p>

                    @if(isset($hotel->prix_min))
                    <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 rounded-2 small">
                        À partir de {{ number_format($hotel->prix_min, 0, ',', ' ') }} XAF / nuit
                    </span>
                    @endif

                    <div class="row text-center mt-3 pt-2 border-top">
                        <div class="col-6 border-end">
                            <div class="fw-bold text-primary">{{ $hotel->chambres_count ?? 0 }}</div>
                            <small class="text-muted">Chambres</small>
                        </div>
                        <div class="col-6">
                            <div class="fw-bold text-success">{{ $hotel->reservations_count ?? 0 }}</div>
                            <small class="text-muted">Réservations</small>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 px-3 pb-3 pt-0">
                    <div class="d-flex gap-2">
                        <a href="/details/{{ $hotel->id }}" class="btn btn-outline-primary btn-sm w-100 rounded-2">
                             Voir
                        </a>
                        <a href="#" class="btn btn-outline-warning btn-sm w-100 rounded-2">
                             Modifier
                        </a>
                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-2"
                                onclick="return confirm('Supprimer {{ $hotel->nom }} ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- APPARTEMENTS --}}
    @if(count($apparts) > 0)
    <h5 class="fw-bold mb-3">Appartements <span class="badge bg-info ms-1">{{ count($apparts) }}</span></h5>
    <div class="row g-3">
        @foreach($apparts as $appart)
        @php
            $appartImages = json_decode($appart->images, true);
            $firstAppartImage = (!empty($appartImages) && is_array($appartImages)) ? $appartImages[0] : null;
        @endphp
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">

                <div class="position-relative">
                    <img src="{{ $firstAppartImage ? asset('storage/' . $firstAppartImage) : 'https://placehold.co/600x200?text=Pas+d%27image' }}"
                         class="card-img-top"
                         alt="{{ $appart->nom }}"
                         style="height: 200px; object-fit: cover;">
                    <span class="badge bg-info rounded-pill position-absolute top-0 start-0 m-2 px-2 py-1">
                        Appartement
                    </span>
                </div>

                <div class="card-body px-3 py-3">
                    <h6 class="fw-bold text-dark mb-1">{{ $appart->nom }}</h6>
                    <p class="text-muted small mb-1"> {{ $appart->ville }}</p>
                    <p class="text-muted small mb-2"> {{ $appart->adresse }}</p>

                    @if(isset($appart->prix_min))
                    <span class="badge bg-info bg-opacity-10 text-info px-2 py-1 rounded-2 small">
                        À partir de {{ number_format($appart->prix_min, 0, ',', ' ') }} XAF / nuit
                    </span>
                    @endif

                    <div class="row text-center mt-3 pt-2 border-top">
                        <div class="col-6 border-end">
                            <div class="fw-bold text-info">{{ $appart->chambres_count ?? 0 }}</div>
                            <small class="text-muted">Chambres</small>
                        </div>
                        <div class="col-6">
                            <div class="fw-bold text-success">{{ $appart->reservations_count ?? 0 }}</div>
                            <small class="text-muted">Réservations</small>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 px-3 pb-3 pt-0">
                    <div class="d-flex gap-2">
                        <a href="/details-appart/{{ $appart->id }}" class="btn btn-outline-info btn-sm w-100 rounded-2">
                            Voir
                        </a>
                        <a href="#" class="btn btn-outline-warning btn-sm w-100 rounded-2">
                             Modifier
                        </a>
                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-2"
                                onclick="return confirm('Supprimer {{ $appart->nom }} ?')">
                                
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- Etat vide --}}
    @if(count($hotels) === 0 && count($apparts) === 0)
    <div class="card border-0 shadow-sm rounded-3 text-center py-5">
        <div class="card-body">
            <p class="text-muted mb-3">Aucun établissement enregistré pour le moment.</p>
            <!-- <a href="#" class="btn btn-primary btn-sm">➕ Ajouter un établissement</a> -->
        </div>
    </div>
    @endif

</div>

@endsection