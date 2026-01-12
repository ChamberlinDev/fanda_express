@extends('admin.layout.app')

@section('content')

<h4 class="mb-4">Espace de travail</h4>

<div class="row">
    {{-- ================== TABLE Reservations ================== --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4><strong>Liste des reservations</strong></h4>
            </div>

            <div class="card-body">
                <a href="#" class="btn btn-sm btn-success mb-3">
                    Ajouter une reservation
                </a>

                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom client</th>
                            <th>Email du client</th>
                            <th>durée</th>
                            <th>statut</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                <span class="badge text-white">

                                </span>
                            </td>

                            <td>
                                <span class="badge bg-primary text-white"></span>
                            </td>

                            <td class="text-center">
                                {{-- Modifier utilisateur --}}
                                <a href="#" class="btn btn-sm btn-warning">
                                    Modifier
                                </a>

                                {{-- Activer / Désactiver --}}
                                <form action="#"
                                    method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class=""
                                        onclick="return confirm('Confirmer cette action ?')">
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Aucun utilisateur trouvé
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ================== TABLE CLIENTS ================== --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h4> <strong>Liste des clients</strong>
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Telephone</th>
                            <th>email</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Aucun dossier disponible
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection