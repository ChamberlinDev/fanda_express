<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation de réservation</title>
</head>
<body style="font-family: Arial, sans-serif; color:#333;">
    <h2>Bonjour {{ $reservation->prenom }} {{ $reservation->nom }},</h2>

    <p>Votre réservation a bien été enregistrée ✅</p>

    <h3 style="color:#1a73e8;">Détails de votre réservation</h3>

    <p><strong>Chambre :</strong> {{ $reservation->chambre->nom ?? 'Non spécifiée' }}</p>
    <p><strong>Prix par nuit :</strong> 
        {{ number_format($reservation->chambre->prix ?? 0, 0, ',', ' ') }} FCFA
    </p>

    <p><strong>Date d'arrivée :</strong> 
        {{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }}
    </p>
    <p><strong>Date de départ :</strong> 
        {{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }}
    </p>

    <p><strong>Total estimé :</strong>
        {{ number_format(
            $reservation->chambre && $reservation->date_debut && $reservation->date_fin 
                ? \Carbon\Carbon::parse($reservation->date_debut)->diffInDays(\Carbon\Carbon::parse($reservation->date_fin)) * ($reservation->chambre->prix ?? 0)
                : 0, 0, ',', ' ') 
        }} FCFA
    </p>

    <p>
    Votre réservation est actuellement en attente de confirmation.
    Avant votre arrivée prévue le
    <strong>{{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }}</strong>,
    l'hôtel <strong>{{ $reservation->chambre->hotel->nom }}</strong>
    vous contactera pour confirmer votre réservation et répondre à vos éventuelles questions.
</p>

<p>
    Pour garantir votre sécurité et celle de nos partenaires, toutes les réservations effectuées via
    <strong>Fanda-express</strong> sont enregistrées et peuvent être retracées.
</p>
</body>
</html>
