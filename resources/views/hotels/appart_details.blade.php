<link rel="stylesheet" href="{{ asset('styles/bootstrap-4.1.2/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.theme.default.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.3.4/animate.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jquery-datepicker/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/colorbox/colorbox.css') }}">
<link rel="stylesheet" href="{{ asset('styles/main_styles.css') }}">
<link rel="stylesheet" href="{{ asset('styles/responsive.css') }}">
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
                <li><a href="#" class="text-primary font-weight-bold text-decoration-none">Hôtels & Appartements</a></li>
            </ul>
        </nav>
        <div class="d-flex align-items-center">
            <a href="#" class="btn btn-warning text-white px-4 mr-3">Réserver</a>
            <a href="/connexion" class="btn btn-outline-primary">Connexion</a>
        </div>
    </div>
</header>

<section class="container my-5">
    <!-- Titre et localisation -->
    <div class="mb-4">
        <h1 class="mb-2">{{ $appart->nom }}</h1>
        <div class="d-flex align-items-center text-muted">
            <i class="bi bi-geo-alt-fill mr-2"></i>
            <span>{{ $appart->ville }} - {{ $appart->adresse }}</span>
        </div>
    </div>

    <!-- Image et informations -->
    <div class="row mb-5">
        <!-- Image principale -->
        <div class="col-lg-8 mb-4">
            @if($appart->image)
            <img src="{{ asset('storage/' . $appart->image) }}"
                class="img-fluid rounded shadow w-100"
                style="height:500px; object-fit:cover;"
                alt="{{ $appart->nom }}">
            @else
            <img src="https://via.placeholder.com/1200x500?text=Pas+d'image"
                class="img-fluid rounded shadow w-100"
                style="height:500px; object-fit:cover;"
                alt="Pas d'image">
            @endif
        </div>

        <!-- Carte d'informations -->
        <div class="col-lg-4">
            <div class="card shadow-sm sticky-top" style="top: 20px;">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold mb-4">Informations principales</h5>
                    
                    <div class="mb-3">
                        <p class="mb-2">
                            <i class="bi bi-building text-primary mr-2"></i>
                            <strong>Type:</strong> Appartement
                        </p>
                        <p class="mb-2">
                            <i class="bi bi-geo-alt-fill text-danger mr-2"></i>
                            <strong>Ville:</strong> {{ $appart->ville }}
                        </p>
                        <p class="mb-2">
                            <i class="bi bi-pin-map-fill text-info mr-2"></i>
                            <strong>Adresse:</strong> {{ $appart->adresse }}
                        </p>
                        @if(isset($appart->capacite))
                        <p class="mb-2">
                            <i class="bi bi-people-fill text-success mr-2"></i>
                            <strong>Capacité:</strong> {{ $appart->capacite }} personnes
                        </p>
                        @endif
                        @if(isset($appart->superficie))
                        <p class="mb-2">
                            <i class="bi bi-arrows-angle-expand text-warning mr-2"></i>
                            <strong>Superficie:</strong> {{ $appart->superficie }} m²
                        </p>
                        @endif
                    </div>

                    <hr>

                    <div class="text-center mb-4">
                        <h3 class="text-primary mb-0">{{ number_format($appart->prix, 0, ',', ' ') }} <small class="text-muted">XAF</small></h3>
                        <small class="text-muted">par nuit</small>
                    </div>

                    <a href="#" class="btn btn-primary btn-block btn-lg">
                        <i class="bi bi-calendar-check mr-2"></i>Réserver maintenant
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Description -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">
                        <i class="bi bi-card-text text-primary mr-2"></i>Description
                    </h4>
                    <p class="text-muted mb-0">
                        {{ $appart->description ?? 'Aucune description disponible pour cet appartement.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Équipements -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        <i class="bi bi-grid-3x3-gap-fill text-primary mr-2"></i>Équipements
                    </h4>
                    @if($appart->equipements)
                    <div class="d-flex flex-wrap">
                        @foreach(explode(',', $appart->equipements) as $equipement)
                        <span class="badge badge-light border p-3 mr-2 mb-2">
                            <i class="bi bi-check-circle-fill text-success mr-1"></i>
                            {{ trim($equipement) }}
                        </span>
                        @endforeach
                    </div>
                    @else
                    <p class="text-muted mb-0">Aucun équipement renseigné.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Section Commentaire -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        <i class="bi bi-chat-left-text-fill text-primary mr-2"></i>Laisser un commentaire
                    </h4>
                    <form>
                        <div class="form-group">
                            <label for="commentaire" class="font-weight-bold">Votre avis</label>
                            <textarea name="commentaire" id="commentaire" class="form-control" rows="5" 
                                placeholder="Partagez votre expérience sur cet appartement..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-send-fill mr-2"></i>Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('clients.partials.footer')