<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   //
   public function admin_view()
   {

    $users = User::paginate(10);
      return view('superadmin_view', compact('users'));
   }

   public function liste_users()
   {
      $users = User::paginate(10);
      
      return view('superadmin.users.liste', compact('users'));
   }

}
