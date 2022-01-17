<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use App\Models\Comment;
use Psr\Log\LoggerInterface;

class ArticleController extends Controller
{
    public function show ($articlesId, Request $request, LoggerInterface $logger){
        $article = Article::findOrFail($articlesId);
        $comments =  $article->comments()->paginate(2);
        $user = $request->user();
        $userReprezentation = $user ? "User with id {$user->id}" : "Unknown User";
        $logger->info(
            $userReprezentation . " accesed " . "article with id{$articlesId}", 
            ['id' => $articlesId ,
             'title'=> $article->title,
             'author_id'=>$article->author_id,
             'seo_title'=>$article->seo_title,
             'published_at'=>$article->published_at,
            ]);
        return view('article.article' , [
            'article' => $article , 
            'comments' => $comments , 
            'articlesId' => $articlesId]);
    }
}
