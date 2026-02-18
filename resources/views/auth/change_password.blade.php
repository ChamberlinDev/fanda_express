<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer le mot de passe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <div class="container min-vh-100 d-flex align-items-center py-5">
        <div class="row w-100 justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="row g-0">

                        <!-- Colonne gauche -->
                        <div class="col-md-5 d-none d-md-flex bg-primary bg-gradient p-5 flex-column justify-content-center align-items-center text-white position-relative">
                            <div class="text-center">
                                <i class="bi bi-key-fill display-1 mb-4 opacity-75"></i>
                                <h4 class="fw-bold mb-3">Première connexion</h4>
                                <p class="lead mb-4">Pour votre sécurité, veuillez définir un nouveau mot de passe personnel.</p>

                                <div class="d-flex flex-column gap-3 text-start mt-4">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle fs-5 me-3"></i>
                                        <span>Au moins 8 caractères</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle fs-5 me-3"></i>
                                        <span>Minuscules et majuscules</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle fs-5 me-3"></i>
                                        <span>Au moins un chiffre</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle fs-5 me-3"></i>
                                        <span>Différent du mot de passe actuel</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne formulaire -->
                        <div class="col-md-7 bg-white">
                            <div class="p-5">
                                <form action="/change-password" method="POST">
                                    @csrf

                                    <!-- En-tête -->
                                    <div class="text-center mb-4">
                                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                            <i class="bi bi-shield-lock-fill text-primary  fs-2"></i>
                                        </div>
                                        <h2 class="fw-bold text-primary mb-1">Nouveau mot de passe</h2>
                                        <p class="text-muted small">Cette étape est obligatoire avant d'accéder à votre espace</p>
                                    </div>

                                    <!-- Alerte info -->
                                    <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
                                        <i class="bi bi-info-circle-fill me-2 flex-shrink-0"></i>
                                        <div class="small">Vous vous connectez pour la première fois. Veuillez choisir un mot de passe sécurisé.</div>
                                    </div>

                                    <!-- Erreurs -->
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                        <i class="bi bi-exclamation-circle-fill me-2 flex-shrink-0"></i>
                                        <div>{{ session('error') }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                    @endif

                                    @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-start" role="alert">
                                        <i class="bi bi-exclamation-triangle-fill me-2 flex-shrink-0"></i>
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

                                    <!-- Nouveau mot de passe -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">
                                            <i class="bi bi-lock text-primary me-1"></i>
                                            Nouveau mot de passe
                                        </label>
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
                                                onclick="togglePassword('password', 'icon1')">
                                                <i class="bi bi-eye" id="icon1"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Confirmer mot de passe -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">
                                            <i class="bi bi-lock-fill text-primary me-1"></i>
                                            Confirmer le mot de passe
                                        </label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="bi bi-key-fill text-muted"></i>
                                            </span>
                                            <input type="password"
                                                name="password_confirmation"
                                                id="password_confirmation"
                                                class="form-control border-start-0 border-end-0 ps-0"
                                                placeholder="••••••••"
                                                required>
                                            <button class="btn btn-outline-secondary border-start-0"
                                                type="button"
                                                onclick="togglePassword('password_confirmation', 'icon2')">
                                                <i class="bi bi-eye" id="icon2"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Bouton -->
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg text-white fw-semibold">
                                            <i class="bi bi-check-circle me-2"></i>
                                            Valider et accéder à mon espace
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted small">© 2025 - Tous droits réservés</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon  = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>

</html>