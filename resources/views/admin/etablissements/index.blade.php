@extends('admin.layout.app')
@section('content')
<div class="container my-5">

    {{-- En-tête avec dégradé --}}
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h1 class="mb-1 fw-bold" style="color: #1a1a2e;">Nos Établissements</h1>
                <p class="text-muted mb-0">Gérez vos hôtels et appartements</p>
            </div>
            <div class="d-flex gap-2">
                <a href="/ajouter_eta" class="btn btn-primary shadow-sm px-4">
                    <i class="bi bi-building-add me-2"></i>Ajouter un hôtel
                </a>
                <a href="/ajouter_appart" class="btn btn-success shadow-sm px-4">
                    <i class="bi bi-house-add me-2"></i>Ajouter un appartement
                </a>
            </div>
        </div>
        <div style="height: 3px; background: linear-gradient(90deg, #0d6efd 0%, #198754 100%); border-radius: 10px;"></div>
    </div>

    {{-- Section Hôtels --}}
    <div class="mb-5">
        <div class="d-flex align-items-center mb-4">
            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                <i class="bi bi-building text-white fs-4"></i>
            </div>
            <div>
                <h3 class="mb-0 fw-semibold">Hôtels</h3>
                <small class="text-muted">{{ $hotels->count() }} établissement(s)</small>
            </div>
        </div>

        <div class="row g-4">
            @forelse($hotels as $hotel)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm hover-card" style="transition: all 0.3s ease; overflow: hidden;">
                    
                    {{-- Badge statut --}}
                    <div class="position-absolute top-0 end-0 m-2" style="z-index: 10;">
                        <span class="badge bg-primary">Hôtel</span>
                    </div>

                    {{-- Carousel d'images --}}
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
                                    style="height: 220px; object-fit: cover;">
                            </div>
                            @endforeach
                        </div>
                        @if(count($images) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $hotel->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $hotel->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                        @endif
                        <div class="carousel-indicators" style="bottom: 5px;">
                            @foreach($images as $key => $img)
                            <button type="button" data-bs-target="#carousel-{{ $hotel->id }}" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></button>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <img src="{{ asset('images/default-hotel.jpg') }}"
                        class="card-img-top"
                        alt="{{ $hotel->nom }}"
                        style="height: 220px; object-fit: cover;">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-3" style="color: #1a1a2e;">
                            {{ $hotel->nom }}
                        </h5>
                        
                        <div class="mb-2">
                            <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                            <span class="small">{{ $hotel->ville }}</span>
                        </div>
                        
                        <div class="mb-2">
                            <i class="bi bi-pin-map text-secondary me-2"></i>
                            <span class="small text-muted">{{ Str::limit($hotel->adresse, 30) }}</span>
                        </div>

                        @if($hotel->equipements)
                        <div class="mt-2 pt-2 border-top">
                            <small class="text-muted">
                                <i class="bi bi-gear-fill me-1"></i>
                                {{ Str::limit($hotel->equipements, 40) }}
                            </small>
                        </div>
                        @endif

                        {{-- Boutons d'action --}}
                        <div class="mt-auto pt-3">
                            <div class="d-grid gap-2">
                                <div class="btn-group" role="group">
                                    <a href="{{route('etablissements.show', $hotel->id)}}" 
                                       class="btn btn-sm btn-outline-primary flex-fill" 
                                       title="Voir les détails">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/modif_form/{{$hotel->id}}" 
                                       class="btn btn-sm btn-outline-warning flex-fill" 
                                       title="Modifier">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('supp_hotel', $hotel->id) }}" method="POST" class="d-inline flex-fill">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-outline-danger w-100"
                                            title="Supprimer"
                                            onclick="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer cet hôtel ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info border-0 shadow-sm text-center py-4">
                    <i class="bi bi-info-circle fs-3 mb-2"></i>
                    <p class="mb-0">Aucun hôtel enregistré pour le moment.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Séparateur --}}
    <div class="my-5">
        <div style="height: 2px; background: linear-gradient(90deg, transparent 0%, #dee2e6 50%, transparent 100%);"></div>
    </div>

    {{-- Section Appartements --}}
    <div class="mb-5">
        <div class="d-flex align-items-center mb-4">
            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                <i class="bi bi-house-door text-white fs-4"></i>
            </div>
            <div>
                <h3 class="mb-0 fw-semibold">Appartements</h3>
                <small class="text-muted">{{ $apparts->count() }} établissement(s)</small>
            </div>
        </div>

        <div class="row g-4">
            @forelse($apparts as $appart)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm hover-card" style="transition: all 0.3s ease; overflow: hidden;">
                    
                    {{-- Badge statut --}}
                    <div class="position-absolute top-0 end-0 m-2" style="z-index: 10;">
                        <span class="badge bg-success">Appartement</span>
                    </div>

                    {{-- Image --}}
                    @php
                    $images = $appart->images ? json_decode($appart->images, true) : [];
                    @endphp

                    @if(!empty($images))
                    <img src="{{ asset('storage/'.$images[0]) }}" 
                         alt="{{ $appart->nom }}" 
                         class="card-img-top" 
                         style="height: 220px; object-fit: cover;">
                    @else
                    <img src="{{ asset('images/default-appart.jpg') }}" 
                         class="card-img-top" 
                         style="height: 220px; object-fit: cover;">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-3" style="color: #1a1a2e;">
                            {{ $appart->nom }}
                        </h5>
                        
                        <div class="mb-2">
                            <i class="bi bi-geo-alt-fill text-success me-2"></i>
                            <span class="small">{{ $appart->ville }}</span>
                        </div>
                        
                        <div class="mb-2">
                            <i class="bi bi-pin-map text-secondary me-2"></i>
                            <span class="small text-muted">{{ Str::limit($appart->adresse, 30) }}</span>
                        </div>

                        @if($appart->equipements)
                        <div class="mt-2 pt-2 border-top">
                            <small class="text-muted">
                                <i class="bi bi-gear-fill me-1"></i>
                                {{ Str::limit($appart->equipements, 40) }}
                            </small>
                        </div>
                        @endif

                        {{-- Boutons d'action --}}
                        <div class="mt-auto pt-3">
                            <div class="d-grid gap-2">
                                <div class="btn-group" role="group">
                                    <a href="{{route('show_appart', $appart->id)}}" 
                                       class="btn btn-sm btn-outline-primary flex-fill" 
                                       title="Voir les détails">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/modif_edit/{{$appart->id}}" 
                                       class="btn btn-sm btn-outline-warning flex-fill" 
                                       title="Modifier">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('supp_appart', $appart->id) }}" method="POST" class="d-inline flex-fill">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-outline-danger w-100"
                                            title="Supprimer"
                                            onclick="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer cet appartement ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info border-0 shadow-sm text-center py-4">
                    <i class="bi bi-info-circle fs-3 mb-2"></i>
                    <p class="mb-0">Aucun appartement enregistré pour le moment.</p>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($apparts->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $apparts->links() }}
        </div>
        @endif
    </div>

</div>

<style>
    .hover-card {
        border-radius: 12px;
    }
    
    .hover-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15) !important;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0,0,0,0.5);
        border-radius: 50%;
        padding: 10px;
    }

    .btn-group .btn {
        font-size: 0.875rem;
        padding: 0.5rem;
    }

    .badge {
        font-weight: 500;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.75rem;
    }

    .card-title {
        font-size: 1.1rem;
        line-height: 1.4;
        min-height: 2.8rem;
    }
</style>
@endsection