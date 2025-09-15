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
        <div class="logo">
            <a href="/" class="text-dark">Fanda</a>
        </div>
        <div class="ml-auto d-flex flex-row align-items-center justify-content-start">
            <nav class="main_nav">
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <li><a href="/" class="text-dark">Accueil</a></li>
                    <li><a class="text-dark" href="/hotels">Hotels & Appartements</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<section class="container my-5">
    <h2 class="mb-4 text-primary text-center">
        <i class="bi bi-calendar-check"></i> Faire une réservation
    </h2>

    <!-- Affichage infos hôtel -->
    <div class="card mb-4 shadow-sm">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $hotel->image) }}" class="img-fluid rounded-start" alt="Image de l'hôtel">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $hotel->nom }}</h5>
                    <p class="card-text">
                        <strong>Adresse :</strong> {{ $hotel->adresse }} <br>
                        <strong>Ville :</strong> {{ $hotel->ville }} <br>
                        <strong>Prix :</strong> {{ number_format($hotel->prix, 0, ',', ' ') }} FCFA / nuit <br>
                        <strong>Type de chambre :</strong> {{ $hotel->type_chambre }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire -->
    <form action="{{ route('reservation.store') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
        @csrf
        <!-- On garde l’ID de l’hôtel caché -->
        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

        <!-- Informations client -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nom" class="form-label text-dark">Nom complet</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Ex: Patrick Kifoula" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label text-dark">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="exemple@gmail.com" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="telephone" class="form-label text-dark">Téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="+242 06 123 4567" required>
            </div>
            <div class="col-md-6">
                <label for="ville" class="form-label text-dark">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Pointe-Noire" required>
            </div>
        </div>

        <!-- Informations réservation -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date_arrivee" class="form-label text-dark">Date d'arrivée</label>
                <input type="date" class="form-control text-dark" id="date_arrivee" name="date_arrivee" required>
            </div>
            <div class="col-md-6">
                <label for="date_depart" class="form-label text-dark">Date de départ</label>
                <input type="date" class="form-control text-dark" id="date_depart" name="date_depart" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nb_personnes" class="form-label text-dark">Nombre de personnes</label>
                <input type="number" class="form-control text-dark" id="nb_personnes" name="nb_personnes" min="1" value="1" required>
            </div>
            <div class="col-md-6">
                <label for="type_chambre" class="form-label text-dark">Type de chambre</label>
                <select class="form-control text-dark" id="type_chambre" name="type_chambre" required>
                    <option value="">-- Sélectionner --</option>
                    <option value="standard">Chambre Standard</option>
                    <option value="suite">Suite Junior</option>
                    <option value="vip">Suite VIP</option>
                </select>
            </div>
        </div>

        <!-- Prix (readonly pour éviter la modification par l’utilisateur) -->
        <div class="mb-3">
            <label for="prix" class="form-label text-dark">Prix</label>
            <input type="text" class="form-control col-6" id="prix" name="prix" 
                   value="{{ number_format($hotel->prix, 0, ',', ' ') }} FCFA" readonly>
        </div>

        <!-- Boutons -->
        <div class="text-end">
            <a href="/hotels" class="btn btn-secondary">
                <i class="bi bi-cancel"></i> Annuler
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Confirmer la réservation
            </button>
        </div>
    </form>
</section>
