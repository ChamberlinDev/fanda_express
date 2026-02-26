@extends('admin.layout.app')
@section('content')




<div class="container mt-5 ">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold text-primary mb-3">
                <i class="bi bi-file-earmark-text me-2"></i>Créer un rapport
            </h1>
            <p class="lead text-muted">
                Utilisez ce formulaire pour créer un nouveau rapport financier. Sélectionnez les critères souhaités et générez des rapports détaillés pour une meilleure analyse de vos données financières.
            </p>
        </div>
        

   <!-- formulaire de création de rapport -->
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-6">
            <div class="card border-primary border-2">
                <div class="card-body">
                    <form action="{{ route('admin.rapport.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="type" class="form-label">Type de rapport</label>
                            <select name="type_rapport" id="type" class="form-select" required>
                                <option value="">Sélectionnez un type de rapport</option>
                                <option value="journalier">Journalier</option>
                                <option value="hebdomadaire">Hebdomadaire</option>
                                <option value="mensuel">Mensuel</option>
                                <option value="annuel">Annuel</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="montant_entre" class="form-label">Montant entre</label>
                            <input type="text" name="montant_entrees" id="montant_entre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="montant_sortie" class="form-label">Montant sortie</label>
                            <input type="text" name="montant_sorties" id="montant_sortie" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_rapport" class="form-label">Date du rapport</label>
                            <input type="date" name="date_rapport" id="date_rapport" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-file-earmark-text me-1"></i>Creer le rapport
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection