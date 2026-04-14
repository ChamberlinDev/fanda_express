<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    //
    protected $fillable = [
        'type_rapport',
        'date_debut',
        'date_fin',
        'montant_encaisse',
        'montant_perdu',
        'description',
        'user_id',
    ];

    protected $casts = [
        'date_debut'       => 'date',
        'date_fin'         => 'date',
        'montant_encaisse' => 'decimal:2',
        'montant_perdu'    => 'decimal:2',
    ];

    // Rapport appartient à un admin
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Bénéfice net calculé à la volée
    public function getBeneficeNetAttribute()
    {
        return $this->montant_encaisse - $this->montant_perdu;
    }

    // Période formatée
    public function getPeriodeAttribute()
    {
        return $this->date_debut->format('d/m/Y') . ' → ' . $this->date_fin->format('d/m/Y');
    }

}
