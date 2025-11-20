@extends('admin.layout.app')

@section('content')
<div class="container my-5">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <div class="mb-4">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mx-auto" 
                     style="width: 120px; height: 120px; font-size: 3rem; font-weight: bold;">
                    {{ strtoupper(substr($hotels->nom_complet, 0, 2)) }}
                </div>
            </div>
            <h1 class="display-5 fw-bold text-primary mb-2">
                <i class="bi bi-person-circle me-2"></i>Mon Profil
            </h1>
            <p class="lead text-muted">
                Consultez et gérez vos informations personnelles en toute sécurité
            </p>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient bg-primary text-white py-4">
                    <h4 class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>Informations personnelles
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form>
                        <!-- Nom complet et Adresse -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="border rounded-3 p-3 bg-light h-100">
                                    <label class="form-label text-muted mb-2">
                                        <i class="bi bi-person-badge text-primary me-2"></i>Nom complet
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg border-0 bg-white" 
                                           value="{{$hotels->nom_complet}}" 
                                           readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded-3 p-3 bg-light h-100">
                                    <label class="form-label text-muted mb-2">
                                        <i class="bi bi-geo-alt text-danger me-2"></i>Adresse
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg border-0 bg-white" 
                                           value="{{$hotels->adresse}}" 
                                           readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Téléphone et Email -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="border rounded-3 p-3 bg-light h-100">
                                    <label class="form-label text-muted mb-2">
                                        <i class="bi bi-telephone text-success me-2"></i>Téléphone
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg border-0 bg-white" 
                                           value="{{$hotels->telephone}}" 
                                           readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded-3 p-3 bg-light h-100">
                                    <label class="form-label text-muted mb-2">
                                        <i class="bi bi-envelope text-info me-2"></i>Adresse email
                                    </label>
                                    <input type="email" 
                                           class="form-control form-control-lg border-0 bg-white" 
                                           value="{{$hotels->email}}" 
                                           readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="border rounded-3 p-3 bg-light h-100">
                                    <label class="form-label text-muted mb-2">
                                        <i class="bi bi-shield-lock text-warning me-2"></i>Mot de passe
                                    </label>
                                    <input type="password" 
                                           class="form-control form-control-lg border-0 bg-white" 
                                           value="••••••••••" 
                                           readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded-3 p-3 bg-light h-100">
                                    <label class="form-label text-muted mb-2">
                                        <i class="bi bi-calendar-check text-secondary me-2"></i>Membre depuis
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg border-0 bg-white" 
                                           value="{{ $hotels->created_at ? \Carbon\Carbon::parse($hotels->created_at)->format('d/m/Y') : 'N/A' }}" 
                                           readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Alert Info -->
                        <div class="alert alert-info border-0 d-flex align-items-center mb-4" role="alert">
                            <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                            <div>
                                <strong>Information:</strong> Vos données personnelles sont sécurisées et confidentielles.
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex flex-column flex-md-row gap-3 justify-content-between align-items-center pt-3 border-top">
                            <a href="/home" class="btn btn-outline-secondary btn-lg w-100 w-md-auto">
                                <i class="bi bi-arrow-left me-2"></i>Retour au tableau de bord
                            </a>
                            <div class="d-flex gap-2 w-100 w-md-auto">
                                <a href="/profil_edit" class="btn btn-warning btn-lg flex-grow-1">
                                    <i class="bi bi-pencil-square me-2"></i>Modifier
                                </a>
                                <button type="button" 
                                        class="btn btn-danger btn-lg" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal">
                                    <i class="bi bi-trash me-2"></i>Supprimer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-3 mt-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-primary bg-opacity-10">
                        <div class="card-body text-center">
                            <i class="bi bi-shield-check fs-1 text-primary"></i>
                            <h6 class="mt-2 mb-0">Compte Vérifié</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-success bg-opacity-10">
                        <div class="card-body text-center">
                            <i class="bi bi-lock-fill fs-1 text-success"></i>
                            <h6 class="mt-2 mb-0">Données Sécurisées</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-info bg-opacity-10">
                        <div class="card-body text-center">
                            <i class="bi bi-person-check-fill fs-1 text-info"></i>
                            <h6 class="mt-2 mb-0">Profil Actif</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle me-2"></i>Confirmation de suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-warning border-0" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    <strong>Attention!</strong> Cette action est irréversible.
                </div>
                <p class="mb-0">Êtes-vous sûr de vouloir supprimer définitivement votre compte? Toutes vos données seront perdues.</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Annuler
                </button>
                <form action="" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-2"></i>Confirmer la suppression
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection