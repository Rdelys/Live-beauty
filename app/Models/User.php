<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'nom',
        'prenoms',
        'age',
        'pseudo',
        'departement',
        'email',
        'password',
        'numero_whatsapp', // ✅ ajouté
        'jetons', // ✅
        'album_id', // ✅ JSON/Array
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'album_id' => 'array', // ✅ transforme automatiquement JSON <-> array
    ];

    public function favoris()
    {
        return $this->belongsToMany(Modele::class, 'favoris');
    }

    public function achats()
    {
        return $this->hasMany(\App\Models\Achat::class);
    }
}
