@extends('admin.layout.app')

@section('content')
<div class="container-fluid my-5 px-4">

    {{-- Header --}}
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold text-primary mb-3">
                <i class="bi bi-cash-coin me-2"></i>Gestion de la caisse
            </h1>
            <p class="lead text-muted">
                Consultez les encaissements générés par les réservations acceptées
                et suivez les flux financiers en temps réel.
            </p>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-success border-2 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle fs-1 text-success"></i>
                    <h5 class="card-title mt-2">Total encaissé</h5>
                    <p class="display-6 fw-bold text-success mb-0">
                        {{ number_format($totalEncaisse, 0, ',', ' ') }}
                    </p>
                    <small class="text-muted">FCFA — réservations acceptées</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-warning border-2 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-clock-history fs-1 text-warning"></i>
                    <h5 class="card-title mt-2">En attente</h5>
                    <p class="display-6 fw-bold text-warning mb-0">
                        {{ number_format($totalEnAttente, 0, ',', ' ') }}
                    </p>
                    <small class="text-muted">FCFA — réservations en cours</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger border-2 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-x-circle fs-1 text-danger"></i>
                    <h5 class="card-title mt-2">Manque à gagner</h5>
                    <p class="display-6 fw-bold text-danger mb-0">
                        {{ number_format($totalRefuse, 0, ',', ' ') }}
                    </p>
                    <small class="text-muted">FCFA — réservations refusées</small>
                </div>
            </div>
        </div>
    </div>

    {{-- Filtre statut --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 p-3 bg-light rounded-3 border">
                <div class="d-flex gap-2 flex-wrap">
                    <button class="btn btn-outline-secondary btn-sm filtre-btn active" data-filtre="tous">
                        Tous
                    </button>
                    <button class="btn btn-outline-success btn-sm filtre-btn" data-filtre="acceptée">
                        Acceptées
                    </button>
                    <button class="btn btn-outline-warning btn-sm filtre-btn" data-filtre="en attente">
                         En attente
                    </button>
                    <button class="btn btn-outline-danger btn-sm filtre-btn" data-filtre="refusée">
                         Refusées
                    </button>
                </div>
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un client...">
                </div>
            </div>
        </div>
    </div>

    {{-- Tableau --}}
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-table me-2"></i>Détail des transactions</h5>
            <span class="badge bg-white text-primary fs-6">
                {{ $reservations->count() }} réservation(s)
            </span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="caisseTable">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width:60px;">#</th>
                            <th>Client</th>
                            <th>Téléphone</th>
                            <th>Chambre</th>
                            <th>Hôtel</th>
                            <th class="text-center">Arrivée</th>
                            <th class="text-center">Départ</th>
                            <th class="text-center">Nuits</th>
                            <th class="text-center">Prix / nuit</th>
                            <th class="text-center fw-bold">Montant total</th>
                            <th class="text-center">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $index => $reservation)
                        <tr class="caisse-row
                            @if($reservation->statut == 'acceptée') table-success
                            @elseif($reservation->statut == 'refusée') table-danger
                            @else table-warning
                            @endif"
                            data-statut="{{ $reservation->statut }}">

                            {{-- # --}}
                            <td class="text-center">
                                <span class="badge bg-secondary">{{ $index + 1 }}</span>
                            </td>

                            {{-- Client --}}
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                         style="width:40px; height:40px; font-weight:bold; font-size:0.85rem;">
                                        {{ strtoupper(substr($reservation->nom, 0, 1)) }}{{ strtoupper(substr($reservation->prenom, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $reservation->nom }} {{ $reservation->prenom }}</div>
                                        <small class="text-muted">{{ $reservation->email ?? '—' }}</small>
                                    </div>
                                </div>
                            </td>

                            {{-- Téléphone --}}
                            <td>
                                <i class="bi bi-phone text-muted me-1"></i>
                                {{ $reservation->telephone ?? '—' }}
                            </td>

                            {{-- Chambre --}}
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $reservation->chambre->nom ?? '—' }}
                                </span>
                            </td>

                            {{-- Hôtel --}}
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $reservation->chambre->hotel->nom ?? '—' }}
                                </span>
                            </td>

                            {{-- Arrivée --}}
                            <td class="text-center small">
                                <i class="bi bi-calendar3 text-primary me-1"></i>
                                {{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }}
                            </td>

                            {{-- Départ --}}
                            <td class="text-center small">
                                <i class="bi bi-calendar3 text-danger me-1"></i>
                                {{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }}
                            </td>

                            {{-- Nuits --}}
                            <td class="text-center">
                                <span class="badge bg-white border text-dark">
                                    {{ $reservation->nuits }} nuit{{ $reservation->nuits > 1 ? 's' : '' }}
                                </span>
                            </td>

                            {{-- Prix / nuit --}}
                            <td class="text-center">
                                {{ number_format($reservation->chambre->prix ?? 0, 0, ',', ' ') }} FCFA
                            </td>

                            {{-- Montant total --}}
                            <td class="text-center">
                                <span class="fw-bold fs-6
                                    @if($reservation->statut == 'acceptée') text-success
                                    @elseif($reservation->statut == 'refusée') text-danger
                                    @else text-warning
                                    @endif">
                                    {{ number_format($reservation->montant, 0, ',', ' ') }} FCFA
                                </span>
                            </td>

                            {{-- Statut --}}
                            <td class="text-center">
                                @if($reservation->statut == 'acceptée')
                                    <span class="badge bg-success">Acceptée</span>
                                @elseif($reservation->statut == 'refusée')
                                    <span class="badge bg-danger">Refusée</span>
                                @else
                                    <span class="badge bg-warning text-dark"> En attente</span>
                                @endif
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                <h5>Aucune transaction disponible</h5>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                    {{-- Pied de tableau : total encaissé --}}
                    @if($reservations->count() > 0)
                    <tfoot class="table-dark">
                        <tr>
                            <td colspan="9" class="text-end fw-bold">Total encaissé (acceptées) :</td>
                            <td class="text-center fw-bold text-success fs-6">
                                {{ number_format($totalEncaisse, 0, ',', ' ') }} FCFA
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                    @endif

                </table>
            </div>
        </div>
    </div>
<div class="d-flex justify-content mt-4">
    <h6 class=" badge bg-info text-white">NB: Si vous voulez les calculs des reservations des appartements, Veuillez patienter la mise à jour à venir!</h6>
</div>
</div>

{{-- JS : filtre + recherche --}}
<script>
    // Recherche live
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const search = this.value.toLowerCase();
        document.querySelectorAll('.caisse-row').forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(search) ? '' : 'none';
        });
    });

    // Filtre par statut
    document.querySelectorAll('.filtre-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.filtre-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filtre = this.dataset.filtre;
            document.querySelectorAll('.caisse-row').forEach(row => {
                if (filtre === 'tous' || row.dataset.statut === filtre) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection