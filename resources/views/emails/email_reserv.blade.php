<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation de réservation</title>
</head>
<body>
    <h2>Bonjour {{ $reservation->prenom }} {{ $reservation->nom }},</h2>
    <p>Votre réservation a bien été enregistrée.</p>

    <p><strong>Chambre :</strong> {{ $reservation->chambre_id }}</p>
    <p><strong>Date d'arrivée :</strong> {{ $reservation->date_debut }}</p>
    <p><strong>Date de départ :</strong> {{ $reservation->date_fin }}</p>

    <p>Merci pour votre confiance !</p>
</body>
</html>
