@extends('clients.layout.app')
@section('content')

<section class="container my-5">
    <h3 class="mb-4 text-primary text-center">
        <i class="bi bi-calendar-check"></i> Réservation
    </h3>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est molestias voluptatum odit ipsum recusandae aspernatur labore excepturi,
         sint voluptas. Atque unde at laudantium aliquid est nemo eaque dolorum accusamus illum.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus quae libero distinctio in! Nesciunt, corrupti dignissimos! Asperiores veritatis quidem illo ut culpa,
         deleniti, dolorem quibusdam nobis exercitationem facere adipisci saepe!</p>

    <form action="#" method="POST" class="p-4 bg-light rounded shadow-sm">
        @csrf

        <!-- Informations client -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nom" class="form-label text-dark">Nom complet</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Ex: Jean KOUANGA" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label text-dark">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="exemple@gmail.com" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="telephone" class="form-label text-dark">Téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="+242 06 123 4567" required>
            </div>
            <div class="col-md-6">
                <label for="ville" class="form-label text-dark">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Brazzaville" required>
            </div>
        </div>

        <!-- Informations réservation -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date_arrivee" class="form-label text-dark">Date d'arrivée</label>
                <input type="date" class="form-control text-dark" id="date_arrivee" name="date_arrivee" required>
            </div>
            <div class="col-md-6">
                <label for="date_depart" class="form-label text-dark">Date de départ</label>
                <input type="date" class="form-control text-dark" id="date_depart" name="date_depart" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nb_personnes" class="form-label text-dark">Nombre de personnes</label>
                <input type="number" class="form-control text-dark" id="nb_personnes" name="nb_personnes" min="1" value="1" required>
            </div>
            <div class="col-md-6">
                <label for="type_chambre" class="form-label text-dark">Type de chambre</label>
                <select class="form-control text-dark" id="type_chambre" name="type_chambre" required>
                    <option value="">-- Sélectionner --</option>
                    <option value="standard">Chambre Standard</option>
                    <option value="suite">Suite Junior</option>
                    <option value="vip">Suite VIP</option>
                </select>
            </div>
        </div>

        <!-- Commentaire -->
        <div class="mb-3">
            <label for="message" class="form-label text-dark">Prix</label>
            <input class="form-control col-6" name="prix">
        </div>

        <!-- Bouton -->
        <div class="text-end">
            <button type="submit" class="btn btn-secondary">
                <i class="bi bi-cancel"></i> Annuler
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Confirmer la reservation
            </button>
        </div>
    </form>
</section>
@endsection