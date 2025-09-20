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
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">

<header class="container-fluid my-5">
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <a href="/" class="text-decoration-none text-primary">
            <i class="bi bi-arrow-left-circle fs-4"></i> Retour
        </a>
        <div class="logo"><a href="/" class="text-dark">Fanda</a></div>
        <div class="ml-auto d-flex flex-row align-items-center justify-content-start">
            <nav class="main_nav">
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <li><a href="/" class="text-dark">Accueil</a></li>
                    <li class="active"><a href="/hotels">Hotels & Apparatements</a></li>

                </ul>
            </nav>
            <div class="book_button"><a href="/hotel">Reserver</a></div>
            <div class="header_phone d-flex flex-row align-items-center justify-content-center">
                <a href="/connexion" class="text-white">Connexion</a>
            </div>
        </div>
        <!-- Hamburger Menu -->
    </div>
    </div>
</header>
@include('clients.partials.recherche')
</div>
<section class="container-fluid my-5">
    <div class="row g-4">
        @forelse($hotels as $hotel)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-2 p-3">
                <a href="{{ asset('storage/' . $hotel->image) }}" target="_blank">
                    @if($hotel->image)
                    <img src="{{ asset('storage/' . $hotel->image) }}" class="card-img-top" alt="{{ $hotel->nom }}" style="height:200px; object-fit:cover;">
                    @else
                    <img src="https://via.placeholder.com/400x200?text=Pas+d'image" class="card-img-top" alt="{{ $hotel->nom }}" style="height:200px; object-fit:cover;">
                    @endif
                </a>

                <div class="card-body">
                    <h4 class="card-title text-primary">{{ $hotel->nom }}</h4>
                    <p class="card-text mb-1"><strong>Ville :</strong> {{ $hotel->ville }}</p>
                    <p class="card-text mb-1"><strong>Adresse :</strong> {{ $hotel->adresse }}</p>
                </div>

                <div class="card-footer bg-white border-0 text-center">
                    <a href="/details/{{$hotel->id}}" class="btn btn-primary btn-sm">Voir l'hôtel</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Aucun hôtel disponible pour le moment.</p>
        </div>
        @endforelse
    </div>
</section>
<section class="container-fluid my-5">

    <div class="row g-4">
        @forelse($apparts as $appart)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-2 p-3">
                <a href="{{ asset('storage/' . $appart->image) }}" target="_blank">
                    @if($appart->image)
                    <img src="{{ asset('storage/' . $appart->image) }}" class="card-img-top" alt="{{ $appart->nom }}" style="height:200px; object-fit:cover;">
                    @else
                    <img src="https://via.placeholder.com/400x200?text=Pas+d'image" class="card-img-top" alt="{{ $appart->nom }}" style="height:200px; object-fit:cover;">
                    @endif
                </a>

                <div class="card-body">
                    <h4 class="card-title text-primary">{{ $appart->nom }}</h4>
                    <p class="card-text mb-1"><strong>Ville :</strong> {{ $appart->ville }}</p>
                    <p class="card-text mb-1"><strong>Adresse :</strong> {{ $appart->adresse }}</p>
                </div>

                <div class="card-footer bg-white border-0 text-center">
                    <a href="/details/{{$appart->id}}" class="btn btn-primary btn-sm">Voir l'hôtel</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Aucun appartement disponible pour le moment.</p>
        </div>
        @endforelse
    </div>

</section>
@include('clients.partials.footer')