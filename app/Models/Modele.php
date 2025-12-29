<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;

class Modele extends Authenticatable implements CanResetPasswordContract
{
    use HasFactory, Notifiable, CanResetPassword;

    protected $table = 'modeles';

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
        'mode',
        'type_flou',
        'prix_flou',
        'prix_flou_detail',
        'prive',
            'message_font_size',
    'message_color',
    'received_message_font_size',
    'received_message_color',
    ];

    protected $casts = [
        'photos'     => 'array',
        'video_link' => 'array',
        'video_file' => 'array',
        'mode'       => 'boolean',
        'prix_flou'  => 'float',
        'prix_flou_detail' => 'float',
        'prive'      => 'boolean',
            'message_font_size' => 'string',
    'message_color' => 'string',
    'received_message_font_size' => 'string',
    'received_message_color' => 'string',

    ];

    // 🔥 Optionnel : protéger le mot de passe à la sortie
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔥 Hash automatique du mot de passe quand on le définit
    public function setPasswordAttribute($value)
    {
        if ($value && strlen($value) < 60) { // évite de re-hasher un mot de passe déjà hashé
            $this->attributes['password'] = bcrypt($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

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

    public function achats()
    {
        return $this->hasMany(\App\Models\Achat::class);
    }

    public function galleryPhotos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Hooks Eloquent
    |--------------------------------------------------------------------------
    */
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

    public function albums()
{
    return $this->hasMany(Album::class);
}

// App\Models\Modele.php
public function historiques()
{
    return $this->hasMany(\App\Models\ModeleHistorique::class);
}

public function derniereConnexion()
{
    return $this->hasOne(\App\Models\ModeleHistorique::class)
                ->latest('created_at');
}

    public function connexions()
    {
        return $this->hasMany(ModeleConnexion::class);
    }

    /**
     * Dernière connexion
     */
    public function derniereConnexion2()
    {
        return $this->hasOne(ModeleConnexion::class)->latest();
    }
}
