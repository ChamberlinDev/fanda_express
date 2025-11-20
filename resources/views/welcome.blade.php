@extends('admin.layout.app')

@section('content')
<div class="container-fluid my-4">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body py-4">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div class="text-dark">
                            <h2 class="mb-2 fw-bold">
                                <i class="bi bi-emoji-smile me-2"></i>Bonjour, {{auth()->user()->nom_complet}} !
                            </h2>
                            <p class="mb-0 opacity-75">
                                <i class="bi bi-calendar-check me-2"></i>{{ \Carbon\Carbon::now()->isoFormat('dddd D MMMM YYYY') }}
                            </p>
                        </div>
                        <div class="text-white text-end d-none d-md-block">
                            <h4 class="mb-0">🏨</h4>
                            <small class="opacity-75">Espace de gestion</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-6">
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-people-fill fs-2 text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                Clients
                            </h6>
                            <h2 class="mb-0 fw-bold">{{ $totalClients }}</h2>
                            <small class="text-success">
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-calendar-check fs-2 text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                Réservations
                            </h6>
                            <h2 class="mb-0 fw-bold">{{ $totalReservations }}</h2>
                            <small class="text-info">
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-door-closed fs-2 text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                Hotels
                            </h6>
                            <h2 class="mb-0 fw-bold">{{ $totalhotels }}</h2>
                            <small class="text-success">
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-house fs-2 text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                Appartements
                            </h6>
                            <h2 class="mb-0 fw-bold">{{ $totalAppartements }}</h2>
                            <small class="text-success">
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Réservations récentes -->
    


    <!-- Mon établissement et Gains -->
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-building text-primary me-2"></i>Mon établissement
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between p-4 bg-light rounded-3">
                        <div>
                            <h3 class="mb-2 fw-bold text-primary">
                                <i class="bi bi-award-fill me-2"></i>{{$hotel->nom}}
                            </h3>
                            <p class="text-muted mb-0">
                                <i class="bi bi-geo-alt me-2"></i>Informations de l'établissement
                            </p>
                        </div>
                        <div>
                            <a href="/etablissement" class="btn btn-primary btn-lg">
                                <i class="bi bi-pencil-square me-2"></i>Modifier
                            </a>
                        </div>
                    </div>

                    <!-- Stats rapides de l'établissement -->
                    <div class="row g-3 mt-3">
                        <div class="col-6">
                            <div class="border rounded p-3 text-center">
                                <i class="bi bi-star-fill text-warning fs-4"></i>
                                <h4 class="mb-0 mt-2">4.8</h4>
                                <small class="text-muted">Note moyenne</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-3 text-center">
                                <i class="bi bi-chat-left-text-fill text-info fs-4"></i>
                                <h4 class="mb-0 mt-2">156</h4>
                                <small class="text-muted">Avis clients</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="mb-0 fw-bold text-white">
                        <i class="bi bi-graph-up-arrow me-2"></i>Gains générés
                    </h5>
                </div>
                <div class="card-body text-white">
                    <div class="mb-4">
                        <h1 class="display-4 fw-bold mb-0">{{$revenuTotal}} FCFA</h1>
                        <!-- <p class="mb-0 opacity-75">FCFA ce mois</p> -->
                    </div>

                    <!-- <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="bg-white bg-opacity-10 rounded p-2 text-center">
                                <small class="d-block opacity-75">Aujourd'hui</small>
                                <strong class="fs-5">15K</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white bg-opacity-10 rounded p-2 text-center">
                                <small class="d-block opacity-75">Semaine</small>
                                <strong class="fs-5">98K</strong>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="d-flex justify-content-between align-items-center bg-white bg-opacity-10 rounded p-3">
                        <span><i class="bi bi-arrow-up-right-circle me-2"></i>Croissance</span>
                        <span class="badge bg-success">+18%</span>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h6 class="text-muted mb-3 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                        <i class="bi bi-lightning-charge-fill me-2"></i>Actions rapides
                    </h6>
                    <div class="row g-2">
                        <div class="col-6 col-md-3">
                            <a href="#" class="btn btn-outline-primary w-100">
                                <i class="bi bi-plus-circle me-2"></i>Nouvelle réservation
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="/etablissement" class="btn btn-outline-success w-100">
                                <i class="bi bi-door-closed me-2"></i>Gérer chambres
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="#" class="btn btn-outline-info w-100">
                                <i class="bi bi-people me-2"></i>Voir clients
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="#" class="btn btn-outline-warning w-100">
                                <i class="bi bi-file-earmark-text me-2"></i>Rapports
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection