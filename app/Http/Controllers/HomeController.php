<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\PreiewsFilmsBaner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $baners = PreiewsFilmsBaner::select([
            'film_id',
            'image',])->get();
        $films = Film::select([
            'id',
            'image',
            'description',
            'date',
            'name',
            'public_availability',])
            ->orderBy('like','DESC')->limit(4)->get();

        $filmsComedyMostWiewed = DB::table('films')
        ->join('genre_films', function ($join) {
            $join->on('films.id', '=', 'genre_films.film_id')
                ->where('genre_films.genre_id', '=', 1);
        })->orderBy('view_count','DESC')->limit(4)
        ->get();
        $filmsDramaMostWiewed = DB::table('films')
        ->join('genre_films', function ($join) {
            $join->on('films.id', '=', 'genre_films.film_id')
                ->where('genre_films.genre_id', '=', 2);
        })->orderBy('view_count','DESC')->limit(4)
        ->get();
        $filmsAdventureMostWiewed = DB::table('films')
        ->join('genre_films', function ($join) {
            $join->on('films.id', '=', 'genre_films.film_id')
                ->where('genre_films.genre_id', '=', 3);
        })->orderBy('view_count','DESC')->limit(4)
        ->get();
        $filmsDetectiveMostWiewed = DB::table('films')
        ->join('genre_films', function ($join) {
            $join->on('films.id', '=', 'genre_films.film_id')
                ->where('genre_films.genre_id', '=', 4);
        })->orderBy('view_count','DESC')->limit(4)
        ->get();
        return view('home.home',['films'=>$films,
        'baners'=>$baners,
        'filmsComedyMostWiewed'=>$filmsComedyMostWiewed,
        'filmsDramaMostWiewed'=> $filmsDramaMostWiewed,
        'filmsAdventureMostWiewed'=> $filmsAdventureMostWiewed,
        'filmsDetectiveMostWiewed'=> $filmsDetectiveMostWiewed,
    ]);
    }

}
