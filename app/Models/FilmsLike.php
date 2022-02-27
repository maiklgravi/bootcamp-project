<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmsLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'film_id',
        'user_id'
    ];
    protected $table = 'films_like';
    public  function filmsLike(){
        return $this->belongsTo(Film::class);
    }
    public  function filmsLikeUser(){
        return $this->belongsTo(User::class);
    }

}
