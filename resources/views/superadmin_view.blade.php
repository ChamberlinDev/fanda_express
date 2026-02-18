@extends('superadmin.layout.app')

@section('content')

<h4 class="mb-4">Espace de travail</h4>

<div class="row">
    {{-- ================== TABLE Reservations ================== --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4><strong>Liste des utilisateurs</strong></h4>
            </div>

            <div class="card-body">
                <a href="#" class="btn btn-sm btn-success mb-3">
                    Ajouter un utilisateur  
                </a>

                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom utilisateur</th>
                            <th>Email utilisateur</th>
                            <th>Email</th>
                            <th>statut</th>
                        </tr>
                    </thead>
                             <tbody>
                    @forelse($users as $user)
                    <tr class="{{ $user->is_blocked ? 'table-secondary text-muted' : '' }}">

                        {{-- ID --}}
                        <td class="ps-3 text-muted fw-light">{{ $user->id }}</td>

                        {{-- Nom --}}
                        <td>
                            <span class="fw-semibold">{{ $user->nom_complet }}</span>
                        </td>

                        {{-- Email --}}
                        <td>
                            <a href="mailto:{{ $user->email }}" class="text-decoration-none text-secondary">
                                {{ $user->email }}
                            </a>
                        </td>

                        {{-- Rôle --}}
                        <td>
                            @php
                            $roleColors = [
                            'superadmin' => 'bg-danger',
                            'admin' => 'bg-warning text-dark',
                            'user' => 'bg-primary',
                            ];
                            @endphp
                            @forelse($user->getRoleNames() as $role)
                            <span class="badge rounded-pill {{ $roleColors[$role] ?? 'bg-secondary' }}">
                                {{ ucfirst($role) }}
                            </span>
                            @empty
                            <span class="badge rounded-pill bg-info text-dark">Établissement</span>
                            @endforelse
                        </td>

                        {{-- Statut --}}
                        <td class="text-center">
                            @if($user->is_blocked)
                            <span class="badge bg-danger rounded-pill">🔒 Bloqué</span>
                            @else
                            <span class="badge bg-success rounded-pill"> Actif</span>
                            @endif
                        </td>

                       
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-5">
                            <div class="fs-4 mb-2">😕</div>
                            Aucun utilisateur trouvé.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

                  
                </table>
                                <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-secondary mt-3">Parcourir les utilisateurs</a>

            </div>
        </div>
    </div>

    {{-- ================== TABLE CLIENTS ================== --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h4> <strong>Liste des hotels</strong>
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom hotel</th>
                            <th>Telephone</th>
                            <th>email</th>
                            <th>Nombre de chambres</th>
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