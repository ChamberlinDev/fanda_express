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
        <h1 class="mb-2">{{ $hotel->nom }}</h1>
        <div class="d-flex align-items-center text-muted">
            <i class="bi bi-geo-alt-fill mr-2"></i>
            <span>{{ $hotel->adresse ?? 'Dakar, Sénégal' }}</span>
        </div>
    </div>

    <!-- Galerie d'images -->
    <div class="row mb-5">
        <div class="col-lg-8">
            @php
            $images = json_decode($hotel->images, true);
            @endphp

            @if(!empty($images) && is_array($images))
            <!-- Image principale -->
            <div class="mb-3">
                <img id="mainImage" src="{{ asset('storage/' . $images[0]) }}"
                    class="img-fluid rounded shadow w-100"
                    style="height:450px; object-fit:cover;"
                    alt="Image principale">
            </div>

            <!-- Miniatures -->
            @if(count($images) > 1)
            <div class="d-flex flex-wrap">
                @foreach($images as $index => $img)
                <img src="{{ asset('storage/' . $img) }}"
                    class="rounded shadow-sm mr-2 mb-2 border"
                    style="width:80px; height:60px; object-fit:cover; cursor:pointer;"
                    onclick="document.getElementById('mainImage').src=this.src"
                    alt="Miniature {{ $index + 1 }}">
                @endforeach
            </div>
            @endif
            @else
            <img src="https://via.placeholder.com/1200x450?text=Pas+d'image"
                class="img-fluid rounded shadow w-100"
                style="height:450px; object-fit:cover;"
                alt="Pas d'image">
            @endif
        </div>

        <!-- Informations de l'hôtel -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Informations</h5>
                    <hr>
                    <p class="mb-2"><i class="bi bi-building mr-2 text-primary"></i> {{ $hotel->type ?? 'Hôtel' }}</p>
                    <p class="mb-2"><i class="bi bi-star-fill mr-2 text-warning"></i> 
                        @if(isset($hotel->note))
                            {{ $hotel->note }}/10
                        @else
                            Pas encore noté
                        @endif
                    </p>
                    <p class="mb-2"><i class="bi bi-telephone-fill mr-2 text-success"></i> {{ $hotel->telephone ?? 'Non renseigné' }}</p>
                    <p class="mb-2"><i class="bi bi-envelope-fill mr-2 text-info"></i> {{ $hotel->email ?? 'Non renseigné' }}</p>
                </div>
            </div>

            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <hr>
                    <p class="text-muted">{{ $hotel->description ?? 'Aucune description disponible.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Équipements -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4"><i class="bi bi-grid-3x3-gap-fill mr-2 text-primary"></i>Équipements</h4>
                    @if($hotel->equipements)
                    <div class="d-flex flex-wrap">
                        @foreach(explode(',', $hotel->equipements) as $equipement)
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

    <!-- Chambres disponibles -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-4"><i class="bi bi-door-open-fill mr-2 text-primary"></i>Chambres disponibles</h3>
            <div class="row">
                @forelse($hotel->chambres as $chambre)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @php
                        $img = $chambre->image ? asset('storage/' . $chambre->image) : 'https://via.placeholder.com/400x250?text=Pas+d\'image';
                        @endphp
                        <img src="{{ $img }}" class="card-img-top" alt="{{ $chambre->nom }}" style="height:220px; object-fit:cover;">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title font-weight-bold">{{ $chambre->nom }}</h5>
                            
                            <div class="mb-3">
                                <p class="mb-2">
                                    <i class="bi bi-people-fill text-primary mr-2"></i>
                                    <strong>Capacité:</strong> {{ $chambre->capacite }} personnes
                                </p>
                                @if(isset($chambre->superficie))
                                <p class="mb-2">
                                    <i class="bi bi-arrows-angle-expand text-primary mr-2"></i>
                                    <strong>Superficie:</strong> {{ $chambre->superficie }} m²
                                </p>
                                @endif
                            </div>

                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h4 class="text-primary mb-0">{{ number_format($chambre->prix, 0, ',', ' ') }} <small>XAF</small></h4>
                                        <small class="text-muted">par nuit</small>
                                    </div>
                                </div>
                                <a href="{{ url('/reservation_etablissements/' . $chambre->id) }}"
                                    class="btn btn-primary btn-block">
                                    <i class="bi bi-calendar-check mr-2"></i>Réserver
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        <i class="bi bi-info-circle mr-2"></i>Aucune chambre disponible pour le moment.
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Section Commentaire -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4"><i class="bi bi-chat-left-text-fill mr-2 text-primary"></i>Laisser un commentaire</h4>
                    <form>
                        <div class="form-group">
                            <label for="commentaire" class="font-weight-bold">Votre commentaire</label>
                            <textarea name="commentaire" id="commentaire" class="form-control" rows="5" 
                                placeholder="Partagez votre expérience..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send-fill mr-2"></i>Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('clients.partials.footer')