@extends('clients.layout.app')

@section('content')

@php
$images = json_decode($hotel->images, true);
$images = is_array($images) ? $images : [];
$firstImage = !empty($images) ? $images[0] : null;
@endphp

{{-- Hero avec image principale --}}
<div class="position-relative" style="height:420px; overflow:hidden;">
    <img src="{{ $firstImage ? asset('storage/' . $firstImage) : 'https://placehold.co/1200x400?text=Hôtel' }}"
        class="w-100 h-100"
        style="object-fit:cover; filter:brightness(0.6);"
        alt="{{ $hotel->nom }}">

    {{-- Overlay dégradé --}}
    <div style="position:absolute; inset:0;
                background:linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 60%);">
    </div>

    {{-- Bouton retour --}}
    <a href="/" class="btn btn-light btn-sm position-absolute"
        style="top:20px; left:20px; border-radius:20px; opacity:0.9;">
        <i class="bi bi-arrow-left me-1"></i>Retour
    </a>

    {{-- Badge type --}}
    <span class="badge bg-primary position-absolute"
        style="top:20px; right:20px; border-radius:20px; padding:7px 16px; font-size:0.85rem;">
        <i class="bi bi-building me-1"></i>Hôtel
    </span>

    {{-- Infos sur l'image --}}
    <div class="position-absolute text-white px-4 pb-4" style="bottom:0; left:0;">
        <h1 class="fw-bold mb-1" style="text-shadow:0 2px 8px rgba(0,0,0,0.5);">
            {{ $hotel->nom }}
        </h1>
        <p class="mb-0 opacity-75">
            <i class="bi bi-geo-alt-fill me-1"></i>
            {{ $hotel->ville ?? '' }}
            @if($hotel->adresse) &mdash; {{ $hotel->adresse }} @endif
        </p>
    </div>
</div>

{{-- Miniatures --}}
@if(count($images) > 1)
<div class="container mt-3 mb-2">
    <div class="d-flex gap-2 flex-wrap">
        @foreach($images as $index => $img)
        <a href="{{ asset('storage/' . $img) }}" target="_blank"> <img src="{{ asset('storage/' . $img) }}"
                class="rounded shadow-sm border"
                style="width:80px; height:60px; object-fit:cover; cursor:pointer; transition:opacity 0.2s;"
                onmouseover="this.style.opacity='0.75'"
                onmouseout="this.style.opacity='1'"
                onclick="document.querySelector('.hero-img').src=this.src"
                alt="Photo {{ $index + 1 }}"></a>
        @endforeach
    </div>
</div>
@endif

<div class="container my-5">
    <div class="row g-4">

        {{-- Colonne gauche --}}
        <div class="col-lg-8">

            {{-- Infos générales --}}
            <div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-info-circle text-primary me-2"></i>Informations générales
                    </h5>
                </div>
                <div class="card-body px-4 pb-4">
                    <div class="row g-3 mt-1">
                        <div class="col-md-6 d-flex align-items-start gap-3">

                            <div>
                                <small class="text-dark d-block">Nom</small>
                                <span class="fw-semibold text-dark">{{ $hotel->nom }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-start gap-3">

                            <div>
                                <small class="text-dark d-block">Localisation</small>
                                <span class="fw-semibold text-dark">{{ $hotel->ville ?? '—' }}</span>
                            </div>
                        </div>
                        @if($hotel->telephone ?? false)
                        <div class="col-md-6 d-flex align-items-start gap-3">
                            <div class="bg-success bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center "
                                style="width:42px; height:42px;">
                                <i class="bi bi-telephone-fill text-success"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Téléphone</small>
                                <span class="fw-semibold text-dark">{{ $hotel->telephone }}</span>
                            </div>
                        </div>
                        @endif
                        @if($hotel->email ?? false)
                        <div class="col-md-6 d-flex align-items-start gap-3">
                            <div class="bg-info bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                                style="width:42px; height:42px;">
                                <i class="bi bi-envelope-fill text-info"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Email</small>
                                <span class="fw-semibold">{{ $hotel->email }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Description --}}
            @if($hotel->description)
            <div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-card-text text-primary me-2"></i>Description
                    </h5>
                    <p class="text-muted mb-0" style="line-height:1.8;">
                        {{ $hotel->description }}
                    </p>
                </div>
            </div>
            @endif

            {{-- Équipements --}}
            @if($hotel->equipements)
            <div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-grid-3x3-gap-fill text-primary me-2"></i>Équipements
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach(explode(',', $hotel->equipements) as $eq)
                        <span class="badge bg-light border text-dark px-3 py-2"
                            style="border-radius:20px; font-size:0.82rem;">
                            <i class="bi bi-check-circle-fill text-success me-1"></i>
                            {{ trim($eq) }}
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            {{-- Chambres --}}
            <div class="mb-4">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-door-open-fill text-primary me-2"></i>
                    Chambres disponibles
                    <span class="badge bg-primary ms-2" style="font-size:0.8rem;">
                        {{ $hotel->chambres->count() }}
                    </span>
                </h4>

                <div class="row g-4">
                    @forelse($hotel->chambres as $chambre)
                    @php
                    $chambreImages = [];
                    if ($chambre->images && is_string($chambre->images)) {
                    $decoded = json_decode($chambre->images, true);
                    $chambreImages = is_array($decoded) ? $decoded : [];
                    }
                    $chambreFirstImage = !empty($chambreImages) ? $chambreImages[0] : null;
                    @endphp

                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm"
                            style="border-radius:16px; overflow:hidden; transition:transform 0.2s, box-shadow 0.2s;"
                            onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 28px rgba(0,0,0,0.12)'"
                            onmouseout="this.style.transform='';this.style.boxShadow=''">

                            <div class="position-relative">
                                <img src="{{ $chambreFirstImage ? asset('storage/' . $chambreFirstImage) : 'https://placehold.co/600x220?text=Chambre' }}"
                                    class="w-100"
                                    style="height:200px; object-fit:cover;"
                                    alt="{{ $chambre->nom }}">

                                <span class="badge bg-primary position-absolute"
                                    style="top:10px; right:10px; border-radius:20px; padding:5px 12px;">
                                    {{ $chambre->nom }}
                                </span>

                                {{-- Nb photos chambre --}}
                                @if(count($chambreImages) > 1)
                                <span class="badge bg-dark bg-opacity-75 position-absolute"
                                    style="bottom:10px; right:10px; border-radius:20px; font-size:0.72rem;">
                                    <i class="bi bi-images me-1"></i>{{ count($chambreImages) }}
                                </span>
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column p-3">

                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h6 class="fw-bold mb-1">{{ $chambre->nom }}</h6>
                                        <small class="text-muted">
                                            <i class="bi bi-people-fill text-primary me-1"></i>
                                            {{ $chambre->capacite }} personne(s)
                                        </small>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold text-primary" style="font-size:1.1rem;">
                                            {{ number_format($chambre->prix, 0, ',', ' ') }}
                                        </div>
                                        <small class="text-muted">XAF/nuit</small>
                                    </div>
                                </div>

                                @if(isset($chambre->superficie))
                                <p class="small text-muted mb-3">
                                    <i class="bi bi-arrows-angle-expand me-1"></i>
                                    {{ $chambre->superficie }} m²
                                </p>
                                @endif

                                <a href="{{ route('reservation_hotel', $chambre->id) }}"
                                    class="btn btn-primary w-100 mt-auto">
                                    <i class="bi bi-calendar-check me-1"></i>Réserver cette chambre
                                </a>

                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="col-12">
                        <div class="alert alert-light border text-center py-4">
                            <i class="bi bi-door-closed fs-2 text-muted d-block mb-2"></i>
                            Aucune chambre disponible pour le moment.
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Commentaire --}}
            <div class="card border-0 shadow-sm" style="border-radius:16px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-chat-left-text-fill text-primary me-2"></i>
                        Laisser un commentaire
                    </h5>
                    <form action="{{route('commentaire_app',  $hotel->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="avis" class="form-control" rows="4"
                                placeholder="Partagez votre expérience..."
                                style="border-radius:12px; resize:none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send-fill me-1"></i>Envoyer
                        </button>
                    </form>
                </div>
            </div>

        </div>

        {{-- Colonne droite : récap sticky --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="border-radius:16px; position:sticky; top:20px;">
                <div class="card-header bg-primary text-white py-3 px-4" style="border-radius:16px 16px 0 0;">
                    <h6 class="mb-0 fw-bold text-white">
                        <i class="bi bi-building me-2"></i>{{ $hotel->nom }}
                    </h6>
                </div>
                <div class="card-body p-4">

                    <ul class="list-unstyled mb-4">
                        <li class="mb-3 pb-3 border-bottom">
                            <small class="text-dark d-block mb-1">Localisation</small>
                            <span class="fw-semibold small text-dark">
                                <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                                {{ $hotel->ville ?? '—' }}
                                @if($hotel->adresse) — {{ Str::limit($hotel->adresse, 30) }} @endif
                            </span>
                        </li>
                        <li class="mb-3 pb-3 border-bottom">
                            <small class="text-dark d-block mb-1">Chambres</small>
                            <span class="fw-semibold small text-white">
                                <i class="bi bi-door-open text-primary me-1"></i>
                                {{ $hotel->chambres->count() }} chambre(s) disponible(s)
                            </span>
                        </li>
                        @if($hotel->chambres->count() > 0)
                        <li class="mb-3 pb-3 border-bottom">
                            <small class="text-dark d-block mb-1">À partir de</small>
                            <span class="fw-bold text-primary" style="font-size:1.2rem;">
                                {{ number_format($hotel->chambres->min('prix'), 0, ',', ' ') }} XAF
                            </span>
                            <small class="text-muted">/jours</small>
                        </li>
                        @endif
                        @if($hotel->equipements)
                        <li>
                            <small class="text-dark d-block mb-2">Équipements</small>
                            @foreach(array_slice(explode(',', $hotel->equipements), 0, 4) as $eq)
                            <span class="badge bg-light border text-dark me-1 mb-1"
                                style="border-radius:20px; font-size:0.72rem;">
                                <i class="bi bi-check-circle-fill text-success me-1"></i>{{ trim($eq) }}
                            </span>
                            @endforeach
                        </li>
                        @endif
                    </ul>

                    <!-- <a href="#chambres" class="btn btn-primary w-100">
                        <i class="bi bi-calendar-check me-1"></i>Voir les chambres
                    </a> -->

                </div>
            </div>
        </div>

    </div>
</div>


@include('clients.partials.footer')

@endsection