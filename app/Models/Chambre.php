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

     protected $casts = [
        'images' => 'array',
    ];
     public function getImagesAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }
        return $value ? json_decode($value, true) : [];
    }


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
