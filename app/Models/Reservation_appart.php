<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation_appart extends Model
{
    //
    protected $fillable = [
        'code_reservation',
        'appartement_id',
        'nom',
        'prenom',
        'telephone',
        'email',
        'date_debut',
        'date_fin',
        'statut'
    ];


    public function appartement()
    {
        return $this->belongsTo(Appartement::class);
    }
}
