<?php

namespace App\Http\Controllers;

use App\Models\FilmsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilmsCommentController extends Controller
{
    public function leaveComment(Request $request,$id){
        if (Auth::check()){
            $validatedData = $request->validate([
                'comment' => ['required','max:70','min:5'],

            ]);
        $user = Auth::user();
            $comment = FilmsComment::create([
            'message'=>$request->comment,
            'film_id'=>$id,
            'user_id'=>$user->id
            ]);
            return redirect()->action(
            [FilmController::class,'show'], ['articlesId' => $id]
            );
        }else{
            return redirect('/login');
        }

    }
}
