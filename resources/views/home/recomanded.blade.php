<div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
    <a class="stile_none" href="{{route('filmArticle',['articlesId'=>$film->id])}}">
    <img src="/storage/{{$film->image}}" class="image_width"></a>
    <div class="fw-bold black_text">
        {{$film->name}}
    </div>
    <div class="status_item">
        @if  ($film->public_availability === 0)
        <div class="status_item_subscribe">
        Subscribe
        </div>
        @else
        <div class="status_item">
            Free
        </div>
        @endif
    </div>

</div>
