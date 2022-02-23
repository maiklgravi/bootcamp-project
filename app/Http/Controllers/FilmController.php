<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Payment;
use App\Services\ModelLogger;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{

    public function index ()
    {  $genre = Genre::select()->get();
        $films = Film::select()->get();
        return view('film.film',['films'=>$films , 'genre'=>$genre]);


    }
    public function indexr(Request $request, Film $film)
    {
        $genre = Genre::select()->get();
        $films = $film->getFilmBySearch($request);
        return view('film.film',['films'=>$films , 'genre'=>$genre]);
    }
    public function show ($filmId, Request $request)
    {

        $film = Film::findOrFail($filmId);
        if ($film->public_availability === 0 ){
            if(Auth::check()){
                $user = Auth::user();
                $statusSubscribe = false;
                $payments = Payment::select()->where('id_user' ,'=' , $user->id)->get();
                foreach ($payments as $payment) {
                    if ($payment->date_payment = Carbon::now()->addMonth($payment->month) ){
                         $statusSubscribe = true;
                    }
                }

            }

        }else{
            $statusSubscribe = false;
        }
        return view('film_item' , [
            'film' => $film ,
            'statusSubscribe'=> $statusSubscribe,
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
