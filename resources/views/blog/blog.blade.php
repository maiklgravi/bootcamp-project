@extends('layout')
@section('content')

<form class="d-flex p-5" method="GET" >

    <select class="form-select me-2" name="category">
    <option value="">All category</option>
    @foreach ($categories as $category)
    <option value="{{$category->id}}"
    {{ $filter['category'] === $category->id ? 'selected' : ''}}>{{$category->name}}</option>
    @endforeach
    </select>
    <select class="form-select" name="sort">
    <option value="DESC" {{ $filter['sort'] === 'DESC' ? 'selected' : ''}}>DESC</option>
    <option value="ASC" {{ $filter['sort'] === 'ASC' ? 'selected' : ''}}>ASC</option>
    </select>
<button class="btn btn-primary mx-3" type="submit">Apply sort</button>
@if ($auth)
<a href="/my_article" class="btn mx-2 btn-primary">My article</a>
<a href="/blog/article/create" class="btn mx-2 btn-primary">Create article</a>
@endif</form>


<div class="row p-0 m-0">
    <div class="col-sm-12 col-xl-7 mx-auto blog_searc">
        <div class="text_size mx-5"> {{ $articles->links() }}</div>

        @foreach ($articles as $article)
        @include('blog.article',['article'=> $article])
        {{ $article->name }}
        @endforeach

        <div class="text_size  mx-5"> {{ $articles->links() }}</div>
    </div>

    <div class="col-sm-12 col-xl-5 ">
        <section class="popular_bar">
    <ul most-popular-list class="list-style">
        <li><h2 class="h1">Most popular:</h2></li>
        <template popular-article-template>
            <li><div class="card mb-3" >
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" data-wiew-counter>

               </span>
        <div class="row g-0">
          <div class="col-md-4 image_background" image>

          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title" title>Card title</h5>
              <p class="card-text" description>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <a class="btn btn-primary" href="" more>More</a>

            </div>
          </div>
        </div>
      </div></li></template>

    </ul>

</section>
    </div>

    <script src="/js/app.js"></script>
    <script src="/js/popular_article.js"></script>
@endsection
