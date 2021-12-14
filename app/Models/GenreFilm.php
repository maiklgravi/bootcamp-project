<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreFilm extends Model
{
    use HasFactory;
    protected $fillable = array('id_genre', 'id_films');
    protected $table = 'genre_film';
}
