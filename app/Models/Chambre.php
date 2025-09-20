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
        'hotel_id'
    ];


   public function etablissement()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
