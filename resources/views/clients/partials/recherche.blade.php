<div class="container my-5">
	<div class="card shadow-lg border-0 rounded-lg">
		<div class="card-body p-4">
			<div class="text-center mb-4">
				<h2 class="font-weight-bold text-primary mb-2">
					<i class="bi bi-search mr-2"></i>Recherche d'un Hôtel ou Appartement
				</h2>
				<p class="text-muted">Trouvez l'hébergement parfait pour votre séjour</p>
			</div>

			<form action="#" class="booking_form" method="GET">
				<div class="row">
					<!-- Type d'hébergement -->
					<div class="col-lg-3 col-md-6 mb-3">
						<label for="type_hotel" class="font-weight-bold">
							<i class="bi bi-building text-primary mr-2"></i>Type d'hébergement
						</label>
						<select id="type_hotel" class="form-control form-control-lg" name="type_hotel" required>
							<option value="">-- Sélectionner --</option>
							<option value="chambre">Chambre d'hôtel</option>
							<option value="appart">Appartement</option>
						</select>
					</div>

					<!-- Localisation -->
					<div class="col-lg-3 col-md-6 mb-3">
						<label for="localisation" class="font-weight-bold">
							<i class="bi bi-geo-alt-fill text-danger mr-2"></i>Localisation
						</label>
						<input type="text" id="localisation" name="localisation" 
							   class="form-control form-control-lg" 
							   placeholder="Ville ou quartier" required>
					</div>

					<!-- Budget -->
					<div class="col-lg-3 col-md-6 mb-3">
						<label for="prix" class="font-weight-bold">
							<i class="bi bi-cash-stack text-success mr-2"></i>Budget (par nuit)
						</label>
						<input type="number" id="prix" name="prix" 
							   class="form-control form-control-lg" 
							   placeholder="Ex: 50000" min="0" required>
					</div>

					<!-- Type de chambre (masqué par défaut) -->
					<div class="col-lg-3 col-md-6 mb-3" id="chambre_group" style="display: none;">
						<label for="chambre" class="font-weight-bold">
							<i class="bi bi-door-open text-info mr-2"></i>Type de chambre
						</label>
						<select id="chambre" class="form-control form-control-lg" name="chambre">
							<option value="">-- Sélectionner --</option>
							<option value="simple">Simple</option>
							<option value="double">Double</option>
							<option value="suite">Suite</option>
							<option value="familiale">Familiale</option>
						</select>
					</div>

					<!-- Bouton recherche -->
					<div class="col-lg-3 col-md-6 mb-3" id="btn_rechercher" style="display: none;">
						<label class="font-weight-bold d-block">&nbsp;</label>
						<button type="submit" class="btn btn-primary btn-lg btn-block">
							<i class="bi bi-search mr-2"></i>Rechercher
						</button>
					</div>
				</div>

				<!-- Message d'aide -->
				<div class="alert alert-light border mt-3" role="alert" id="help_message">
					<i class="bi bi-info-circle text-primary mr-2"></i>
					<small class="text-muted">Sélectionnez le type d'hébergement pour commencer votre recherche</small>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Script -->
<script>
	const typeHotelSelect = document.getElementById("type_hotel");
	const chambreGroup = document.getElementById("chambre_group");
	const btnRechercher = document.getElementById("btn_rechercher");
	const helpMessage = document.getElementById("help_message");

	typeHotelSelect.addEventListener("change", function() {
		const typeHotel = this.value;

		// Masquer le message d'aide si un type est sélectionné
		if (typeHotel) {
			helpMessage.style.display = "none";
		} else {
			helpMessage.style.display = "block";
		}

		// Afficher/Masquer le type de chambre selon le type d'hébergement
		if (typeHotel === "appart") {
			chambreGroup.style.display = "none";
			// Réinitialiser le select chambre
			document.getElementById("chambre").value = "";
		} else if (typeHotel === "chambre") {
			chambreGroup.style.display = "block";
		} else {
			chambreGroup.style.display = "none";
		}

		// Afficher le bouton de recherche si un type est choisi
		btnRechercher.style.display = typeHotel ? "block" : "none";
	});
</script>