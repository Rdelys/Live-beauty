<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['modele_id', 'nom'];

    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }

    
}
