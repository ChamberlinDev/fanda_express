<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'file_path',
        'hotel_id',
        'appartement_id',

    ];


    public function hotel(){

         return $this->belongsTo(Hotel::class);
    }
    public function appartement(){
        return $this->belongsTo(Appartement::class);
    }
}
