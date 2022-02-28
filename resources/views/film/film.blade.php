@extends('layout')
@section('content')
<div class="row p-0 m-0">
    <form class="d-flex p-0 m-0" >
            <div class="d-flex m-5">
            <input class="form-control me-2 height_form" type="search" placeholder="Search" name="name" aria-label="Search">
            <select class="form-select me-2 height_form" name="category" aria-label="Default select example">
                <option value="">All category</option>
                @foreach ($genre as $genre)
                <option @if($genreSelected === $genre->id ) selected @endif value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
            <button class="btn  text_size btn-primary" type="submit">Search</button></div>

        </form>
</div>


<div class="row p-0 m-0">
    <div class="text_size margin_left">
        {{$films->links()}}</div>

            @foreach ($films as $film)
        <div class="col-xl-3 mt-5">
            <a class="stile_none" href="{{route('filmArticle',['articlesId'=>$film->id])}}">
                <img src="/storage/{{$film->image}}" class="image_width"></a>
                <div class="fw-bold black_text text_size">
                    {{$film->name}}
                </div>
                <div class="status_item">
                    @if  ($film->public_availability === 0)
                    <div class="status_item_subscribe text_size">
                    Subscribe
                    </div>
                    @else
                    <div class="status_item text_size">
                        Free
                    </div>
                    @endif
                </div>
    </div>


@endforeach
<div class="text_size margin_left "> {{ $films->links() }}</div>
</div>
@endsection
