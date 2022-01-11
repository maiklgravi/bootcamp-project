<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use App\Models\Comment;

class ArticleController extends Controller
{
    public function show ($articlesId){
        $article = Article::findOrFail($articlesId);
        $comments =  $article->comments()->paginate(2);
        return view('article.article' , [
            'article' => $article , 
            'comments' => $comments , 
            'articlesId' => $articlesId]);
    }
}
