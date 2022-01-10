<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmsComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'message',
        'film_id',
        'user_id'
    ];
    public  function filmsComment(){
        return $this->belongsTo(Film::class);
    }
    public  function filmsCommentUser(){
        return $this->belongsTo(User::class);
    }
}
