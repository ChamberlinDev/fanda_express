<section class="py-5" style="background-color: #2c3e50;">

    <div class="container py-4">

        {{-- En-tête --}}
        <div class="text-center mb-4">
            <p class="text-uppercase fw-semibold mb-2 small" style="color: #f5c842; letter-spacing: 0.2em;">
                Où souhaitez-vous séjourner ?
            </p>
            <h1 class="display-5 fw-light text-white mb-0">
                Trouvez votre hébergement idéal
            </h1>
        </div>

        {{-- Carte de recherche --}}
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-0">
                        <form action="{{ route('recherche.resultats') }}" method="GET" novalidate>
                            <div class="row g-0 align-items-stretch">

                                {{-- Type d'hébergement --}}
                                <div class="col-lg col-12 p-3 px-lg-4 border-bottom border-bottom-lg-0 border-end-0 border-lg-end">
                                    <label for="type_hotel" class="form-label text-uppercase fw-bold text-secondary mb-1" style="font-size: 0.68rem; letter-spacing: 0.1em;">
                                        <svg class="me-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#198754" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                                        Type d'hébergement
                                    </label>
                                    <select id="type_hotel"
                                            name="type_hotel"
                                            class="form-select border-0 p-0 fw-medium @error('type_hotel') is-invalid @enderror"
                                            style="font-size: 0.95rem; box-shadow: none; background-color: transparent;"
                                            required>
                                        <option value="">Sélectionner…</option>
                                        <option value="hotel"  {{ old('type_hotel') == 'hotel'  ? 'selected' : '' }}>Hôtel</option>
                                        <option value="appart" {{ old('type_hotel') == 'appart' ? 'selected' : '' }}>Appartement</option>
                                    </select>
                                    @error('type_hotel')
                                        <div class="invalid-feedback d-block" style="font-size: 0.75rem;">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Séparateur desktop --}}
                                <div class="d-none d-lg-block" style="width:1px; background:#e9ecef; margin:.75rem 0;"></div>

                                {{-- Localisation --}}
                                <div class="col-lg col-12 p-3 px-lg-4 border-bottom border-bottom-lg-0">
                                    <label for="localisation" class="form-label text-uppercase fw-bold text-secondary mb-1" style="font-size: 0.68rem; letter-spacing: 0.1em;">
                                        <svg class="me-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                        Localisation
                                    </label>
                                    <input type="text"
                                           id="localisation"
                                           name="localisation"
                                           class="form-control border-0 p-0 fw-medium @error('localisation') is-invalid @enderror"
                                           placeholder="Brazzaville, Pointe-Noire…"
                                           value="{{ old('localisation') }}"
                                           autocomplete="off"
                                           style="font-size: 0.95rem; box-shadow: none; background-color: transparent;"
                                           required>
                                    @error('localisation')
                                        <div class="invalid-feedback d-block" style="font-size: 0.75rem;">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Séparateur desktop --}}
                                <div class="d-none d-lg-block " style="width:1px; background:#e9ecef; margin:.75rem 0;"></div>

                                {{-- Budget --}}
                                <div class="col-lg col-12 p-3 px-lg-4 border-bottom border-bottom-lg-0">
                                    <label for="prix" class="form-label text-uppercase fw-bold text-secondary mb-1" style="font-size: 0.68rem; letter-spacing: 0.1em;">
                                        <svg class="me-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#198754" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                                        Budget max / nuit
                                    </label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="number"
                                               id="prix"
                                               name="prix"
                                               class="form-control border-0 p-0 fw-medium @error('prix') is-invalid @enderror"
                                               placeholder="Ex : 50 000"
                                               min="0"
                                               value="{{ old('prix') }}"
                                               style="font-size: 0.95rem; box-shadow: none; background-color: transparent;"
                                               >
                                        <span class="text-secondary fw-semibold text-nowrap" style="font-size: 0.72rem; letter-spacing: 0.05em;">FCFA</span>
                                    </div>
                                </div>

                                {{-- Bouton recherche --}}
                                <div class="col-lg-auto col-12 d-flex align-items-center p-3 ps-lg-2 pe-lg-3">
                                    <button type="submit"
                                            class="btn fw-bold w-100 d-flex align-items-center justify-content-center gap-2 rounded-3 py-3 px-4 text-white"
                                            style="background-color: #2c3e50;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                                        Rechercher
                                    </button>
                                </div>

                            </div>

                            @if(session('error'))
                                <div class="d-flex align-items-center gap-2 mx-3 mb-3 p-2 px-3 rounded-3" role="alert" style="background-color: #fdf3f2; border: 1px solid #f5c6c0; color: #922b21; font-size: 0.85rem;">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#e74c3c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ session('error') }}
                                </div>
                            @endif

                        </form>
                    </div>
                </div>

                {{-- Tags destinations Congo --}}
                <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
                    @foreach(['Brazzaville', 'Pointe-Noire'] as $ville)
                        <span class="badge rounded-pill fw-normal px-3 py-2"
                              style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: rgba(255,255,255,0.75); font-size: 0.78rem; cursor: pointer; letter-spacing: 0.03em;">
                            {{ $ville }}
                        </span>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</section>