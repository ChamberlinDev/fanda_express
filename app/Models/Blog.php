<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable =
    [
        'titre',
        'contenu',
        'image',
        'user_id'

    ];

    public function etablissement()
    {
        return $this->belongsTo(etablissement_mod::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
