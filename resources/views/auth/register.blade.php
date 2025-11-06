<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Établissement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="row g-0">
                    
                    <!-- Colonne image avec design moderne -->
                    <div class="col-md-5 d-none d-md-flex bg-primary bg-gradient rounded-start-4 p-5 flex-column justify-content-center align-items-center text-white">
                        <div class="text-center">
                            <i class="bi bi-building-add display-1 mb-4"></i>
                            <h4 class="fw-bold mb-3">Bienvenue !</h4>
                            <p class="lead mb-4">Inscrivez votre établissement et profitez de nos services</p>
                            <div class="d-flex flex-column gap-3 text-start">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill fs-5 me-2"></i>
                                    <span>Gestion simplifiée</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill fs-5 me-2"></i>
                                    <span>Support 24/7</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill fs-5 me-2"></i>
                                    <span>Sécurité garantie</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Colonne formulaire amélioré -->
                    <div class="col-md-7 p-5">
                        <form action="/register" method="POST" class="needs-validation" novalidate>
                            @csrf

                            <h3 class="text-center mb-2 fw-bold text-primary">Inscription</h3>
                            <p class="text-center text-muted mb-4">Créez votre compte établissement</p>

                            {{-- Alertes avec icônes --}}
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-start" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2 flex-shrink-0 fs-5"></i>
                                <div class="flex-grow-1">
                                    <strong>Veuillez corriger les erreurs suivantes :</strong>
                                    <ul class="mb-0 mt-2 small">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            @endif

                            {{-- Champs avec icônes --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-building text-primary me-1"></i>
                                    Nom complet de l'établissement
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('nom_complet') is-invalid @enderror" 
                                       name="nom_complet" 
                                       value="{{ old('nom_complet') }}" 
                                       placeholder="Ex: Hôtel Le Palmier"
                                       required>
                                @error('nom_complet')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-geo-alt text-primary me-1"></i>
                                    Adresse
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('adresse') is-invalid @enderror" 
                                       name="adresse" 
                                       value="{{ old('adresse') }}" 
                                       placeholder="Ex: 123 Avenue de la République, Dakar"
                                       required>
                                @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-envelope text-primary me-1"></i>
                                        Email
                                    </label>
                                    <input type="email" 
                                           class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="contact@hotel.com"
                                           required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-telephone text-primary me-1"></i>
                                        Téléphone
                                    </label>
                                    <input type="tel" 
                                           class="form-control form-control-lg @error('telephone') is-invalid @enderror" 
                                           name="telephone" 
                                           value="{{ old('telephone') }}" 
                                           placeholder="+221 XX XXX XX XX"
                                           required>
                                    @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-lock text-primary me-1"></i>
                                        Mot de passe
                                    </label>
                                    <input type="password" 
                                           class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                           name="password" 
                                           placeholder="••••••••"
                                           required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Minimum 8 caractères</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-lock-fill text-primary me-1"></i>
                                        Confirmer le mot de passe
                                    </label>
                                    <input type="password" 
                                           class="form-control form-control-lg" 
                                           name="password_confirmation" 
                                           placeholder="••••••••"
                                           required>
                                </div>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label small" for="terms">
                                    J'accepte les <a href="#" class="text-decoration-none">conditions d'utilisation</a> et la <a href="#" class="text-decoration-none">politique de confidentialité</a>
                                </label>
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-person-plus-fill me-2"></i>
                                    S'inscrire
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="text-muted mb-0">
                                    Vous avez déjà un compte ? 
                                    <a href="/connexion" class="text-decoration-none fw-semibold">Se connecter</a>
                                </p>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>