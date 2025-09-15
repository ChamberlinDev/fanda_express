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

<section class="container my-5">
    <div class="row">
        <!-- Image principale -->
        <div class="col-lg-6 mb-4">
            <img src=""
                class="img-fluid rounded shadow-sm" style="height:400px; object-fit:cover; width:100%;" alt="image_hotel">
        </div>

        <!-- Infos principales -->
        <div class="col-lg-6">
            <h2 class="text-primary"></h2>
            <p class="text-muted"><i class="bi bi-geo-alt-fill"></i></p>
            <p>Type :</p>

            <p>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
               
            </p>

            <p></p>
        </div>
    </div>

    <!-- Section équipements -->
    <div class="row mt-5">
        <div class="col-12">
            <h3>Équipements</h3>
            <ul class="list-inline">
                <li class="list-inline-item badge bg-light text-dark p-2 m-1"></li>
            </ul>
        </div>
    </div>
    <hr>

    <h3>Chambres disponibles</h3>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src=""
                    class="card-img-top" alt="sv">
               

                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <strong>Capacité :</strong> <br>
                        <strong>Prix :</strong>  XOF / nuit
                    </p>
                    <a href="/reservation_etablissements" class="btn btn-primary">Reserver</a>

                </div>
            </div>
        </div>
    </div>
    
    </div>


    <hr>
    <div class="form-group mt-5">
        <label for="" class="text-dark">Commentaire</label>
        <textarea name="" id="" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <a href="#" class="btn btn-primary">Envoyer</a>
    </div>

</section>

@include('partials.footer')