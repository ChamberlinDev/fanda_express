@extends('admin.layout.app')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Hotels</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalhotels ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Reservations</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalReservations ?? 0 }}</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Clients</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalClients ?? 0 }}</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Appartements</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAppartements ?? 0 }}</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Invoice Example -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Apercu des reservations d'hotel</h6>
                    <a class="m-0 float-right btn btn-danger btn-sm" href="#">Parcourir <i
                            class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" style="width: 60px;">#</th>
                                <th>Client</th>
                                <th>Téléphone</th>
                                <th>Chambre</th>
                                <th>Hôtel</th>
                                <th class="text-center">Arrivée</th>
                                <th class="text-center">Départ</th>
                                <th class="text-center">Nuits</th>
                                <th class="text-center" style="min-width: 160px;">Statut</th>
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
                                    <span class="badge bg-info text-white ">
                                        {{ $reservation->chambre->nom ?? '—' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary text-white">
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
                                                En attente
                                            </option>
                                            <option value="acceptée" {{ $reservation->statut == 'acceptée' ? 'selected' : '' }}>
                                                Acceptée
                                            </option>
                                            <option value="refusée" {{ $reservation->statut == 'refusée' ? 'selected' : '' }}>
                                                Refusée
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
                <div class="card-footer"></div>
            </div>
        </div>


        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Mes etablissements</h6>

                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="small text-gray-500">Hotels
                            <div class="small float-right"><b> {{ $totalhotels ?? 0 }}</b></div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <div class="small text-gray-500">Appartement
                            <div class="small float-right"><b>{{ $totalAppartements ?? 0 }}</b></div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

<hr>

        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Apercu des reservations d'appartements</h6>
                    <a class="m-0 float-right btn btn-danger btn-sm" href="#">Parcourir <i
                            class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" style="width: 60px;">#</th>
                                <th>Client</th>
                                <th>Téléphone</th>
                                <th>Appartement</th>
                                <th class="text-center">Arrivée</th>
                                <th class="text-center">Départ</th>
                                <th class="text-center">Nuits</th>
                                <th class="text-center" style="min-width: 160px;">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations_appart as $reservation)
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
                                    <span class="badge bg-info text-white ">
                                        {{ $reservation->appartement->nom ?? '—' }}
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
                                                En attente
                                            </option>
                                            <option value="acceptée" {{ $reservation->statut == 'acceptée' ? 'selected' : '' }}>
                                                Acceptée
                                            </option>
                                            <option value="refusée" {{ $reservation->statut == 'refusée' ? 'selected' : '' }}>
                                                Refusée
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
                <div class="card-footer"></div>
            </div>
        </div>









        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">


            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Recap Report</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>



    @endsection