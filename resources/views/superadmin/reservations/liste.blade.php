@extends('superadmin.layout.app')

@section('content')

<div class="container-fluid py-4 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Liste des établissements</h2>
            <p class="text-muted small mb-0">
                {{ $hotels->count() + $apparts->count() }} établissement(s) au total
            </p>
        </div>
    </div>

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-primary border-2 text-center py-3">
                <div class="fw-bold text-primary display-6">{{ $hotels->count() }}</div>
                <small class="text-muted">Hôtels</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-info border-2 text-center py-3">
                <div class="fw-bold text-info display-6">{{ $apparts->count() }}</div>
                <small class="text-muted">Appartements</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success border-2 text-center py-3">
                <div class="fw-bold text-success display-6">{{ $hotels->count() + $apparts->count() }}</div>
                <small class="text-muted">Total établissements</small>
            </div>
        </div>
    </div>

    {{-- Onglets -- compatibles BS4 et BS5 --}}
    <ul class="nav nav-tabs mb-0" id="etablissementTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active"
               id="hotels-tab"
               data-toggle="tab"
               data-bs-toggle="tab"
               href="#hotels"
               role="tab">
                Hôtels
                <span class="badge bg-primary text-white ms-1">{{ $hotels->count() }}</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link"
               id="apparts-tab"
               data-toggle="tab"
               data-bs-toggle="tab"
               href="#apparts"
               role="tab">
                Appartements
                <span class="badge bg-info text-white ms-1">{{ $apparts->count() }}</span>
            </a>
        </li>
    </ul>

    <div class="tab-content border border-top-0 rounded-bottom p-0 mb-4" id="etablissementTabContent">

        {{-- TAB HOTELS --}}
        <div class="tab-pane fade show active" id="hotels" role="tabpanel">
            @if($hotels->count() > 0)
                <div class="card shadow border-0 rounded-0 rounded-bottom">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0">Liste des hôtels</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:50px;">#</th>
                                        <th style="width:70px;">Photo</th>
                                        <th>Nom</th>
                                        <th>Ville</th>
                                        <th>Adresse</th>
                                        <th class="text-center">Chambres</th>
                                        <th class="text-center">Réservations</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hotels as $index => $hotel)
                                    @php
                                        $hotelImages = json_decode($hotel->images, true);
                                        $firstImage  = (!empty($hotelImages) && is_array($hotelImages))
                                                        ? $hotelImages[0] : null;
                                    @endphp
                                    <tr>
                                        <td>
                                            <span class="badge bg-secondary text-white">{{ $index + 1 }}</span>
                                        </td>
                                        <td>
                                            @if($firstImage)
                                                <img src="{{ asset('storage/' . $firstImage) }}"
                                                     style="width:55px; height:42px; object-fit:cover; border-radius:8px;"
                                                     alt="{{ $hotel->nom }}">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                     style="width:55px; height:42px;">
                                                    <small class="text-muted">—</small>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="fw-bold">{{ $hotel->nom }}</td>
                                        <td class="small">{{ $hotel->ville ?? '—' }}</td>
                                        <td class="small text-muted">{{ $hotel->adresse ?? '—' }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-primary text-white">
                                                {{ $hotel->chambres_count ?? 0 }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-success text-white">
                                                {{ $hotel->reservations_count ?? 0 }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('superadmin.details', $hotel->id) }}"
                                               class="btn btn-outline-primary btn-sm">
                                                Voir
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5 text-muted">
                    <p>Aucun hôtel enregistré.</p>
                </div>
            @endif
        </div>

        {{-- TAB APPARTEMENTS --}}
        <div class="tab-pane fade" id="apparts" role="tabpanel">
            @if($apparts->count() > 0)
                <div class="card shadow border-0 rounded-0 rounded-bottom">
                    <div class="card-header bg-info text-white py-3">
                        <h5 class="mb-0">Liste des appartements</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:50px;">#</th>
                                        <th style="width:70px;">Photo</th>
                                        <th>Nom</th>
                                        <th>Ville</th>
                                        <th>Adresse</th>
                                        <th class="text-center">Prix / nuit</th>
                                        <th class="text-center">Réservations</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($apparts as $index => $appart)
                                    @php
                                        $appartImages     = json_decode($appart->images, true);
                                        $firstAppartImage = (!empty($appartImages) && is_array($appartImages))
                                                            ? $appartImages[0] : null;
                                    @endphp
                                    <tr>
                                        <td>
                                            <span class="badge bg-secondary text-white">{{ $index + 1 }}</span>
                                        </td>
                                        <td>
                                            @if($firstAppartImage)
                                               <a href="{{ asset('storage/' . $firstAppartImage) }}"> <img src="{{ asset('storage/' . $firstAppartImage) }}"
                                                     style="width:55px; height:42px; object-fit:cover; border-radius:8px;"
                                                     alt="{{ $appart->nom }}"></a>
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                     style="width:55px; height:42px;">
                                                    <small class="text-muted">—</small>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="fw-bold">{{ $appart->nom }}</td>
                                        <td class="small">{{ $appart->ville ?? '—' }}</td>
                                        <td class="small text-muted">{{ $appart->adresse ?? '—' }}</td>
                                        <td class="text-center">
                                            @if(isset($appart->prix))
                                                <span class="badge bg-success text-white">
                                                    {{ number_format($appart->prix, 0, ',', ' ') }} FCFA
                                                </span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-success text-white">
                                                {{ $appart->reservations_count ?? 0 }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('superadmin.details.appart', $appart->id) }}"
                                               class="btn btn-outline-info btn-sm">
                                                Voir
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5 text-muted">
                    <p>Aucun appartement enregistré.</p>
                </div>
            @endif
        </div>

    </div>
</div>

{{-- Script de secours si les onglets ne fonctionnent pas --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tabs = document.querySelectorAll('#etablissementTabs .nav-link');
        tabs.forEach(function (tab) {
            tab.addEventListener('click', function (e) {
                e.preventDefault();

                // Désactiver tous les onglets
                tabs.forEach(function (t) { t.classList.remove('active'); });
                document.querySelectorAll('.tab-pane').forEach(function (p) {
                    p.classList.remove('show', 'active');
                });

                // Activer l'onglet cliqué
                this.classList.add('active');
                var target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.classList.add('show', 'active');
                }
            });
        });
    });
</script>

@endsection