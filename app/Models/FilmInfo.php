<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmInfo extends Model
{
    use HasFactory;
    protected $table='film_info';
    protected $fillable = array('name', 'id_films','duration','actors','screenwriter');
    public function film()
    {
        return $this->hasOne(Film::class);
    }
    
}
