<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

@extends('clients.layout.app')

@section('content')

{{-- Recherche --}}
@include('clients.partials.recherche')

{{-- ===== HOTELS ===== --}}
<section class="container my-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-building text-primary me-2"></i>Hôtels
        </h2>
        <p class="text-muted">Découvrez notre sélection d'hôtels</p>
    </div>

    <div class="row g-4">
        @forelse($hotels as $hotel)
        @php
            $hotelImages = json_decode($hotel->images, true);
            $firstImage  = (!empty($hotelImages) && is_array($hotelImages)) ? $hotelImages[0] : null;
        @endphp

        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm"
                 style="border-radius:16px; overflow:hidden; transition:transform 0.2s, box-shadow 0.2s;"
                 onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 16px 32px rgba(0,0,0,0.12)'"
                 onmouseout="this.style.transform='';this.style.boxShadow=''">

                {{-- Image --}}
                <div class="position-relative">
                    <img src="{{ $firstImage ? asset('storage/' . $firstImage) : 'https://placehold.co/400x280?text=Pas+d+image' }}"
                         class="w-100"
                         style="height:240px; object-fit:cover;"
                         alt="{{ $hotel->nom }}">

                    <span class="badge bg-primary position-absolute"
                          style="top:12px; right:12px; border-radius:20px; padding:6px 14px; font-size:0.8rem;">
                        <i class="bi bi-building me-1"></i>Hôtel
                    </span>

                    {{-- Nombre d'images --}}
                    @if(!empty($hotelImages) && count($hotelImages) > 1)
                        <span class="badge bg-dark bg-opacity-75 position-absolute"
                              style="bottom:12px; right:12px; border-radius:20px; font-size:0.75rem;">
                            <i class="bi bi-images me-1"></i>{{ count($hotelImages) }} photos
                        </span>
                    @endif
                </div>

                <div class="card-body d-flex flex-column p-4">

                    <h5 class="fw-bold mb-3">{{ $hotel->nom }}</h5>

                    <p class="small text-muted mb-1">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $hotel->ville }}
                    </p>
                    <p class="small text-muted mb-3">
                        <i class="bi bi-pin-map-fill text-info me-1"></i>{{ Str::limit($hotel->adresse, 40) }}
                    </p>

                    @if(isset($hotel->prix_min))
                        <p class="fw-bold text-primary mb-3" style="font-size:1.1rem;">
                            À partir de {{ number_format($hotel->prix_min, 0, ',', ' ') }} XAF
                            <small class="text-muted fw-normal">/nuit</small>
                        </p>
                    @endif

                    @if($hotel->equipements)
                        <div class="mb-3">
                            @foreach(array_slice(explode(',', $hotel->equipements), 0, 3) as $eq)
                                <span class="badge bg-light border text-dark me-1 mb-1" style="font-size:0.75rem;">
                                    <i class="bi bi-check-circle-fill text-success me-1"></i>{{ trim($eq) }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <a href="{{ url('/details/' . $hotel->id) }}"
                       class="btn btn-primary btn-block mt-auto w-100">
                        <i class="bi bi-eye me-1"></i>Voir les détails
                    </a>

                </div>
            </div>
        </div>

        @empty
        <div class="col-12">
            <div class="alert alert-info text-center border-0">
                <i class="bi bi-info-circle me-2"></i>Aucun hôtel disponible pour le moment.
            </div>
        </div>
        @endforelse
    </div>

    @if($hotels->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $hotels->links() }}
        </div>
    @endif

</section>

<hr class="my-2">

{{-- ===== APPARTEMENTS ===== --}}
<section class="container my-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-house-door text-success me-2"></i>Appartements
        </h2>
        <p class="text-muted">Trouvez l'appartement idéal pour votre séjour</p>
    </div>

    <div class="row g-4">
        @forelse($apparts as $appart)
        @php
            $appartImages = json_decode($appart->images, true);
            $firstImage   = (!empty($appartImages) && is_array($appartImages)) ? $appartImages[0] : null;
            if (!$firstImage && !empty($appart->image)) {
                $firstImage = $appart->image;
            }
        @endphp

        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm"
                 style="border-radius:16px; overflow:hidden; transition:transform 0.2s, box-shadow 0.2s;"
                 onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 16px 32px rgba(0,0,0,0.12)'"
                 onmouseout="this.style.transform='';this.style.boxShadow=''">

                {{-- Image --}}
                <div class="position-relative">
                    <img src="{{ $firstImage ? asset('storage/' . $firstImage) : 'https://placehold.co/400x280?text=Pas+d+image' }}"
                         class="w-100"
                         style="height:240px; object-fit:cover;"
                         alt="{{ $appart->nom }}">

                    <span class="badge bg-success position-absolute"
                          style="top:12px; right:12px; border-radius:20px; padding:6px 14px; font-size:0.8rem;">
                        <i class="bi bi-house-door me-1"></i>Appartement
                    </span>

                    @if(isset($appart->prix))
                        <span class="badge bg-dark bg-opacity-75 position-absolute"
                              style="bottom:12px; left:12px; border-radius:20px; font-size:0.8rem;">
                            {{ number_format($appart->prix, 0, ',', ' ') }} XAF / jours
                        </span>
                    @endif
                </div>

                <div class="card-body d-flex flex-column p-4">

                    <h5 class="fw-bold mb-3">{{ $appart->nom }}</h5>

                    <p class="small text-muted mb-1">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $appart->ville }}
                    </p>
                    <p class="small text-muted mb-3">
                        <i class="bi bi-pin-map-fill text-info me-1"></i>{{ Str::limit($appart->adresse, 40) }}
                    </p>

                    @if(isset($appart->capacite))
                        <p class="small text-muted mb-3">
                            <i class="bi bi-people-fill text-primary me-1"></i>
                            Capacité : {{ $appart->capacite }} personne(s)
                        </p>
                    @endif

                    @if($appart->equipements)
                        <div class="mb-3">
                            @foreach(array_slice(explode(',', $appart->equipements), 0, 3) as $eq)
                                <span class="badge bg-light border text-dark me-1 mb-1" style="font-size:0.75rem;">
                                    <i class="bi bi-check-circle-fill text-success me-1"></i>{{ trim($eq) }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <a href="{{ url('/details_appart/' . $appart->id) }}"
                       class="btn btn-success btn-block mt-auto w-100">
                        <i class="bi bi-eye me-1"></i>Voir les détails
                    </a>

                </div>
            </div>
        </div>

        @empty
        <div class="col-12">
            <div class="alert alert-info text-center border-0">
                <i class="bi bi-info-circle me-2"></i>Aucun appartement disponible pour le moment.
            </div>
        </div>
        @endforelse
    </div>

    @if($apparts->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $apparts->links() }}
        </div>
    @endif

</section>

{{-- Blog --}}
@include('clients.partials.blog')

{{-- A propos --}}
@include('clients.partials.apropos')

{{-- Localisation --}}
<section class="container-fluid my-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-geo-alt text-danger me-2"></i>Localisation
        </h2>
        <p class="text-muted">Trouvez-nous facilement</p>
    </div>
    <div class="rounded-3 overflow-hidden shadow-sm">
        <iframe style="border:0; width:100%; height:420px;"
                src="https://maps.google.com/maps?width=720&height=600&hl=fr&q=pointe-noire%20congo+(fanda-express)&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                frameborder="0" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

{{-- Contact --}}
<section class="container my-5" id="contact">
    <div class="text-center mb-5">
        <h2 class="fw-bold">
            <i class="bi bi-envelope text-primary me-2"></i>Contactez-nous
        </h2>
        <p class="text-muted">Nous sommes à votre écoute</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow border-0" style="border-radius:16px;">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="fw-bold small mb-1">Votre nom</label>
                                <input type="text" name="name" id="name"
                                       class="form-control form-control-lg"
                                       placeholder="Entrez votre nom" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="fw-bold small mb-1">Votre email</label>
                                <input type="email" name="email" id="email"
                                       class="form-control form-control-lg"
                                       placeholder="Entrez votre email" required>
                            </div>
                            <div class="col-12">
                                <label for="subject" class="fw-bold small mb-1">Sujet</label>
                                <input type="text" name="subject" id="subject"
                                       class="form-control form-control-lg"
                                       placeholder="Sujet de votre message" required>
                            </div>
                            <div class="col-12">
                                <label for="message" class="fw-bold small mb-1">Message</label>
                                <textarea name="message" id="message"
                                          class="form-control form-control-lg"
                                          rows="5"
                                          placeholder="Écrivez votre message ici..." required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="bi bi-send-fill me-2"></i>Envoyer le message
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection