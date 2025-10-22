<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
<link href="plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<header class="container-fluid my-4 border-bottom pb-3">
    <div class="header_content d-flex flex-row align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <a href="/" class="text-decoration-none mr-3">
                <i class="bi bi-arrow-left-circle text-primary" style="font-size: 1.5rem;"></i>
            </a>
            <div class="logo"><a href="/" class="text-dark font-weight-bold h3 mb-0">Fanda</a></div>
        </div>
        <nav class="main_nav d-none d-lg-block">
            <ul class="d-flex flex-row align-items-center mb-0 list-unstyled">
                <li class="mr-4"><a href="/" class="text-dark text-decoration-none">Accueil</a></li>
                <li><a href="/hotels" class="text-primary font-weight-bold text-decoration-none">Hôtels & Appartements</a></li>
            </ul>
        </nav>
        <div class="d-flex align-items-center">
            <a href="/hotel" class="btn btn-primary text-white px-4 mr-3">Réserver</a>
            <a href="/connexion" class="btn btn-outline-primary">Connexion</a>
        </div>
    </div>
</header>

@include('clients.partials.recherche')

<!-- Section Hôtels -->
<section class="container my-5">
    <div class="mb-4">
        <h2 class="font-weight-bold">
            <i class="bi bi-building text-primary mr-2"></i>Hôtels disponibles
        </h2>
        <p class="text-muted">Découvrez notre sélection d'hôtels</p>
    </div>

    <div class="row">
        @forelse($hotels as $hotel)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow border-0 rounded-lg">
                <div class="position-relative">
                    @php
                    $hotelImages = json_decode($hotel->images, true);
                    $firstImage = (!empty($hotelImages) && is_array($hotelImages)) ? $hotelImages[0] : null;
                    @endphp
                    
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
                    <a href="/details/{{$hotel->id}}" class="btn btn-primary btn-block btn-lg">
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
</section>

<!-- Section Appartements -->
<section class="container my-5">
    <div class="mb-4">
        <h2 class="font-weight-bold">
            <i class="bi bi-house-door text-success mr-2"></i>Appartements disponibles
        </h2>
        <p class="text-muted">Trouvez l'appartement idéal pour votre séjour</p>
    </div>

    <div class="row">
        @forelse($apparts as $appart)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow border-0 rounded-lg">
                <div class="position-relative">
                    @php
                    $hotelImages = json_decode($appart->images, true);
                    $firstImage = (!empty($hotelImages) && is_array($hotelImages)) ? $hotelImages[0] : null;
                    @endphp
                    
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
                        <i class="bi bi-building mr-1"></i>Appartement
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
                    <a href="/details/{{$appart->id}}" class="btn btn-success btn-block btn-lg">
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
</section>

@include('clients.partials.footer')