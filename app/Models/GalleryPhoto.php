<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'modele_id',
        'photo_url',
        'video_url',   // <-- ajouté
        'payant',
        'prix',
        'type_flou'
    ];

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }
}
