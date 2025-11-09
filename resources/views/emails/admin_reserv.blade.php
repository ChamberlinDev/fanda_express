<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle réservation reçue</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; background-color: #f8f9fa; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 30px;">
        
        <h2 style="text-align: center; color: #1a73e8;">🏨 Nouvelle réservation reçue</h2>
        <p style="text-align: center; color: #555;">
            Une nouvelle réservation vient d’être effectuée sur <strong>Fanda-express</strong>.
        </p>

        <hr style="margin: 20px 0;">

        <h3 style="color: #1a73e8;">👤 Informations client</h3>
        <p>
            <strong>Nom :</strong> {{ $reservation->prenom }} {{ $reservation->nom }} <br>
            <strong>Téléphone :</strong> {{ $reservation->telephone }} <br>
            <strong>Email :</strong> {{ $reservation->email ?? 'Non renseigné' }}
        </p>

        <h3 style="color: #1a73e8;">🛏️ Détails de la chambre</h3>
        <p>
            <strong>Nom :</strong> {{ $reservation->chambre->nom ?? '—' }} <br>
            <strong>Type :</strong> {{ $reservation->chambre->type ?? '—' }} <br>
            <strong>Prix par nuit :</strong> {{ number_format($reservation->chambre->prix ?? 0, 0, ',', ' ') }} FCFA <br>
            <strong>Date d’arrivée :</strong> {{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }} <br>
            <strong>Date de départ :</strong> {{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }} <br>
            <strong>Total estimé :</strong> 
            {{ number_format(
                $reservation->chambre && $reservation->date_debut && $reservation->date_fin 
                    ? \Carbon\Carbon::parse($reservation->date_debut)->diffInDays(\Carbon\Carbon::parse($reservation->date_fin)) * ($reservation->chambre->prix ?? 0)
                    : 0, 0, ',', ' ') 
            }} FCFA
        </p>


        <div style="text-align: center;">
            <a href="/connexion" class="btn btn-primary" >
               Accéder au tableau de bord
            </a>
        </div>

        <p style="text-align: center; margin-top: 30px; color: #777;">
            Merci,<br>
            <strong>Fanda-express</strong> 🧡
        </p>
    </div>
</body>
</html>
