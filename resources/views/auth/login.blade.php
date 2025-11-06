<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container min-vh-100 d-flex align-items-center py-5">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="row g-0">

                    <!-- Colonne image avec design moderne -->
                    <div class="col-md-5 d-none d-md-flex bg-primary bg-gradient p-5 flex-column justify-content-center align-items-center text-white position-relative">
                        <div class="text-center">
                            <i class="bi bi-shield-lock display-1 mb-4 opacity-75"></i>
                            <h4 class="fw-bold mb-3">Bon retour !</h4>
                            <p class="lead mb-4">Connectez-vous pour accéder à votre espace de gestion</p>
                            
                            <div class="d-flex flex-column gap-3 text-start mt-5">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-speedometer2 fs-5 me-3"></i>
                                    <span>Tableau de bord intuitif</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-graph-up-arrow fs-5 me-3"></i>
                                    <span>Suivi en temps réel</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-shield-check fs-5 me-3"></i>
                                    <span>Sécurité maximale</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Colonne formulaire amélioré -->
                    <div class="col-md-7 bg-white">
                        <div class="p-5">
                            <form action="/login" method="POST" class="needs-validation" novalidate>
                                @csrf
                                
                                <!-- En-tête -->
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold text-primary mb-2">Connexion</h2>
                                    <p class="text-muted">Accédez à votre espace établissement</p>
                                </div>

                                <!-- Messages d'erreur améliorés -->
                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                    <i class="bi bi-exclamation-circle-fill me-2 flex-shrink-0 fs-5"></i>
                                    <div>{{ session('error') }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                @endif

                                @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-start" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2 flex-shrink-0 fs-5"></i>
                                    <div class="flex-grow-1">
                                        <ul class="mb-0 small">
                                            @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                @endif

                                <!-- Champ Email -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-envelope text-primary me-1"></i>
                                        Adresse email
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-at text-muted"></i>
                                        </span>
                                        <input type="email" 
                                               name="email" 
                                               class="form-control border-start-0 ps-0" 
                                               placeholder="votreemail@exemple.com"
                                               value="{{ old('email') }}"
                                               required
                                               autofocus>
                                    </div>
                                    <div class="form-text">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Email de votre hôtel ou appartement
                                    </div>
                                </div>

                                <!-- Champ Mot de passe -->
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label fw-semibold mb-0">
                                            <i class="bi bi-lock text-primary me-1"></i>
                                            Mot de passe
                                        </label>
                                        <a href="#" class="text-decoration-none small">Mot de passe oublié ?</a>
                                    </div>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-key text-muted"></i>
                                        </span>
                                        <input type="password" 
                                               name="password" 
                                               id="password"
                                               class="form-control border-start-0 border-end-0 ps-0" 
                                               placeholder="••••••••"
                                               required>
                                        <button class="btn btn-outline-secondary border-start-0" 
                                                type="button" 
                                                onclick="togglePassword()">
                                            <i class="bi bi-eye" id="toggleIcon"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Case à cocher Se souvenir -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>

                                <!-- Bouton de connexion -->
                                <div class="d-grid gap-2 mb-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>
                                        Se connecter
                                    </button>
                                </div>

                                <!-- Séparateur -->
                                <div class="position-relative my-4">
                                    <hr class="text-muted">
                                    <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">
                                        OU
                                    </span>
                                </div>

                                <!-- Lien inscription -->
                                <div class="text-center">
                                    <p class="text-muted mb-2">Vous n'avez pas encore de compte ?</p>
                                    <a href="/inscription" class="btn btn-outline-primary">
                                        <i class="bi bi-person-plus me-2"></i>
                                        Créer un compte
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted small mb-1">
                    <i class="bi bi-shield-fill-check text-primary me-1"></i>
                    Connexion sécurisée SSL
                </p>
                <p class="text-muted small">
                    © 2025 - Tous droits réservés
                </p>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>