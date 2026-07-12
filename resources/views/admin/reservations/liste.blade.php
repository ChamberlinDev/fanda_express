@extends('admin.layout.app')

@section('content')
<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex align-items-center mb-4">
        <div>
            <h4 class="mb-1 fw-bold">Gestion des réservations</h4>
            <p class="text-muted mb-0 small">
                Suivez et gérez les réservations hôtels et appartements en temps réel.
            </p>
        </div>
    </div>

    {{-- STATS --}}
    @php
        $en_attente = $reservations->where('statut','en attente')->count() + $reservations_appart->where('statut','en attente')->count();
        $acceptees  = $reservations->where('statut','acceptée')->count() + $reservations_appart->where('statut','acceptée')->count();
        $refusees   = $reservations->where('statut','refusée')->count() + $reservations_appart->where('statut','refusée')->count();

        function badgeStatut($statut){
            return match($statut){
                'acceptée' => 'success',
                'refusée'  => 'danger',
                default    => 'warning'
            };
        }
    @endphp

    <div class="row g-3 mb-4">
        @foreach([
            ['title'=>'En attente','value'=>$en_attente,'color'=>'warning','icon'=>'clock-history'],
            ['title'=>'Acceptées','value'=>$acceptees,'color'=>'success','icon'=>'check-circle'],
            ['title'=>'Refusées','value'=>$refusees,'color'=>'danger','icon'=>'x-circle'],
        ] as $stat)
        <div class="col-md-4">
            <div class="card border-0 shadow-sm stat-card">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-{{ $stat['color'] }} bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width:56px;height:56px;flex-shrink:0;">
                        <i class="bi bi-{{ $stat['icon'] }} fs-4 text-{{ $stat['color'] }}"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-1">{{ $stat['title'] }}</p>
                        <h3 class="fw-bold mb-0">{{ $stat['value'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- RECHERCHE --}}
    <div class="d-flex justify-content-end mb-3">
        <div class="input-group" style="width:280px;">
            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un client, un code...">
        </div>
    </div>

    {{-- HOTEL TABLE --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between py-3">
            <span class="fw-semibold"><i class="bi bi-building me-2"></i>Réservations Hôtel</span>
            <span class="badge bg-white text-primary">{{ $reservations->count() }}</span>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Code</th>
                        <th>Client</th>
                        <th>Chambre</th>
                        <th>Hôtel</th>
                        <th>Dates</th>
                        <th>Nuits</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($reservations as $r)
                    <tr class="res-row" data-search="{{ strtolower($r->nom.' '.$r->prenom.' '.$r->email.' '.$r->code_reservation) }}">
                        <td><span class="fw-semibold text-primary">#{{ $r->code_reservation }}</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-primary-subtle text-primary fw-semibold d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:.8rem;flex-shrink:0;">
                                    {{ strtoupper(substr($r->nom,0,1).substr($r->prenom,0,1)) }}
                                </div>
                                <div>
                                    <div class="fw-medium">{{ $r->nom }} {{ $r->prenom }}</div>
                                    <small class="text-muted">{{ $r->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $r->chambre->nom ?? '-' }}</td>
                        <td>{{ $r->chambre->hotel->nom ?? '-' }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($r->date_debut)->format('d/m/Y') }}
                            <i class="bi bi-arrow-right text-muted mx-1"></i>
                            {{ \Carbon\Carbon::parse($r->date_fin)->format('d/m/Y') }}
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ \Carbon\Carbon::parse($r->date_debut)->diffInDays($r->date_fin) }} nuit(s)</span></td>
                        <td>
                            <form action="{{ route('reservations_update_statut',$r->id) }}" method="POST">
                                @csrf @method('PUT')
                                <select name="statut" class="form-select form-select-sm fw-semibold status-select status-{{ badgeStatut($r->statut) }}" onchange="this.form.submit()">
                                    <option value="en attente" @selected($r->statut=='en attente')>En attente</option>
                                    <option value="acceptée" @selected($r->statut=='acceptée')>Acceptée</option>
                                    <option value="refusée" @selected($r->statut=='refusée')>Refusée</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>Aucune réservation hôtel
                    </td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- APPART TABLE --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between py-3">
            <span class="fw-semibold"><i class="bi bi-house-door me-2"></i>Réservations Appartement</span>
            <span class="badge bg-white text-primary">{{ $reservations_appart->count() }}</span>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Code</th>
                        <th>Client</th>
                        <th>Appartement</th>
                        <th>Dates</th>
                        <th>Nuits</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($reservations_appart as $r)
                    <tr class="res-row" data-search="{{ strtolower($r->nom.' '.$r->prenom.' '.$r->email.' '.$r->code_reservation) }}">
                        <td><span class="fw-semibold text-primary">#{{ $r->code_reservation }}</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-primary-subtle text-primary fw-semibold d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:.8rem;flex-shrink:0;">
                                    {{ strtoupper(substr($r->nom,0,1).substr($r->prenom,0,1)) }}
                                </div>
                                <div>
                                    <div class="fw-medium">{{ $r->nom }} {{ $r->prenom }}</div>
                                    <small class="text-muted">{{ $r->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $r->appartement->nom ?? '-' }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($r->date_debut)->format('d/m/Y') }}
                            <i class="bi bi-arrow-right text-muted mx-1"></i>
                            {{ \Carbon\Carbon::parse($r->date_fin)->format('d/m/Y') }}
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ \Carbon\Carbon::parse($r->date_debut)->diffInDays($r->date_fin) }} nuit(s)</span></td>
                        <td>
                            <form action="{{ route('reservations_appart_update_statut',$r->id) }}" method="POST">
                                @csrf @method('PUT')
                                <select name="statut" class="form-select form-select-sm fw-semibold status-select status-{{ badgeStatut($r->statut) }}" onchange="this.form.submit()">
                                    <option value="en attente" @selected($r->statut=='en attente')>En attente</option>
                                    <option value="acceptée" @selected($r->statut=='acceptée')>Acceptée</option>
                                    <option value="refusée" @selected($r->statut=='refusée')>Refusée</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>Aucune réservation appartement
                    </td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<style>
    .stat-card { transition: transform .15s ease, box-shadow .15s ease; }
    .stat-card:hover { transform: translateY(-3px); box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.08) !important; }

    .status-select { border: none; border-radius: 50px; padding: .25rem .75rem; cursor: pointer; }
    .status-select.status-warning { background-color: #fff3cd; color: #997404; }
    .status-select.status-success { background-color: #d1e7dd; color: #146c43; }
    .status-select.status-danger  { background-color: #f8d7da; color: #b02a37; }

    .table tbody tr:hover { background-color: #fafbfc; }
</style>

@push('scripts')
<script>
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('input', function () {
        const term = this.value.trim().toLowerCase();
        document.querySelectorAll('.res-row').forEach(row => {
            row.style.display = (!term || row.dataset.search.includes(term)) ? '' : 'none';
        });
    });
</script>
@endpush

@endsection