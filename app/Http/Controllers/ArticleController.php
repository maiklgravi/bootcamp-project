<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use App\Models\Comment;
use Psr\Log\LoggerInterface;
use App\Services\ModelLogger;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\CreateArticleRequest;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;


class ArticleController extends Controller
{
    public function show ($articlesId, Request $request, ModelLogger $logger){
        $article = Article::findOrFail($articlesId);
        $article->view_count++;
        $article->save();
        $comments =  $article->comments()->paginate(2);
        $logger->logModel($request->user(),$article );

        return view('article.article' , [
            'article' => $article ,
            'comments' => $comments ,
            'articlesId' => $articlesId]);
    }
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
      * Returns list of most popular articles
      *
      * @param ModelLogger $logger
      *
      * @return JsonResponse
      */
     public function readMostPopularArticles(ModelLogger $logger): JsonResponse
     {
         $mostPopularArticles = Article::all()
             ->sortByDesc('view_count')
             ->take($itemCount = 10);

         $articlesArray = [];
         foreach ($mostPopularArticles as $article) {
             $articlesArray[] = [
                 'id' => $article->id,
                 'title' => $article->title,
                 'excerpt' => $article->excerpt,
                 'view_count' => $article->view_count,
                 'image' => $article->image,
             ];
         }

         return $this->responseFactory->json($articlesArray);
     }
}
