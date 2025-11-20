@extends('admin.layout.app')

@section('content')
<div class="container my-5">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <div class="mb-4">
                <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mx-auto" 
                     style="width: 100px; height: 100px; font-size: 2.5rem; font-weight: bold;">
                    <i class="bi bi-pencil-square"></i>
                </div>
            </div>
            <h1 class="display-5 fw-bold text-warning mb-2">
                <i class="bi bi-person-gear me-2"></i>Modifier mon profil
            </h1>
            <p class="lead text-muted">
                Mettez à jour vos informations personnelles en toute sécurité
            </p>
        </div>
    </div>

    <!-- Messages d'erreur et succès -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <strong>Erreur!</strong> Veuillez corriger les erreurs suivantes:
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Succès!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Edit Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient bg-warning text-dark py-4">
                    <h4 class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>Informations à modifier
                    </h4>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="{{route('profil_save')}}" method="post">
                        @csrf
                        
                        <!-- Alert Info -->
                        <div class="alert alert-info border-0 d-flex align-items-start mb-4" role="alert">
                            <i class="bi bi-lightbulb-fill fs-4 me-3 mt-1"></i>
                            <div>
                                <strong>Conseil:</strong> Assurez-vous que toutes les informations sont exactes avant de valider les modifications.
                            </div>
                        </div>

                        <!-- Nom de l'hôtel et Adresse -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label for="nom_hotel" class="form-label fw-bold">
                                    <i class="bi bi-building text-primary me-2"></i>Nom de l'hôtel
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-building"></i>
                                    </span>
                                    <input type="text" 
                                           name="nom_hotel" 
                                           id="nom_hotel"
                                           class="form-control border-start-0 ps-0" 
                                           value="{{old('nom_hotel', $hotels->nom_complet)}}"
                                           placeholder="Entrez le nom de l'hôtel"
                                           required>
                                </div>
                                <small class="form-text text-muted">Le nom complet de votre établissement</small>
                            </div>
                            <div class="col-md-6">
                                <label for="adresse" class="form-label fw-bold">
                                    <i class="bi bi-geo-alt text-danger me-2"></i>Adresse
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-geo-alt"></i>
                                    </span>
                                    <input type="text" 
                                           name="adresse" 
                                           id="adresse"
                                           class="form-control border-start-0 ps-0" 
                                           value="{{old('adresse', $hotels->adresse)}}"
                                           placeholder="Votre adresse complète"
                                           required>
                                </div>
                                <small class="form-text text-muted">L'adresse physique de l'établissement</small>
                            </div>
                        </div>

                        <!-- Email et Téléphone -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold">
                                    <i class="bi bi-envelope text-info me-2"></i>Adresse email
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" 
                                           name="email" 
                                           id="email"
                                           class="form-control border-start-0 ps-0" 
                                           value="{{old('email', $hotels->email)}}"
                                           placeholder="votre@email.com"
                                           required>
                                </div>
                                <small class="form-text text-muted">Email principal de contact</small>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone" class="form-label fw-bold">
                                    <i class="bi bi-telephone text-success me-2"></i>Téléphone
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input type="tel" 
                                           name="telephone" 
                                           id="telephone"
                                           class="form-control border-start-0 ps-0" 
                                           value="{{old('telephone', $hotels->telephone)}}"
                                           placeholder="+242 XX XXX XX XX"
                                           required>
                                </div>
                                <small class="form-text text-muted">Numéro de téléphone principal</small>
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-bold">
                                    <i class="bi bi-shield-lock text-warning me-2"></i>Nouveau mot de passe
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" 
                                           name="password" 
                                           id="password"
                                           class="form-control border-start-0 ps-0" 
                                           placeholder="••••••••">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                        <i class="bi bi-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                                <small class="form-text text-muted">
                                    <i class="bi bi-info-circle me-1"></i>Laisser vide si vous ne souhaitez pas le modifier
                                </small>
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label fw-bold">
                                    <i class="bi bi-shield-check text-success me-2"></i>Confirmer le mot de passe
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <input type="password" 
                                           name="password_confirmation" 
                                           id="password_confirmation"
                                           class="form-control border-start-0 ps-0" 
                                           placeholder="••••••••">
                                </div>
                                <small class="form-text text-muted">Répétez le nouveau mot de passe</small>
                            </div>
                        </div>

                        <!-- Alert Password -->
                        <div class="alert alert-warning border-0 d-flex align-items-start mb-4" role="alert">
                            <i class="bi bi-shield-exclamation fs-4 me-3 mt-1"></i>
                            <div>
                                <strong>Sécurité:</strong> Utilisez un mot de passe fort contenant au moins 8 caractères, incluant majuscules, minuscules, chiffres et caractères spéciaux.
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Action Buttons -->
                        <div class="d-flex flex-column flex-md-row gap-3 justify-content-between align-items-center pt-3">
                            <a href="/profil" class="btn btn-outline-secondary btn-lg w-100 w-md-auto order-2 order-md-1">
                                <i class="bi bi-x-circle me-2"></i>Annuler
                            </a>
                            <div class="d-flex gap-2 w-100 w-md-auto order-1 order-md-2">
                                <button type="reset" class="btn btn-outline-warning btn-lg flex-grow-1">
                                    <i class="bi bi-arrow-counterclockwise me-2"></i>Réinitialiser
                                </button>
                                <button type="submit" class="btn btn-warning btn-lg flex-grow-1">
                                    <i class="bi bi-check-circle me-2"></i>Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Security Tips Card -->
            <div class="row g-3 mt-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-shield-check fs-1 text-success mb-3"></i>
                            <h6 class="fw-bold">Connexion sécurisée</h6>
                            <small class="text-muted">Vos données sont chiffrées</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-clock-history fs-1 text-primary mb-3"></i>
                            <h6 class="fw-bold">Historique des modifications</h6>
                            <small class="text-muted">Toutes les actions sont tracées</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-envelope-check fs-1 text-info mb-3"></i>
                            <h6 class="fw-bold">Notification email</h6>
                            <small class="text-muted">Confirmation par email</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
    }
}
</script>
@endsection