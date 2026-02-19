<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Appartement extends Model
{
    //

    protected $fillable = [
        'nom',
        'ville',
        'adresse',
        'nbre_chambre',
        'description',
        'equipements',
        'images',
        'prix',
        'user_id',
    ];


    public function chambres()
    {
        return $this->hasMany(Chambre::class, 'etablissement_id');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reservations(): HasManyThrough
    {
        return $this->hasManyThrough(
            Reservation::class,
            Chambre::class,
            'id',      // Clé étrangère dans la table chambres
            'chambre_id',    // Clé étrangère dans la table réservations
            'id',            // Clé primaire de la table appartements
            'id'             // Clé primaire de la table chambres
        );
    }
}
