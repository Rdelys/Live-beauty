<?php

// app/Models/Live.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Modele;

class Live extends Model
{
    protected $fillable = ['modele_id', 'is_active'];

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }
}
