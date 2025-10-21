@extends('admin.layout.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-3">Liste des réservations</h1>
    <p class="text-center text-muted">
        Cette section vous permet de visualiser les réservations effectuées.  
        Vous pouvez décider d'accepter ou de refuser une demande.  
        Un email sera envoyé automatiquement au client selon votre réponse.
    </p>

    <div class="d-flex justify-content-between align-items-center my-4">
        <a href="{{ route('chambres.create', 1) }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Faire une réservation
        </a>
        <a href="/fichier.pdf" class="btn btn-secondary">
            <i class="bi bi-download me-1"></i> Télécharger
        </a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Chambre</th>
                        <th scope="col">Hôtel</th>
                        <th scope="col">Date début</th>
                        <th scope="col">Date fin</th>
                        <th scope="col">Nombre de nuits</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->nom }} {{ $reservation->prenom }}</td>
                            <td>+242 XX XXX XX XX</td>
                            <td>{{ $reservation->chambre->nom ?? '—' }}</td>
                            <td>{{ $reservation->chambre->hotel->nom ?? '—' }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($reservation->date_debut)->diffInDays(\Carbon\Carbon::parse($reservation->date_fin)) }}
                            </td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">
                                    <i class="bi bi-check-circle"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-3">
                                Aucune réservation enregistrée pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.table-hover tbody tr:hover {
    background-color: #f5f8ff;
}
</style>
@endsection
