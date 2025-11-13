<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre réservation a été confirmée</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; background-color: #f7f8fa; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05); padding: 30px;">
        
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="../images/logo.jpeg" alt="Fanda Express" style="width: 120px;">
        </div>

        <h2 style="text-align: center; color: #28a745;">❌ Réservation Refusée !</h2>

        <p>Bonjour <strong>{{ $reservation->prenom }} {{ $reservation->nom }}</strong>,</p>

        <p>Nous avons le regret de vous informer que votre réservation a été <strong>rejeté</strong> par notre équipe.  
        Toute l’équipe de <strong>{{ $reservation->chambre->hotel->nom ?? '—' }}</strong> est desolée de vous annoncer cette nouvelle !</p>

       

        <h3 style="color: #1a73e8;">🏨 Hôtel</h3>
        <p>
            <strong>{{ $reservation->chambre->hotel->nom ?? '—' }}</strong><br>
            {{ $reservation->chambre->hotel->adresse ?? '' }}<br>
            📞 {{ $reservation->chambre->hotel->telephone ?? '' }}  
            📧 {{ $reservation->chambre->hotel->email ?? '' }}
        </p>

        <p>Nous vous recommandons de refaire la demande à l’hôtel<strong></strong>.  
        </p>

        
        <p style="margin-top: 40px; text-align: center; color: #777;">
            Merci pour votre confiance 💙<br>
            <strong>Fanda-express</strong>
        </p>
    </div>
</body>
</html>
