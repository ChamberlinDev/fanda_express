<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Hotel extends Model
{
    //
    protected $fillable = [
        'nom',
        'ville',
        'adresse',
        'images',
        'description',
        'equipements',
        'user_id',
    ];

    public function chambres()
    {
        return $this->hasMany(Chambre::class, 'hotel_id');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations(): HasManyThrough
    {
        return $this->hasManyThrough(
            Reservation::class,
            Chambre::class,
            'hotel_id',      // Clé étrangère dans la table chambres
            'chambre_id',    // Clé étrangère dans la table réservations
            'id',            // Clé primaire de la table hôtels
            'id'             // Clé primaire de la table chambres
        );
    }
}
