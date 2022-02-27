<?php

namespace App\Http\Controllers;

use App\Services\ModelLogger;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\BlogCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;




class ArticleController extends Controller
{
    public function show ($articlesId){

        $article = Article::findOrFail($articlesId);
        if($auth = Auth::check()){
            $user = Auth::user();
            if($user->id === $article->author_id){
                $property = true;
            }else{
                $property = false;
            }
        }else{
            $property = false;
        }

        $article->view_count++;
        $article->save();
        $comments =  $article->comments()->paginate(2);

        return view('article.article' , [
            'article' => $article ,
            'comments' => $comments ,
            'articlesId' => $articlesId,
            'property'=>$property]);
    }



    public function formCreateArticle (){
        $categories = BlogCategory::all();

        return view('blog.createArticle',[
            'categories' => $categories,
        ]);
    }




    public function formEditArticle ($id){
        $categories = BlogCategory::all();
        return view('article.edit_article',[
            'categories' => $categories,
            'idArticle' => $id
        ]);
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




      /**
     * Read list of all articles
     *
     * @return JsonResponse
     */
    public function readAllArticles(): JsonResponse
    {
        $allArticles = Article::all()
            ->sortByDesc('id');

        $articlesArray = [];
        foreach ($allArticles as $article) {
            $articlesArray[] = [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->desription,
                'view_count' => $article->view_count,
            ];
        }

        return $this->responseFactory->json($articlesArray);
    }


    /**
     * Reads one articles from provided article id.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function readOneArticle($id): JsonResponse
    {
        $article = Article::find($id);

        if ($article) {
            return $this->responseFactory->json($article);
        }

        return $this->responseFactory->json(null, 404);
    }

    /**
     * Creates new article from provided data
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createArticle(Request $request): JsonResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:10'],
            'description' => ['string', 'min:15'],
            'category' => [ 'numeric'],
            'image' => ['image'],
        ]);


        $article = Article::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => $request->input('authorId'),
            'image' => $request->file('image')->store('/','public'),
            'excerpt' => $request->input('description'),
            'blog_category_id' => $request->input('category'),
            'seo_title' => $request->input('title'),
            'seo_description' => $request->input('description'),
        ]);

        return $this->responseFactory->json(['id' => $article->id], 201);
    }
     /**
     * Creates new article from provided data
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function editArticle(Request $request,$id): JsonResponse
    {
        $user = Auth::user();
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:10'],
            'description' => ['string', 'min:15'],
            'category' => [ 'numeric'],
            'image' => ['image'],
        ]);

        $article = Article::find($id);
        $article->title =  $request->input('title');
        $article->description =  $request->input('description');
        $article->author_id =  $user->id;
        $article->excerpt =  $request->input('description');
        $article->blog_category_id =  $request->input('category');
        $article->seo_title =  $request->input('title');
        $article->seo_description =  $request->input('description');
        $article->image =  $request->file('image')->store('/','public');
        $article->save();


        return $this->responseFactory->json(['id' => $article->id], 200);
    }


    /**
     * Deletes article resource from provided id
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function deleteArticle($id): JsonResponse
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();

            return $this->responseFactory->json(null, 204);
        }

        return $this->responseFactory->json(null, 404);
    }

}
