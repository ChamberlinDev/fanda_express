@extends('superadmin.layout.app')
@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 fw-bold">
            <i class="bi bi-people"></i> Liste des utilisateurs
            <span class="badge bg-primary text-white ms-2">{{ $users->count() }}</span>
        </h2>
        <a href="/inscription" class="btn btn-success">
            Nouvel utilisateur
        </a>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- Table --}}
    <div class="card border-0 shadow">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="table-dark text-dark">
                        <th scope="col" class="ps-3" style="width: 60px;">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rôle</th>
                        <th scope="col" class="text-center">Statut</th>
                        <th scope="col" class="text-center" style="width: 220px;">Actions</th>
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
                            'admin' => 'bg-primary text-white',
                            'user' => 'bg-primary',
                            ];
                            @endphp
                            @forelse($user->getRoleNames() as $role)
                            <span class="badge rounded-pill  {{ $roleColors[$role] ?? 'bg-secondary' }} text-white">
                                {{ ucfirst($role) }}
                            </span>
                            @empty
                            <span class="badge rounded-pill bg-info text-white">Établissement</span>
                            @endforelse
                        </td>

                        {{-- Statut --}}
                        <td class="text-center text-white">
                            @if($user->is_blocked)
                            <span class="badge bg-danger rounded-pill">🔒 Bloqué</span>
                            @else
                            <span class="badge bg-success rounded-pill"> Actif</span>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1 flex-wrap">

                                {{-- Modifier --}}
                                <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier">
                                    <i class="bi bi-pencil-square me-1"></i>
                                </a>

                                {{-- Bloquer / Débloquer --}}
                                @if($user->is_blocked)
                                <form action="#" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Débloquer"
                                        onclick="return confirm('Débloquer {{ $user->nom_complet }} ?')">
                                        Débloquer
                                    </button>
                                </form>
                                @else
                                <form action="#" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-warning" title="Bloquer"
                                        onclick="return confirm('Bloquer {{ $user->nom_complet }} ?')">
                                        <i class="bi bi-lock me-1"></i> 
                                    </button>
                                </form>
                                @endif

                                {{-- Supprimer --}}
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer"
                                        onclick="return confirm('Supprimer définitivement {{ $user->nom_complet }} ?')">
                                        <i class="bi bi-trash me-1"></i>

                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-5">
                            <div class="fs-4 mb-2"></div>
                            Aucun utilisateur trouvé.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator && $users->hasPages())
        <div class="card-footer bg-white d-flex justify-content-center border-top">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</div>
@endsection