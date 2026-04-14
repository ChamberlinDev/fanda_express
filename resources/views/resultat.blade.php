@extends('clients.layout.app')

@section('content')
<div class="container my-5">

    {{-- 🔹 En-tête --}}
    <small class="text-muted d-block mb-2">
        @if($type === 'hotel')
            <i class="bi bi-building mr-1"></i> Hôtel
        @else
            <i class="bi bi-house-door mr-1"></i> Appartement
        @endif
        &nbsp;·&nbsp;
        <i class="bi bi-cash-stack mr-1"></i>
    </small>

    {{-- 🔹 Message contextuel --}}
    @if(!$localisation_trouvee)
        <div class="alert alert-info border-0 mb-4">
            <i class="bi bi-info-circle mr-2"></i>
            Aucun {{ $type === 'hotel' ? 'hôtel' : 'appartement' }} trouvé à
            <strong>« {{ $localisation }} »</strong>.<br>
            Voici d'autres options correspondant à votre budget.
        </div>
    @else
        <div class="alert alert-success border-0 mb-4">
            <i class="bi bi-check-circle mr-2"></i>
            <strong>{{ $total }}</strong>
            {{ $type === 'hotel' ? 'hôtel(s)' : 'appartement(s)' }}
            trouvé(s) à <strong>« {{ $localisation }} »</strong>
        </div>
    @endif

    {{-- 🔹 Aucun résultat --}}
    @if($total === 0)
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body text-center py-5">
                <i class="bi bi-emoji-frown" style="font-size: 4rem; color: #ccc;"></i>
                <h5 class="mt-4 font-weight-bold text-muted">Aucun hébergement trouvé</h5>
                <p class="text-muted mb-4">
                    Essayez une autre localisation ou augmentez votre budget.
                </p>
                <a href="{{ url('/') }}" class="btn btn-primary px-4">
                    <i class="bi bi-search mr-1"></i> Nouvelle recherche
                </a>
            </div>
        </div>
    @else

        {{-- 🔹 Résultats --}}
        <div class="row">
            @foreach($resultats as $item)

                @php
                    $images = $item->images ? json_decode($item->images, true) : [];
                    $firstImage = !empty($images)
                        ? Storage::url($images[0])
                        : asset('images/no-image.png');

                    $equipList = $item->equipements
                        ? array_map('trim', explode(',', $item->equipements))
                        : [];
                @endphp

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-lg overflow-hidden">

                        {{-- Image --}}
                        <div style="position: relative;">
                            <img src="{{ $firstImage }}"
                                 class="card-img-top"
                                 style="height: 210px; object-fit: cover;"
                                 alt="{{ $item->nom }}">

                            {{-- Badge type --}}
                            <span class="badge badge-primary"
                                  style="position:absolute; top:12px; left:12px; font-size:0.8rem;">
                                @if($type === 'hotel')
                                    <i class="bi bi-building mr-1"></i> Hôtel
                                @else
                                    <i class="bi bi-house-door mr-1"></i> Appartement
                                @endif
                            </span>

                            {{-- Nombre de photos --}}
                            @if(count($images) > 1)
                                <span class="badge badge-dark"
                                      style="position:absolute; bottom:10px; right:10px;">
                                    <i class="bi bi-images mr-1"></i> {{ count($images) }}
                                </span>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">

                            {{-- Nom --}}
                            <h5 class="font-weight-bold mb-1">{{ $item->nom }}</h5>

                            {{-- Localisation --}}
                            <p class="text-muted small mb-2">
                                <i class="bi bi-geo-alt-fill text-danger mr-1"></i>
                                {{ $item->ville }}
                                @if($item->adresse)
                                    &mdash; {{ Str::limit($item->adresse, 40) }}
                                @endif
                            </p>

                            {{-- Prix --}}
                            @if(isset($item->prix))
                                <!-- <p class="font-weight-bold text-success mb-2">
                                    {{ number_format($item->prix, 0, ',', ' ') }} FCFA
                                    <small class="text-muted">/ nuit</small>
                                </p> -->
                            @endif

                            {{-- Description --}}
                            @if($item->description)
                                <p class="text-muted small mb-3" style="flex-grow:1;">
                                    {{ Str::limit($item->description, 90) }}
                                </p>
                            @endif

                            {{-- Équipements --}}
                            @if(!empty($equipList))
                                <div class="mb-3">
                                    @foreach(array_slice($equipList, 0, 3) as $eq)
                                        <span class="badge badge-light border mr-1 mb-1">
                                            <i class="bi bi-check-circle-fill text-success mr-1"></i>{{ $eq }}
                                        </span>
                                    @endforeach

                                    @if(count($equipList) > 3)
                                        <span class="badge badge-secondary">
                                            +{{ count($equipList) - 3 }}
                                        </span>
                                    @endif
                                </div>
                            @endif

                            {{-- Bouton détail --}}
                            <a href="{{ route($type === 'hotel' ? 'hotel.show' : 'appartement.show', $item->id) }}"
                               class="btn btn-primary btn-block mt-auto">
                                <i class="bi bi-eye mr-1"></i> Voir le détail
                            </a>

                        </div>
                    </div>
                </div>

            @endforeach
        </div>

        {{-- Pagination --}}
        @if($resultats instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="d-flex justify-content-center mt-4">
                {{ $resultats->appends(request()->query())->links() }}
            </div>
        @endif

    @endif

</div>
@endsection