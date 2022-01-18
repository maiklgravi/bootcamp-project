<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

class FilmController extends Controller
{
    
    public function index () 
    {   
        $genre = Genre::select()->get();
        $films = Film::select([
            'id',
            'image',
            'description',
            'date',
            'name',
            'status',])
            ->get();
        return view('film.film',['films'=>$films , 'genre'=>$genre]);

    }
    public function show ($articlesId) 
    {   
        $films = Film::findOrFail($articlesId);
        return view('film_item' , [
            'films' => $films , 
            ]);

    }
    public function recomanded () 
    {
        $films = Film::select([
            'id',
            'image',
            'description',
            'date',
            'name',
            'status',])
            ->orderBy('like','DESC')->limit(4)->get();
        return view('film.film',['films'=>$films]);

    }
    
}
