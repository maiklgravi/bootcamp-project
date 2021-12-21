@extends('layout')
@section('content')
    <div class="searc_bar container-fluid">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <select class="form-select me-2" aria-label="Default select example">
                <option selected>Category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <button class="btn btn-danger" type="submit">Search</button>
        </form>
    </div>
    <div class="blog-search">
        @foreach ($articles as $articles)
        @include('blog.article',['articles'=> $articles])
        @endforeach
    <div class="blog-search">
@endsection