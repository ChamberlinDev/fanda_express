<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    //
 public function rechercher(Request $request)
{
    $request->validate([
        'type_hotel'   => 'required|in:hotel,appart',
        'localisation' => 'required|string|max:255',
        'prix'         => 'required|numeric|min:0',
    ]);

    $type         = $request->type_hotel;
    $localisation = $request->localisation;
    $prix         = $request->prix;

    $localisation_trouvee = false;

    // =========================
    // 🔹 HOTEL (SANS PRIX)
    // =========================
    if ($type === 'hotel') {

        $query = Hotel::query();

        $localisation_trouvee = $query->where(function ($q) use ($localisation) {
            $q->where('ville', 'LIKE', "%{$localisation}%")
              ->orWhere('adresse', 'LIKE', "%{$localisation}%");
        })->exists();

        $query = Hotel::query();

        if ($localisation_trouvee) {
            $query->where(function ($q) use ($localisation) {
                $q->where('ville', 'LIKE', "%{$localisation}%")
                  ->orWhere('adresse', 'LIKE', "%{$localisation}%");
            });
        }

        // ❌ PAS de filtre prix ici

        $resultats = $query->orderBy('nom')->paginate(9);
    }

    // =========================
    // 🔹 APPARTEMENTS (AVEC PRIX)
    // =========================
    elseif ($type === 'appart') {

        $query = Appartement::query();

        $localisation_trouvee = $query->where(function ($q) use ($localisation) {
            $q->where('ville', 'LIKE', "%{$localisation}%")
              ->orWhere('adresse', 'LIKE', "%{$localisation}%");
        })->exists();

        $query = Appartement::query();

        if ($localisation_trouvee) {
            $query->where(function ($q) use ($localisation) {
                $q->where('ville', 'LIKE', "%{$localisation}%")
                  ->orWhere('adresse', 'LIKE', "%{$localisation}%");
            });
        }

        // ✅ filtre prix uniquement ici
        $query->where('prix', '<=', $prix);

        $resultats = $query->orderBy('prix')->paginate(9);
    }

    return view('resultat', [
        'resultats'            => $resultats,
        'type'                 => $type,
        'localisation'         => $localisation,
        'prix'                 => $prix,
        'total'                => $resultats->total(),
        'localisation_trouvee' => $localisation_trouvee,
    ]);
}
}
