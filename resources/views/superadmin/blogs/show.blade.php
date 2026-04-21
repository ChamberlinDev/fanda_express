@extends('superadmin.layout.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('superadmin.blogs') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">
                ← Retour aux blogs
            </a>
            <h1 class="text-4xl font-bold text-gray-900">{{ $blog->title }}</h1>
            <p class="text-gray-500 mt-2">
                Publier le {{ $blog->created_at->format('M d, Y') }}
            </p>
        </div>

        <!-- Featured Image -->
        @if($blog->image)
        <div class="mb-8">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full rounded-lg shadow-lg">
        </div>
        @endif

        <!-- Content -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <div class="prose prose-lg max-w-none">
                {!! $blog->content !!}
            </div>
        </div>

        <!-- Meta Info -->
        <div class="bg-gray-100 rounded-lg p-6 mb-8">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <p class="text-gray-600 text-sm">Contenu</p>
                    <p class="font-semibold">{{ $blog->contenu }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Auteur</p>
                    <p class="font-semibold">{{ $blog->user->nom_complet ?? 'N/A' }}</p>
                </div>
                <!-- <div>
                    <p class="text-gray-600 text-sm">Status</p>
                    <p class="font-semibold">{{ ucfirst($blog->status) }}</p>
                </div> -->
            </div>
        </div>

        <!-- Actions -->
        <div class="flex gap-4">
            <a href="{{ route('superadmin.blogs.edit', $blog->id) }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Edit
            </a>
            <form action="{{ route('superadmin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-dark px-6 py-2 rounded-lg hover:bg-red-700" onclick="return confirm('etes-vous sûr de vouloir supprimer ce blog ?')">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection