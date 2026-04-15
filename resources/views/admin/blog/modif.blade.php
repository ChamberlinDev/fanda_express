@extends('admin.layout.app')
@section('content')

<div class="container my-5">
    <h2 class="mb-4 text-center"> Modifier un blog</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" name="titre" value="{{ $blog->titre }}" required>
            </div>

            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu</label>
                <textarea class="form-control" name="contenu" rows="5" required>{{ $blog->contenu }}</textarea>
            </div>

           

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" value="{{ $blog->image }}">
            </div>

            <button type="submit" class="btn btn-warning">Mettre à jour</button>
        </form>

    </div>
</div>

@endsection