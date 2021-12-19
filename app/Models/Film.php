<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    public function videoName()
    {
        return $this->hasMany(FilmVideoName::class);
    }
    public function alternativName()
    {
        return $this->hasMany(FilmAlternativName::class);
    }
    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }
    protected $fillable = array('image', 'description','date','name','status');
    

    protected $table = 'films';
}
