@extends('clients.layout.app')

@section('content')
<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Fil d'ariane --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($blog->titre, 40) }}</li>
                </ol>
            </nav>

            {{-- Image de couverture --}}
            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('default.jpg') }}"
                class="img-fluid rounded shadow-sm mb-4 w-100"
                style="max-height: 400px; object-fit: cover;"
                alt="{{ $blog->titre }}">

            {{-- Titre --}}
            <h1 class="mb-2">{{ $blog->titre }}</h1>

            {{-- Auteur et date --}}
            <p class="text-muted mb-4">
                Publié par <strong>{{ $blog->auteur }}</strong>
                le {{ $blog->created_at->format('d/m/Y') }}
            </p>

            <hr>

            {{-- Contenu complet --}}
            <div class="blog-content mt-4" style="font-size: 1.05em; line-height: 1.8;">
                {!! nl2br(e($blog->contenu)) !!}
            </div>

            <hr class="my-5">

            {{-- Retour --}}
            <a href="/" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Retour à l'accueil
            </a>

        </div>
    </div>

</div>

@endsection