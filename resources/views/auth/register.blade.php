@extends('superadmin.layout.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    
                    <!-- En-tête -->
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-primary">Ajouter un utilisateur</h3>
                        <p class="text-muted">Créez votre compte gerant d'établissement</p>
                    </div>

                    <form action="/register" method="POST">
                        @csrf

                        {{-- Messages d'erreur --}}
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex">
                                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                                <div>
                                    <strong>Erreurs :</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        {{-- Message de succès --}}
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <!-- Nom établissement -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Nom de l'établissement <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                <input type="text" 
                                       class="form-control @error('nom_complet') is-invalid @enderror" 
                                       name="nom_complet" 
                                       value="{{ old('nom_complet') }}" 
                                       placeholder="Ex: Hôtel Le Palmier"
                                       required>
                                @error('nom_complet')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Adresse -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Adresse <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" 
                                       class="form-control @error('adresse') is-invalid @enderror" 
                                       name="adresse" 
                                       value="{{ old('adresse') }}" 
                                       placeholder="Ex: 123 Avenue de la République, Dakar"
                                       required>
                                @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email et Téléphone -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="contact@hotel.com"
                                           required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Téléphone <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" 
                                           class="form-control @error('telephone') is-invalid @enderror" 
                                           name="telephone" 
                                           value="{{ old('telephone') }}" 
                                           placeholder="+221 XX XXX XX XX"
                                           required>
                                    @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Mot de passe <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           name="password" 
                                           placeholder="••••••••"
                                           required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-text">Minimum 8 caractères</div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Confirmer le mot de passe <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" 
                                           class="form-control" 
                                           name="password_confirmation" 
                                           placeholder="••••••••"
                                           required>
                                </div>
                            </div>
                        </div>

                        <!-- Conditions -->
                        <!-- <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    J'accepte les <a href="#" class="text-decoration-none">conditions d'utilisation</a> et la <a href="#" class="text-decoration-none">politique de confidentialité</a>
                                </label>
                            </div>
                        </div> -->

                        <!-- Bouton -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-person-plus-fill me-2"></i>
                                Enregistrer
                            </button>
                        </div>

                        <!-- Lien connexion -->
                       
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection