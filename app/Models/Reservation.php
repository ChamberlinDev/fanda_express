<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'chambre_id',
        'nom',
        'prenom',
        'telephone',
        'date_debut',
        'date_fin'
    ];

    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'chambre_id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
