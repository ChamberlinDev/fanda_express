@extends('admin.layout.app')

@section('content')
<div class="container-fluid my-5 px-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold text-primary mb-3">
                <i class="bi bi-calendar-check me-2"></i>Gestion des réservations
            </h1>
            <p class="lead text-muted">
                Visualisez et gérez les réservations. Acceptez ou refusez les demandes directement depuis le tableau. 
                Un email de confirmation sera envoyé automatiquement au client.
            </p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-warning border-2">
                <div class="card-body text-center">
                    <i class="bi bi-clock-history fs-1 text-warning"></i>
                    <h5 class="card-title mt-2">En attente</h5>
                    <p class="display-6 fw-bold text-warning mb-0">{{ $reservations->where('statut', 'en attente')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success border-2">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle fs-1 text-success"></i>
                    <h5 class="card-title mt-2">Acceptées</h5>
                    <p class="display-6 fw-bold text-success mb-0">{{ $reservations->where('statut', 'acceptée')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger border-2">
                <div class="card-body text-center">
                    <i class="bi bi-x-circle fs-1 text-danger"></i>
                    <h5 class="card-title mt-2">Refusées</h5>
                    <p class="display-6 fw-bold text-danger mb-0">{{ $reservations->where('statut', 'refusée')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions Row -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 p-3 bg-light rounded-3 border">
                <div class="d-flex gap-2 flex-wrap">
                    <a href="/reservation_admin" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1 mx-3"></i> Nouvelle réservation - hotel
                    </a>
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-plus-circle me-1 mx-3"></i> Nouvelle reservation - appart
                    </a>
                    <a href="#" class="btn btn-danger">
                        <i class="bi bi-file-earmark-pdf me-1 mx-3"></i> Exporter PDF
                    </a>
                </div>
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Rechercher...">
                </div>
            </div>
        </div>
    </div>

    <!-- Reservations Table Card -->
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Liste complète des réservations</h5>
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
                            <th class="text-center" style="min-width: 160px;"><i class="bi bi-gear me-1"></i>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                        <tr class="
                            @if($reservation->statut == 'acceptée') table-success
                            @elseif($reservation->statut == 'refusée') table-danger
                            @else table-warning
                            @endif
                        ">
                            <td class="text-center fw-bold">
                                <span class="badge bg-secondary">{{ $reservation->id }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" 
                                         style="width: 40px; height: 40px; font-weight: bold;">
                                        {{ strtoupper(substr($reservation->nom, 0, 1)) }}{{ strtoupper(substr($reservation->prenom, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $reservation->nom }} {{ $reservation->prenom }}</div>
                                        <small class="text-muted">{{ $reservation->email ?? 'N/A' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="bi bi-phone text-muted me-1"></i>
                                {{ $reservation->telephone ?? '+242 XX XXX XX XX' }}
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $reservation->chambre->nom ?? '—' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $reservation->chambre->hotel->nom ?? '—' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="small">
                                    <i class="bi bi-calendar3 text-primary me-1"></i>
                                    {{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="small">
                                    <i class="bi bi-calendar3 text-danger me-1"></i>
                                    {{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }}
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-dark fs-6">
                                    {{ \Carbon\Carbon::parse($reservation->date_debut)->diffInDays(\Carbon\Carbon::parse($reservation->date_fin)) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('reservations_update_statut', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="statut" 
                                            class="form-select form-select-sm fw-bold
                                            @if($reservation->statut == 'acceptée') text-success border-success
                                            @elseif($reservation->statut == 'refusée') text-danger border-danger
                                            @else text-warning border-warning
                                            @endif"
                                            onchange="this.form.submit()">
                                        <option value="en attente" {{ $reservation->statut == 'en attente' ? 'selected' : '' }}>
                                            ⏳ En attente
                                        </option>
                                        <option value="acceptée" {{ $reservation->statut == 'acceptée' ? 'selected' : '' }}>
                                            ✅ Acceptée
                                        </option>
                                        <option value="refusée" {{ $reservation->statut == 'refusée' ? 'selected' : '' }}>
                                            ❌ Refusée
                                        </option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                    <h5>Aucune réservation disponible</h5>
                                    <p class="mb-0">Les nouvelles réservations apparaîtront ici.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection