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
    ];

    protected $casts = [
        'inputs' => 'array',
    ];
}
