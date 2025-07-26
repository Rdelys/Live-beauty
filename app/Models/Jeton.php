<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeton extends Model
{
    protected $fillable = ['nom', 'description', 'nombre_de_jetons'];
}
