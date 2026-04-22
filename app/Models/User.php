<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\Etablissement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom_complet',
        'adresse',
        'telephone',
        'email',
        'is_blocked',
        'password',
        'must_change_password',
    ];


    public function hotel()
    {
        return $this->hasOne(Hotel::class, 'user_id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }
    public function appartement()
    {
        return $this->hasOne(Appartement::class);
    }

    public function reservations_appart()
    {
        return $this->hasMany(Reservation_appart::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function rapports()
    {
        return $this->hasMany(Rapport::class, 'id_user');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
