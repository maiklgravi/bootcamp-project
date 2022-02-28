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
        if(Auth::check()){
            $auth = true;
        }else{
            $auth = false;
        }
        $category = BlogCategory::where('id','=',$article->blog_category_id)->get();

        $article->view_count++;
        $article->save();
        $comments =  $article->comments()->paginate(2);

        return view('article.article' , [
            'article' => $article ,
            'auth'=>$auth,
            'category'=>$category[0]->name,
            'comments' => $comments ,
            'articlesId' => $articlesId,
            'property'=>$property]);
    }



    public function formCreateArticle (){
        if(Auth::check()){
            $categories = BlogCategory::all();

        return view('blog.createArticle',[
            'categories' => $categories,
        ]);
        }else{
            return redirect('/login');
        }

    }




    public function formEditArticle ($id){
        if(Auth::check()){
            $article = Article::find($id);
            if($article->author_id === Auth::user()->id){
                $categories = BlogCategory::all();
                        return view('article.edit_article',[
                            'categories' => $categories,
                            'idArticle' => $id
                        ]);
            }else{
                return redirect('/my_article');
            }

        }else{
            return redirect('/login');
        }

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
      *
      *
      * @return JsonResponse
      */
     public function readMostPopularArticles(): JsonResponse
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
     * Creates new article from provided data
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createArticle(Request $request): JsonResponse
    {
        if(Auth::check()){
            $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:10'],
            'description' => ['string', 'min:15'],
            'category' => [ 'numeric'],
            'image' => ['image'],
        ]);


        $article = Article::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => Auth::user()->id,
            'image' => $request->file('image')->store('/','public'),
            'excerpt' => $request->input('description'),
            'blog_category_id' => $request->input('category'),
            'seo_title' => $request->input('title'),
            'seo_description' => $request->input('description'),
        ]);

        return $this->responseFactory->json(['id' => $article->id], 201);
        }else{
            return $this->responseFactory->json(['error' => "You not login"], 400);
        }

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
        if(Auth::check()){

            $user = Auth::user();
            $request->validate([
                'title' => ['required', 'string', 'max:255', 'min:10'],
                'description' => ['string', 'min:15'],
                'category' => [ 'numeric'],
                'image' => ['image'],
            ]);

            $article = Article::find($id);
            if($article->author_id === $user->id){
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
            }else{
                return $this->responseFactory->json(['error' => "Its not you article"], 200);
            }




        }else{
            return $this->responseFactory->json(['error' => "You not login"], 400);
        }

    }



    public function deleteArticle($id)
    {
        if(Auth::check()){

            $article = Article::find($id);
            if ($article->author_id === Auth::user()->id) {

            $article->delete();

            return redirect('/my_article');
           }else{
            return redirect('/my_article');
           }
        }
        else{
            return redirect('/login');
        }
    }




}
