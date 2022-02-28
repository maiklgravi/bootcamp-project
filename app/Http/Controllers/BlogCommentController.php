<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{
    public function leaveComment(Request $request,$id){
        if (Auth::check()){
            $validatedData = $request->validate([
                'comment' => ['required','max:70','min:5'],

            ]);
            $user = Auth::user();
            $comment = Comment::create([
            'message'=>$request->comment,
            'article_id'=>$id,
            'author_id'=>$user->id
            ]);
            return redirect()->action(
                [ArticleController::class,'show'], ['articlesId' => $id]
            );
        }else{
            return redirect('/login');
        }
    }
}
