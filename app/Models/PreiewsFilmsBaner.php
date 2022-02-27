<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreiewsFilmsBaner extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'film_id',
        'image'
    ];
    public  function filmsrefirenses(){
        return $this->belongsTo(Film::class);
    }
}
