<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreFilm extends Model
{
    use HasFactory;
    protected $fillable = array('genre_id', 'film_id');
    protected $table = 'genre_film';
}
