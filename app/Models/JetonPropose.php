<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JetonPropose extends Model
{
    protected $table = 'jetons_proposes';

    protected $fillable = [
        'nom',
        'description',
        'nombre_de_jetons',
        'inputs',
                'prise',  // 🔥 AJOUT ICI
                    'modele_id',   // <—— ✔ AJOUT

    ];

    protected $casts = [
        'inputs' => 'array',
                'prise'  => 'integer', // 🔥 IMPORTANT pour que Blade lise bien 0 ou 1

    ];

    public function modele()
{
    return $this->belongsTo(Modele::class);
}

}
