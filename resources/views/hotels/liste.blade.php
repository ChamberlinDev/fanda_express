<link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap-4.1.2/bootstrap.min.css')}}">
<link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.3.4/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.3.4/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.3.4/animate.css')}}">
<link href="{{asset('plugins/jquery-datepicker/jquery-ui.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/colorbox/colorbox.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
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
            <a href="/hotels" class="btn btn-primary text-white px-4 mr-3">Réserver</a>
            <a href="/connexion" class="btn btn-outline-primary">Connexion</a>
        </div>
    </div>
</header>

@include('clients.partials.recherche')

<section class="container my-5">
    <div class="mb-4">
        <h2 class="font-weight-bold">
            <i class="bi bi-building text-primary mr-2"></i>Hôtels disponibles
        </h2>
        <p class="text-muted">Découvrez notre sélection d'hôtels</p>
    </div>

    <div class="row g-4">
        @forelse($hotels as $hotel)
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100"
                style="border-radius:16px; overflow:hidden; transition:0.25s;"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 15px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='';this.style.boxShadow=''">

                <div class="position-relative">
                    @php
                    $images = json_decode($hotel->images, true);
                    $img = (!empty($images) && is_array($images)) ? $images[0] : null;
                    @endphp

                    <img src="{{ $img ? asset('storage/'.$img) : 'https://placehold.co/400x280' }}"
                        class="w-100"
                        style="height:240px; object-fit:cover; cursor:pointer;"
                        onclick="openImage(this.src)">

                    <span class="badge bg-primary position-absolute"
                        style="top:12px; right:12px; border-radius:20px;">
                        <i class="bi bi-building me-1"></i>Hôtel
                    </span>
                </div>

                <div class="card-body">
                    <h5 class="fw-bold mb-2">{{ $hotel->nom }}</h5>

                    <p class="text-muted small mb-1">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                        {{ $hotel->ville }}
                    </p>

                    <p class="text-muted small mb-3">
                        <i class="bi bi-pin-map-fill text-info me-1"></i>
                        {{ Str::limit($hotel->adresse, 40) }}
                    </p>

                    @if(isset($hotel->prix_min))
                    <div class="fw-bold text-primary mb-3">
                        {{ number_format($hotel->prix_min, 0, ',', ' ') }} XAF
                        <small class="text-muted">/nuit</small>
                    </div>
                    @endif

                    <a href="{{ url('/details/' . $hotel->id) }}"
                        class="btn btn-primary w-100">
                        <i class="bi bi-eye me-1"></i>Voir détails
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted">
            <i class="bi bi-info-circle fs-4 d-block mb-2"></i>
            Aucun hôtel disponible
        </div>
        @endforelse
    </div>
</section>

<section class="container my-5">
    <div class="mb-4">
        <h2 class="font-weight-bold">
            <i class="bi bi-house-door text-success mr-2"></i>Appartements disponibles
        </h2>
        <p class="text-muted">Trouvez l'appartement idéal pour votre séjour</p>
    </div>

    <div class="row g-4 mt-2">
@forelse($apparts as $appart)
<div class="col-12 col-sm-6 col-lg-4">
    <div class="card border-0 shadow-sm h-100"
         style="border-radius:16px; overflow:hidden; transition:0.25s;"
         onmouseover="this.style.transform='translateY(-6px)'"
         onmouseout="this.style.transform=''">

        <div class="position-relative">
            @php
                $images = json_decode($appart->images, true);
                $img = (!empty($images) && is_array($images)) ? $images[0] : null;
            @endphp

            <img src="{{ $img ? asset('storage/'.$img) : 'https://placehold.co/400x280' }}"
                 class="w-100"
                 style="height:240px; object-fit:cover; cursor:pointer;"
                 onclick="openImage(this.src)">

            <span class="badge bg-success position-absolute"
                  style="top:12px; right:12px; border-radius:20px;">
                <i class="bi bi-house-door me-1"></i>Appartement
            </span>
        </div>

        <div class="card-body">
            <h5 class="fw-bold mb-2">{{ $appart->nom }}</h5>

            <p class="text-muted small mb-1">
                <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                {{ $appart->ville }}
            </p>

            <p class="text-muted small mb-2">
                <i class="bi bi-pin-map-fill text-info me-1"></i>
                {{ Str::limit($appart->adresse, 40) }}
            </p>

            <p class="small text-muted">
                <i class="bi bi-people-fill text-primary me-1"></i>
                {{ $appart->capacite }} personnes
            </p>

            <div class="fw-bold text-success mb-3">
                {{ number_format($appart->prix, 0, ',', ' ') }} XAF
                <small class="text-muted">/nuit</small>
            </div>

            <a href="{{ url('/details_appart/' . $appart->id) }}"
               class="btn btn-success w-100">
               <i class="bi bi-eye me-1"></i>Voir détails
            </a>
        </div>
    </div>
</div>
@empty
<div class="col-12 text-center text-muted">
    <i class="bi bi-info-circle fs-4 d-block mb-2"></i>
    Aucun appartement disponible
</div>
@endforelse
</div>
</section>
<div id="imgModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.9); z-index:9999; justify-content:center; align-items:center;">
    <img id="modalImg" style="max-width:90%; max-height:90%; border-radius:10px;">
</div>

<script>
function openImage(src){
    document.getElementById('imgModal').style.display = 'flex';
    document.getElementById('modalImg').src = src;
}

document.getElementById('imgModal').onclick = function(){
    this.style.display = 'none';
}
</script>

@include('clients.partials.footer')