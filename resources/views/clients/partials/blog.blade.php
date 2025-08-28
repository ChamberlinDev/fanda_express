<div class="blog">
    <!-- Blog Slider -->
    <div class="blog_slider_container">
        <h2 class="text-center">Blog</h2>
        <hr>
        <div class="owl-carousel owl-theme blog_slider">

            @foreach($blogs as $blog)
                <!-- Slide -->
                <div class="blog_slide">
                    <div class="background_image" 
                         style="background-image: url('{{ asset('storage/' . $blog->image) }}')">
                    </div>
                    <div class="blog_content">
                        <div class="blog_date">
                            <a href="#">{{ $blog->created_at->format('d/m/Y') }}</a>
                        </div>
                        <div class="blog_title">
                            <a href="#">{{ $blog->titre }}</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
