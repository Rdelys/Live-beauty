<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'user_id',
        'modele_id',
        'detail',
        'minutes',
        'jetons',
        'type_envoi',
        'statut'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }
}
