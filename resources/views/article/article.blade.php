@extends('layout')
@section('content')
<div class="row p-0 m-0 bg-dark">
    <div class="col-sm-12 col-xl-3 d-block">
            <div class="col-12 mt-5 mb-5">
                <img class="w-100" src="/storage/{{$article->image}}"></div>
                     @if ($property === true)
                   <a href="/blog/article/{{ $article->id }}/delete"><button type="button" class="btn btn-danger text_size ms-5 mb-2 btn-lg">Delete</button></a>
                   <a href="/blog/article/{{ $article->id }}/edit"><button type="button" class="btn btn-primary text_size ms-5 mb-2 btn-lg">Edit</button></a>
                    @endif
                </div>
                <div class="col-sm-12 col-xl-9 mb-5 text_size p-4">{{$article->title}}

                    <div class="col-12 name_film text_size fs-6">
                    <div class="mt-2 text_size">Category: {{$category}}</div>
                    <div class="mt-2 text_size">Descrition: {{$article->description}}</div>
                    <div class="mt-2 text_size">Name autor: {{$article->user->name}}</div>


                    </div></div>

    </div>


    <div class="bgComent">
        <div class="p-2">
            @if ($errors->any())
            <div class="alert text_size alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @if ($auth)
                <div class="meassag_bar  p-5">

                <form action="/blog/article/{{ $article->id }}/comment" method="POST" name="make_comment">
                  <div class="mb-3">@csrf
                    <label for="exampleFormControlTextarea1" class="form-label text_size ">Comment:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3" required></textarea>
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary text_size mb-3">Send comment</button>
                  </div>
                </form>
            </div>
            @endif

            <div class="comments">
                <div class="comment_title">
                    Comments :
                </div>

                @foreach ($comments as $comment)

            <div class="comments_item mt-5 container">
            <div class="comment_article">
              {{$comment->message}}
            </div>
            <div class="autor_name_comment">
            </div>
            {{ $comment->created_at }}
            </div>
          </div>

                @endforeach
                <div class="container"> {{ $comments->links() }}</div>
        </div>
    </div>
@endsection
