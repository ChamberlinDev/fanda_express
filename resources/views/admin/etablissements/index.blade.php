@extends('admin.layout.app')
@section('content')
<div class="container my-5">

    {{-- Bouton Ajouter --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Nos établissements</h2>
        <a href="/ajouter_eta" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Ajouter un établissement
        </a>
    </div>
    <hr>

    {{-- Grille des cartes --}}
    <div class="row g-4">
        @forelse($hotels as $hotel)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                {{-- Image --}}
                <a href="#" target="_blank">
                    <img src="{{ $hotel->image ? asset('storage/'.$hotel->image) : asset('images/default-hotel.jpg') }}"
                        class="card-img-top img-fluid"
                        alt="{{ $hotel->nom }}"
                        style="height:200px; object-fit:cover;">
                </a>

                <div class="card-body">
                    <h5 class="card-title">{{ $hotel->nom }}</h5>
                    <p class="card-text">
                        <strong>Ville :</strong> {{ $hotel->ville }} <br>
                        <strong>Adresse :</strong> {{ $hotel->adresse }} <br>
                        <strong>Équipements :</strong> {{ $hotel->equipements ?? 'Aucun' }}
                    </p>
                </div>

                {{-- Footer avec boutons --}}
                <div class="card-footer bg-white border-top-0 d-flex justify-content-center gap-2">
                    <!-- Voir -->
                    <a href="#" class="btn btn-secondary" title="Voir">
                        <i class="bi bi-eye"></i>
                    </a>

                    <!-- Modifier -->
                    <a href="#" class="btn btn-warning" title="Modifier">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <!-- Supprimer -->
                    <form action="#" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="Supprimer"
                            onclick="return confirm('Supprimer cet établissement ?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Aucun hôtel trouvé.</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $hotels->links() }}
    </div>

</div>
@endsection
