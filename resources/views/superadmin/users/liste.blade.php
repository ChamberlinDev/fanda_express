@extends('superadmin.layout.app')
@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 fw-bold">
            <i class="bi bi-people"></i> Liste des utilisateurs
            <span class="badge bg-primary text-white ms-2">{{ $users->count() }}</span>
        </h2>
        <a href="/inscription" class="btn btn-primary">
            Ajouter un utilisateur
        </a>
    </div>
    {{-- Stats Cards --}}
    <div class="row mb-4">

        {{-- Total utilisateurs --}}
        <div class="col-md-3">
            <div class="card text-white border-0 shadow-sm" style="background: linear-gradient(45deg,#4e73df,#224abe);">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase small">Utilisateurs</div>
                        <div class="fs-4 fw-bold">{{ number_format($users->count()) }}</div>
                    </div>
                    <i class="bi bi-people fs-1 opacity-50"></i>
                </div>
            </div>
        </div>

        {{-- Actifs --}}
        <div class="col-md-3">
            <div class="card text-white border-0 shadow-sm" style="background: linear-gradient(45deg,#1cc88a,#17a673);">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase small">Actifs</div>
                        <div class="fs-4 fw-bold">
                            {{ number_format($users->where('is_blocked', false)->count()) }}
                        </div>
                    </div>
                    <i class="bi bi-check-circle fs-1 opacity-50"></i>
                </div>
            </div>
        </div>

        {{-- Bloqués --}}
        <div class="col-md-3">
            <div class="card text-white border-0 shadow-sm" style="background: linear-gradient(45deg,#e74a3b,#c0392b);">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase small">Bloqués</div>
                        <div class="fs-4 fw-bold">
                            {{ number_format($users->where('is_blocked', true)->count()) }}
                        </div>
                    </div>
                    <i class="bi bi-lock fs-1 opacity-50"></i>
                </div>
            </div>
        </div>

        {{-- Admins --}}
        <div class="col-md-3">
            <div class="card text-white border-0 shadow-sm" style="background: linear-gradient(45deg,#f6c23e,#dda20a);">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase small">Admins</div>
                        <div class="fs-4 fw-bold">
                            {{ number_format($users->filter(fn($u) => $u->hasRole('admin'))->count()) }}
                        </div>
                    </div>
                    <i class="bi bi-shield-lock fs-1 opacity-50"></i>
                </div>
            </div>
        </div>

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
                            <span class="badge bg-danger rounded-pill"> Bloqué</span>
                            @else
                            <span class="badge bg-success rounded-pill"> Actif</span>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1 flex-wrap">

                                {{-- Modifier --}}
                                <a href="{{ route('superadmin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary" title="Modifier">
                                    <i class="bi bi-pencil-square me-1"></i>
                                </a>

                                {{-- Bloquer / Débloquer --}}
                                @if($user->is_blocked)
                                <form action="{{ route('superadmin.users.debloquer', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Débloquer"
                                        onclick="return confirm('Débloquer {{ $user->nom_complet }} ?')">
                                        Débloquer
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('superadmin.users.bloquer', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-warning" title="Bloquer"
                                        onclick="return confirm('Bloquer {{ $user->nom_complet }} ?')">
                                        <i class="bi bi-lock me-1"></i>
                                    </button>
                                </form>
                                @endif

                                {{-- Supprimer --}}
                                <form action="{{ route('superadmin.users.supprimer', $user->id) }}" method="POST">
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