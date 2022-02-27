<?php

namespace App\Http\Controllers;


use App\Models\Film;
use App\Models\FilmVideoName;
use App\Models\Genre;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FilmController extends Controller
{

    public function index ()
    {   $genre = Genre::select()->get();
        $request = request()->all();
        $genreSelected = $request['category'] ?? '';
        $name = $request['name'] ?? '';

        if($genreSelected === '')
        {
            if($name===''){
                $films = Film::select()->get();
            }else{
                $films = DB::table('films')
                ->select(
                'id',
                'image',
                'description',
                'name',
                'public_availability',
                'view_count'
                )
                ->where('name', 'LIKE', "%{$name}%")->get();
            }

        }else{

            if($name===''){
                $films = DB::table('films')
                ->select(
                'films.id',
                'films.image',
                'films.description',
                'films.name',
                'films.public_availability',
                'films.view_count'
                )
                ->join('genre_films', 'films.id', '=', 'genre_films.film_id')
                ->join('genre', 'genre.id', '=', 'genre_films.genre_id')
                ->where('genre.id', '=', (int)$genreSelected)->get();
            }else{
                $films = DB::table('films')
                ->select(
                'films.id',
                'films.image',
                'films.description',
                'films.name',
                'films.public_availability',
                'films.view_count'
                )
                ->join('genre_films', 'films.id', '=', 'genre_films.film_id')
                ->join('genre', 'genre.id', '=', 'genre_films.genre_id')
                ->where('genre.id', '=', (int)$genreSelected)->where('films.name', 'LIKE', "%{$name}%") ->get();
            }
        }


        return view('film.film',[
            'films'=>$films ,
            'genre'=>$genre ,
            'genreSelected'=>(int)$genreSelected
        ]);


    }

    public function show ($filmId)
    {
        $films=Film::findOrFail($filmId);
        $genres = DB::table('genre')
        ->select(
        'genre.id',
        'genre.name'
        )
        ->join('genre_films', 'genre.id', '=', 'genre_films.genre_id')
        ->where('genre_films.film_id', '=', $filmId )->get();
        $films->view_count++;
        $films->save();

        $film = DB::table('films')
        ->select(
        'films.id',
        'films.image',
        'films.description',
        'films.name',
        'films.dislike',
        'films.like',
        'films.public_availability',
        'film_info.screenwriter',
        'film_info.actors',
        'film_info.country',
        'film_info.duration',
        )
        ->join('film_info', 'films.id', '=', 'film_info.film_id')
        ->where('films.id', '=', $filmId )->get();
        $film=$film[0];

        if ($film->public_availability === 0 ){
            if(Auth::check()){
                $user = Auth::user();
                $statusSubscribe = false;
                $payments = Payment::select()->where('id_user' ,'=' , $user->id)->get();
                foreach ($payments as $payment) {
                    if ($payment->date_payment = Carbon::now()->addMonth($payment->month) ){
                         $statusSubscribe = true;
                         $filmVideo=FilmVideoName::select()->where('film_id','=',$filmId)->get();
                         $filmVideo= $filmVideo[0];
                    }
                }

            }

        }else{
            $filmVideo=FilmVideoName::select('name','film_id')->where('film_id','=',$filmId)->get();
            $filmVideo= $filmVideo[0];

            $statusSubscribe = false;
        }
        return view('film_item' , [
            'film' => $film ,
            'statusSubscribe'=> $statusSubscribe,
            'genres'=>$genres,
            'filmVideo'=>$filmVideo
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
            'public_availability',])
            ->orderBy('like','DESC')->limit(4)->get();
        return view('film.film',['films'=>$films]);

    }

}
