@extends('admin.layout.app')

@section('content')
<div class="container my-5">
    {{-- En-tête --}}
    <div class="text-center mb-4">
        <h1>Modifier l'établissement</h1>
        <p class="text-muted mt-3">
            Mettez à jour les informations de votre établissement pour garantir aux visiteurs des informations fiables et à jour.
        </p>
    </div>

    <hr class="mb-4">

    {{-- Formulaire --}}
    <form action="{{ route('modif_appart', $appartement->id) }}" method="POST" enctype="multipart/form-data" 
          class="p-4 border rounded bg-white shadow-sm">
        @csrf

        {{-- Affichage des erreurs --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreurs détectées :</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Nom & Ville --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nom" class="form-label fw-semibold">Nom de l'établissement <span class="text-danger">*</span></label>
                <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror"
                       value="{{ old('nom', $appartement->nom) }}" required>
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="ville" class="form-label fw-semibold">Ville</label>
                <select name="ville" id="ville" class="form-select @error('ville') is-invalid @enderror">
                    <option value="">-- Sélectionner une ville --</option>
                    <option value="pointe-noire" {{ old('ville', $appartement->ville) == 'pointe-noire' ? 'selected' : '' }}>Pointe-Noire</option>
                    <option value="brazzaville" {{ old('ville', $appartement->ville) == 'brazzaville' ? 'selected' : '' }}>Brazzaville</option>
                    <option value="dolisie" {{ old('ville', $appartement->ville) == 'dolisie' ? 'selected' : '' }}>Dolisie</option>
                </select>
                @error('ville')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Adresse & Description --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="adresse" class="form-label fw-semibold">Adresse <span class="text-danger">*</span></label>
                <textarea name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror" 
                          rows="3" required>{{ old('adresse', $appartement->adresse) }}</textarea>
                @error('adresse')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="description" class="form-label fw-semibold">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" 
                          rows="3" placeholder="Décrivez l'établissement...">{{ old('description', $appartement->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Nombre de chambres & Prix --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nbre_chambre" class="form-label fw-semibold">Nombre de chambres</label>
                <input type="number" name="nbre_chambre" id="nbre_chambre" 
                       class="form-control @error('nbre_chambre') is-invalid @enderror"
                       value="{{ old('nbre_chambre', $appartement->nbre_chambre) }}" min="0">
                @error('nbre_chambre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="prix" class="form-label fw-semibold">Prix (FCFA)</label>
                <input type="number" name="prix" id="prix" 
                       class="form-control @error('prix') is-invalid @enderror"
                       value="{{ old('prix', $appartement->prix) }}" min="0" step="1000">
                @error('prix')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Images --}}
        <div class="mb-4">
            <label for="images" class="form-label fw-semibold">Images</label>
            <input type="file" name="images[]" id="images" multiple accept="image/*"
                   class="form-control @error('images') is-invalid @enderror">
            <small class="text-muted d-block mt-1">Vous pouvez ajouter de nouvelles images (formats acceptés : JPG, PNG, JPEG)</small>
            @error('images')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror

            @php
                $images = [];
                if (is_array($appartement->images)) {
                    $images = $appartement->images;
                } elseif (is_string($appartement->images)) {
                    $decoded = json_decode($appartement->images, true);
                    $images = $decoded ?? array_filter(explode(',', $appartement->images));
                }
            @endphp

            @if(!empty($images))
                <div class="mt-3">
                    <small class="text-muted fw-semibold">Images actuelles :</small>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        @foreach($images as $img)
                            @if(!empty(trim($img)))
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . trim($img)) }}" 
                                         alt="Image de l'établissement"
                                         class="rounded border shadow-sm" 
                                         style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        {{-- Équipements --}}
        <div class="mb-4">
            <label for="equipements" class="form-label fw-semibold">Équipements</label>
            @php
                $equipements = [];
                if (is_array($appartement->equipements)) {
                    $equipements = $appartement->equipements;
                } elseif (is_string($appartement->equipements)) {
                    $decoded = json_decode($appartement->equipements, true);
                    $equipements = $decoded ?? array_filter(explode(',', $appartement->equipements));
                }
            @endphp

            <select name="equipements[]" id="equipements" 
                    class="form-select @error('equipements') is-invalid @enderror" multiple size="6">
                <option value="Wi-Fi" {{ in_array('Wi-Fi', $equipements) ? 'selected' : '' }}>Wi-Fi</option>
                <option value="Climatisation" {{ in_array('Climatisation', $equipements) ? 'selected' : '' }}>Climatisation</option>
                <option value="Parking" {{ in_array('Parking', $equipements) ? 'selected' : '' }}>Parking</option>
                <option value="Cuisine équipée" {{ in_array('Cuisine équipée', $equipements) ? 'selected' : '' }}>Cuisine équipée</option>
                <option value="Balcon" {{ in_array('Balcon', $equipements) ? 'selected' : '' }}>Balcon</option>
                <option value="Piscine" {{ in_array('Piscine', $equipements) ? 'selected' : '' }}>Piscine</option>
                <option value="Salle de sport" {{ in_array('Salle de sport', $equipements) ? 'selected' : '' }}>Salle de sport</option>
                <option value="Autres" {{ in_array('Autres', $equipements) ? 'selected' : '' }}>Autres</option>
            </select>
            <small class="text-muted d-block mt-1">
                <i class="bi bi-info-circle"></i> Maintenez <kbd>Ctrl</kbd> (ou <kbd>Cmd</kbd> sur Mac) pour sélectionner plusieurs options.
            </small>
            @error('equipements')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror

            {{-- Champ "Autres" --}}
            <div id="autres_input" class="mt-3 {{ in_array('Autres', $equipements) ? '' : 'd-none' }}">
                <label for="equipements_autres" class="form-label fw-semibold">Précisez les autres équipements</label>
                <input type="text" name="equipements_autres" id="equipements_autres"
                       class="form-control @error('equipements_autres') is-invalid @enderror"
                       placeholder="Ex: Ascenseur, Gardien, etc."
                       value="{{ old('equipements_autres', $appartement->equipements_autres ?? '') }}">
                @error('equipements_autres')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="my-4">

        {{-- Boutons d'action --}}
        <div class="d-flex justify-content-between align-items-center">
            <a href="/etablissement" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Mettre à jour
            </button>
        </div>
    </form>
</div>

{{-- Script pour gérer l'affichage du champ "Autres" --}}
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const equipementsSelect = document.getElementById('equipements');
        const autresInput = document.getElementById('autres_input');

        function toggleAutresInput() {
            const selectedOptions = Array.from(equipementsSelect.selectedOptions);
            const hasAutres = selectedOptions.some(option => option.value === 'Autres');
            
            if (hasAutres) {
                autresInput.classList.remove('d-none');
            } else {
                autresInput.classList.add('d-none');
            }
        }

        // Vérifier au chargement
        toggleAutresInput();

        // Vérifier lors du changement
        equipementsSelect.addEventListener('change', toggleAutresInput);
    });
</script>
@endpush

@endsection