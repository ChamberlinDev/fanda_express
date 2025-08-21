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
                    <li ><a href="/" class="text-dark">Accueil</a></li>
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
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-5">
                <img src="../images/room-3.jpg" class="card-img-top"
                    alt="image_hotel"
                    style="height: 260px; object-fit: cover;">
                <div class="card-body">
                    <h6 class="text-primary mb-1">nom_etablissement</h6>
                    <p class="text-muted small mb-2">adresse, ville</p>
                    <p class="mb-2 small">Suite Junior</p>
                    <p class="fw-bold text-dark mb-1">prix</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="/details" class="btn btn-info btn-sm">Voir plus</a>
                    <a href="/reservation_etablissements" class="btn btn-primary btn-sm">Réserver</a>
                </div>
            </div>
        </div>

      
    </div>
</section>
@include('partials.footer')