<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'seo_title',
        'seo_description',
    ];

    public  function article(){
        return $this->hasOne(Article::class);
    }
}