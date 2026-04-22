<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Blog;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Reservation_appart;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   //super admin


   public function admin_view()
   {

      $users = User::paginate(10);
      $stats = [
         'utilisateurs'  => User::count(),
         'hotels'        => Hotel::count(),
         'appartements'  => Appartement::count(),
         'reservations-hotel'  => Reservation::count(), 
         'reservations-appart'  => Reservation_appart::count(),
         'blogs'  => Blog::count(),
      ];
      return view('superadmin_view', compact('users', 'stats'));
   }

   public function liste_users()
   {
      $users = User::paginate(10);
      $stats = [
         'total' => User::count(),
         'actifs' => User::where('is_blocked', false)->count(),
         'bloques' => User::where('is_blocked', true)->count(),
         'admins' => User::role('admin')->count(),
      ];

      return view('superadmin.users.liste', compact('users', 'stats'));
   }

   public function modif_form($id)
   {
      $user = User::findOrFail($id);

      return view('superadmin.users.modif', compact('user'));
   }

   public function update_user(Request $request, $id)
   {
      $user = User::findOrFail($id);
      $user->nom_complet = $request->input('nom_complet');
      $user->email = $request->input('email');
      $user->save();

      return redirect()->route('superadmin.users')->with('success', 'Utilisateur mis à jour avec succès.');
   }

   public function bloquer($id)
   {
      $user = User::findOrFail($id);
      $user->is_blocked = true;
      $user->save();

      return redirect()->route('superadmin.users')->with('success', 'Utilisateur bloqué avec succès.');
   }

   public function debloquer($id)
   {
      $user = User::findOrFail($id);
      $user->is_blocked = false;
      $user->save();

      return redirect()->route('superadmin.users')->with('success', 'Utilisateur débloqué avec succès.');
   }

   public function supprimer_user($id)
   {
      $user = User::findOrFail($id);
      $user->delete();

      return redirect()->route('superadmin.users')->with('success', 'Utilisateur supprimé avec succès.');
   }





   public function liste_hotels()
   {
      $hotels = Hotel::paginate(10);
      return view('superadmin.hotels.liste', compact('hotels'));
   }

   public function detail_hotel($id)
   {
      $hotel = Hotel::with('chambres.reservations')->findOrFail($id);
      return view('superadmin.hotels.detail', compact('hotel'));
   }

   public function liste_appartements()
   {
      $apparts = Appartement::paginate(10);
      return view('superadmin.appartements.liste', compact('apparts'));
   }
   public function liste_reservations()
   {
      $hotels = Hotel::withCount('reservations')->get();
      $apparts = Appartement::withCount('reservations')->get();

      return view('superadmin.reservations.liste', compact('hotels', 'apparts'));
   }
   public function show($id)
   {
      $hotel = Hotel::with(['chambres.reservations'])->findOrFail($id);

      // Calcul par réservation pour les chambres d'hôtel
      $reservations = collect();
      foreach ($hotel->chambres as $chambre) {
         foreach ($chambre->reservations as $reservation) {
            $nuits   = \Carbon\Carbon::parse($reservation->date_debut)
               ->diffInDays($reservation->date_fin);
            $montant = $nuits * $chambre->prix;

            $reservations->push([
               'reservation' => $reservation,
               'chambre'     => $chambre,
               'nuits'       => $nuits,
               'montant'     => $montant,
            ]);
         }
      }

      $totalEncaisse  = $reservations->where('reservation.statut', 'acceptée')->sum('montant');
      $totalReservations = $reservations->count();

      return view('superadmin.hotels.show', compact(
         'hotel',
         'reservations',
         'totalEncaisse',
         'totalReservations'
      ));
   }

   public function show_appart($id)
   {
      $appart = Appartement::with('reservations')->findOrFail($id);

      // Calcul des réservations pour les appartements
      $reservations = collect();
      foreach ($appart->reservations as $reservation) {
         $nuits   = \Carbon\Carbon::parse($reservation->date_debut)
            ->diffInDays($reservation->date_fin);
         $montant = $nuits * $appart->prix;

         $reservations->push([
            'reservation' => $reservation,
            'nuits'       => $nuits,
            'montant'     => $montant,
         ]);
      }

      $totalEncaisse  = $reservations->where('reservation.statut', 'acceptée')->sum('montant');
      $totalReservations = $reservations->count();

      return view('superadmin.appartements.detail', compact(
         'appart',
         'reservations',
         'totalEncaisse',
         'totalReservations'
      ));
   }
}
