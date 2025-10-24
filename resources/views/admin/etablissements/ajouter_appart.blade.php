@extends('admin.layout.app')
@section('content')

<div class="container my-5">
    
    {{-- En-tête --}}
    <div class="text-center mb-5">
        <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 rounded-circle mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-house-add text-success" style="font-size: 2.5rem;"></i>
        </div>
        <h1 class="fw-bold mb-3" style="color: #1a1a2e;">Ajouter un nouvel appartement</h1>
        <p class="text-muted mx-auto" style="max-width: 800px; line-height: 1.7;">
            Enrichissez votre offre locative en ajoutant un appartement sur notre plateforme. 
            Renseignez toutes les informations pour permettre aux locataires potentiels 
            de découvrir votre bien et de réserver facilement.
        </p>
        <div style="width: 100px; height: 3px; background: linear-gradient(90deg, #198754, #20c997); margin: 0 auto; border-radius: 10px;"></div>
    </div>

    {{-- Formulaire --}}
    <form action="/create" method="POST" enctype="multipart/form-data" class="bg-white rounded-4 shadow-sm p-4 p-md-5">
        @csrf

        {{-- Section 1: Informations générales --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-success bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-info-circle-fill text-success fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Informations générales</h4>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <label for="nom" class="form-label fw-semibold">
                        <i class="bi bi-house-door me-2 text-success"></i>Nom de l'appartement
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           name="nom" 
                           id="nom" 
                           class="form-control form-control-lg" 
                           placeholder="Ex: Appartement F3 Standing Centre-Ville" 
                           required>
                    <small class="form-text text-muted">Un nom descriptif et attractif</small>
                </div>

                <div class="col-md-6">
                    <label for="ville" class="form-label fw-semibold">
                        <i class="bi bi-geo-alt-fill me-2 text-success"></i>Ville
                        <span class="text-danger">*</span>
                    </label>
                    <select name="ville" id="ville" class="form-select form-select-lg" required>
                        <option value="">-- Sélectionnez une ville --</option>
                        <option value="pointe-noire">Pointe-Noire</option>
                        
                    </select>
                </div>
            </div>
        </div>

        {{-- Section 2: Localisation --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-pin-map-fill text-primary fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Localisation</h4>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label for="adresse" class="form-label fw-semibold">
                        <i class="bi bi-signpost me-2 text-primary"></i>Adresse complète
                        <span class="text-danger">*</span>
                    </label>
                    <textarea name="adresse" 
                              id="adresse" 
                              class="form-control" 
                              rows="3" 
                              placeholder="Ex: Résidence Les Palmiers, Bâtiment A, Appartement 204, Avenue de la Paix"
                              required></textarea>
                    <small class="form-text text-muted">Précisez la résidence, le bâtiment et l'étage si applicable</small>
                </div>
            </div>
        </div>

        {{-- Section 3: Caractéristiques --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-warning bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-house-gear-fill text-warning fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Caractéristiques de l'appartement</h4>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <label for="nbre_chambre" class="form-label fw-semibold">
                        <i class="bi bi-door-closed me-2 text-warning"></i>Nombre de chambres
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" 
                           name="nbre_chambre" 
                           id="nbre_chambre" 
                           class="form-control form-control-lg" 
                           placeholder="Ex: 3"
                           min="1"
                           max="10"
                           required>
                    <small class="form-text text-muted">Indiquez le nombre de chambres à coucher</small>
                </div>

                <div class="col-md-6">
                    <label for="prix" class="form-label fw-semibold">
                        <i class="bi bi-cash-coin me-2 text-warning"></i>Prix mensuel (FCFA)
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" 
                           name="prix" 
                           id="prix" 
                           class="form-control form-control-lg" 
                           placeholder="Ex: 150000"
                           min="0"
                           step="1000"
                           required>
                    <small class="form-text text-muted">Loyer mensuel hors charges</small>
                </div>
            </div>
        </div>

        {{-- Section 4: Description --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-info bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-card-text text-info fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Description</h4>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label for="description" class="form-label fw-semibold">
                        <i class="bi bi-pencil-square me-2 text-info"></i>Décrivez l'appartement
                    </label>
                    <textarea name="description" 
                              id="description" 
                              class="form-control" 
                              rows="5" 
                              placeholder="Décrivez votre appartement : superficie, luminosité, état général, proximités (écoles, commerces, transports)..."></textarea>
                    <small class="form-text text-muted">Une description détaillée et honnête rassure les futurs locataires</small>
                </div>
            </div>
        </div>

        {{-- Section 5: Équipements --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-danger bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-gear-fill text-danger fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Équipements & Commodités</h4>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label class="form-label fw-semibold mb-3">
                        <i class="bi bi-list-check me-2 text-danger"></i>Cochez les équipements disponibles
                    </label>
                    
                    {{-- Checkboxes visuelles --}}
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Wi-Fi" id="wifi">
                                <label class="form-check-label w-100" for="wifi">
                                    <i class="bi bi-wifi text-primary"></i> Wi-Fi gratuit
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Climatisation" id="clim">
                                <label class="form-check-label w-100" for="clim">
                                    <i class="bi bi-snow text-info"></i> Climatisation
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Parking" id="parking">
                                <label class="form-check-label w-100" for="parking">
                                    <i class="bi bi-car-front text-secondary"></i> Parking
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Cuisine équipée" id="cuisine">
                                <label class="form-check-label w-100" for="cuisine">
                                    <i class="bi bi-house-heart text-warning"></i> Cuisine équipée
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Balcon" id="balcon">
                                <label class="form-check-label w-100" for="balcon">
                                    <i class="bi bi-tree text-success"></i> Balcon/Terrasse
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Meublé" id="meuble">
                                <label class="form-check-label w-100" for="meuble">
                                    <i class="bi bi-lamp text-warning"></i> Meublé
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Sécurité 24/7" id="securite">
                                <label class="form-check-label w-100" for="securite">
                                    <i class="bi bi-shield-check text-danger"></i> Sécurité 24/7
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Eau courante" id="eau">
                                <label class="form-check-label w-100" for="eau">
                                    <i class="bi bi-droplet text-primary"></i> Eau courante
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" value="Autres" id="autres">
                                <label class="form-check-label w-100" for="autres">
                                    <i class="bi bi-three-dots text-muted"></i> Autres
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Champ texte pour "Autres" --}}
                    <div id="autres_input" class="mt-3 d-none">
                        <div class="alert alert-info border-0">
                            <label for="equipements_autres" class="form-label fw-semibold mb-2">
                                <i class="bi bi-pencil me-2"></i>Précisez les autres équipements
                            </label>
                            <input type="text" 
                                   name="equipements_autres" 
                                   id="equipements_autres"
                                   class="form-control" 
                                   placeholder="Ex: Ascenseur, Piscine commune, Jardin...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 6: Photos --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-secondary bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-images text-secondary fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Photos de l'appartement</h4>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label for="images" class="form-label fw-semibold">
                        <i class="bi bi-camera-fill me-2 text-secondary"></i>Télécharger des photos
                    </label>
                    <div class="border-2 border-dashed rounded-3 p-4 text-center" style="border-color: #6c757d;">
                        <i class="bi bi-cloud-upload text-secondary" style="font-size: 3rem;"></i>
                        <p class="mt-3 mb-2 fw-semibold">Glissez vos photos ou cliquez pour parcourir</p>
                        <input type="file" 
                               name="images[]" 
                               id="images" 
                               multiple 
                               class="form-control mt-3"
                               accept="image/*">
                        <small class="form-text text-muted d-block mt-2">
                            <i class="bi bi-info-circle me-1"></i>
                            Formats acceptés: JPG, PNG, WEBP. Taille max: 5 Mo par photo. <br>
                            💡 Astuce: Photographiez chaque pièce dans différents angles pour un meilleur aperçu.
                        </small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Séparateur --}}
        <hr class="my-5">

        {{-- Boutons d'action --}}
        <div class="d-flex justify-content-between align-items-center">
            <a href="/etablissement" class="btn btn-lg btn-outline-secondary px-4">
                <i class="bi bi-arrow-left me-2"></i>Retour
            </a>
            <button type="submit" class="btn btn-lg btn-success px-5 shadow-sm">
                <i class="bi bi-check-circle me-2"></i>Enregistrer l'appartement
            </button>
        </div>

        {{-- Note en bas --}}
        <div class="mt-4 p-3 bg-light rounded-3 text-center">
            <small class="text-muted">
                <i class="bi bi-shield-check text-success me-1"></i>
                Les champs marqués d'une <span class="text-danger">*</span> sont obligatoires
            </small>
        </div>
    </form>

</div>

<style>
    .form-control:focus,
    .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.15);
    }

    .border-dashed {
        border-style: dashed !important;
    }

    .form-check {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-check:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .form-check-input:checked ~ .form-check-label {
        color: #198754;
        font-weight: 600;
    }

    .rounded-4 {
        border-radius: 1rem !important;
    }

    /* Animation pour le champ prix */
    #prix:focus {
        border-color: #ffc107;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const autresCheckbox = document.getElementById('autres');
        const autresInput = document.getElementById('autres_input');

        // Gestion de "Autres" équipements
        autresCheckbox.addEventListener('change', function() {
            if (this.checked) {
                autresInput.classList.remove('d-none');
            } else {
                autresInput.classList.add('d-none');
                document.getElementById('equipements_autres').value = '';
            }
        });

        // Prévisualisation des images sélectionnées
        const imageInput = document.getElementById('images');
        imageInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                console.log(`${files.length} photo(s) sélectionnée(s)`);
            }
        });

        // Format du prix avec espaces (optionnel)
        const prixInput = document.getElementById('prix');
        prixInput.addEventListener('blur', function() {
            if (this.value) {
                const formatted = parseInt(this.value).toLocaleString('fr-FR');
                console.log(`Prix: ${formatted} FCFA`);
            }
        });
    });
</script>

@endsection