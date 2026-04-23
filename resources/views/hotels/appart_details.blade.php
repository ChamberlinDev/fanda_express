@extends('clients.layout.app')

@section('content')

@php
$images = json_decode($appart->images, true);
$images = is_array($images) ? $images : [];
$firstImage = !empty($images) ? $images[0] : null;
@endphp

{{-- Hero --}}
<div class="position-relative" style="height:420px; overflow:hidden;">
    <img id="heroImg"
        src="{{ $firstImage ? asset('storage/' . $firstImage) : 'https://placehold.co/1400x420?text=Aucune+image' }}"
        class="w-100 h-100"
        style="object-fit:cover; filter:brightness(0.6); transition:opacity 0.3s;"
        alt="{{ $appart->nom }}">

    {{-- Overlay --}}
    <div style="position:absolute; inset:0;
                background:linear-gradient(to top, rgba(0,0,0,0.75) 0%, transparent 60%);">
    </div>

    {{-- Retour --}}
    <a href="/" class="btn btn-light btn-sm position-absolute"
        style="top:20px; left:20px; border-radius:20px; opacity:0.9;">
        <i class="bi bi-arrow-left me-1"></i>Retour
    </a>

    {{-- Badge --}}
    <span class="badge bg-success position-absolute"
        style="top:20px; right:20px; border-radius:20px; padding:7px 16px; font-size:0.85rem;">
        <i class="bi bi-house-door me-1"></i>Appartement
    </span>

    {{-- Infos bas --}}
    <div class="position-absolute text-white px-4 pb-4" style="bottom:0; left:0; right:0;">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-2">
            <div>
                <h1 class="fw-bold mb-1" style="text-shadow:0 2px 8px rgba(0,0,0,0.5);">
                    {{ $appart->nom }}
                </h1>
                <p class="mb-0 opacity-75 small">
                    <i class="bi bi-geo-alt-fill me-1"></i>
                    {{ $appart->ville ?? '' }}
                    @if($appart->adresse) &mdash; {{ $appart->adresse }} @endif
                </p>
            </div>
            @if(isset($appart->prix))
            <div class="text-end">
                <div class="fw-bold" style="font-size:1.6rem; text-shadow:0 2px 6px rgba(0,0,0,0.5);">
                    {{ number_format($appart->prix, 0, ',', ' ') }} XAF
                </div>
                <small class="opacity-75">/ jours</small>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Miniatures --}}
@if(count($images) > 1)
<div class="container mt-3 mb-2">
    <div class="d-flex gap-2 flex-wrap">
        @foreach($images as $index => $img)
        <a href="{{ asset('storage/' . $img) }}" target="_blank"> <img src="{{ asset('storage/' . $img) }}"
                class="rounded shadow-sm border"
                style="width:80px; height:60px; object-fit:cover; cursor:pointer; transition:opacity 0.2s, border-color 0.2s;"
                onmouseover="this.style.opacity='0.75'"
                onmouseout="this.style.opacity='1'"
                onclick="document.getElementById('heroImg').src=this.src"
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
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-info-circle text-success me-2"></i>Informations générales
                    </h5>
                    <div class="row g-3">

                        <div class="col-md-6 d-flex align-items-start gap-3">

                            <div>
                                <small class="text-muted d-block">Nom</small>
                                <span class="fw-semibold">{{ $appart->nom }}</span>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex align-items-start gap-3">

                            <div>
                                <small class="text-dark d-block">Localisation</small>
                                <span class="fw-semibold">{{ $appart->ville ?? '—' }}</span>
                            </div>
                        </div>

                        @if($appart->telephone ?? false)
                        <div class="col-md-6 d-flex align-items-start gap-3">
                            <div class="bg-success bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                                style="width:42px; height:42px;">
                                <i class="bi bi-telephone-fill text-success"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Téléphone</small>
                                <span class="fw-semibold">{{ $appart->telephone }}</span>
                            </div>
                        </div>
                        @endif

                        @if($appart->email ?? false)
                        <div class="col-md-6 d-flex align-items-start gap-3">
                            <div class="bg-info bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                                style="width:42px; height:42px;">
                                <i class="bi bi-envelope-fill text-info"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Email</small>
                                <span class="fw-semibold">{{ $appart->email }}</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($appart->capacite))
                        <div class="col-md-6 d-flex align-items-start gap-3">
                            <div class="bg-primary bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center "
                                style="width:42px; height:42px;">
                                <i class="bi bi-people-fill text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Capacité</small>
                                <span class="fw-semibold">{{ $appart->capacite }} personne(s)</span>
                            </div>
                        </div>
                        @endif

                        @if(isset($appart->prix))
                        <div class="col-md-6 d-flex align-items-start gap-3">

                            <div>
                                <small class="text-muted d-block">Prix / nuit</small>
                                <span class="fw-bold text-success" style="font-size:1.1rem;">
                                    {{ number_format($appart->prix, 0, ',', ' ') }} XAF
                                </span>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>

            {{-- Description --}}
            @if($appart->description)
            <div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-card-text text-success me-2"></i>Description
                    </h5>
                    <p class="text-muted mb-0" style="line-height:1.8;">
                        {{ $appart->description }}
                    </p>
                </div>
            </div>
            @endif

            {{-- Équipements --}}
            @if($appart->equipements)
            <div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-grid-3x3-gap-fill text-success me-2"></i>Équipements
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach(explode(',', $appart->equipements) as $eq)
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

            {{-- Commentaire --}}
            <div class="card border-0 shadow-sm" style="border-radius:16px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-chat-left-text-fill text-success me-2"></i>
                        Laisser un commentaire
                    </h5>
                    <form action="{{route('commentaire_app',  $appart->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="avis" class="form-control" rows="4"
                                placeholder="Partagez votre expérience sur cet appartement..."
                                style="border-radius:12px; resize:none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-send-fill me-1"></i>Envoyer
                        </button>
                    </form>
                </div>
            </div>

        </div>
       

        {{-- Colonne droite sticky --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="border-radius:16px; position:sticky; top:20px;">

                <div class="card-header bg-success text-white py-3 px-4"
                    style="border-radius:16px 16px 0 0;">
                    <h6 class="mb-0 fw-bold text-white">
                        <i class="bi bi-house-door me-2"></i>{{ $appart->nom }}
                    </h6>
                </div>

                <div class="card-body p-4">
                    <ul class="list-unstyled mb-4">

                        @if(isset($appart->prix))
                        <li class="mb-3 pb-3 border-bottom text-center">
                            <small class="text-muted d-block mb-1">Prix par nuit</small>
                            <span class="fw-bold text-success" style="font-size:1.8rem;">
                                {{ number_format($appart->prix, 0, ',', ' ') }}
                            </span>
                            <span class="text-muted small"> XAF</span>
                        </li>
                        @endif

                        <li class="mb-3 pb-3 border-bottom">
                            <small class="text-dark d-block mb-1">Localisation</small>
                            <span class="fw-semibold small text-dark">
                                {{ $appart->ville ?? '—' }}
                                @if($appart->adresse) — {{ Str::limit($appart->adresse, 30) }} @endif
                            </span>
                        </li>

                        @if(isset($appart->capacite))
                        <li class="mb-3 pb-3 border-bottom">
                            <small class="text-muted d-block mb-1">Capacité</small>
                            <span class="fw-semibold small">
                                <i class="bi bi-people-fill text-primary me-1"></i>
                                {{ $appart->capacite }} personne(s)
                            </span>
                        </li>
                        @endif

                        @if($appart->equipements)
                        <li>
                            <small class="text-dark d-block mb-2">Équipements</small>
                            @foreach(array_slice(explode(',', $appart->equipements), 0, 4) as $eq)
                            <span class="badge bg-light border text-dark me-1 mb-1"
                                style="border-radius:20px; font-size:0.72rem;">
                                <i class="bi bi-check-circle-fill text-success me-1"></i>{{ trim($eq) }}
                            </span>
                            @endforeach
                        </li>
                        @endif

                    </ul>

                    <a href="{{ route('reservation_appart', $appart->id) }}"
                        class="btn btn-success w-100 btn-lg"
                        style="border-radius:12px;">
                        Réserver maintenant
                    </a>

                    <p class="text-center text-muted small mt-3 mb-0">
                        Réservation sécurisée — Paiement sur place
                    </p>

                </div>
            </div>
        </div>

    </div>
    
</div>
 {{-- commentaire --}}
        <section class="container-fluid my-5">
            <div class="text-center mb-4">
                <h2 class="fw-bold">
                    <i class="bi bi-comment text-info me-2"></i>Commentaires
                </h2>
                <p class="text-muted">Vous pouvez un commentaire par rapport a vos experience</p>
            </div>
            <div class="rounded-3 overflow-hidden shadow-sm mx-3">



            </div>
        </section>

@include('clients.partials.footer')

@endsection