@extends('admin.layout.app')
@section('content')

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="fw-bold text-primary">
                <i class="bi bi-pencil-square me-2"></i>
                Modifier la chambre de <mark>{{ $hotel->nom }}</mark>
            </h3>
            <p class="text-muted">Modifiez les informations de la chambre ci-dessous.</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-primary border-2 shadow-sm">
        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0">
                <i class="bi bi-door-open me-2"></i>Informations de la chambre
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('chambres.update', $chambre->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Type de chambre --}}
                <div class="mb-4">
                    <label for="nom" class="form-label fw-bold">
                        <i class="bi bi-tag me-1 text-primary"></i>Type de chambre
                    </label>
                    <select class="form-select @error('nom') is-invalid @enderror"
                            id="nom" name="nom" required>
                        <option value="">-- Sélectionnez un type --</option>
                        @foreach(['Standard', 'Familiale', 'VIP', 'Suite', 'Deluxe'] as $type)
                            <option value="{{ $type }}"
                                {{ $chambre->nom == $type ? 'selected' : '' }}>
                                Chambre {{ $type }}
                            </option>
                        @endforeach
                    </select>
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Capacité + Prix --}}
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="capacite" class="form-label fw-bold">
                            <i class="bi bi-people me-1 text-info"></i>Capacité
                        </label>
                        <input type="number"
                               class="form-control @error('capacite') is-invalid @enderror"
                               id="capacite" name="capacite"
                               value="{{ old('capacite', $chambre->capacite) }}"
                               min="1" required>
                        @error('capacite')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="prix" class="form-label fw-bold">
                            <i class="bi bi-cash-stack me-1 text-success"></i>Prix par nuit (FCFA)
                        </label>
                        <div class="input-group">
                            <input type="number"
                                   class="form-control @error('prix') is-invalid @enderror"
                                   id="prix" name="prix"
                                   value="{{ old('prix', $chambre->prix) }}"
                                   min="0" required>
                            <span class="input-group-text bg-white text-muted">FCFA</span>
                        </div>
                        @error('prix')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Images actuelles --}}
                @php $images = $chambre->images ? json_decode($chambre->images, true) : []; @endphp
                @if(!empty($images))
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-images me-1 text-secondary"></i>Images actuelles
                        </label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($images as $img)
                                <img src="{{ Storage::url($img) }}"
                                     style="width: 100px; height: 80px; object-fit: cover; border-radius: 6px;"
                                     alt="Image chambre">
                            @endforeach
                        </div>
                        <small class="text-muted">
                            Si vous uploadez de nouvelles images, les anciennes seront remplacées.
                        </small>
                    </div>
                @endif

                {{-- Nouvelles images --}}
                <div class="mb-4">
                    <label for="images" class="form-label fw-bold">
                        <i class="bi bi-upload me-1 text-warning"></i>
                        {{ !empty($images) ? 'Remplacer les images' : 'Images de la chambre' }}
                    </label>
                    <input type="file"
                           name="images[]"
                           id="images"
                           class="form-control @error('images.*') is-invalid @enderror"
                           multiple accept="image/*">
                    <small class="text-muted">Formats acceptés : JPEG, PNG, JPG — max 2Mo par image</small>
                    @error('images.*')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Boutons --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i>Enregistrer les modifications
                    </button>
                    <a href="{{ route('etablissements.show', $hotel->id) }}"
                       class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Annuler
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection