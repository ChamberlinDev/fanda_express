@extends('superadmin.layout.app')
@section('content')

<div class="container-fluid py-4 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Blogs</h2>
            <p class="text-muted small mb-0">{{ $blogs->total() }} blog(s) publié(s)</p>
        </div>
        <a href="{{ route('superadmin.blogs.create') }}" class="btn btn-primary btn-sm">
            + Ajouter un blog
        </a>
    </div>

    {{-- Tableau --}}
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0">Liste des blogs</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width:50px;">#</th>
                            <th style="width:80px;">Image</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th class="text-center">Date</th>
                            <th>Extrait</th>
                            <th class="text-center" style="width:160px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $index => $blog)
                        <tr>
                            <td>
                                <span class="badge bg-primary text-white">{{ $index + 1 }}</span>
                            </td>
                            <td>
                                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('default.jpg') }}"
                                     style="width:60px; height:45px; object-fit:cover; border-radius:8px;"
                                     alt="{{ $blog->titre }}">
                            </td>
                            <td class="fw-bold small">{{ $blog->titre }}</td>
                            <td class="small">{{ $blog->user->nom_complet ?? 'N/A' }}</td>
                            <td class="text-center small">
                                {{ $blog->created_at->format('d/m/Y') }}
                            </td>
                            <td class="small text-muted">
                                {{ Str::limit($blog->contenu, 80, '...') }}
                            </td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('superadmin.blogs.show', $blog->id) }}" class="btn btn-outline-info btn-sm">
                                        Voir
                                    </a>
                                    <a href="{{ route('superadmin.blogs.edit', $blog->id) }}" class="btn btn-outline-warning btn-sm">
                                        Modifier
                                    </a>
                                    <form action="{{ route('superadmin.blogs.delete', $blog->id) }}" method="POST"
                                          onsubmit="return confirm('Supprimer ce blog ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                Aucun blog publié pour le moment.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    @if($blogs->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $blogs->links() }}
        </div>
    @endif

</div>
@endsection