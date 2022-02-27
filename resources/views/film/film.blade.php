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
        <form class="d-flex" >
            <input class="form-control me-2" type="search" placeholder="Search" name="name" aria-label="Search">
            <select class="form-select me-2" name="category" aria-label="Default select example">
                <option value="">All category</option>
                @foreach ($genre as $genre)
                <option @if($genreSelected === $genre->id ) selected @endif value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-danger" type="submit">Search</button>
        </form>
    </div>
</div>

<div class="row  mb-5 p-3">
    @foreach ($films as $film)
        <div class="col-xl-3 mt-5">
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

@endforeach
</div>
@endsection
