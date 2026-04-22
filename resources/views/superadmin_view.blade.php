@extends('superadmin.layout.app')

@section('content')
<h4 class="mb-4 text-dark text-center">Espace de travail</h4>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-stats card-warning">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-3">
                                <div class="icon-big text-center">
                                    <i class="la la-users"></i>
                                </div>
                            </div>
                            <div class="col-7 ">
                                <div class="numbers">
                                    <h3 class="card-category">Utilisateurs</h3>
                                    <h4 class="card-title">{{ number_format($stats['utilisateurs']) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stats card-success">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-3">
                                <div class="icon-big text-center">
                                    <i class="la la-bar-chart"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <h3 class="card-category">Hotels</h3>
                                    <h4 class="card-title">{{ number_format($stats['hotels']) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stats card-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="icon-big text-center">
                                    <i class="la la-home"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <h3 class="card-category">Appartements</h3>
                                    <h4 class="card-title">{{ number_format($stats['appartements']) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="card card-stats card-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="icon-big text-center">
                                    <i class="la la-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <h3 class="card-category">Reservation(hotels)</h3>
                                    <h4 class="card-title">{{ number_format($stats['reservations-hotel']) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card card-stats card-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="icon-big text-center">
                                    <i class="la la-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <h3 class="card-category">Reservation(appart)</h3>
                                    <h4 class="card-title">{{ number_format($stats['reservations-appart']) }}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
             <div class="col-md-4 mt-3">
                <div class="card card-stats card-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="icon-big text-center">
                                    <i class="la la-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <h3 class="card-category">Blogs</h3>
                                    <h4 class="card-title">{{ number_format($stats['blogs']) }}</h4>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
<hr>

<div class="container-fluid">
    {{-- ================== TABLE Reservations ================== --}}
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4><strong>Liste des utilisateurs</strong></h4>
            </div>

            <div class="card-body">
                <a href="/inscription" class="btn btn-sm btn-success mb-3">
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
                                'admin' => 'bg-success text-white',
                                'user' => 'bg-primary text-white',
                                ];
                                @endphp
                                @forelse($user->getRoleNames() as $role)
                                <span class="badge rounded-pill {{ $roleColors[$role] ?? 'bg-secondary' }}">
                                    {{ ucfirst($role) }}
                                </span>
                                @empty
                                <span class="badge rounded-pill bg-info text-white">Établissement</span>
                                @endforelse
                            </td>

                            {{-- Statut --}}
                            <td class="text-center">
                                @if($user->is_blocked)
                                <span class="badge bg-danger rounded-pill text-white">Bloqué</span>
                                @else
                                <span class="badge bg-success rounded-pill text-white">Actif</span>
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
                <a href="{{ route('superadmin.users') }}" class="btn btn-sm btn-outline-warning mt-3">Parcourir les utilisateurs</a>

            </div>
        </div>
    </div>
    <hr>

    {{-- ================== TABLE CLIENTS ================== --}}
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h4> <strong>Liste des etablissements</strong>
                </h4>
            </div>

            <div class="card-body">
                <a href="{{ route('superadmin.hotels') }}" class="btn btn-sm btn-outline-primary mt-3">Parcourir les hotels</a>
                <a href="{{ route('superadmin.appartements') }}" class="btn btn-sm btn-outline-success mt-3">Parcourir les appartements</a>

            </div>
        </div>
    </div>
</div>

@endsection