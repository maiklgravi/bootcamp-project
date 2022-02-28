<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\BlogCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        $categories = BlogCategory::all();
        $auth = Auth::check();
        $request = request()->all();
        $category = $request['category'] ?? '';
        $sort = $request['sort'] ?? 'DESC';
        if($category===''){
            $articles = Article::orderBy('created_at', $sort)->where('blog_category_id','=',$category)->paginate(5);
        }
        $articles = Article::orderBy('created_at', $sort)->paginate(5);
        $articles->appends(['sort' => $sort]);
        return view('blog.blog' , [
            'articles' => $articles ,
            'categories' => $categories ,
            'filter' => [
                'sort' => $sort ,
                'category' => (int)$category
            ],
            'auth'=>$auth
        ]);
    }
    public function myArticle(){
        if (Auth::check()){
        $user = Auth::user();
        $articles = Article::where('author_id' ,'=' , $user->id )->paginate(5);
        return view('blog.my_article',[
        'articles'=>$articles
        ]);
        }else{
        return route('user.login');
        }

    }

}
