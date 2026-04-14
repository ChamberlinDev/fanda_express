<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <h2 class="font-weight-bold text-primary mb-2">
                    <i class="bi bi-search mr-2"></i>Recherche d'un Hôtel ou Appartement
                </h2>
                <p class="text-muted">Trouvez l'hébergement parfait pour votre séjour</p>
            </div>

            <form action="{{ route('recherche.resultats') }}" class="booking_form" method="GET">
                <div class="row align-items-end">

                    {{-- Type d'hébergement --}}
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="type_hotel" class="font-weight-bold">
                            <i class="bi bi-building text-primary mr-2"></i>Type d'hébergement
                        </label>
                        <select id="type_hotel"
                                class="form-control form-control-lg @error('type_hotel') is-invalid @enderror"
                                name="type_hotel" required>
                            <option value="">-- Sélectionner --</option>
                            <option value="hotel"  {{ old('type_hotel') == 'hotel'  ? 'selected' : '' }}>Hôtel</option>
                            <option value="appart" {{ old('type_hotel') == 'appart' ? 'selected' : '' }}>Appartement</option>
                        </select>
                        @error('type_hotel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Localisation --}}
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="localisation" class="font-weight-bold">
                            <i class="bi bi-geo-alt-fill text-danger mr-2"></i>Localisation
                        </label>
                        <input type="text"
                               id="localisation"
                               name="localisation"
                               class="form-control form-control-lg @error('localisation') is-invalid @enderror"
                               placeholder="Ville ou quartier"
                               value="{{ old('localisation') }}"
                               required>
                        @error('localisation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Budget --}}
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="prix" class="font-weight-bold">
                            <i class="bi bi-cash-stack text-success mr-2"></i>Budget max (par nuit)
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="number"
                                   id="prix"
                                   name="prix"
                                   class="form-control @error('prix') is-invalid @enderror"
                                   placeholder="Ex: 50000"
                                   min="0"
                                   value="{{ old('prix') }}"
                                   required>
                            <div class="input-group-append">
                                <span class="input-group-text bg-white text-muted"
                                      style="font-size: 0.85rem;">FCFA</span>
                            </div>
                        </div>
                        @error('prix')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Bouton recherche --}}
                    <div class="col-lg-3 col-md-6 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <i class="bi bi-search mr-2"></i>Rechercher
                        </button>
                    </div>

                </div>

                @if(session('error'))
                    <div class="alert alert-danger mt-3 mb-0">
                        <i class="bi bi-exclamation-triangle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

            </form>
        </div>
    </div>
</div>