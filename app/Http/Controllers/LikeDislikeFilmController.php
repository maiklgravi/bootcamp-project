<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\JsonResponse;
use App\Models\FilmsDislike;
use App\Models\FilmsLike;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeDislikeFilmController extends Controller
{


     /** @var ResponseFactory */
     private $responseFactory;

     /**
      * @param ResponseFactory $responseFactory
      */
     public function __construct(ResponseFactory $responseFactory)
     {
         $this->responseFactory = $responseFactory;
     }

     /**
     * User make like or dislike
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function makeLikeOrDislike(Request $request,$id):JsonResponse
    {

        if(Auth::check()){
            $action = (int)$request->input('polo');
            $user= Auth::user();
            $film=Film::findOrFail($id);
            $filmsDislike=FilmsDislike::select(['id','film_id','user_id'])->where('film_id','=',$id)->where('user_id','=',(int)$user->id)->get();
            $filmsLike=FilmsLike::select('id','film_id','user_id')->where('film_id','=',$id)->where('user_id','=',(int)$user->id)->get();
            if($action === 0){

                if(count($filmsDislike)===0){

                    if(count($filmsLike)===0){
                        $filmsDislike = FilmsDislike::create(
                            [
                            'user_id' => (int)$user->id,
                            'film_id' => (int)$id,
                            ]
                        );
                        $film->dislike++;
                        $film->save();
                        return $this->responseFactory->json(201);
                    }else{
                        $filmsLike = FilmsLike::find($filmsLike[0]->id);
                        $filmsLike->delete();
                        $filmsLike = FilmsDislike::create(
                            [
                            'user_id' => (int)$user->id,
                            'film_id' => (int)$id,
                            ]
                        );
                        $film->like--;
                        $film->dislike++;
                        $film->save();
                        return $this->responseFactory->json(201);
                    }}
                else{

                    return $this->responseFactory->json(300);
                }
            }else{
                if(count($filmsLike)===0){
                    if(count($filmsDislike)===0){
                        $filmsLike = FilmsLike::create(
                            [
                            'user_id' => $user->id,
                            'film_id' => $id,
                            ]
                        );
                        $film->like++;
                        $film->save();
                        return $this->responseFactory->json(201);
                    }else{
                        $filmsDislike = FilmsDislike::find($filmsDislike[0]->id);
                        $filmsDislike->delete();
                        $filmsLike = FilmsLike::create(
                            [
                            'user_id' => $user->id,
                            'film_id' => $id,
                            ]
                        );
                        $film->like++;
                        $film->dislike--;
                        $film->save();
                        return $this->responseFactory->json(201);
                    }}
                else{
                    return $this->responseFactory->json(300);
                }
            }

        }else{
            return $this->responseFactory->json(['valid'=>0],203);
        }

    }
        /**
     * Reads one articles from provided article id.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function getInfo($id){

        $film = Film::find($id);

        if ($film) {
            return $this->responseFactory->json($film);
        }

        return $this->responseFactory->json(null, 404);
    }
}

