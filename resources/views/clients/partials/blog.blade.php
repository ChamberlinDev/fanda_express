<section class="container my-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Derniers Articles</h2>
        <p class="text-muted">Découvrez nos dernières actualités et conseils</p>
    </div>

    @if($blogs->isNotEmpty())
        <div class="row g-4">
            @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm"
                     style="border-radius:16px; overflow:hidden; transition:transform 0.2s, box-shadow 0.2s;"
                     onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 16px 32px rgba(0,0,0,0.12)'"
                     onmouseout="this.style.transform='';this.style.boxShadow=''">

                    {{-- Image --}}
                    <div class="position-relative">
                        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://placehold.co/600x280?text=Aucune+image' }}"
                             class="w-100"
                             style="height:210px; object-fit:cover;"
                             alt="{{ $blog->titre }}"
                             loading="lazy">

                        {{-- Date sur image --}}
                        @if(isset($blog->created_at))
                            <span class="badge bg-dark bg-opacity-75 position-absolute"
                                  style="bottom:12px; left:12px; border-radius:20px; font-size:0.75rem;">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $blog->created_at->format('d/m/Y') }}
                            </span>
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column p-4">

                        {{-- Auteur --}}
                        @if(isset($blog->auteur))
                            <p class="small text-muted mb-2">
                                <i class="bi bi-person-circle text-primary me-1"></i>
                                {{ $blog->auteur }}
                            </p>
                        @endif

                        {{-- Titre --}}
                        <h5 class="fw-bold mb-2" style="line-height:1.4;">
                            {{ $blog->titre }}
                        </h5>

                        {{-- Extrait --}}
                        <p class="text-muted small mb-3" style="line-height:1.7; flex-grow:1;">
                            {{ Str::limit(strip_tags($blog->contenu), 110) }}
                        </p>

                        {{-- Lire la suite --}}
                        <a href="#"
                           class="btn btn-outline-primary btn-sm mt-auto"
                           style="border-radius:20px; align-self:flex-start;">
                            Lire la suite
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-newspaper fs-1 d-block mb-3"></i>
            Aucun article disponible pour le moment.
        </div>
    @endif

</section>