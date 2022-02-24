<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class Film extends Model implements LoggableInterface
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
    public function filmInfo()
    {
        return $this->hasOne(FilmInfo::class);
    }
    public function filmsComments(){
        return $this->hasMany(FilmsComment::class);
    }
    public function filmsLike(){
        return $this->hasMany(FilmsLike::class);
    }
    public function convertToLoggableString(): string{
        return "Film with id {$this->id}";
    }
    public function getData(): array{
        return[
            'id'=> $this->id,
            'image'=>$this->image,
            'description'=>$this->description,
            'name'=>$this->name,
            'public_availability'=>$this->public_availability,
            'view_count'=>$this->view_count,

        ];
    }

    protected $fillable = array('image', 'description','date','name','status');


    protected $table = 'films';
}
