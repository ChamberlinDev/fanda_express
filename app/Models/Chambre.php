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
        'images',
        'hotel_id'
    ];


    public function etablissement()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'chambre_id');
    }
}
