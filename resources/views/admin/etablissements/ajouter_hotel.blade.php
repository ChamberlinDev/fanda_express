@extends('admin.layout.app')
@section('content')

<div class="container my-5">
    
    {{-- En-tête --}}
    <div class="text-center mb-5">
        <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-building-add text-primary" style="font-size: 2.5rem;"></i>
        </div>
        <h1 class="fw-bold mb-3" style="color: #1a1a2e;">Ajouter un nouvel hôtel</h1>
        <p class="text-muted mx-auto" style="max-width: 800px; line-height: 1.7;">
            Enrichissez votre catalogue en ajoutant votre établissement hôtelier. 
            Renseignez toutes les informations essentielles pour permettre aux voyageurs 
            de découvrir votre hôtel et effectuer leurs réservations en toute simplicité.
        </p>
        <div style="width: 100px; height: 3px; background: linear-gradient(90deg, #0d6efd, #0dcaf0); margin: 0 auto; border-radius: 10px;"></div>
    </div>

    {{-- Formulaire --}}
    <form action="/create_hotel" method="POST" enctype="multipart/form-data" class="bg-white rounded-4 shadow-sm p-4 p-md-5">
        @csrf

        {{-- Section 1: Informations générales --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-info-circle-fill text-primary fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Informations générales</h4>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <label for="nom" class="form-label fw-semibold">
                        <i class="bi bi-building me-2 text-primary"></i>Nom de l'hôtel
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           name="nom" 
                           id="nom" 
                           class="form-control form-control-lg" 
                           placeholder="Ex: Grand Hôtel Luxor" 
                           required>
                    <small class="form-text text-muted">Le nom tel qu'il apparaîtra aux clients</small>
                </div>

                <div class="col-md-6">
                    <label for="ville" class="form-label fw-semibold">
                        <i class="bi bi-geo-alt-fill me-2 text-primary"></i>Ville
                        <span class="text-danger">*</span>
                    </label>
                    <select name="ville" id="ville" class="form-select form-select-lg" required>
                        <option value="">-- Sélectionnez une ville --</option>
                        <option value="pointe-noire">Pointe-Noire</option>
                        <option value="brazzaville">Brazzaville</option>
                        <option value="dolisie">Dolisie</option>
                        <option value="nkayi">Nkayi</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Section 2: Localisation --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-success bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-pin-map-fill text-success fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Localisation</h4>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label for="adresse" class="form-label fw-semibold">
                        <i class="bi bi-signpost me-2 text-success"></i>Adresse complète
                        <span class="text-danger">*</span>
                    </label>
                    <textarea name="adresse" 
                              id="adresse" 
                              class="form-control" 
                              rows="3" 
                              placeholder="Ex: 123 Avenue de la Liberté, Quartier Centre-Ville"
                              required></textarea>
                    <small class="form-text text-muted">Indiquez l'adresse complète avec les repères si nécessaire</small>
                </div>
            </div>
        </div>

        {{-- Section 3: Description --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-warning bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-card-text text-warning fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Description</h4>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label for="description" class="form-label fw-semibold">
                        <i class="bi bi-pencil-square me-2 text-warning"></i>Décrivez votre établissement
                    </label>
                    <textarea name="description" 
                              id="description" 
                              class="form-control" 
                              rows="5" 
                              placeholder="Décrivez votre hôtel : ambiance, services, points forts, situation géographique..."></textarea>
                    <small class="form-text text-muted">Une description détaillée aide les clients à faire leur choix</small>
                </div>
            </div>
        </div>

        {{-- Section 4: Images --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-info bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-images text-info fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Photos de l'établissement</h4>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label for="images" class="form-label fw-semibold">
                        <i class="bi bi-camera-fill me-2 text-info"></i>Télécharger des images
                    </label>
                    <div class="border-2 border-dashed rounded-3 p-4 text-center" style="border-color: #0dcaf0;">
                        <i class="bi bi-cloud-upload text-info" style="font-size: 3rem;"></i>
                        <p class="mt-3 mb-2 fw-semibold">Glissez vos images ou cliquez pour parcourir</p>
                        <input type="file" 
                               name="images[]" 
                               id="images" 
                               multiple 
                               class="form-control mt-3"
                               accept="image/*">
                        <small class="form-text text-muted d-block mt-2">
                            <i class="bi bi-info-circle me-1"></i>
                            Formats acceptés: JPG, PNG, WEBP. Taille maximale: 5 Mo par image.
                        </small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 5: Équipements --}}
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-danger bg-opacity-10 rounded-3 p-2 me-3">
                    <i class="bi bi-gear-fill text-danger fs-5"></i>
                </div>
                <h4 class="mb-0 fw-semibold">Équipements & Services</h4>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label for="equipements" class="form-label fw-semibold">
                        <i class="bi bi-list-check me-2 text-danger"></i>Sélectionnez les équipements disponibles
                    </label>
                    
                    {{-- Checkboxes au lieu de select multiple --}}
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Wi-Fi" id="wifi">
                                <label class="form-check-label w-100" for="wifi">
                                    <i class="bi bi-wifi text-primary"></i> Wi-Fi gratuit
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Piscine" id="piscine">
                                <label class="form-check-label w-100" for="piscine">
                                    <i class="bi bi-water text-info"></i> Piscine
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Climatisation" id="clim">
                                <label class="form-check-label w-100" for="clim">
                                    <i class="bi bi-snow text-primary"></i> Climatisation
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Parking" id="parking">
                                <label class="form-check-label w-100" for="parking">
                                    <i class="bi bi-car-front text-secondary"></i> Parking
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Restaurant" id="restaurant">
                                <label class="form-check-label w-100" for="restaurant">
                                    <i class="bi bi-cup-hot text-warning"></i> Restaurant
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Salle de sport" id="sport">
                                <label class="form-check-label w-100" for="sport">
                                    <i class="bi bi-heart-pulse text-danger"></i> Salle de sport
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-check border rounded-3 p-3 h-100">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="Bar" id="bar">
                                <label class="form-check-label w-100" for="bar">
                                    <i class="bi bi-cup-straw text-success"></i> Bar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
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
                                   placeholder="Ex: Spa, Sauna, Blanchisserie...">
                        </div>
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
            <button type="submit" class="btn btn-lg btn-primary px-5 shadow-sm">
                <i class="bi bi-check-circle me-2"></i>Enregistrer l'hôtel
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
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
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
        color: #0d6efd;
        font-weight: 600;
    }

    .rounded-4 {
        border-radius: 1rem !important;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const autresCheckbox = document.getElementById('autres');
        const autresInput = document.getElementById('autres_input');

        autresCheckbox.addEventListener('change', function() {
            if (this.checked) {
                autresInput.classList.remove('d-none');
            } else {
                autresInput.classList.add('d-none');
                document.getElementById('equipements_autres').value = '';
            }
        });

        // Prévisualisation des images
        const imageInput = document.getElementById('images');
        imageInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                const fileNames = Array.from(files).map(f => f.name).join(', ');
                console.log('Images sélectionnées:', fileNames);
            }
        });
    });
</script>

@endsection