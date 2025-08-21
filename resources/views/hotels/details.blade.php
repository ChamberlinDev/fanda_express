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

<section class="container my-5">
    <div class="row">
        <!-- Image principale -->
        <div class="col-lg-6 mb-4">
            <img src="{{ $etab->images ? asset('storage/'.$etab->images) : asset('default.jpg') }}"
                class="img-fluid rounded shadow-sm" style="height:400px; object-fit:cover; width:100%;" alt="image_hotel">
        </div>

        <!-- Infos principales -->
        <div class="col-lg-6">
            <h2 class="text-primary">{{ $etab->nom }}</h2>
            <p class="text-muted"><i class="bi bi-geo-alt-fill"></i> {{ $etab->adresse }}, {{ $etab->ville }}</p>
            <p>Type : {{ $etab->type }}</p>

            @if($etab->classement)
            <p>
                Classement :
                @for($i=1; $i<=5; $i++)
                    @if($i <=$etab->classement)
                    <i class="bi bi-star-fill text-warning"></i>
                    @else
                    <i class="bi bi-star text-warning"></i>
                    @endif
                    @endfor
            </p>
            @endif

            <p>{{ $etab->description }}</p>
        </div>
    </div>

    <!-- Section équipements -->
    <div class="row mt-5">
        <div class="col-12">
            <h3>Équipements</h3>
            <ul class="list-inline">
                <li class="list-inline-item badge bg-light text-dark p-2 m-1">{{$etab->equipements}}</li>
            </ul>
        </div>
    </div>


</section>

@include('partials.footer')
