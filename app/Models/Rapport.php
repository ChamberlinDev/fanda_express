<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    //
    protected $fillable = [
        'id',
        'type_rapport',
        'montant_entrees',
        'montant_sorties',
        'description',
        'date_rapport',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
