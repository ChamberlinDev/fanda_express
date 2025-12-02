<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterValidation;
use App\Models\Appartement;
use App\Models\Chambre;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    //
    public function home()
    {
        $admin = auth()->user();

        // Récupérer l’hôtel de l’admin
        $hotel = Hotel::where('user_id', $admin->id)->first();

        // Si aucun hôtel n'est associé, on affiche quand même le dashboard
        if (!$hotel) {
            return view('welcome', [
                'hotel' => null,
                'chambres' => collect(),
                'reservations' => collect(),
                'totalReservations' => 0,
                'totalhotels' => 0,
                'totalClients' => 0,
                'totalAppartements' => 0,
                'revenuTotal' => 0,
                'message' => "Aucun hôtel n'est encore associé à votre compte."
            ]);
        }

        // Récupérer les chambres de cet hôtel
        $chambres = Chambre::where('hotel_id', $hotel->id)->get();

        // Récupérer les appartements de l’admin
        $appartements = Appartement::where('user_id', $admin->id)->get();

        // Récupérer les réservations récentes
        $reservations = Reservation::whereIn('chambre_id', $chambres->pluck('id'))
            ->latest()
            ->take(5)
            ->get();

        // Statistiques
        $totalReservations = $reservations->count();
        $totalChambres = $chambres->count();
        $totalClients = Reservation::whereIn('chambre_id', $chambres->pluck('id'))
            ->distinct('email')
            ->count('email');

        // Récupérer toutes les réservations confirmées
        $reservationsConfirmees = Reservation::whereIn('chambre_id', $chambres->pluck('id'))
            ->where('statut', 'acceptée')
            ->get();

        $revenuTotal = $reservationsConfirmees->sum(function ($reservation) {
            $jours = Carbon::parse($reservation->date_fin)
                ->diffInDays(Carbon::parse($reservation->date_debut));
            return $jours * $reservation->chambre->prix;
        });

        $totalAppartements = $appartements->count();
        $totalhotels = 1;

        return view('admin.dashboard', compact(
            'hotel',
            'chambres',
            'reservations',
            'totalReservations',
            'totalhotels',
            'totalClients',
            'totalAppartements',
            'revenuTotal',
        ));
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


    public function clients_liste()
    {
        return view('admin.clients.index');
    }
}
