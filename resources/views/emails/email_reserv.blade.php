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

    <p>Avant le $reservation->date_debut, $reservation->chambre->hotel->nom vous appelera afin de discuter et finaliser votre reservation! pour des raison de securité vos reservations sont tracables </p>
    <hr style="margin:20px 0;">

    <h3 style="color:#1a73e8;">Informations sur l’hôtel</h3>
    <p><strong>Nom :</strong> {{ $reservation->chambre->hotel->nom ?? '—' }}</p>
    <p><strong>Adresse :</strong> {{ $reservation->chambre->hotel->adresse ?? '—' }}</p>
    <p><strong>Téléphone :</strong> {{ $reservation->chambre->hotel->telephone ?? '—' }}</p>
    <p><strong>Email :</strong> {{ $reservation->chambre->hotel->email ?? '—' }}</p>

    <p>Merci pour votre confiance<br>
    L’équipe <strong>Fanda-express</strong></p>
</body>
</html>
