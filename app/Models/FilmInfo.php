<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmInfo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='film_info';
    protected $fillable = array('duration','actors','screenwriter');
    public function film()
    {

        return $this->belongsTo(Film::class);

    }

}
