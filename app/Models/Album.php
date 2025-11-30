<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

// App\Models\Album.php
protected $fillable = ['modele_id', 'nom', 'prix','etat', 'type_flou'];

    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }

    
}
