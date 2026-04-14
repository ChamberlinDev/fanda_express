<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Hotel;
use App\Models\Reservation;
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
         'reservations'  => Reservation::count(),
      ];
      return view('superadmin_view', compact('users', 'stats'));
   }

   public function liste_users()
   {
      $users = User::paginate(10);

      return view('superadmin.users.liste', compact('users'));
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
      $hotel = Hotel::with([
         'chambres.reservations'
      ])->findOrFail($id);

      // Calcul par réservation
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

      return view('superadmin.reservations.show', compact(
         'hotel',
         'reservations',
         'totalEncaisse',
         'totalReservations'
      ));
   }

   public function show_appart($id)
   {
      $appart = Appartement::with('reservations')->findOrFail($id);

      // Calcul par réservation
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
