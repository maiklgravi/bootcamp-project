<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use App\Models\Comment;
use Psr\Log\LoggerInterface;
use App\Services\ModelLogger;

class ArticleController extends Controller
{
    public function show ($articlesId, Request $request, ModelLogger $logger){
        $article = Article::findOrFail($articlesId);
        $comments =  $article->comments()->paginate(2);
        $logger->logModel($request->user(),$article );
       
        return view('article.article' , [
            'article' => $article , 
            'comments' => $comments , 
            'articlesId' => $articlesId]);
    }
}
