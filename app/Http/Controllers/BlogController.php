<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class BlogController extends Controller
{
    public function index(){
        $articles = Article::orderBy('created_at', 'DESC')->get()->all();
        return view('blog.blog' , ['articles' => $articles]);
    }
}
