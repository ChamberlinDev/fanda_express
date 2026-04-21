@extends('admin.layout.app')
@section('content')

<div class="container-fluid px-4 py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Mes établissements</h2>
            <p class="text-muted small mb-0">
                {{ $hotels->count() + $apparts->count() }} établissement(s) au total
            </p>
        </div>
        <div class="d-flex gap-2">
            <a href="/ajouter_eta" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-building-add me-1"></i> Ajouter un hôtel
            </a>
            <a href="/ajouter_appart" class="btn btn-success btn-sm px-3">
                <i class="bi bi-house-add me-1"></i> Ajouter un appartement
            </a>
        </div>
    </div>

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-primary border-2 text-center py-3">
                <div class="fw-bold display-6 text-primary">{{ $hotels->count() }}</div>
                <small class="text-muted">Hôtels</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success border-2 text-center py-3">
                <div class="fw-bold display-6 text-success">{{ $apparts->count() }}</div>
                <small class="text-muted">Appartements</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-secondary border-2 text-center py-3">
                <div class="fw-bold display-6 text-secondary">{{ $hotels->count() + $apparts->count() }}</div>
                <small class="text-muted">Total</small>
            </div>
        </div>
    </div>

    {{-- Onglets --}}
    <ul class="nav nav-tabs mb-0" id="etablissementTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active fw-semibold"
               data-toggle="tab" data-bs-toggle="tab"
               href="#hotels" role="tab">
                <i class="bi bi-building me-1"></i> Hôtels
                <span class="badge bg-primary ms-1">{{ $hotels->count() }}</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link fw-semibold"
               data-toggle="tab" data-bs-toggle="tab"
               href="#apparts" role="tab">
                <i class="bi bi-house-door me-1"></i> Appartements
                <span class="badge bg-success ms-1">{{ $apparts->count() }}</span>
            </a>
        </li>
    </ul>

    <div class="tab-content border border-top-0 rounded-bottom bg-white p-4 mb-4">

        {{-- TAB HOTELS --}}
        <div class="tab-pane fade show active" id="hotels" role="tabpanel">
            @if($hotels->count() > 0)
                <div class="row g-4">
                    @foreach($hotels as $hotel)
                    @php
                        $images = json_decode($hotel->images, true);
                        $images = is_array($images) ? $images : [];
                    @endphp
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm" style="border-radius:14px; overflow:hidden; transition: transform 0.2s, box-shadow 0.2s;"
                             onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 12px 24px rgba(0,0,0,0.12)'"
                             onmouseout="this.style.transform='';this.style.boxShadow=''">

                            {{-- Badge --}}
                            <div class="position-absolute top-0 end-0 m-2" style="z-index:10;">
                                <span class="badge bg-primary text-white" style="border-radius:20px;">Hôtel</span>
                            </div>

                            {{-- Carousel --}}
                            @if(!empty($images))
                                <div id="carousel-hotel-{{ $hotel->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($images as $key => $img)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $img) }}"
                                                     class="d-block w-100"
                                                     style="height:200px; object-fit:cover;"
                                                     alt="{{ $hotel->nom }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    @if(count($images) > 1)
                                        <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carousel-hotel-{{ $hotel->id }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                                data-bs-target="#carousel-hotel-{{ $hotel->id }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </button>
                                    @endif
                                </div>
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="height:200px;">
                                    <i class="bi bi-building text-muted" style="font-size:3rem;"></i>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column p-3">

                                <h6 class="fw-bold mb-2">{{ $hotel->nom }}</h6>

                                <p class="small text-muted mb-1">
                                    <i class="bi bi-geo-alt-fill text-primary me-1"></i>{{ $hotel->ville }}
                                </p>
                                <p class="small text-muted mb-2">
                                    <i class="bi bi-pin-map text-secondary me-1"></i>{{ Str::limit($hotel->adresse, 35) }}
                                </p>

                                @if($hotel->equipements)
                                    <p class="small text-muted border-top pt-2 mb-3">
                                        <i class="bi bi-check2-circle text-success me-1"></i>
                                        {{ Str::limit($hotel->equipements, 45) }}
                                    </p>
                                @endif

                                {{-- Chambres count --}}
                                <div class="d-flex gap-2 mb-3 mt-auto">
                                    <span class="badge bg-primary text-white bg-opacity-10 text-primary">
                                        <i class="bi bi-door-open me-1"></i>
                                        {{ $hotel->chambres ? $hotel->chambres->count() : 0 }} chambre(s)
                                    </span>
                                </div>

                                {{-- Actions --}}
                                <div class="btn-group w-100" role="group">
                                    <a href="{{ route('etablissements.show', $hotel->id) }}"
                                       class="btn btn-sm btn-outline-primary" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/modif_form/{{ $hotel->id }}"
                                       class="btn btn-sm btn-outline-warning" title="Modifier">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('supp_hotel', $hotel->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                style="border-radius: 0 4px 4px 0;"
                                                onclick="return confirm('Supprimer {{ $hotel->nom }} ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-building fs-1 d-block mb-3"></i>
                    <p class="mb-2">Aucun hôtel enregistré.</p>
                    <a href="/ajouter_eta" class="btn btn-primary btn-sm">Ajouter un hôtel</a>
                </div>
            @endif
        </div>

        {{-- TAB APPARTEMENTS --}}
        <div class="tab-pane fade" id="apparts" role="tabpanel">
            @if($apparts->count() > 0)
                <div class="row g-4">
                    @foreach($apparts as $appart)
                    @php
                        $images = $appart->images ? json_decode($appart->images, true) : [];
                        $images = is_array($images) ? $images : [];
                    @endphp
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm" style="border-radius:14px; overflow:hidden; transition: transform 0.2s, box-shadow 0.2s;"
                             onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 12px 24px rgba(0,0,0,0.12)'"
                             onmouseout="this.style.transform='';this.style.boxShadow=''">

                            {{-- Badge --}}
                            <div class="position-absolute top-0 end-0 m-2" style="z-index:10;">
                                <span class="badge bg-success text-white" style="border-radius:20px;">Appartement</span>
                            </div>

                            {{-- Image --}}
                            @if(!empty($images))
                                <img src="{{ asset('storage/' . $images[0]) }}"
                                     class="card-img-top"
                                     style="height:200px; object-fit:cover;"
                                     alt="{{ $appart->nom }}">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="height:200px;">
                                    <i class="bi bi-house-door text-muted" style="font-size:3rem;"></i>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column p-3">

                                <h6 class="fw-bold mb-2">{{ $appart->nom }}</h6>

                                <p class="small text-muted mb-1">
                                    <i class="bi bi-geo-alt-fill text-success me-1"></i>{{ $appart->ville }}
                                </p>
                                <p class="small text-muted mb-2">
                                    <i class="bi bi-pin-map text-secondary me-1"></i>{{ Str::limit($appart->adresse, 35) }}
                                </p>

                                @if($appart->equipements)
                                    <p class="small text-muted border-top pt-2 mb-2">
                                        <i class="bi bi-check2-circle text-success me-1"></i>
                                        {{ Str::limit($appart->equipements, 45) }}
                                    </p>
                                @endif

                                {{-- Prix --}}
                                @if(isset($appart->prix))
                                    <div class="mb-3 mt-auto  ">
                                        <span class="badge bg-success  bg-opacity-10 text-success">
                                            <i class="bi bi-cash me-1"></i>
                                            {{ number_format($appart->prix, 0, ',', ' ') }} FCFA / nuit
                                        </span>
                                    </div>
                                @endif

                                {{-- Actions --}}
                                <div class="btn-group w-100" role="group">
                                    <a href="{{ route('show_appart', $appart->id) }}"
                                       class="btn btn-sm btn-outline-primary" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/modif_edit/{{ $appart->id }}"
                                       class="btn btn-sm btn-outline-warning" title="Modifier">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('supp_appart', $appart->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                style="border-radius: 0 4px 4px 0;"
                                                onclick="return confirm('Supprimer {{ $appart->nom }} ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($apparts->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $apparts->links() }}
                    </div>
                @endif

            @else
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-house-door fs-1 d-block mb-3"></i>
                    <p class="mb-2">Aucun appartement enregistré.</p>
                    <a href="/ajouter_appart" class="btn btn-success btn-sm">Ajouter un appartement</a>
                </div>
            @endif
        </div>

    </div>
</div>

{{-- Script tabs secours --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tabs = document.querySelectorAll('#etablissementTabs .nav-link');
        tabs.forEach(function (tab) {
            tab.addEventListener('click', function (e) {
                e.preventDefault();
                tabs.forEach(function (t) { t.classList.remove('active'); });
                document.querySelectorAll('.tab-pane').forEach(function (p) {
                    p.classList.remove('show', 'active');
                });
                this.classList.add('active');
                var target = document.querySelector(this.getAttribute('href'));
                if (target) target.classList.add('show', 'active');
            });
        });
    });
</script>

@endsection