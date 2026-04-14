@extends('admin.layout.app')

@section('content')
<div class="container-fluid my-5 px-4">

    {{-- Header --}}
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold text-primary mb-2">
                <i class="bi bi-people me-2"></i>Liste des clients
            </h1>
            <p class="lead text-muted">
                Les clients sont automatiquement enregistrés à partir des réservations effectuées.
            </p>
        </div>
    </div>

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-primary border-2">
                <div class="card-body text-center">
                    <i class="bi bi-people fs-1 text-primary"></i>
                    <h5 class="card-title mt-2">Total clients</h5>
                    <p class="display-6 fw-bold text-primary mb-0">{{ $clients->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Actions --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 p-3 bg-light rounded-3 border">
                <div class="d-flex gap-2 flex-wrap">
                    <a href="#" class="btn btn-primary">
                        Nouveau client
                    </a>
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
        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0">Liste complète des clients</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="clientsTable">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 60px;">#</th>
                            <th>Client</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th class="text-center">Réservations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clients as $index => $client)
                        <tr class="client-row">
                            <td class="text-center">
                                <span class="badge bg-secondary text-white">{{ $index + 1 }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                         style="width: 40px; height: 40px; font-weight: bold; font-size: 0.85rem;">
                                        {{ strtoupper(substr($client->nom, 0, 1)) }}{{ strtoupper(substr($client->prenom, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $client->nom }} {{ $client->prenom }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="bi bi-phone text-muted me-1"></i>
                                {{ $client->telephone ?? 'Non renseigné' }}
                            </td>
                            <td>
                                <i class="bi bi-envelope text-muted me-1"></i>
                                {{ $client->email ?? 'Non renseigné' }}
                            </td>
                            <td class="text-center">
                                {{-- Nombre de réservations de ce client --}}
                                @php
                                    $nbRes = \App\Models\Reservation::where('nom', $client->nom)
                                                ->where('prenom', $client->prenom)
                                                ->where('telephone', $client->telephone)
                                                ->count();
                                @endphp
                                <span class="badge bg-info text-dark">
                                    {{ $nbRes }} réservation{{ $nbRes > 1 ? 's' : '' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                    <h5>Aucun client enregistré</h5>
                                    <p class="mb-0">Les clients apparaîtront automatiquement après les premières réservations.</p>
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

{{-- Recherche live --}}
<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const search = this.value.toLowerCase();
        document.querySelectorAll('.client-row').forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(search) ? '' : 'none';
        });
    });
</script>

@endsection