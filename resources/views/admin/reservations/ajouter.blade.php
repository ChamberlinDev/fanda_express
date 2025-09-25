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
<div class="container my-5">
    <h2 class="mb-4">Réservation : {{ $chambre->nom }}</h2>
    <div class="card shadow-sm p-4">
        <img src="{{ $chambre->image ? asset('storage/' . $chambre->image) : 'https://via.placeholder.com/400x200?text=Pas+d\'image' }}"
             class="img-fluid mb-3 rounded"
             style="max-height:400px; object-fit:cover;"
             alt="{{ $chambre->nom }}">

        <p><strong>Capacité :</strong> {{ $chambre->capacite }} personnes</p>
        <p><strong>Prix :</strong> {{ number_format($chambre->prix, 0, ',', ' ') }} XOF / nuit</p>

        <form action="#" method="POST">
            @csrf
            <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez votre nom" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Entrez votre prenom" required>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Numero de telephone" required>
            </div>
             <div class="mb-3">
                <label for="telephone" class="form-label">Nombre de nuit</label>
                <input type="number" name="telephone" id="telephone" class="form-control" required>
            </div>


            <button type="submit" class="btn btn-primary">Confirmer la réservation</button>
        </form>
    </div>
</div>
