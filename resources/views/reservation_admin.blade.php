@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <h2 class="text-center">Ajouter une réservation (Hôtel)</h2>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf

                        <!-- Chambre (seulement celles de l'hôtel de l'admin) -->
                        <div class="mb-3">
                            <label for="chambre_id" class="form-label">Chambre *</label>
                            <select class="form-select @error('chambre_id') is-invalid @enderror" 
                                    id="chambre_id" name="chambre_id" required>
                                <option value="">-- Sélectionner une chambre --</option>
                                @foreach($chambres as $chambre)
                                    <option value="{{ $chambre->id }}">
                                        {{ $chambre->nom }} - {{ $chambre->type }} 
                                        ({{ number_format($chambre->prix, 0, ',', ' ') }} FCFA)
                                    </option>
                                @endforeach
                            </select>
                            @error('chambre_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Infos client -->
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du client *</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom du client *</label>
                            <input type="text" class="form-control" id="client_prenom" name="prenom" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email du client *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone *</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" required>
                        </div>

                        <!-- Dates -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_debut" class="form-label">Date d'arrivée *</label>
                                <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date_fin" class="form-label">Date de départ *</label>
                                <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                            </div>
                        </div>

                        <!-- Statut -->
                        <div class="mb-3">
                            <label for="statut" class="form-label">Statut *</label>
                            <select class="form-select" id="statut" name="statut" required>
                                <option value="en_attente">En attente</option>
                                <option value="confirmee">Confirmée</option>
                                <option value="annulee">Annulée</option>
                            </select>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                        </div> -->

                        <!-- Actions -->
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-secondary">Retour</a>
                            <button type="submit" class="btn btn-primary">Enregistrer la réservation</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
