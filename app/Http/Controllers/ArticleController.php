<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show (){
        $articles = Article::findOrFail($articlesId);
        return view('article.article' , ['articles' => $articles]);
    }
}
