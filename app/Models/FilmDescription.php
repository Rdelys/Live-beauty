<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmDescription extends Model
{
    protected $fillable = ['description'];

    protected $table = 'films_descriptions';
}
