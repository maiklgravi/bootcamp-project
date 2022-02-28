<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'message',
        'article_id'
    ];
    public  function article(){
        return $this->belongsTo(Article::class);
    }
}
