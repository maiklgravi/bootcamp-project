<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use App\Models\Comment;

class ArticleController extends Controller
{
    public function show ($articlesId){
        $article = Article::findOrFail($articlesId);
        $comments =  $article->comments()->paginate(2);
        return view('article.article' , [
            'article' => $article , 
            'comments' => $comments , 
            'articlesId' => $articlesId]);
    }
    public function lastMounth (){
        Article::select([
            'articles.title',
            'blog_categories.name'
        ])
        ->join('blog_categories','blog_categories.id','=','articles.blog_category_id')
        ->where('articles.published_at','>=', Carbon::today()->subDay(6))
        ->where('articles.published_at','>=', Carbon::today())
        ->get();
        Article::select([
            'articles.title',
            'articles.description',
            'articles.author_id',
            'articles.image',
            'articles.published_at',
            'articles.excerpt',
            'articles.blog_category_id',
            'articles.seo_title',
            'articles.seo_description'
        ])
        ->join('article_blog_tag','article_blog_tag.article_id','=','articles.id')
        ->join('blog_tags','blog_tags.id','=','article_blog_tag.blog_tag_id')
        ->whereNull('article_blog_tag.blog_tag_id')
        ->get();
        
    }
}
