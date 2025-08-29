<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ← pour guard
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable; // ← pour notify()

class Modele extends Authenticatable implements CanResetPasswordContract
{
    use HasFactory, Notifiable, CanResetPassword;

    protected $fillable = [
    'nom',
    'prenom',
    'description',
    'video_link',
    'video_file',
    'photos',
    'email',
    'password',
    'en_ligne',
    'nombre_jetons_show_privee',
    'duree_show_privee',   // ✅ nouveau champ
];



    protected $casts = [
        'photos'     => 'array',
        'video_link' => 'array',
        'video_file' => 'array',
    ];

    protected $table = 'modeles';

    public function jetons()
    {
        return $this->hasMany(Jeton::class);
    }

    public function favoris()
    {
        return $this->belongsToMany(User::class, 'favoris');
    }

    public function showPrives()
{
    return $this->hasMany(ShowPrive::class, 'modele_id');
}

}
