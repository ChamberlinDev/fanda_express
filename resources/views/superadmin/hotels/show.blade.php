@extends('superadmin.layout.app')

@section('content')
<div class="container-fluid py-4 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-building text-primary me-2"></i>{{ $hotel->nom }}
            </h2>
            <p class="text-muted small mb-0">
                <i class="bi bi-geo-alt text-danger me-1"></i>
                {{ $hotel->ville }} — {{ $hotel->adresse }}
            </p>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i>Retour
        </a>
    </div>

    {{-- Image hôtel --}}
    @php
    $images = json_decode($hotel->images, true);
    $firstImage = (!empty($images) && is_array($images)) ? $images[0] : null;
    @endphp
    @if($firstImage)
    <div class="mb-4">
        <img src="{{ asset('storage/' . $firstImage) }}"
            class="rounded-3 shadow-sm w-100"
            style="height: 280px; object-fit: cover;"
            alt="{{ $hotel->nom }}">
    </div>
    @endif

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-primary border-2 text-center py-3">
                <i class="bi bi-door-open fs-3 text-primary mb-1"></i>
                <div class="fw-bold display-6 text-primary">{{ $hotel->chambres->count() }}</div>
                <small class="text-muted">Chambres</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-warning border-2 text-center py-3">
                <i class="bi bi-clock-history fs-3 text-warning mb-1"></i>
                <div class="fw-bold display-6 text-warning">
                    {{ collect($reservations)->where('reservation.statut', 'en attente')->count() }}
                </div>
                <small class="text-muted">En attente</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success border-2 text-center py-3">
                <i class="bi bi-check-circle fs-3 text-success mb-1"></i>
                <div class="fw-bold display-6 text-success">
                    {{ collect($reservations)->where('reservation.statut', 'acceptée')->count() }}
                </div>
                <small class="text-muted">Acceptées</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success border-2 text-center py-3">
                <i class="bi bi-cash-coin fs-3 text-success mb-1"></i>
                <div class="fw-bold text-success" style="font-size: 1.4rem;">
                    {{ number_format($totalEncaisse, 0, ',', ' ') }}
                </div>
                <small class="text-muted">FCFA encaissés</small>
            </div>
        </div>


    </div>

    {{-- Onglets --}}
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#tab-reservations">
                <i class="bi bi-calendar-check me-1"></i>Réservations
                <span class="badge bg-primary ms-1">{{ $totalReservations }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-chambres">
                <i class="bi bi-door-open me-1"></i>Chambres
                <span class="badge bg-secondary ms-1">{{ $hotel->chambres->count() }}</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">

        {{-- TAB RESERVATIONS --}}
        <div class="tab-pane fade show active" id="tab-reservations">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-calendar-check me-2"></i>Réservations de l'hôtel
                    </h5>
                    <span class="badge bg-white text-primary">
                        Total encaissé : {{ number_format($totalEncaisse, 0, ',', ' ') }} FCFA
                    </span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center" style="width:50px;">#</th>
                                    <th>Client</th>
                                    <th>Téléphone</th>
                                    <th>Chambre</th>
                                    <th class="text-center">Arrivée</th>
                                    <th class="text-center">Départ</th>
                                    <th class="text-center">Nuits</th>
                                    <th class="text-center">Prix / nuit</th>
                                    <th class="text-center">Montant total</th>
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
                                    @else table-warning
                                    @endif">

                                    <td class="text-center">
                                        <span class="badge bg-secondary">{{ $index + 1 }}</span>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width:36px; height:36px; font-size:0.8rem; font-weight:bold; flex-shrink:0;">
                                                {{ strtoupper(substr($r->nom, 0, 1)) }}{{ strtoupper(substr($r->prenom, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold small">{{ $r->nom }} {{ $r->prenom }}</div>
                                                <small class="text-muted">{{ $r->email ?? '—' }}</small>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="small">
                                        <i class="bi bi-phone text-muted me-1"></i>
                                        {{ $r->telephone ?? '—' }}
                                    </td>

                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $item['chambre']->nom }}
                                        </span>
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

                                    <td class="text-center small">
                                        {{ number_format($item['chambre']->prix, 0, ',', ' ') }} FCFA
                                    </td>

                                    <td class="text-center fw-bold">
                                        <span class="
                                            @if($r->statut == 'acceptée') text-success
                                            @elseif($r->statut == 'refusée') text-danger
                                            @else text-warning
                                            @endif">
                                            {{ number_format($item['montant'], 0, ',', ' ') }} FCFA
                                        </span>
                                    </td>
                                    <td class="text-center fw-bold text-primary">

                                        @php
                                        $commission = $item['montant'] * 0.15;
                                        @endphp
                                        {{ number_format($commission, 0, ',', ' ') }} FCFA
                                    </td>

                                    <td class="text-center">
                                        @if($r->statut == 'acceptée')
                                        <span class="badge bg-success"> Acceptée</span>
                                        @elseif($r->statut == 'refusée')
                                        <span class="badge bg-danger"> Refusée</span>
                                        @else
                                        <span class="badge bg-warning text-dark"> En attente</span>
                                        @endif
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                        Aucune réservation pour cet hôtel.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                            {{-- Pied total --}}
                            @if(count($reservations) > 0)
                            <tfoot class="table-dark">
                                <tr>
                                    <td colspan="8" class="text-end fw-bold">Total encaissé :</td>
                                    <td class="text-center fw-bold text-success">
                                        {{ number_format($totalEncaisse, 0, ',', ' ') }} FCFA
                                    </td>
                                    <td class="text-center fw-bold text-primary">
                                        {{ number_format($totalCommission, 0, ',', ' ') }} FCFA
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

        {{-- TAB CHAMBRES --}}
        <div class="tab-pane fade" id="tab-chambres">
            <div class="card shadow border-0">
                <div class="card-header bg-secondary text-white py-3">
                    <h5 class="mb-0">
                        <i class="bi bi-door-open me-2"></i>Chambres de l'hôtel
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:50px;">#</th>
                                    <th>Photo</th>
                                    <th>Type</th>
                                    <th class="text-center">Capacité</th>
                                    <th class="text-center">Prix / nuit</th>
                                    <th class="text-center">Réservations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($hotel->chambres as $index => $chambre)
                                @php
                                $imgs = $chambre->images ? json_decode($chambre->images, true) : [];
                                $thumb = !empty($imgs) ? $imgs[0] : null;
                                @endphp
                                <tr>
                                    <td><span class="badge bg-secondary">{{ $index + 1 }}</span></td>
                                    <td>
                                        @if($thumb)
                                        <img src="{{ asset('storage/' . $thumb) }}"
                                            style="width:55px; height:42px; object-fit:cover; border-radius:8px;"
                                            alt="{{ $chambre->nom }}">
                                        @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="width:55px; height:42px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="fw-bold">{{ $chambre->nom }}</td>
                                    <td class="text-center">
                                        <i class="bi bi-people text-info me-1"></i>
                                        {{ $chambre->capacite }} pers.
                                    </td>
                                    <td class="text-center fw-bold text-success">
                                        {{ number_format($chambre->prix, 0, ',', ' ') }} FCFA
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-primary">
                                            {{ $chambre->reservations->count() }} résa
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        Aucune chambre enregistrée.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection