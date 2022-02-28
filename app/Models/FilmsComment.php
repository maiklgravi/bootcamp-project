<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmsComment extends Model
{
    use HasFactory;
    protected $fillable = [

        'message',
        'film_id',
        'user_id'
    ];
    protected $table = 'films_comment';
    public  function filmsComment(){
        return $this->belongsTo(Film::class);
    }
    public  function filmsCommentUser(){
        return $this->belongsTo(User::class);
    }
}
