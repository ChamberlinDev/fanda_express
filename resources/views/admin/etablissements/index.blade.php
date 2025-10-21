@extends('admin.layout.app')
@section('content')
<div class="container my-5">

    {{-- Titre --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Nos établissements</h2>
        <div>
            <a href="/ajouter_eta" class="btn btn-primary me-2">
                <i class="bi bi-plus-circle"></i> Ajouter un hôtel
            </a>
            <a href="/ajouter_appart" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Ajouter un appartement
            </a>
        </div>
    </div>
    <hr>

    {{-- Grille des cartes --}}

    <h4 class="text-center"> Hotel</h4>
    <div class="row g-4">
        @forelse($hotels as $hotel)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card shadow-sm h-100 border-0">

                {{-- Image --}}
                @php
                $images = json_decode($hotel->images, true);
                @endphp

                @if(!empty($images))
                <div id="carousel-{{ $hotel->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($images as $key => $img)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $img) }}"
                                class="d-block w-100"
                                alt="{{ $hotel->nom }}"
                                style="height:200px; object-fit:cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <img src="{{ asset('images/default-hotel.jpg') }}"
                    class="card-img-top"
                    alt="{{ $hotel->nom }}"
                    style="height:200px; object-fit:cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
                @endif


                <div class="card-body">
                    <h5 class="card-title text-primary text-truncate" title="{{ $hotel->nom }}">
                        {{ $hotel->nom }}
                    </h5>
                    <p class="card-text small mb-1">
                        <strong>Ville :</strong> {{ $hotel->ville }}
                    </p>
                    <p class="card-text small mb-1">
                        <strong>Adresse :</strong> {{ $hotel->adresse }}
                    </p>
                    <p class="card-text small text-muted">
                        <strong>Équipements :</strong> {{ $hotel->equipements ?? 'Aucun' }}
                    </p>
                </div>

                {{-- Footer avec boutons --}}
                <div class="card-footer bg-white border-0 text-center">
                    <div class="btn-group" role="group">
                        <!-- Voir -->
                        <a href="{{route('etablissements.show', $hotel->id)}}" class="btn btn-sm btn-outline-secondary" title="Voir">
                            <i class="bi bi-eye"></i>
                        </a>

                        <!-- Modifier -->
                        <a href="#" class="btn btn-sm btn-outline-warning" title="Modifier">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <!-- Supprimer -->
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-sm btn-outline-danger"
                                title="Supprimer"
                                onclick="return confirm('Supprimer cet établissement ?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Aucun hôtel ou appartement trouvé.
            </div>
        </div>
        @endforelse
    </div>

    <hr>

    <h4 class="text-center">Appartement</h4>

    <div class="row g-4">
        @forelse($apparts as $appart)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card shadow-sm h-100 border-0">

                {{-- Image --}}
                <a href="#" target="_blank">
                    <img src="{{ $appart->image ? asset('storage/'.$appart->image) : asset('images/default-appart.jpg') }}"
                        class="card-img-top"
                        alt="{{ $appart->nom }}"
                        style="height:200px; object-fit:cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
                </a>

                <div class="card-body">
                    <h5 class="card-title text-primary text-truncate" title="{{ $appart->nom }}">
                        {{ $appart->nom }}
                    </h5>
                    <p class="card-text small mb-1">
                        <strong>Ville :</strong> {{ $appart->ville }}
                    </p>
                    <p class="card-text small mb-1">
                        <strong>Adresse :</strong> {{ $appart->adresse }}
                    </p>
                    <p class="card-text small text-muted">
                        <strong>Équipements :</strong> {{ $appart->equipements ?? 'Aucun' }}
                    </p>
                </div>

                {{-- Footer avec boutons --}}
                <div class="card-footer bg-white border-0 text-center">
                    <div class="btn-group" role="group">
                        <!-- Voir -->
                        <a href="/show_appart/{{$appart->id}}" class="btn btn-sm btn-outline-secondary" title="Voir">
                            <i class="bi bi-eye"></i>
                        </a>

                        <!-- Modifier -->
                        <a href="#" class="btn btn-sm btn-outline-warning" title="Modifier">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <!-- Supprimer -->
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-sm btn-outline-danger"
                                title="Supprimer"
                                onclick="return confirm('Supprimer cet établissement ?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Aucun hôtel ou appartement trouvé.
            </div>
        </div>
        @endforelse
    </div>
    {{-- Pagination centrée --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $apparts->links() }}
    </div>


</div>
@endsection