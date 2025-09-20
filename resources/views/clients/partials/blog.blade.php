<section class="container my-5">
    <div class="blog_slider_container">
    <h2 class="text-center">Derniers Blog</h2>
    <hr>
    <div class="owl-carousel owl-theme blog_slider">
        @forelse($blogs as $blog)
        <div class="item">
            <div class="card h-100 shadow-sm">
                <!-- Image -->
                @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}"
                    class="card-img-top"
                    alt="{{ $blog->titre }}"
                    style="height:300px; object-fit:cover;">
                @else
                <img src="https://via.placeholder.com/400x200?text=Pas+d'image"
                    class="card-img-top"
                    alt="{{ $blog->titre }}"
                    style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $blog->titre }}</h5>
                    <p class="card-text text-truncate" style="max-height: 60px;">
                        {{ Str::limit($blog->contenu, 100) }}
                    </p>
                </div>
                <div class="card-footer bg-white border-0 text-center">
                    <a href="#" class="btn btn-primary btn-sm">
                        Lire plus
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Aucun article disponible pour le moment.</p>
        </div>
        @endforelse
    </div>
    </div>
</section>

