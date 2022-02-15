<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use App\Models\Comment;
use Psr\Log\LoggerInterface;
use App\Services\ModelLogger;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
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
    public function show ($articlesId, Request $request, ModelLogger $logger){
        $article = Article::findOrFail($articlesId);
        $comments =  $article->comments()->paginate(2);
        $logger->logModel($request->user(),$article );

        return view('article.article' , [
            'article' => $article ,
            'comments' => $comments ,
            'articlesId' => $articlesId]);

        }
        public function update($articleId, ArticleRequest $request): JsonResponse
    {
        $article = Article::find($articleId);
        if($article){
            try {
                $article->title = $request->title;
                $article->save();
                // Successfully updated
                return $this->responseFactory->json(['id' => $article->id], 200);
            } catch (\Throwable $e) {
                // Invalid update
                return $this->responseFactory->json(['error' => 'An error occurred when trying to update article!'], 200);
            }
        }

        // Not found
        return $this->responseFactory->json(null, 404);
    }
}

