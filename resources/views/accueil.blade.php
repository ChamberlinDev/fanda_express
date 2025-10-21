<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

@extends('clients.layout.app')

@section('content')
@include('clients.partials.recherche')

<!-- === SECTION HOTELS === -->
<section class="container-fluid my-5">
    <div class="mb-4">
        <h2 class="font-weight-bold text-center">
            <i class="bi bi-building text-primary mr-2"></i>Hôtels
        </h2>
        <p class="text-muted text-center">Découvrez notre sélection d'hôtels</p>
    </div>

    <div class="row">
        @forelse($hotels as $hotel)
            @php
                $hotelImages = json_decode($hotel->images, true);
                $firstImage = (!empty($hotelImages) && is_array($hotelImages)) ? $hotelImages[0] : null;
            @endphp

            <div class="col-8 col-sm-2 col-md-3 col-lg-3 mb-3">
                <div class="card h-100 shadow border-0 rounded-lg">
                    <div class="position-relative">
                        @if($firstImage)
                        <img src="{{ asset('storage/' . $firstImage) }}"
                             class="card-img-top rounded-top"
                             alt="{{ $hotel->nom }}"
                             style="height:280px; object-fit:cover;">
                        @else
                        <img src="https://via.placeholder.com/400x280?text=Pas+d'image"
                             class="card-img-top rounded-top"
                             alt="{{ $hotel->nom }}"
                             style="height:280px; object-fit:cover;">
                        @endif
                        <span class="badge badge-primary position-absolute rounded-pill" style="top: 15px; right: 15px; font-size: 0.9rem; padding: 8px 16px;">
                            <i class="bi bi-building mr-1"></i>Hôtel
                        </span>
                    </div>

                    <div class="card-body p-4">
                        <h5 class="card-title text-dark font-weight-bold mb-3" style="font-size: 1.25rem;">{{ $hotel->nom }}</h5>
                        
                        <div class="mb-2">
                            <i class="bi bi-geo-alt-fill text-danger mr-2"></i>
                            <span class="text-muted">{{ $hotel->ville }}</span>
                        </div>
                        
                        <div class="mb-3">
                            <i class="bi bi-pin-map-fill text-info mr-2"></i>
                            <span class="text-muted">{{ $hotel->adresse }}</span>
                        </div>

                        @if(isset($hotel->prix_min))
                        <div class="mb-2">
                            <span class="text-primary font-weight-bold" style="font-size: 1.15rem;">À partir de {{ number_format($hotel->prix_min, 0, ',', ' ') }} XAF</span>
                            <small class="text-muted">/nuit</small>
                        </div>
                        @endif
                    </div>

                    <div class="card-footer bg-white border-0 p-3">
                        <a href="{{ url('/details/' . $hotel->id) }}" class="btn btn-primary btn-block btn-lg">
                            <i class="bi bi-eye mr-2"></i>Voir les détails
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    <i class="bi bi-info-circle mr-2"></i>Aucun hôtel disponible pour le moment.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $hotels->links() }}
    </div>
</section>

<!-- === SECTION APPARTEMENTS === -->
<section class="container-fluid my-5">
    <div class="mb-4">
        <h2 class="font-weight-bold text-center">
            <i class="bi bi-house-door text-success mr-2"></i>Appartements
        </h2>
        <p class="text-muted text-center">Trouvez l'appartement idéal pour votre séjour</p>
    </div>

    <div class="row">
        @forelse($apparts as $appart)
            @php
                $appartImages = json_decode($appart->images, true);
                $firstImage = (!empty($appartImages) && is_array($appartImages)) ? $appartImages[0] : null;
                // Si pas d'images en JSON, essayer le champ image simple
                if (!$firstImage && !empty($appart->image)) {
                    $firstImage = $appart->image;
                }
            @endphp

            <div class="col-8 col-sm-2 col-md-3 col-lg-3 mb-3">
                <div class="card h-100 shadow border-0 rounded-lg">
                    <div class="position-relative">
                        @if($firstImage)
                        <img src="{{ asset('storage/' . $firstImage) }}"
                             class="card-img-top rounded-top"
                             alt="{{ $appart->nom }}"
                             style="height:280px; object-fit:cover;">
                        @else
                        <img src="https://via.placeholder.com/400x280?text=Pas+d'image"
                             class="card-img-top rounded-top"
                             alt="{{ $appart->nom }}"
                             style="height:280px; object-fit:cover;">
                        @endif
                        <span class="badge badge-success position-absolute rounded-pill" style="top: 15px; right: 15px; font-size: 0.9rem; padding: 8px 16px;">
                            <i class="bi bi-house-door mr-1"></i>Appartement
                        </span>
                    </div>

                    <div class="card-body p-4">
                        <h5 class="card-title text-dark font-weight-bold mb-3" style="font-size: 1.25rem;">{{ $appart->nom }}</h5>
                        
                        <div class="mb-2">
                            <i class="bi bi-geo-alt-fill text-danger mr-2"></i>
                            <span class="text-muted">{{ $appart->ville }}</span>
                        </div>
                        
                        <div class="mb-3">
                            <i class="bi bi-pin-map-fill text-info mr-2"></i>
                            <span class="text-muted">{{ $appart->adresse }}</span>
                        </div>

                        @if(isset($appart->prix))
                        <div class="mb-2">
                            <span class="text-success font-weight-bold" style="font-size: 1.15rem;">{{ number_format($appart->prix, 0, ',', ' ') }} XAF</span>
                            <small class="text-muted">/nuit</small>
                        </div>
                        @endif

                        @if(isset($appart->capacite))
                        <div class="mb-2">
                            <i class="bi bi-people-fill text-primary mr-2"></i>
                            <span class="text-muted">{{ $appart->capacite }} personnes</span>
                        </div>
                        @endif
                    </div>

                    <div class="card-footer bg-white border-0 p-3">
                        <a href="{{ url('/details_appart/' . $appart->id) }}" class="btn btn-success btn-block btn-lg">
                            <i class="bi bi-eye mr-2"></i>Voir les détails
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    <i class="bi bi-info-circle mr-2"></i>Aucun appartement disponible pour le moment.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $apparts->links() }}
    </div>
</section>

@include('clients.partials.blog')

@include('clients.partials.apropos')

<!-- Section Localisation -->
<section class="container-fluid my-5">
    <div class="mb-4">
        <h2 class="font-weight-bold text-center">
            <i class="bi bi-geo-alt text-danger mr-2"></i>Notre localisation
        </h2>
        <p class="text-muted text-center">Trouvez-nous facilement</p>
    </div>
    
    <div class="card shadow-sm border-0 rounded-lg overflow-hidden">
        <iframe style="border:0; width: 100%; height: 400px;"
            src="https://maps.google.com/maps?width=720&height=600&hl=fr&q=pointe-noire%20congo+(fanda-express)&t=&z=14&ie=UTF8&iwloc=B&output=embed"
            frameborder="0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<!-- Section Contact -->
<section class="container my-5">
    <div class="mb-5">
        <h2 class="font-weight-bold text-center">
            <i class="bi bi-envelope text-primary mr-2"></i>Contactez-nous
        </h2>
        <p class="text-muted text-center">Nous sommes à votre écoute</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-body p-5">
                    <form action="" method="post" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="font-weight-bold mb-2">
                                    <i class="bi bi-person text-primary mr-2"></i>Votre nom
                                </label>
                                <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Entrez votre nom" required>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label for="email" class="font-weight-bold mb-2">
                                    <i class="bi bi-envelope text-primary mr-2"></i>Votre email
                                </label>
                                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Entrez votre email" required>
                            </div>
                            
                            <div class="col-md-12 mb-4">
                                <label for="subject" class="font-weight-bold mb-2">
                                    <i class="bi bi-chat-left-text text-primary mr-2"></i>Sujet
                                </label>
                                <input type="text" class="form-control form-control-lg" name="subject" id="subject" placeholder="Sujet de votre message" required>
                            </div>
                            
                            <div class="col-md-12 mb-4">
                                <label for="message" class="font-weight-bold mb-2">
                                    <i class="bi bi-chat-dots text-primary mr-2"></i>Message
                                </label>
                                <textarea class="form-control form-control-lg" name="message" id="message" rows="6" placeholder="Écrivez votre message ici..." required></textarea>
                            </div>
                            
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg px-5" type="submit">
                                    <i class="bi bi-send-fill mr-2"></i>Envoyer le message
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