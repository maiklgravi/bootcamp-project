@extends('layout')
@section('content')
<div class="gener_select container ">
    <div class="gener_select_items">
        <div class="gener_select_item">Comedy</div>
        <div class="gener_select_item">Dramma</div>
        <div class="gener_select_item">Adventure</div>
        <div class="gener_select_item">Detective</div>
        <div class="gener_select_item">Thriller</div>
    </div>
    <div class="gener_select_items">
        <div class="gener_select_item">Mystic</div>
        <div class="gener_select_item">Historical</div>
        <div class="gener_select_item">Military</div>
        <div class="gener_select_item">Horrors</div>
        <div class="gener_select_item">Fantasy</div>
    </div>

</div>
<div class="container">
    <div class="searc_bar">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <select class="form-select me-2" aria-label="Default select example">
                @foreach ($genre as $genre)
                <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-danger" type="submit">Search</button>
        </form>
    </div>
</div>

<div class="row">
    @foreach ($films as $film)
        <div class="col-xl-3">
            <img src="/storage/{{$film->image}}" class="image_width">
            <div class="fw-bold ">
                {{$film->name}}
            </div>
            <div class="status_item">
                Free
            </div>
            <div class="button_more_blog">
                <a href="{{route('filmArticle',['articlesId'=>$film->id])}}"><button  type="button" class="btn btn-danger ms-5 btn-lg">More</button></a>
            </div>
    </div>

@endforeach
</div>
@endsection
