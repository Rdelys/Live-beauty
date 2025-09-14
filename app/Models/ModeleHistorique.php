<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModeleHistorique extends Model
{
    protected $fillable = ['modele_id', 'jour'];

    public function modele()
    {
        return $this->belongsTo(\App\Models\Modele::class);
    }
}
