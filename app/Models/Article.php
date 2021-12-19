<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author_id',
        'image',
        'published_at',
        'excerpt',
        'blog_category_id',
        'seo_title',
        'seo_description',
    ];

    public  function category(){
        return $this->belongsTo(BlogCategory::class);
    }

    public  function blogTags(){
        return $this->belongsToMany(BlogTag::class);
    }
}