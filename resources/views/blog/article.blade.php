       <div class="blog_item">
        <img class="imaiges_blog" src="/storage/{{$article->image}}" alt="{{$article->title}}">
        <div class="blog_info">
            <div class="title_blog">
                {{$article->title}}
            </div>
            <div class="description_blog">
                {{$article->description}}
            </div>
            <div class="button_more_blog">
                <a href="{{route('blogArticle',['articlesId'=>$article->id])}}"><button  type="button" class="btn btn-danger ms-5 btn-lg">More</button></a>
            </div>
            <div class="autor_blog">
                 <div class="tags">#new</div>
            </div>
        </div>
    </div>
