       <div class="blog_item">
        <img class="imaiges_blog" src="storage/{{$articles->image}}" alt="{{$articles->title}}">
        <div class="blog_info">
            <div class="title_blog">
                {{$articles->title}}
            </div>
            <div class="description_blog">
                {{$articles->description}}
            </div>
            <div class="button_more_blog">
                <a href="{{route('blogArticle',['articlesId'=>$articles->id])}}"><button  type="button" class="btn btn-danger ms-5 btn-lg">More</button></a>
            </div>
            <div class="autor_blog">
                 <div class="tags">#new</div>
            </div>
        </div>
    </div>
