<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\BlogCategory;
use Illuminate\Pagination\Paginator;


class BlogController extends Controller
{
    public function index(){
        $categories = BlogCategory::all();
        $request = request()->all();
        $category = $request['category'] ?? $categories->first()->id;
        $sort = $request['sort'] ?? 'DESC';
        $articles = Article::orderBy('created_at', $sort)->where('blog_category_id' ,'=' , $category)->paginate(5);
        $articles->appends(['sort' => $sort]);
        return view('blog.blog' , [
            'articles' => $articles ,
            'categories' => $categories ,
            'filter' => [
                'sort' => $sort ,
                'category' => (int)$category
            ]]);
    }

}
