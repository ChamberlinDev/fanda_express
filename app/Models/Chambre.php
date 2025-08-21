<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    //

    protected $fillable =
    [
        'nom',
        'capacite',
        'prix',
        'image',
        'etablissement_id'
    ];


    public function etablissement_mod()
    {
        return $this->belongsTo(etablissement_mod::class);
    }
}
