    <div class="blog_item">
        <div class="row">
            <div class="col-6"><img class="imaiges_blog" src="/storage/{{$article->image}}" alt="{{$article->title}}"></div>
            <div class="col-6"> <div class="blog_info">
            <div class="title_blog">
                <div >Title:
                {{$article->title}}
                </div>
            </div>
            <div class="description_blog">
              Description:   {{$article->description}}
            </div>
            <div class="button_more_blog mt-4">
                <a href="{{route('blogArticle',['articlesId'=>$article->id])}}"><button  type="button" class="btn btn-primary ms-5 btn-lg">More</button></a>
            </div>
        </div></div>
        </div>


    </div>
