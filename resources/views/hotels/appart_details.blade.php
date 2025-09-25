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
                    <li class="active text-dark"><a href="#">Hotels & Appartements</a></li>
                </ul>
            </nav>
            <div class="book_button"><a href="#">Réserver</a></div>
            <div class="header_phone d-flex flex-row align-items-center justify-content-center">
                <a href="/connexion" class="text-white">Connexion</a>
            </div>
        </div>
    </div>
</header>

<section class="container my-5">
    <div class="row">
        <!-- Image principale -->
        <div class="col-lg-6 mb-4">
            @if($appart->image)
            <img src="{{ asset('storage/' . $appart->image) }}"
                class="img-fluid rounded shadow-sm"
                style="height:400px; object-fit:cover; width:100%;"
                alt="{{ $appart->nom }}">
            @else
            <img src="https://via.placeholder.com/800x400?text=Pas+d'image"
                class="img-fluid rounded shadow-sm"
                style="height:400px; object-fit:cover; width:100%;"
                alt="Pas d'image">
            @endif
        </div>

        <!-- Infos principales -->
        <div class="col-lg-6">
            <h2 class="text-primary">{{ $appart->nom }}</h2>
            <p class="text-muted">
                <i class="bi bi-geo-alt-fill"></i> {{ $appart->ville }}
            </p>
            <p><strong>Adresse :</strong> {{ $appart->adresse }}</p>
            <p><strong>Description :</strong> {{ $appart->description ?? 'Aucune description disponible' }}</p>
            <div class="col-6 mt-5">
                <a href="#" class="btn btn-primary">Reserver</a>

            </div>
        </div>

    </div>


    <!-- Section équipements -->
    <div class="row mt-5">
        <div class="col-12">
            <h3>Équipements</h3>
            @if($appart->equipements)
            <ul class="list-inline">
                @foreach(explode(',', $appart->equipements) as $equipement)
                <li class="list-inline-item badge bg-light text-dark p-2 m-1">
                    {{ $equipement }}
                </li>
                @endforeach
            </ul>
            @else
            <p class="text-muted">Aucun équipement renseigné.</p>
            @endif
        </div>
    </div>

    <hr>
    <!-- Commentaire -->
    <div class="form-group mt-5">
        <label for="commentaire" class="text-dark">Commentaire</label>
        <textarea name="commentaire" id="commentaire" class="form-control" placeholder="Envoyer un commentaire"></textarea>
    </div>
    <div class="mb-3">
        <a href="#" class="btn btn-success">Envoyer</a>
    </div>
</section>
@include('clients.partials.footer')