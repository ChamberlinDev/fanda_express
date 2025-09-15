<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
    //

    protected $fillable = [
        'nom',
        'ville',
        'adresse',
        'nbre_chambre',
        'surface',
        'description',
        'equipements',
        'images',
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
}
