@extends('admin.layout.app')
@section('content')



<div class="row mb-4">
    <div class="col-12">
        <h1 class="display-5 fw-bold text-primary mb-3">
            <i class="bi bi-file-earmark-text me-2"></i>Créer un rapport
        </h1>
        <p class="lead text-muted">
            Utilisez ce formulaire pour créer un nouveau rapport financier. Sélectionnez les critères souhaités et générez des rapports détaillés pour une meilleure analyse de vos données financières.
        </p>
    </div>

     <div class="row mb-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 p-3 bg-light rounded-3 border">
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('admin.rapport.create') }}" class="btn btn-info mx-2">
                        <i class="bi bi-plus-circle me-1 mx-2"></i> Personnaliser le rapport    
                    </a>
                   
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-file-earmark-pdf me-1 mx-2"></i> Generer un rapport PDF
                    </a>
                </div>
               
            </div>
    </div>



    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" style="width: 60px;">#</th>
                        <th><i class="bi bi-person me-1"></i>Type de rapport</th>
                        <th><i class="bi bi-telephone me-1"></i>Montant entrées</th>
                        <th><i class="bi bi-door-closed me-1"></i>Montant sorties</th>
                        <th><i class="bi bi-building me-1"></i>Description</th>
                        <th class="text-center"><i class="bi bi-calendar-event me-1"></i>Date</th>
                        <th class="text-center"><i class="bi bi-calendar-event me-1"></i>Créé le</th>
                        <th><i class="bi bi-user"></i>Par </th>
                        <th class="text-center" style="min-width: 160px;"><i class="bi bi-gear me-1"></i>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($rapports as $rapport)
                    <tr>
                        <td>{{ $rapport->id }}</td>
                        <td>{{ $rapport->type_rapport }}</td>
                        <td>{{ number_format($rapport->montant_entrees, 2) }} FCFA</td>
                        <td>{{ number_format($rapport->montant_sorties, 2) }} FCFA</td>
                        <td>{{ $rapport->description }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($rapport->date_rapport)->format('d/m/Y') }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($rapport->created_at)->format('d/m/Y H:i') }}</td>
                        <td>{{ $rapport->user ? $rapport->user->nom_complet : 'Inconnu' }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye me-1"></i> Voir
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-warning">
                                <i class="bi bi-pencil me-1"></i> Modifier
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash me-1"></i> Supprimer
                            </a>
                        </td>
                    </tr>

                    @endforeach
                    

                </tbody>
            </table>
        </div>
    </div>


   



@endsection