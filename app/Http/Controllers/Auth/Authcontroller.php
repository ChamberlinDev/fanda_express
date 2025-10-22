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
    public function home()
    {
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
            'nom_complet' => $request->nom_complet,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/connexion')->with('success', 'Inscription réussie !');
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

    public function profil()
    {
        $hotels = Auth::user();
        // Envoyer à la vue
        return view('admin.profil.profil', compact('hotels'));
    }

    public function edit_profil()
    {
        $hotels = Auth::user();
        // Envoyer à la vue
        return view('admin.profil.edit', compact('hotels'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6'
        ]);

        // On prend toutes les données sauf password
        $data = $request->except('password');

        // Si password est rempli, on le hache et on l’ajoute
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect('/profil')->with('success', 'Profil mis à jour avec succès');
    }


    public function clients(){

        return view('admin.clients.index');
    }
}
