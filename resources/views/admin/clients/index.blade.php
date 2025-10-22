@extends('admin.layout.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-3">Liste des clients</h1>
    <p class="text-center text-muted">
       Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio provident voluptatem dolorum sunt ea totam quam, vero neque officiis sint. Consectetur nesciunt rerum obcaecati asperiores a eligendi nihil veritatis temporibus.
    </p>

    <div class="d-flex justify-content-between align-items-center my-4">
        <a href="#" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Ajouter un client
        </a>
        <a href="#" class="btn btn-secondary">
            <i class="bi bi-download me-1"></i> Télécharger
        </a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Telephone</th>
                        
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                           
                            <td>
                                <!-- <a href="#" class="btn btn-success btn-sm">
                                    <i class="bi bi-check-circle"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-circle"></i>
                                </a> -->
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" class="text-center text-muted py-3">
                                Aucune réservation enregistrée pour le moment.
                            </td>
                        </tr>
                    
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
