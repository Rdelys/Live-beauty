<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueLive extends Model
{
    use HasFactory;

    protected $table = 'historique_lives';

    protected $fillable = [
        'modele_id',
        'statut',
        'is_prive',
        'date_commencement',
        'date_fin',
        'duree', // ← IMPORTANT : inclure la nouvelle colonne
    ];

    protected $casts = [
        'is_prive' => 'boolean',
        'date_commencement' => 'datetime',
        'date_fin' => 'datetime',
    ];

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }
}