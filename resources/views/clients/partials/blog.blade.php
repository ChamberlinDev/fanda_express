<section class="container my-5">
    <div class="blog_section">
        <h2 class="text-center mb-4">Derniers Articles</h2>
        
        @if($blogs->isNotEmpty())
            <div class="row g-4">
                @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0">
                            <!-- Image -->
                            <div class="position-relative overflow-hidden">
                                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://via.placeholder.com/400x300?text=Pas+d%27image' }}"
                                     class="card-img-top"
                                     alt="{{ $blog->titre }}"
                                     height="250"
                                     style="object-fit: cover;"
                                     loading="lazy">
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold mb-3">{{ $blog->titre }}</h5>
                                <p class="card-text text-muted flex-grow-1">
                                    {{ Str::limit(strip_tags($blog->contenu), 120) }}
                                </p>
                                
                                @if(isset($blog->created_at))
                                    <small class="text-muted">
                                        {{ $blog->created_at->format('d/m/Y') }}
                                    </small>
                                @endif
                            </div>

                            <div class="card-footer bg-transparent border-0 text-center pb-3">
                                <a href="#" 
                                   class="btn btn-primary btn-sm px-4 rounded-pill">
                                    Lire la suite
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                Aucun article disponible pour le moment.
            </div>
        @endif
    </div>
</section>