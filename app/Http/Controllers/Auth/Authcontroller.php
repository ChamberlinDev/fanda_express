<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    //
     public function home(){
        return view('welcome');
    }
    
    public function loginform()
    {
        return view('auth.login');
    }

    public function registerform()
    {
        return view('auth.register');
    }


    public function register(RegisterValidation $request)
    {
        User::create([
            'nom_hotel' => $request->nom_hotel,
            'code' => $request->code,
            'description' => $request->description,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/')->with('success', 'Inscription réussie !');
    }

    public function login(Request $request)
    {
        // Validation des champs
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {

            $request->session()->regenerate();

            return redirect()->intended('/home')->with('success', 'Connexion réussie !');
        }
            return back()->with('error', 'Email ou mot de passe incorrect.');

}
}
