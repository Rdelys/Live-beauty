<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeton extends Model
{
    protected $fillable = ['nom', 'description', 'nombre_de_jetons',     'modele_id', // ✅ très important pour que Laravel l’enregistre
];

    public function modele()
{
    return $this->belongsTo(Modele::class);
}

}
