@extends('admin.layout.app')
@section('content')

<div class="container-fluid py-4">

    {{-- En-tête --}}
    <div class="d-flex align-items-center mb-4">
        <div>
            <h4 class="mb-1 fw-bold">Ajouter un nouvel appartement</h4>
            <p class="text-muted mb-0 small">
                Enrichissez votre offre locative en renseignant toutes les informations essentielles pour permettre aux locataires de découvrir votre bien.
            </p>
        </div>
    </div>

    {{-- Formulaire --}}
    <form action="{{ route('create_appart') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">

            {{-- Colonne principale --}}
            <div class="col-lg-8">

                {{-- Section 1: Informations générales --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h6 class="mb-0 fw-semibold">
                            <i class="bi bi-info-circle me-2 text-primary"></i>Informations générales
                        </h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label for="nom" class="form-label fw-medium">Nom de l'appartement <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('nom') is-invalid @enderror"
                                    id="nom"
                                    name="nom"
                                    value="{{ old('nom') }}"
                                    placeholder="Ex: Appartement F3 Standing Centre-Ville">
                                @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="ville" class="form-label fw-medium">Ville <span class="text-danger">*</span></label>
                                <select class="form-select @error('ville') is-invalid @enderror" id="ville" name="ville">
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="brazzaville" {{ old('ville') == 'brazzaville' ? 'selected' : '' }}>Brazzaville</option>
                                    <option value="pointe-noire" {{ old('ville') == 'pointe-noire' ? 'selected' : '' }}>Pointe-Noire</option>
                                </select>
                                @error('ville')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Section 2: Localisation --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h6 class="mb-0 fw-semibold">
                            <i class="bi bi-geo-alt me-2 text-primary"></i>Localisation
                        </h6>
                    </div>
                    <div class="card-body p-4">
                        <label for="adresse" class="form-label fw-medium">Adresse complète <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('adresse') is-invalid @enderror"
                            id="adresse"
                            name="adresse"
                            rows="2"
                            placeholder="Ex: Résidence Les Palmiers, Bât. A, Apt 204, Avenue de la Paix">{{ old('adresse') }}</textarea>
                        @error('adresse')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Section 3: Caractéristiques --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h6 class="mb-0 fw-semibold">
                            <i class="bi bi-house-gear me-2 text-primary"></i>Caractéristiques
                        </h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nbre_chambre" class="form-label fw-medium">Nombre de chambres <span class="text-danger">*</span></label>
                                <input type="number"
                                    class="form-control @error('nbre_chambre') is-invalid @enderror"
                                    id="nbre_chambre"
                                    name="nbre_chambre"
                                    value="{{ old('nbre_chambre') }}"
                                    min="1" max="10"
                                    placeholder="Ex: 3">
                                @error('nbre_chambre')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="prix" class="form-label fw-medium">Prix mensuel (FCFA) <span class="text-danger">*</span></label>
                                <input type="number"
                                    class="form-control @error('prix') is-invalid @enderror"
                                    id="prix"
                                    name="prix"
                                    value="{{ old('prix') }}"
                                    min="0" step="1000"
                                    placeholder="Ex: 150000">
                                @error('prix')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Section 4: Description --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h6 class="mb-0 fw-semibold">
                            <i class="bi bi-file-text me-2 text-primary"></i>Description
                        </h6>
                    </div>
                    <div class="card-body p-4">
                        <label for="description" class="form-label fw-medium">Décrivez l'appartement</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Superficie, luminosité, état général, proximités (écoles, commerces, transports)...">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Section 5: Photos --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h6 class="mb-0 fw-semibold">
                            <i class="bi bi-images me-2 text-primary"></i>Photos de l'appartement
                        </h6>
                    </div>
                    <div class="card-body p-4">
                        <label class="form-label fw-medium">Télécharger des photos</label>
                        <div class="border border-dashed rounded-3 p-4 text-center bg-light"
                            style="cursor:pointer;" onclick="document.getElementById('images').click()">
                            <i class="bi bi-cloud-upload fs-2 text-muted"></i>
                            <p class="mb-1 mt-2 text-muted">Glissez vos photos ou <span class="text-primary fw-medium">cliquez pour parcourir</span></p>
                            <small class="text-muted">Formats acceptés : JPG, PNG, WEBP — Max 5 Mo par photo</small>
                        </div>
                        <input type="file"
                            id="images"
                            name="images[]"
                            accept=".jpg,.jpeg,.png,.webp"
                            multiple
                            class="d-none @error('images') is-invalid @enderror">
                        @error('images')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <div id="preview" class="d-flex flex-wrap gap-2 mt-3"></div>
                    </div>
                </div>

            </div>

            {{-- Colonne latérale --}}
            <div class="col-lg-4">

                {{-- Section 6: Équipements --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h6 class="mb-0 fw-semibold">
                            <i class="bi bi-stars me-2 text-primary"></i>Équipements & Commodités
                        </h6>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted small mb-3">Cochez les équipements disponibles</p>

                        @php
                        $equipements = [
                        'wifi' => ['icon' => 'bi-wifi', 'label' => 'Wi-Fi gratuit'],
                        'clim' => ['icon' => 'bi-thermometer', 'label' => 'Climatisation'],
                        'parking' => ['icon' => 'bi-p-circle', 'label' => 'Parking'],
                        'cuisine' => ['icon' => 'bi-house-heart', 'label' => 'Cuisine équipée'],
                        'balcon' => ['icon' => 'bi-tree', 'label' => 'Balcon/Terrasse'],
                        'meuble' => ['icon' => 'bi-lamp', 'label' => 'Meublé'],
                        'securite' => ['icon' => 'bi-shield-check', 'label' => 'Sécurité 24/7'],
                        'eau' => ['icon' => 'bi-droplet', 'label' => 'Eau courante'],
                        'autres' => ['icon' => 'bi-three-dots', 'label' => 'Autres'],
                        ];
                        @endphp

                        <div class="d-flex flex-column gap-2">
                            @foreach($equipements as $value => $eq)
                            <div class="form-check d-flex align-items-center gap-2 py-1">
                                <input class="form-check-input mt-0"
                                    type="checkbox"
                                    name="equipements[]"
                                    id="eq_{{ $value }}"
                                    value="{{ $eq['label'] }}"
                                    {{ in_array($eq['label'], old('equipements', [])) ? 'checked' : '' }}>
                                <label class="form-check-label d-flex align-items-center gap-2" for="eq_{{ $value }}">
                                    <i class="bi {{ $eq['icon'] }} text-primary"></i>
                                    {{ $eq['label'] }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        {{-- Champ "Autres" conditionnel --}}
                        <div id="autres_detail" class="mt-3 {{ in_array('Autres', old('equipements', [])) ? '' : 'd-none' }}">
                            <label for="equipements_autres" class="form-label small fw-medium">Précisez les autres équipements</label>
                            <input type="text"
                                class="form-control form-control-sm"
                                id="equipements_autres"
                                name="equipements_autres"
                                value="{{ old('equipements_autres') }}"
                                placeholder="Ex: Ascenseur, Piscine commune...">
                        </div>
                    </div>
                </div>

                {{-- Boutons d'action --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i> Enregistrer l'appartement
                            </button>
                            <a href="#" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Retour
                            </a>
                        </div>
                        <p class="text-muted small text-center mb-0 mt-3">
                            Les champs marqués d'un <span class="text-danger">*</span> sont obligatoires
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </form>
</div>

@push('scripts')
<script>
    // Prévisualisation des images
    document.getElementById('images').addEventListener('change', function() {
        const preview = document.getElementById('preview');
        preview.innerHTML = '';
        [...this.files].forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'rounded border';
                img.style.cssText = 'width:80px;height:80px;object-fit:cover;';
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });

    // Affichage conditionnel du champ "Autres"
    document.getElementById('eq_autres').addEventListener('change', function() {
        document.getElementById('autres_detail').classList.toggle('d-none', !this.checked);
        if (!this.checked) document.getElementById('equipements_autres').value = '';
    });
</script>
@endpush

@endsection