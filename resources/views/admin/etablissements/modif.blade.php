@extends('admin.layout.app')

@section('content')
<div class="container my-5">
    {{-- En-tête --}}
    <div class="text-center mb-4">
        <h1>Modifier l'hôtel</h1>
        <p class="text-muted mt-3">
            Modifiez les informations de votre établissement afin de les maintenir à jour et d'offrir une meilleure expérience aux visiteurs.
        </p>
    </div>

    <hr class="mb-4">

    {{-- Formulaire --}}
    <form action="{{ route('modif_save', $hotel->id) }}" method="POST" enctype="multipart/form-data" 
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
                <label for="nom" class="form-label fw-semibold">Nom de l'hôtel <span class="text-danger">*</span></label>
                <input type="text" name="nom" id="nom" 
                       class="form-control @error('nom') is-invalid @enderror" 
                       value="{{ old('nom', $hotel->nom) }}" required>
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="ville" class="form-label fw-semibold">Ville <span class="text-danger">*</span></label>
                <select name="ville" id="ville" 
                        class="form-select @error('ville') is-invalid @enderror" required>
                    <option value="">-- Sélectionner une ville --</option>
                    <option value="pointe-noire" {{ old('ville', $hotel->ville) == 'pointe-noire' ? 'selected' : '' }}>Pointe-Noire</option>
                    <option value="brazzaville" {{ old('ville', $hotel->ville) == 'brazzaville' ? 'selected' : '' }}>Brazzaville</option>
                    <option value="dolisie" {{ old('ville', $hotel->ville) == 'dolisie' ? 'selected' : '' }}>Dolisie</option>
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
                <textarea name="adresse" id="adresse" 
                          class="form-control @error('adresse') is-invalid @enderror" 
                          rows="3" required>{{ old('adresse', $hotel->adresse) }}</textarea>
                @error('adresse')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="description" class="form-label fw-semibold">Description</label>
                <textarea name="description" id="description" 
                          class="form-control @error('description') is-invalid @enderror" 
                          rows="3" placeholder="Décrivez votre hôtel...">{{ old('description', $hotel->description) }}</textarea>
                @error('description')
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
                if (is_array($hotel->images)) {
                    $images = $hotel->images;
                } elseif (is_string($hotel->images)) {
                    $decoded = json_decode($hotel->images, true);
                    $images = $decoded ?? array_filter(explode(',', $hotel->images));
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
                                         alt="Image de l'hôtel"
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
                if (is_array($hotel->equipements)) {
                    $equipements = $hotel->equipements;
                } elseif (is_string($hotel->equipements)) {
                    $decoded = json_decode($hotel->equipements, true);
                    $equipements = $decoded ?? array_filter(explode(',', $hotel->equipements));
                }
            @endphp

            <select name="equipements[]" id="equipements" 
                    class="form-select @error('equipements') is-invalid @enderror" multiple size="7">
                <option value="Wi-Fi" {{ in_array('Wi-Fi', $equipements) ? 'selected' : '' }}>Wi-Fi</option>
                <option value="Piscine" {{ in_array('Piscine', $equipements) ? 'selected' : '' }}>Piscine</option>
                <option value="Climatisation" {{ in_array('Climatisation', $equipements) ? 'selected' : '' }}>Climatisation</option>
                <option value="Restaurant" {{ in_array('Restaurant', $equipements) ? 'selected' : '' }}>Restaurant</option>
                <option value="Salle de conférence" {{ in_array('Salle de conférence', $equipements) ? 'selected' : '' }}>Salle de conférence</option>
                <option value="Parking" {{ in_array('Parking', $equipements) ? 'selected' : '' }}>Parking</option>
                <option value="Bar" {{ in_array('Bar', $equipements) ? 'selected' : '' }}>Bar</option>
                <option value="Salle de sport" {{ in_array('Salle de sport', $equipements) ? 'selected' : '' }}>Salle de sport</option>
                <option value="Spa" {{ in_array('Spa', $equipements) ? 'selected' : '' }}>Spa</option>
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
                       placeholder="Ex: Navette aéroport, Room service, etc."
                       value="{{ old('equipements_autres', $hotel->equipements_autres ?? '') }}">
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