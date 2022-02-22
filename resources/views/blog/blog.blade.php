@extends('layout')
@section('content')
    <div class="searc_bar container-fluid">
        <div class="row">
            <div class="col-9"><form class="d-flex" method="GET" action="">
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
        </form></div>
            <div class="col-3"><a href="/blog/article/create" class="btn btn-primary">Create article</a></div>
        </div>

    </div>
    <div class="blog-search">

        <div class="container"> {{ $articles->links() }}</div>
    <div class="row">
        <div class="col-9">
        @foreach ($articles as $article)

        @include('blog.article',['article'=> $article])
        {{ $article->name }}
        @endforeach
        </div>
        <div class="col-3 most_popular">
<section>
    <h2>Most popular</h2>
    <ul most-popular-list class="list-style">
        <template popular-article-template><li><div class="card mb-3" style="max-width: 540px;">
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
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div></li></template>

    </ul>

</section>
        </div>
    </div>
        <div class="container"> {{ $articles->links() }}</div>


<div class="blog-search">
    <script src="/js/app.js"></script>
    <script src="/js/popular_article.js"></script>
@endsection
