<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   //
   public function admin_view()
   {

    $users = User::paginate(10);
    $stats= [
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

}
