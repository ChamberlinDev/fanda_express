<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etablissement_mod extends Model
{
    // 
    use HasFactory;

    protected $fillable = [
        'type',
        'nom',
        'ville',
        'adresse',
        'classement',
        'nbre_chambre',
        'surface',
        'description',
        'equipements',
        'images',
        'user_id',
    ];
}
