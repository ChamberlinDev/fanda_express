@extends('superadmin.layout.app')
@section('content')

<div class="container-fluid py-4 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-house-door text-info me-2"></i>{{ $appart->nom }}
            </h2>
            <p class="text-muted small mb-0">
                <i class="bi bi-geo-alt text-danger me-1"></i>
                {{ $appart->ville }} — {{ $appart->adresse }}
            </p>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i>Retour
        </a>
    </div>

    {{-- Images --}}
    @php
    $images = json_decode($appart->images, true);
    $images = is_array($images) ? $images : [];
    @endphp

    @if(!empty($images))
    <div class="row g-2 mb-4">
        <div class="col-md-8">
            <img src="{{ asset('storage/' . $images[0]) }}"
                class="rounded-3 shadow-sm w-100"
                style="height: 320px; object-fit: cover;"
                alt="{{ $appart->nom }}">
        </div>
        <div class="col-md-4">
            <div class="row g-2">
                @foreach(array_slice($images, 1, 4) as $img)
                <div class="col-6">
                    <img src="{{ asset('storage/' . $img) }}"
                        class="rounded-3 w-100"
                        style="height: 152px; object-fit: cover;"
                        alt="{{ $appart->nom }}">
                </div>
                @endforeach
                @for($i = count($images) - 1; $i < 4; $i++)
                    <div class="col-6">
                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center"
                        style="height: 152px;">
                        <i class="bi bi-image text-muted fs-3"></i>
                    </div>
            </div>
            @endfor
        </div>
    </div>
</div>
@else
<div class="bg-light rounded-3 d-flex align-items-center justify-content-center mb-4"
    style="height: 220px;">
    <div class="text-center text-muted">
        Aucune image disponible
    </div>
</div>
@endif

{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-info border-2 text-center py-3">
            <div class="fw-bold text-info" style="font-size: 1.3rem;">
                {{ number_format($appart->prix ?? 0, 0, ',', ' ') }}
            </div>
            <small class="text-muted">FCFA / nuit</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-warning border-2 text-center py-3">
            <div class="fw-bold display-6 text-warning">
                {{ $reservations->where('reservation.statut', 'en attente')->count() }}
            </div>
            <small class="text-muted">En attente</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-success border-2 text-center py-3">
            <div class="fw-bold display-6 text-success">
                {{ $reservations->where('reservation.statut', 'acceptée')->count() }}
            </div>
            <small class="text-muted">Acceptées</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-success border-2 text-center py-3">
            <div class="fw-bold text-success" style="font-size: 1.3rem;">
                {{ number_format($totalEncaisse, 0, ',', ' ') }}
            </div>
            <small class="text-muted">FCFA encaissés</small>
        </div>
    </div>
</div>

{{-- Contenu principal --}}
<div class="row g-4">

    {{-- Colonne gauche --}}
    <div class="col-md-4">

        {{-- Infos générales --}}
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-info text-white py-3">
                <h6 class="mb-0">
                </h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">

                    <li class="mb-3 d-flex align-items-start gap-2">
                        <div>
                            <small class="text-muted d-block">Nom</small>
                            <span class="fw-bold">{{ $appart->nom }}</span>
                        </div>
                    </li>

                    <li class="mb-3 d-flex align-items-start gap-2">
                        <div>
                            <small class="text-muted d-block">Ville</small>
                            <span>{{ $appart->ville ?? '—' }}</span>
                        </div>
                    </li>

                    <li class="mb-3 d-flex align-items-start gap-2">
                        <div>
                            <small class="text-muted d-block">Adresse</small>
                            <span>{{ $appart->adresse ?? '—' }}</span>
                        </div>
                    </li>

                    <li class="mb-3 d-flex align-items-start gap-2">
                        <div>
                            <small class="text-muted d-block">Prix / nuit</small>
                            <span class="fw-bold text-success">
                                {{ number_format($appart->prix ?? 0, 0, ',', ' ') }} FCFA
                            </span>
                        </div>
                    </li>

                    <li class="mb-3 d-flex align-items-start gap-2">
                        <div>
                            <small class="text-muted d-block">Description</small>
                            <span class="small">{{ $appart->description ?? 'Aucune description.' }}</span>
                        </div>
                    </li>

                    @if($appart->equipements)
                    <li class="d-flex align-items-start gap-2">
                        <div>
                            <small class="text-muted d-block mb-1">Équipements</small>
                            @foreach(explode(',', $appart->equipements) as $eq)
                            <span class="badge bg-light border text-dark me-1 mb-1">
                                {{ trim($eq) }}
                            </span>
                            @endforeach
                        </div>
                    </li>
                    @endif

                </ul>
            </div>
        </div>

        {{-- Gérant --}}
        @if($appart->user)
        <div class="card shadow border-0">
            <div class="card-header bg-secondary text-white py-3">
                <h6 class="mb-0">
                    Gérant
                </h6>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center gap-3">

                    <div>
                        <div class="fw-bold">{{ $appart->user->nom_complet }}</div>
                        <small class="text-muted">{{ $appart->user->email }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>

    {{-- Colonne droite : réservations --}}
    <div class="col-md-8">
        <div class="card shadow border-0">
            <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">
                    <i class="bi bi-calendar-check me-2"></i>Réservations
                    <span class="badge bg-white text-info ms-2">{{ $reservations->count() }}</span>
                </h6>
                <span class="badge bg-white text-success small">
                    Encaissé : {{ number_format($totalEncaisse, 0, ',', ' ') }} FCFA
                </span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width:50px;">#</th>
                                <th>Client</th>
                                <th class="text-center">Arrivée</th>
                                <th class="text-center">Départ</th>
                                <th class="text-center">Nuits</th>
                                <th class="text-center">Montant</th>
                                <th class="text-center">Commission(15%)</th>
                                <th class="text-center">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations as $index => $item)
                            @php $r = $item['reservation']; @endphp
                            <tr class="
                                    @if($r->statut == 'acceptée') table-success
                                    @elseif($r->statut == 'refusée') table-danger
                                    @else table-warning @endif">

                                <td>
                                    <span class="badge bg-secondary">{{ $index + 1 }}</span>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center "
                                            style="width:34px; height:34px; font-size:0.78rem; font-weight:bold;">
                                            {{ strtoupper(substr($r->nom, 0, 1)) }}{{ strtoupper(substr($r->prenom, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold small">{{ $r->nom }} {{ $r->prenom }}</div>
                                            <small class="text-muted">
                                                <i class="bi bi-phone me-1"></i>{{ $r->telephone ?? '—' }}
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center small">
                                    <i class="bi bi-calendar3 text-primary me-1"></i>
                                    {{ \Carbon\Carbon::parse($r->date_debut)->format('d/m/Y') }}
                                </td>

                                <td class="text-center small">
                                    <i class="bi bi-calendar3 text-danger me-1"></i>
                                    {{ \Carbon\Carbon::parse($r->date_fin)->format('d/m/Y') }}
                                </td>

                                <td class="text-center">
                                    <span class="badge bg-white border text-dark">
                                        {{ $item['nuits'] }} nuit{{ $item['nuits'] > 1 ? 's' : '' }}
                                    </span>
                                </td>

                                <td class="text-center fw-bold small">
                                    <span class="
                                            @if($r->statut == 'acceptée') text-success
                                            @elseif($r->statut == 'refusée') text-danger
                                            @else text-warning @endif">
                                        {{ number_format($item['montant'], 0, ',', ' ') }} FCFA
                                    </span>
                                </td>
                                <td>
                                    @php
                                        $commission = $item['montant'] * 0.15;
                                    @endphp
                                    <span class="text-info small">
                                        {{ number_format($commission, 0, ',', ' ') }} FCFA
                                    </span>
                                </td>

                                <td class="text-center">
                                    @if($r->statut == 'acceptée')
                                    <span class="badge bg-success"> Acceptée</span>
                                    @elseif($r->statut == 'refusée')
                                    <span class="badge bg-danger">Refusée</span>
                                    @else
                                    <span class="badge bg-warning text-dark"> En attente</span>
                                    @endif
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                    Aucune réservation pour cet appartement.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                        @if($reservations->count() > 0)
                        <tfoot class="table-dark">
                            <tr>
                                <td colspan="5" class="text-end fw-bold small">Total encaissé :</td>
                                <td class="text-center fw-bold text-success">
                                    {{ number_format($totalEncaisse, 0, ',', ' ') }} FCFA
                                </td>
                                <td>
                                    <span class="text-info small">
                                        {{ number_format($totalCommission, 0, ',', ' ') }} FCFA
                                    </span>

                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@endsection