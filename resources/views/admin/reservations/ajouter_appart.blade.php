<link rel="stylesheet" href="{{ asset('styles/bootstrap-4.1.2/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<div class="container my-5">
    {{-- Bouton retour --}}
    <a href="/" class="btn btn-outline-secondary mb-4">
        <i class="fa fa-arrow-left"></i> Retour à l'accueil
    </a>

    {{-- Messages --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle"></i> 
        <strong>Succès !</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-triangle"></i>
        <strong>Veuillez corriger les erreurs suivantes :</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        {{-- Colonne gauche : Info logement --}}
        <div class="col-lg-8 mb-4">
            <div class="card shadow border-0 mb-4">
                <div class="card-header bg-primary text-white">
                    @php
                        $isAppartement = isset($appart) || (isset($chambre->type) && strtolower($chambre->type) === 'appartement');
                        $logement = $isAppartement && isset($appart) ? $appart : $chambre;
                        $iconType = $isAppartement ? 'fa-home' : 'fa-hotel';
                        $labelType = $isAppartement ? 'Appartement' : 'Chambre';
                    @endphp
                    <h4 class="mb-0">
                        <i class="fa {{ $iconType }}"></i> 
                        {{ $logement->nom ?? ($isAppartement ? 'Appartement' : 'Hôtel') }}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            @php
                                $images = [];
                                if (isset($logement->images)) {
                                    if (is_string($logement->images)) {
                                        $images = json_decode($logement->images, true) ?? [];
                                    } elseif (is_array($logement->images)) {
                                        $images = $logement->images;
                                    }
                                }
                                $mainImage = !empty($images) ? $images[0] : null;
                            @endphp
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage) : 'https://via.placeholder.com/300x200?text=' . $labelType }}"
                                class="img-fluid rounded shadow-sm mb-3" 
                                alt="{{ $logement->nom }}">
                            
                            @if(count($images) > 1)
                            <div class="d-flex flex-wrap">
                                @foreach(array_slice($images, 1, 4) as $imagePath)
                                <img src="{{ asset('storage/' . $imagePath) }}"
                                    class="img-thumbnail mr-1 mb-1"
                                    width="60"
                                    height="60"
                                    alt="Miniature">
                                @endforeach
                            </div>
                            @endif
                        </div>
                        
                        <div class="col-md-7">
                            <h5 class="text-primary font-weight-bold">{{ $logement->nom }}</h5>
                            <p class="text-muted mb-3">
                                <i class="fa fa-map-marker text-danger"></i>
                                {{ $logement->adresse ?? 'Adresse non disponible' }}
                            </p>
                            
                            @if($isAppartement && isset($logement->telephone))
                            <p class="text-muted mb-2">
                                <i class="fa fa-phone text-success"></i>
                                {{ $logement->telephone }}
                            </p>
                            @endif

                            @if($isAppartement && isset($logement->email))
                            <p class="text-muted mb-3">
                                <i class="fa fa-envelope text-info"></i>
                                {{ $logement->email }}
                            </p>
                            @endif
                            
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="bg-light p-3 rounded text-center">
                                        <i class="fa fa-tag fa-2x text-success mb-2"></i>
                                        <h6 class="mb-1 font-weight-bold">Prix/nuit</h6>
                                        <span class="text-success font-weight-bold">
                                            {{ number_format($logement->prix, 0, ',', ' ') }} XOF
                                        </span>
                                    </div>
                                </div>
                            </div>

                            @if(isset($logement->description))
                            <div class="bg-light p-3 rounded">
                                <h6 class="text-primary font-weight-bold">
                                    <i class="fa fa-info-circle"></i> Description
                                </h6>
                                <p class="mb-0 text-muted small">{{ $logement->description }}</p>
                            </div>
                            @endif

                            @if($isAppartement && isset($logement->equipements))
                            <div class="mt-3 bg-light p-3 rounded">
                                <h6 class="text-primary font-weight-bold">
                                    <i class="fa fa-check-circle"></i> Équipements
                                </h6>
                                <div class="d-flex flex-wrap">
                                    @foreach(explode(',', $logement->equipements) as $equipement)
                                    <span class="badge badge-secondary mr-1 mb-1">{{ trim($equipement) }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Colonne droite : Formulaire --}}
        <div class="col-lg-4">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fa fa-calendar-check-o"></i> Réserver</h5>
                </div>
                <div class="card-body">
                    <form id="reservationForm" action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="logement_id" value="{{ $logement->id }}">
                        <input type="hidden" name="type" value="{{ $isAppartement ? 'appartement' : 'chambre' }}">

                        <div class="form-group">
                            <label class="font-weight-bold">
                                <i class="fa fa-user text-primary"></i> Prénom *
                            </label>
                            <input type="text" name="prenom" id="prenom" class="form-control" 
                                placeholder="Votre prénom" value="{{ old('prenom') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                <i class="fa fa-user text-primary"></i> Nom *
                            </label>
                            <input type="text" name="nom" id="nom" class="form-control" 
                                placeholder="Votre nom" value="{{ old('nom') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                <i class="fa fa-phone text-primary"></i> Téléphone *
                            </label>
                            <input type="tel" name="telephone" id="telephone" class="form-control" 
                                placeholder="+221 XX XXX XX XX" value="{{ old('telephone') }}" required>
                        </div>

                        <!-- <div class="form-group">
                            <label class="font-weight-bold">
                                <i class="fa fa-envelope text-primary"></i> Email
                            </label>
                            <input type="email" name="email" id="email" class="form-control" 
                                placeholder="votre@email.com" value="{{ old('email') }}">
                        </div> -->

                        <div class="form-group">
                            <label class="font-weight-bold">
                                <i class="fa fa-calendar text-primary"></i> Date d'arrivée *
                            </label>
                            <input type="date" name="date_debut" id="date_debut" class="form-control" 
                                value="{{ old('date_debut') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                <i class="fa fa-calendar text-primary"></i> Date de départ *
                            </label>
                            <input type="date" name="date_fin" id="date_fin" class="form-control" 
                                value="{{ old('date_fin') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                <i class="fa fa-users text-primary"></i> Nombre de personnes *
                            </label>
                            <select name="nombre_personnes" id="nombre_personnes" class="form-control" required>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ old('nombre_personnes') == $i ? 'selected' : '' }}>
                                        {{ $i }} personne{{ $i > 1 ? 's' : '' }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="alert alert-info">
                            <strong><i class="fa fa-calculator"></i> Total estimé:</strong>
                            <h5 class="mb-0 text-success">{{ number_format($logement->prix, 0, ',', ' ') }} XOF</h5>
                            <small class="text-muted">Basé sur 1 nuit</small>
                        </div>

                        <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#recapModal">
                            <i class="fa fa-check-circle"></i> Confirmer la réservation
                        </button>

                        <div class="text-center mt-3">
                            <small class="text-muted">
                                <i class="fa fa-lock"></i> Réservation sécurisée
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Récapitulatif --}}
<div class="modal fade" id="recapModal" tabindex="-1" role="dialog" aria-labelledby="recapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="recapModalLabel">
                    <i class="fa fa-file-text"></i> Récapitulatif de votre réservation
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-primary font-weight-bold border-bottom pb-2">
                            <i class="fa {{ $iconType }}"></i> Détails du {{ $labelType }}
                        </h6>
                        <p class="mb-1"><strong>{{ $labelType }} :</strong> 
                            <span>{{ $logement->nom }}</span>
                        </p>
                        <p class="mb-1"><strong>Adresse :</strong> <span>{{ $logement->adresse ?? 'Non renseignée' }}</span></p>
                        <p class="mb-1"><strong>Prix/nuit :</strong> 
                            <span>{{ number_format($logement->prix, 0, ',', ' ') }}</span> XOF
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary font-weight-bold border-bottom pb-2">
                            <i class="fa fa-user"></i> Vos informations
                        </h6>
                        <p class="mb-1"><strong>Nom complet :</strong> <span id="recap_nom_complet"></span></p>
                        <p class="mb-1"><strong>Téléphone :</strong> <span id="recap_telephone"></span></p>
                        <!-- <p class="mb-1"><strong>Email :</strong> <span id="recap_email"></span></p> -->
                        <p class="mb-1"><strong>Nombre de personnes :</strong> <span id="recap_personnes"></span></p>
                    </div>
                </div>

                <div class="alert alert-light border">
                    <h6 class="text-primary font-weight-bold">
                        <i class="fa fa-calendar"></i> Période de séjour
                    </h6>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="mb-1"><strong>Arrivée :</strong></p>
                            <p id="recap_date_debut" class="text-muted"></p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-1"><strong>Départ :</strong></p>
                            <p id="recap_date_fin" class="text-muted"></p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-1"><strong>Durée :</strong></p>
                            <p id="recap_duree" class="text-success font-weight-bold"></p>
                        </div>
                    </div>
                </div>

                <div class="card bg-light">
                    <div class="card-body">
                        <h6 class="text-success font-weight-bold border-bottom pb-2">
                            <i class="fa fa-calculator"></i> Détails du paiement
                        </h6>
                        <div class="row mb-2">
                            <div class="col-8">
                                <p class="mb-1">Prix total (<span id="recap_nuits"></span> nuit(s)) :</p>
                            </div>
                            <div class="col-4 text-right">
                                <p class="mb-1 font-weight-bold" id="recap_total"></p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-8">
                                <p class="mb-1">Acompte à payer (30%) :</p>
                            </div>
                            <div class="col-4 text-right">
                                <p class="mb-1 font-weight-bold text-warning" id="recap_acompte"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-8">
                                <h5 class="mb-0 text-success">Reste à payer sur place :</h5>
                            </div>
                            <div class="col-4 text-right">
                                <h5 class="mb-0 text-success font-weight-bold" id="recap_reste"></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <h6 class="text-primary font-weight-bold">
                        <i class="fa fa-credit-card"></i> Mode de paiement de l'acompte
                    </h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="mode_paiement" id="orange_money" value="orange_money" checked>
                        <label class="form-check-label" for="orange_money">
                            <i class="fa fa-mobile"></i> Orange Money
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="mode_paiement" id="airtel_money" value="airtel_money">
                        <label class="form-check-label" for="airtel_money">
                            <i class="fa fa-mobile"></i> Airtel Money
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mode_paiement" id="sur_place" value="sur_place">
                        <label class="form-check-label" for="sur_place">
                            <i class="fa fa-money"></i> Paiement total sur place (pas d'acompte)
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times"></i> Modifier
                </button>
                <button type="button" class="btn btn-success btn-lg" onclick="document.getElementById('reservationForm').submit()">
                    <i class="fa fa-check-circle"></i> Valider la réservation
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('styles/bootstrap-4.1.2/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script>

<script>
$(document).ready(function() {
    var prixNuit = {{ $logement->prix }};

    $('#recapModal').on('show.bs.modal', function() {
        var prenom = $('#prenom').val();
        var nom = $('#nom').val();
        var telephone = $('#telephone').val();
        var email = $('#email').val() || 'Non renseigné';
        var dateDebut = $('#date_debut').val();
        var dateFin = $('#date_fin').val();
        var personnes = $('#nombre_personnes').val();

        $('#recap_nom_complet').text(prenom + ' ' + nom);
        $('#recap_telephone').text(telephone);
        $('#recap_email').text(email);
        $('#recap_personnes').text(personnes + ' personne(s)');
        $('#recap_date_debut').text(dateDebut);
        $('#recap_date_fin').text(dateFin);

        if (dateDebut && dateFin) {
            var debut = new Date(dateDebut);
            var fin = new Date(dateFin);
            var nuits = Math.ceil((fin - debut) / (1000 * 60 * 60 * 24));

            if (nuits > 0) {
                var total = nuits * prixNuit;
                var acompte = Math.round(total * 0.3);
                var reste = total - acompte;

                $('#recap_duree').text(nuits + ' nuit(s)');
                $('#recap_nuits').text(nuits);
                $('#recap_total').text(total.toLocaleString('fr-FR') + ' XOF');
                $('#recap_acompte').text(acompte.toLocaleString('fr-FR') + ' XOF');
                $('#recap_reste').text(reste.toLocaleString('fr-FR') + ' XOF');
            } else {
                $('#recap_duree').text('Dates invalides');
                $('#recap_nuits').text('0');
                $('#recap_total').text('0 XOF');
                $('#recap_acompte').text('0 XOF');
                $('#recap_reste').text('0 XOF');
            }
        }
    });
});
</script>