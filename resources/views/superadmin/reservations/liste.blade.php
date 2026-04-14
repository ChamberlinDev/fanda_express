@extends('superadmin.layout.app')

@section('content')

<div class="container-fluid py-4 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1"> Liste des établissements</h2>
            <p class="text-muted small mb-0">
                {{ count($hotels) + count($apparts) }} établissement(s) au total
            </p>
        </div>
    </div>

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-primary border-2 text-center py-3">
                <div class="fw-bold text-primary display-6">{{ count($hotels) }}</div>
                <small class="text-muted">Hôtels</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-info border-2 text-center py-3">
                <div class="fw-bold text-info display-6">{{ count($apparts) }}</div>
                <small class="text-muted">Appartements</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success border-2 text-center py-3">
                <div class="fw-bold text-success display-6">{{ count($hotels) + count($apparts) }}</div>
                <small class="text-muted">Total établissements</small>
            </div>
        </div>
    </div>

    {{-- Onglets --}}
    <ul class="nav nav-tabs mb-4" id="etablissementTabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#hotels">
                <i class="bi bi-building me-1"></i>Hôtels
                <span class="badge bg-primary ms-1 text-white">{{ count($hotels) }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#apparts">
                <i class="bi bi-house-door me-1"></i>Appartements
                <span class="badge bg-info ms-1 text-white">{{ count($apparts) }}</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">

        {{-- TAB HOTELS --}}
        <div class="tab-pane fade show active" id="hotels">
            @if(count($hotels) > 0)
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">
                        <i class="bi bi-building me-2"></i>Liste des hôtels
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Photo</th>
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
                                $firstImage = (!empty($hotelImages) && is_array($hotelImages))
                                ? $hotelImages[0] : null;
                                @endphp
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary text-white ">{{ $index + 1 }}</span>
                                    </td>
                                    <td>
                                        @if($firstImage)
                                        <img src="{{ asset('storage/' . $firstImage) }}"
                                            style="width:55px; height:42px; object-fit:cover; border-radius:8px;"
                                            alt="{{ $hotel->nom }}">
                                        @else
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                            style="width:55px; height:42px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="fw-bold">{{ $hotel->nom }}</td>
                                    <td>
                                        <i class="bi bi-geo-alt text-danger me-1"></i>
                                        {{ $hotel->ville ?? '—' }}
                                    </td>
                                    <td class="text-muted small">{{ $hotel->adresse ?? '—' }}</td>
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
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="{{ route('superadmin.details', $hotel->id) }}"
                                                class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <!-- <a href="#"
                                                class="btn btn-outline-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a> -->
                                            <!-- <form action="#" method="POST"
                                                onsubmit="return confirm('Supprimer {{ $hotel->nom }} ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form> -->
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <div class="card border-0 shadow-sm text-center py-5">
                <i class="bi bi-building fs-1 text-muted d-block mb-3"></i>
                <p class="text-muted">Aucun hôtel enregistré.</p>
            </div>
            @endif
        </div>

        {{-- TAB APPARTEMENTS --}}
        <div class="tab-pane fade" id="apparts">
            @if(count($apparts) > 0)
            <div class="card shadow border-0">
                <div class="card-header bg-info text-white py-3">
                    <h5 class="mb-0">
                        <i class="bi bi-house-door me-2"></i>Liste des appartements
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Photo</th>
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
                                $appartImages = json_decode($appart->images, true);
                                $firstAppartImage = (!empty($appartImages) && is_array($appartImages))
                                ? $appartImages[0] : null;
                                @endphp
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary">{{ $index + 1 }}</span>
                                    </td>
                                    <td>
                                        @if($firstAppartImage)
                                        <img src="{{ asset('storage/' . $firstAppartImage) }}"
                                            style="width:55px; height:42px; object-fit:cover; border-radius:8px;"
                                            alt="{{ $appart->nom }}">
                                        @else
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                            style="width:55px; height:42px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="fw-bold">{{ $appart->nom }}</td>
                                    <td>
                                        <i class="bi bi-geo-alt text-danger me-1"></i>
                                        {{ $appart->ville ?? '—' }}
                                    </td>
                                    <td class="text-muted small">{{ $appart->adresse ?? '—' }}</td>
                                    <td class="text-center">
                                        @if(isset($appart->prix))
                                        <span class="badge bg-success">
                                            {{ number_format($appart->prix, 0, ',', ' ') }} FCFA
                                        </span>
                                        @else
                                        <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success">
                                            {{ $appart->reservations_count ?? 0 }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="/details-appart/{{ $appart->id }}"
                                                class="btn btn-outline-info btn-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="#"
                                                class="btn btn-outline-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="#" method="POST"
                                                onsubmit="return confirm('Supprimer {{ $appart->nom }} ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <div class="card border-0 shadow-sm text-center py-5">
                <i class="bi bi-house-door fs-1 text-muted d-block mb-3"></i>
                <p class="text-muted">Aucun appartement enregistré.</p>
            </div>
            @endif
        </div>

    </div>
</div>

@endsection