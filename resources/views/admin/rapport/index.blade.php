@extends('admin.layout.app')
@section('content')

<div class="container-fluid my-5 px-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="display-5 fw-bold text-primary mb-1">
                <i class="bi bi-file-earmark-bar-graph me-2"></i>Rapports financiers
            </h1>
            <p class="text-muted mb-0">Historique de tous les rapports générés.</p>
        </div>
        <a href="{{ route('admin.rapport.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Nouveau rapport
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0">Liste des rapports</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Type</th>
                            <th>Période</th>
                            <th class="text-center">Encaissé</th>
                            <th class="text-center">Perdu</th>
                            <th class="text-center">Bénéfice net</th>
                            <th>Généré par</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rapports as $rapport)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-secondary">{{ $rapport->id }}</span>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ ucfirst($rapport->type_rapport) }}</span>
                            </td>
                            <td>
                                <i class="bi bi-calendar3 text-muted me-1"></i>
                                {{ $rapport->periode }}
                            </td>
                            <td class="text-center fw-bold text-success">
                                {{ number_format($rapport->montant_encaisse, 0, ',', ' ') }} FCFA
                            </td>
                            <td class="text-center fw-bold text-danger">
                                {{ number_format($rapport->montant_perdu, 0, ',', ' ') }} FCFA
                            </td>
                            <td class="text-center fw-bold">
                                <span class="{{ $rapport->benefice_net >= 0 ? 'text-success' : 'text-danger' }}">
                                    {{ number_format($rapport->benefice_net, 0, ',', ' ') }} FCFA
                                </span>
                            </td>
                            <td>
                                <i class="bi bi-person text-muted me-1"></i>
                                {{ $rapport->user->name ?? '—' }}
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.rapport.destroy', $rapport->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Supprimer ce rapport ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                <h5>Aucun rapport généré</h5>
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