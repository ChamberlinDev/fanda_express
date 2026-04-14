<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    //caisse

    public function index()
    {
        $reservations = Reservation::with(['chambre.hotel'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($r) {
                $nuits = \Carbon\Carbon::parse($r->date_debut)
                    ->diffInDays(\Carbon\Carbon::parse($r->date_fin));
                $r->nuits   = $nuits;
                $r->montant = $nuits * ($r->chambre->prix ?? 0);
                return $r;
            });

        // Stats
        $totalEncaisse  = $reservations->where('statut', 'acceptée')->sum('montant');
        $totalRefuse    = $reservations->where('statut', 'refusée')->sum('montant');
        $totalEnAttente = $reservations->where('statut', 'en attente')->sum('montant');

        return view('admin.caisse.index', compact(
            'reservations',
            'totalEncaisse',
            'totalRefuse',
            'totalEnAttente'
        ));
    }

    // rapport
    public function rapport_index()
    {
        $rapports = Rapport::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.rapport.index', compact('rapports'));
    }

    public function create_rapport()
    {
        return view('admin.rapport.create');
    }

    public function store_rapport(Request $request)
    {
        // Validation des données du rapport
        $request->validate([
            'type_rapport' => 'required|in:journalier,hebdomadaire,mensuel,annuel',
            'date_debut'   => 'required|date',
            'date_fin'     => 'required|date|after_or_equal:date_debut',
            'description'  => 'nullable|string|max:1000',
        ]);

        // Récupérer les réservations sur la période
        $reservations = Reservation::with('chambre')
            ->whereBetween('date_debut', [$request->date_debut, $request->date_fin])
            ->get()
            ->map(function ($r) {
                $nuits      = \Carbon\Carbon::parse($r->date_debut)->diffInDays($r->date_fin);
                $r->montant = $nuits * ($r->chambre->prix ?? 0);
                return $r;
            });

        // Calcul automatique
        $montantEncaisse = $reservations->where('statut', 'acceptée')->sum('montant');
        $montantPerdu    = $reservations->where('statut', 'refusée')->sum('montant');

        Rapport::create([
            'type_rapport'     => $request->type_rapport,
            'date_debut'       => $request->date_debut,
            'date_fin'         => $request->date_fin,
            'montant_encaisse' => $montantEncaisse,
            'montant_perdu'    => $montantPerdu,
            'description'      => $request->description,
            'user_id'          => Auth::id(),
        ]);

        return redirect()->route('admin.rapport.index')
            ->with('success', 'Rapport généré avec succès !');
    }

    public function destroy($id)
    {
        Rapport::findOrFail($id)->delete();
        return back()->with('success', 'Rapport supprimé.');
    }
}
