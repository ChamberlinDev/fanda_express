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
            <div class="book_button"><a href="/reservation_etablissements">Reserver</a></div>
            <div class="header_phone d-flex flex-row align-items-center justify-content-center">
                <a href="/connexion" class="text-white">Connexion</a>
            </div>
        </div>
        <!-- Hamburger Menu -->
    </div>
    </div>
</header>
<hr>

<section class="container my-5">
    <div class="row">
        <!-- Image principale -->
        <div class="col-lg-6 mb-4">
            <img src="../images/room-3.jpg" alt="image_hotel" class="img-fluid rounded shadow-sm"
                 style="height: 400px; object-fit: cover; width: 100%;">
        </div>

        <!-- Infos principales -->
        <div class="col-lg-6">
            <h2 class="text-primary">Nom de l'établissement</h2>
            <p class="text-muted"><i class="bi bi-geo-alt-fill"></i> Adresse, Ville</p>
            <p class="mb-2">Type : Hôtel</p>
            <p class="mb-2">Classement : ★★★★☆</p>
            <h4 class="fw-bold text-dark">25 000 XOF / nuit</h4>

            <p class="mt-3">
                Description de l’établissement : Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Chambres spacieuses, climatisation, Wi-Fi, et un service de qualité pour un séjour inoubliable.
            </p>

            <div class="d-flex gap-2 mt-4">
                <a href="#" class="btn btn-info">
                    <i class="bi bi-eye"></i> Voir plus de photos
                </a>
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-calendar-check"></i> Réserver
                </a>
            </div>
        </div>
    </div>

    <!-- Section équipements -->
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="mb-3">Équipements</h4>
            <ul class="list-inline">
                <li class="list-inline-item badge bg-light text-dark p-2 m-1">
                    <i class="bi bi-wifi"></i> Wi-Fi
                </li>
                <li class="list-inline-item badge bg-light text-dark p-2 m-1">
                    <i class="bi bi-snow"></i> Climatisation
                </li>
                <li class="list-inline-item badge bg-light text-dark p-2 m-1">
                    <i class="bi bi-cup-hot"></i> Petit-déjeuner inclus
                </li>
                <li class="list-inline-item badge bg-light text-dark p-2 m-1">
                    <i class="bi bi-car-front"></i> Parking gratuit
                </li>
            </ul>
        </div>
    </div>

    <!-- Section chambres -->
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="mb-3">Chambres disponibles</h4>
        </div>

        <!-- Exemple chambre -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="../images/room-2.jpg" class="card-img-top"
                     style="height: 200px; object-fit: cover;" alt="chambre">
                <div class="card-body">
                    <h6 class="text-primary">Suite Junior</h6>
                    <p class="text-muted small mb-2">Capacité : 2 personnes</p>
                    <p class="fw-bold text-dark">15 000 XOF / nuit</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="#" class="btn btn-sm btn-outline-primary">Réserver</a>
                </div>
            </div>
        </div>

        <!-- Exemple chambre -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="../images/room-1.jpg" class="card-img-top"
                     style="height: 200px; object-fit: cover;" alt="chambre">
                <div class="card-body">
                    <h6 class="text-primary">Chambre Standard</h6>
                    <p class="text-muted small mb-2">Capacité : 1 personne</p>
                    <p class="fw-bold text-dark">10 000 XOF / nuit</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="#" class="btn btn-sm btn-outline-primary">Réserver</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')

