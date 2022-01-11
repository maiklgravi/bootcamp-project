@extends('layout')
@section('content')
    <div class="searc_bar container-fluid">
        <form class="d-flex" method="GET" action="">
            <select class="form-select me-2" name="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}" 
                    {{ $filter['category'] === $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
            {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
            <select class="form-select me-2" name="sort">
                <option value="DESC" {{ $filter['sort'] === 'DESC' ? 'selected' : ''}}>DESC</option>
                <option value="ASC" {{ $filter['sort'] === 'ASC' ? 'selected' : ''}}>ASC</option>
            </select>
            <button class="btn btn-danger" type="submit">Apply sort</button>
        </form>
    </div>
    <div class="blog-search">
        <div class="container"> {{ $articles->links() }}</div>
        @foreach ($articles as $article)
        @include('blog.article',['article'=> $article])
        {{ $article->name }}
        @endforeach
        <div class="container"> {{ $articles->links() }}</div>
        

    <div class="blog-search">
@endsection