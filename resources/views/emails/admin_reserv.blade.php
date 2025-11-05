# Nouvelle réservation reçue 🏨

Une nouvelle réservation a été effectuée.  

**Client :**
- Nom : {{ $reservation->prenom }} {{ $reservation->nom }}
- Téléphone : {{ $reservation->telephone }}
- Email : {{ $reservation->email ?? 'Non renseigné' }}

**Chambre :**
- Chambre ID : {{ $reservation->chambre_id }}
- Date d’arrivée : {{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }}
- Date de départ : {{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }}

Vous pouvez consulter toutes les réservations dans votre tableau de bord :  
[Accéder au tableau de bord]({{ url('/dashboard') }})

Merci,  
**{{ config('app.name') }}**
