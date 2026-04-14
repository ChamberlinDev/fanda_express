@extends('admin.layout.app')
@section('content')

<div class="container mt-5">

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold text-primary mb-3">
                <i class="bi bi-file-earmark-text me-2"></i>Créer un rapport
            </h1>
            <p class="lead text-muted">
                Sélectionnez la période et le type de rapport. Les montants seront
                <strong>calculés automatiquement</strong> depuis les réservations.
            </p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card border-primary border-2 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">
                        <i class="bi bi-sliders me-2"></i>Paramètres du rapport
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.rapport.store') }}" method="POST">
                        @csrf

                        {{-- Type de rapport --}}
                        <div class="mb-4">
                            <label for="type_rapport" class="form-label fw-bold">
                                <i class="bi bi-tag me-1 text-primary"></i>Type de rapport
                            </label>
                            <select name="type_rapport" id="type_rapport"
                                    class="form-select @error('type_rapport') is-invalid @enderror" required>
                                <option value="">-- Sélectionnez --</option>
                                <option value="journalier"   {{ old('type_rapport') == 'journalier'   ? 'selected' : '' }}>Journalier</option>
                                <option value="hebdomadaire" {{ old('type_rapport') == 'hebdomadaire' ? 'selected' : '' }}>Hebdomadaire</option>
                                <option value="mensuel"      {{ old('type_rapport') == 'mensuel'      ? 'selected' : '' }}>Mensuel</option>
                                <option value="annuel"       {{ old('type_rapport') == 'annuel'       ? 'selected' : '' }}>Annuel</option>
                            </select>
                            @error('type_rapport')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Période --}}
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="date_debut" class="form-label fw-bold">
                                    <i class="bi bi-calendar3 me-1 text-success"></i>Date de début
                                </label>
                                <input type="date" name="date_debut" id="date_debut"
                                       class="form-control @error('date_debut') is-invalid @enderror"
                                       value="{{ old('date_debut') }}" required>
                                @error('date_debut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="date_fin" class="form-label fw-bold">
                                    <i class="bi bi-calendar3 me-1 text-danger"></i>Date de fin
                                </label>
                                <input type="date" name="date_fin" id="date_fin"
                                       class="form-control @error('date_fin') is-invalid @enderror"
                                       value="{{ old('date_fin') }}" required>
                                @error('date_fin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Info calcul auto --}}
                        <div class="alert alert-info border-0 mb-4">
                            <i class="bi bi-info-circle me-2"></i>
                            Seront calculés automatiquement :
                            <ul class="mb-0 mt-1 small">
                                <li>Montant encaissé (réservations <strong>acceptées</strong>)</li>
                                <li>Montant perdu (réservations <strong>refusées</strong>)</li>
                            </ul>
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">
                                <i class="bi bi-pencil me-1 text-secondary"></i>
                                Notes <span class="text-muted fw-normal">(optionnel)</span>
                            </label>
                            <textarea name="description" id="description"
                                      class="form-control" rows="3"
                                      placeholder="Observations ou remarques...">{{ old('description') }}</textarea>
                        </div>

                        {{-- Boutons --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-file-earmark-check me-1"></i>Générer le rapport
                            </button>
                            <a href="{{ route('admin.rapport.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Annuler
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection