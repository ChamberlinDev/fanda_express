<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire_app extends Model
{
    //
    protected $fillable = [
        'avis',
    ];
    // Modèle Commentaire_app
    public function appartement()
    {
        return $this->belongsTo(Appartement::class);
    }
    public function hotel ()
    {
        return $this->belongsTo(Hotel::class);
    }   
}
