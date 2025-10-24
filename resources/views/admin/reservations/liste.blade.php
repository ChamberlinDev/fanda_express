@extends('admin.layout.app')

@section('content')
<div class="container my-5">
    <!-- Header Section -->
    <h1 class="text-center mb-3 text-primary">Liste des réservations</h1>
    <p class="text-center text-muted lead">
        Cette section vous permet de visualiser les réservations effectuées.
        Vous pouvez décider d'accepter ou de refuser une demande.
        Un email sera envoyé automatiquement au client selon votre réponse.
    </p>

    <!-- Actions Row - Made responsive with flex-column and bg-light -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center my-4 p-3 bg-light rounded-3 shadow-sm">
        <a href="{{ route('chambres.create', 1) }}" class="btn btn-primary mb-2 mb-md-0 d-block d-md-inline-block">
            <i class="bi bi-plus-circle me-1"></i> Faire une réservation
        </a>
        <a href="/fichier.pdf" class="btn btn-outline-secondary d-block d-md-inline-block">
            <i class="bi bi-download me-1"></i> Télécharger le PDF
        </a>
    </div>

    <!-- Reservations Table Card -->
    <div class="card shadow-lg border-0">
        <div class="card-body p-0">
            <!-- Table responsive for better mobile view -->
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle text-center mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Client</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Chambre</th>
                            <th scope="col">Hôtel</th>
                            <th scope="col" class="text-nowrap">Date début</th>
                            <th scope="col" class="text-nowrap">Date fin</th>
                            <th scope="col" class="text-nowrap">Nuits</th>
                            <th scope="col" class="text-nowrap">Statut/Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                            <tr>
                                <td class="fw-bold">{{ $reservation->id }}</td>
                                <td>{{ $reservation->nom }} {{ $reservation->prenom }}</td>
                                <td>+242 XX XXX XX XX</td>
                                <td class="text-primary">{{ $reservation->chambre->nom ?? '—' }}</td>
                                <td class="text-secondary">{{ $reservation->chambre->hotel->nom ?? '—' }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }}</td>
                                <td class="fw-bold">
                                    {{ \Carbon\Carbon::parse($reservation->date_debut)->diffInDays(\Carbon\Carbon::parse($reservation->date_fin)) }}
                                </td>
                                <td>
                                    <!-- Button Group for cleaner actions -->
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Actions de réservation">
                                        <a href="#" class="btn btn-success" data-bs-toggle="tooltip" title="Accepter">
                                            <i class="bi bi-check-circle"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="tooltip" title="Refuser">
                                            <i class="bi bi-x-circle"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-5 bg-light">
                                    <i class="bi bi-info-circle fs-4 me-2"></i>
                                    Aucune réservation enregistrée pour le moment.
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