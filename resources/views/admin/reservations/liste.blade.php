@extends('admin.layout.app')

@section('content')
<div class="container-fluid my-5 px-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h1 class="fw-bold text-primary">
            <i class="bi bi-calendar-check me-2"></i>Gestion des réservations
        </h1>
        <p class="text-muted mb-0">
            Gérez les réservations hôtels et appartements en temps réel.
        </p>
    </div>

    <!-- STATS -->
    @php
        $en_attente = $reservations->where('statut','en attente')->count() + $reservations_appart->where('statut','en attente')->count();
        $acceptees = $reservations->where('statut','acceptée')->count() + $reservations_appart->where('statut','acceptée')->count();
        $refusees = $reservations->where('statut','refusée')->count() + $reservations_appart->where('statut','refusée')->count();
    @endphp

    <div class="row g-3 mb-4">
        @foreach([
            ['title'=>'En attente','value'=>$en_attente,'color'=>'warning','icon'=>'clock-history'],
            ['title'=>'Acceptées','value'=>$acceptees,'color'=>'success','icon'=>'check-circle'],
            ['title'=>'Refusées','value'=>$refusees,'color'=>'danger','icon'=>'x-circle'],
        ] as $stat)
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center">
                <div class="card-body">
                    <i class="bi bi-{{ $stat['icon'] }} fs-1 text-{{ $stat['color'] }}"></i>
                    <h6 class="mt-2 text-muted">{{ $stat['title'] }}</h6>
                    <h2 class="fw-bold text-{{ $stat['color'] }}">{{ $stat['value'] }}</h2>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- SEARCH -->
    <div class="mb-3 d-flex justify-content-end">
        <input type="text" class="form-control w-25" placeholder=" Rechercher...">
    </div>

    

    <!-- TABLE COMPONENT -->
    @php
        function badgeStatut($statut){
            return match($statut){
                'acceptée' => 'success',
                'refusée' => 'danger',
                default => 'warning'
            };
        }
    @endphp

    <!-- HOTEL TABLE -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            Réservations Hôtel
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Code de reservation</th>
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
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->code_reservation }}</td>
                        <td>
                            <strong>{{ $r->nom }} {{ $r->prenom }}</strong><br>
                            <small class="text-muted">{{ $r->email }}</small>
                        </td>

                        <td>{{ $r->chambre->nom ?? '-' }}</td>
                        <td>{{ $r->chambre->hotel->nom ?? '-' }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($r->date_debut)->format('d/m') }}
                            →
                            {{ \Carbon\Carbon::parse($r->date_fin)->format('d/m') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($r->date_debut)->diffInDays($r->date_fin) }}
                        </td>

                        <td>
                            <form action="{{ route('reservations_update_statut',$r->id) }}" method="POST">
                                @csrf @method('PUT')
                                <select name="statut" class="form-select form-select-sm text-{{ badgeStatut($r->statut) }}"
                                        onchange="this.form.submit()">
                                    <option value="en attente" @selected($r->statut=='en attente')>En attente</option>
                                    <option value="acceptée" @selected($r->statut=='acceptée')>Acceptée</option>
                                    <option value="refusée" @selected($r->statut=='refusée')>Refusée</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">Aucune donnée</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- APPART TABLE -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Réservations Appartement
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Code de reservation</th>
                        <th>Client</th>
                        <th>Appartement</th>
                        <th>Dates</th>
                        <th>Nuits</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($reservations_appart as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->code_reservation }}</td>

                        <td>
                            <strong>{{ $r->nom }} {{ $r->prenom }}</strong><br>
                            <small class="text-muted">{{ $r->email }}</small>
                        </td>

                        <td>{{ $r->appartement->nom ?? '-' }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($r->date_debut)->format('d/m') }}
                            →
                            {{ \Carbon\Carbon::parse($r->date_fin)->format('d/m') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($r->date_debut)->diffInDays($r->date_fin) }}
                        </td>

                        <td>
                            <form action="{{ route('reservations_appart_update_statut',$r->id) }}" method="POST">
                                @csrf @method('PUT')
                                <select name="statut" class="form-select form-select-sm text-{{ badgeStatut($r->statut) }}"
                                        onchange="this.form.submit()">
                                    <option value="en attente" @selected($r->statut=='en attente')>En attente</option>
                                    <option value="acceptée" @selected($r->statut=='acceptée')>Acceptée</option>
                                    <option value="refusée" @selected($r->statut=='refusée')>Refusée</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">Aucune donnée</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection