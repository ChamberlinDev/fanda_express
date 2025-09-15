<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
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
    
    
}
