@extends('admin.layout.app')

@section('content')


<div class="row mb-4">
    <div class="col-12">
        <h1 class="display-5 fw-bold text-primary mb-3">
            <i class="bi bi-calendar-check me-2"></i>Gestion de la caisse
        </h1>
        <p class="lead text-muted">
            Gérez les transactions de la caisse, consultez les rapports financiers et assurez une gestion efficace des flux de trésorerie.
        </p>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-warning border-2">
            <div class="card-body text-center">
                <i class="bi bi-clock-history fs-1 text-warning"></i>
                <h5 class="card-title mt-2">Total encaissés</h5>
                <p class="display-6 fw-bold text-warning mb-0">120000</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-success border-2">
            <div class="card-body text-center">
                <i class="bi bi-check-circle fs-1 text-success"></i>
                <h5 class="card-title mt-2">Paiements acceptés</h5>
                <p class="display-6 fw-bold text-success mb-0">45000</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-danger border-2">
            <div class="card-body text-center">
                <i class="bi bi-x-circle fs-1 text-danger"></i>
                <h5 class="card-title mt-2">Decaissements</h5>
                <p class="display-6 fw-bold text-danger mb-0">25000</p>
            </div>
        </div>
    </div>
</div>

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" style="width: 60px;">#</th>
                    <th><i class="bi bi-person me-1"></i>Client</th>
                    <th><i class="bi bi-telephone me-1"></i>Téléphone</th>
                    <th><i class="bi bi-door-closed me-1"></i>Chambre</th>
                    <th><i class="bi bi-building me-1"></i>Hôtel</th>
                    <th class="text-center"><i class="bi bi-calendar-event me-1"></i>Arrivée</th>
                    <th class="text-center"><i class="bi bi-calendar-event me-1"></i>Départ</th>
                    <th class="text-center"><i class="bi bi-moon-stars me-1"></i>Nuits</th>
                    <th class="text-center" style="min-width: 160px;"><i class="bi bi-currency-dollar me-1"></i>Prix</th>
                    <th class="text-center" style="min-width: 160px;"><i class="bi bi-gear me-1"></i>Statut</th>

                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
    </div>
</div>


@endsection