<link rel="stylesheet" href="{{ asset('styles/bootstrap-4.1.2/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jquery-datepicker/jquery-ui.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('plugins/jquery-datepicker/jquery-ui.js') }}"></script>

<div class="container my-5">
    <a href="/" class="text-decoration-none mb-4 d-inline-block">
        <i class="bi bi-arrow-left-circle fs-4"></i> Retour
    </a>



    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="card shadow p-4 border-0 rounded-4">
        {{-- 🏨 INFOS HÔTEL --}}
        <h2 class="mb-4 text-center text-primary">
            <i class="bi bi-building me-2"></i> Informations sur l'hôtel
        </h2>

        <div class="card bg-light p-4 mb-4 rounded-3">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="fw-bold">Nom de l'hotel : <em>{{ $chambre->hotel->nom ?? 'Nom de l’hôtel non disponible' }}</em></h4>
                    <p class="mb-2"><i class="bi bi-geo-alt-fill text-danger"></i>
                        Adresse: {{ $chambre->hotel->adresse ?? 'Adresse non renseignée' }}
                    </p>
                    <!-- <p class="mb-2"><i class="bi bi-telephone-fill text-success"></i>
                       Telephone: {{ $chambre->hotel->telephone ?? 'Téléphone non renseigné' }} -->
                    </p>
                    <p class="mb-0 text-muted">
                        Description: <br> {{ $chambre->hotel->description ?? 'Aucune description disponible pour cet hôtel.' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- 🛏️ INFOS CHAMBRE --}}
        <h2 class="mb-3 text-center text-secondary">Chambre : {{ $chambre->nom }}</h2>

        {{-- Image principale --}}
        <div class="text-center mb-4">
            <img src="{{ $chambre->image ? asset('storage/' . $chambre->image) : 'https://via.placeholder.com/800x400?text=Aucune+Image' }}"
                class="img-fluid rounded main-image"
                style="max-height: 400px; object-fit: cover;"
                alt="{{ $chambre->nom }}">
        </div>

        {{-- Miniatures --}}
        @if(isset($chambre->images) && count($chambre->images) > 0)
        <div class="d-flex justify-content-center mb-4 flex-wrap gap-2">
            @foreach($chambre->images as $img)
            <img src="{{ asset('storage/' . $img->path) }}"
                class="img-thumbnail thumbnail-image"
                style="width: 100px; height: 70px; object-fit: cover; cursor: pointer;">
            @endforeach
        </div>
        @endif

        <div class="mb-4">
            <h4 class="text-dark fw-bold">Détails de la chambre</h4>
            <p><strong>Capacité :</strong> {{ $chambre->capacite }} personnes</p>
            <p><strong>Prix :</strong> {{ number_format($chambre->prix, 0, ',', ' ') }} XOF / nuit</p>
        </div>

        {{-- 📅 FORMULAIRE DE RÉSERVATION --}}
        <hr>
        <h2 class="text-center text-primary">Formulaire de réservation</h2>
        <hr>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez votre nom" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Entrez votre prénom" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Numéro de téléphone" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="date_debut" class="form-label">Date de début</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control text-dark" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="date_fin" class="form-label">Date de fin</label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control text-dark" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">
                <i class="bi bi-check-circle me-2"></i> Confirmer la réservation
            </button>
        </form>
    </div>
</div>

<style>
    .thumbnail-image:hover {
        border: 2px solid #007bff;
        transform: scale(1.05);
        transition: 0.2s;
    }

    .card {
        background-color: #fff;
    }
</style>