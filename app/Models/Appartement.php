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
        'description',
        'equipements',
        'image',
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
}
