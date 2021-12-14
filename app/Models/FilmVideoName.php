<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmVideoName extends Model
{
    use HasFactory;
    protected $fillable = array('name', 'id_films');
    protected $table='film_video_name';
}
