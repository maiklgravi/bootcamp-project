<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmsDislike extends Model
{
    use HasFactory;
    protected $fillable = [
        'film_id',
        'user_id'
    ];
    protected $table = 'dislike';
    public  function filmsDislike(){
        return $this->belongsTo(Film::class);
    }
    public  function filmsDislikeUser(){
        return $this->belongsTo(User::class);
    }
}
