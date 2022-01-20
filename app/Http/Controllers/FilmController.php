<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Services\ModelLogger;
use Psr\Log\LoggerInterface;

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
    public function show ($filmId, Request $request, ModelLogger $logger) 
    {   
        
        $films = Film::findOrFail($filmId);
        $logger->logModel($request->user(),$film );
        return view('film_item' , [
            'film' => $film , 
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
