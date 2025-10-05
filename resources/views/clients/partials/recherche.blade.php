<form action="#" class="booking_form">
	<hr>
	<h2 class="text-center">Recherche d'un Hôtel ou Appartement</h2>
	<hr>
	<div class="d-flex flex-xl-row flex-column align-items-start justify mt-5">
		<div class="booking_input_container d-flex flex-lg-row flex-column align-items-start justify-content-start">

			<!-- Type d'hôtel -->
			<div class="col-3 mb-3">
				<label for="type_hotel">Type d'hôtel</label>
				<select id="type_hotel" class="form-control text-dark" name="type_hotel" required>
					<option value="">-- Sélectionner --</option>
					<option value="appart">Appartement hôtel</option>
					<option value="chambre">Chambre d'hôtel</option>
				</select>
			</div>

			<!-- Gamme de prix -->
			<div class="col-3 mb-3">
				<label for="prix">Budget (par nuit)</label>
				<input type="number" id="prix" name="prix" class="form-control" placeholder="Ex: 50000 FCFA" required>
			</div>

			<!-- Localisation -->
			<div class="col-3 mb-3">
				<label for="localisation">Localisation</label>
				<input type="text" id="localisation" name="localisation" class="form-control" placeholder="Ville ou quartier" required>
			</div>

			<!-- Type de chambre -->
			<div class="col-3 mb-3" id="chambre_group">
				<label for="chambre">Type de chambre</label>
				<select id="chambre" class="form-control text-dark" name="chambre">
					<option value="">-- Sélectionner --</option>
					<option value="single">Simple</option>
					<option value="double">Double</option>
					<option value="suite">Suite</option>
					<option value="familiale">Familiale</option>
				</select>
			</div>
		</div>

		<!-- Bouton recherche (caché au départ) -->
		<div class="col-3 mb-3" id="btn_rechercher" style="display: none;">
			<label class="d-block">&nbsp;</label> 
			<button type="submit" class="btn btn-primary text-white">
				Rechercher
			</button>
		</div>
	</div>
</form>

<!-- Script -->
<script>
	const typeHotelSelect = document.getElementById("type_hotel");
	const chambreGroup = document.getElementById("chambre_group");
	const btnRechercher = document.getElementById("btn_rechercher");

	typeHotelSelect.addEventListener("change", function() {
		const typeHotel = this.value;

		// Afficher/Masquer classement et type chambre
		if (typeHotel === "appart") {
			chambreGroup.style.display = "none";
		} else if (typeHotel === "chambre") {
			chambreGroup.style.display = "block";
		}

		// Afficher le bouton seulement si un type est choisi
		btnRechercher.style.display = typeHotel ? "block" : "none";
	});
</script>