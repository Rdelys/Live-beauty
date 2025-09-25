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
    'duree_show_privee',
    'age',
    'taille',
    'silhouette',
    'poitrine',
    'fesse',
    'langue',
    'services',
    'mode',           // <-- ajouté
    'type_flou',      // <-- ajouté
    'prix_flou'       // <-- ajouté
];

protected $casts = [
    'photos'     => 'array',
    'video_link' => 'array',
    'video_file' => 'array',
    'mode'       => 'integer', // <-- ajouté
    'prix_flou'  => 'float',   // <-- ajouté
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

protected static function booted()
{
    static::updated(function ($modele) {
        if ($modele->isDirty('en_ligne') && $modele->en_ligne == 1) {
            \App\Models\ModeleHistorique::create([
                'modele_id' => $modele->id,
                'jour'      => now()->toDateString(),
            ]);
        }
    });
}


}
