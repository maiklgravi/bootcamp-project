@extends('layout')
@section('content')

<div class="row p-0 m-0 bg-dark">
<div class="col-sm-12 col-xl-3 d-block">
        <div class="col-12 mt-5"><img class="image_width " src="/storage/{{$film->image}}"></div>
                <div class="btn-group mx-5 mt-2 mb-5" role="group" aria-label="Basic mixed styles example">
<button type="button" onclick="dislike({{ $film->id }})" class="btn btn-danger text_size"><img class="height_like" src="/dislike.png" > <div id="dislike">{{ $film->dislike }}</div>
</button>
<button type="button" onclick="like({{ $film->id }})" class="btn btn-success text_size"><img class="height_like" src="/like.png" ><div id="like"> {{ $film->like }} </div></button>
</div>
            </div>
            <div class="col-sm-12 col-xl-9 mb-5 text_size p-4">{{ $film->name }}

                <div class="col-12 name_film text_size fs-6">
                <div class="mt-2 text_size">Country: {{ $film->country }}</div>
                <div class="mt-2 text_size">Screenwriter: {{ $film->screenwriter }}</div>
                <div class="mt-2 text_size">Actor: {{ $film->actors }}</div>
                <div class="mt-2 text_size">Duration : {{ $film->duration }}</div>
                <div class="mt-2 text_size">Genre : @foreach ($genres as $genre)
                    {{ $genre->name }}
                @endforeach</div>
                <div class="mt-2 text_size">Description :{{ $film->description }}</div>
                </div></div>

</div>
<div class="bgComent">
@if ($action==='login')
<a href="/login"><button class="btn text_size btn-primary mb-3">Login</button></a>

@endif
@if ($action==='payment')
<a href="{{route('paymnetForm')}}"><button class="btn text_size btn-primary mb-3">Make payment</button></a>

@endif
@if ($action==='show')
<video class="video_size" controls>
    <source src="/{{ $filmVideo->name }}" type="video/mp4">
  Your browser does not support the video tag.
  </video>


@endif



<div class="comments">
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

        <form action="/film/{{ $film->id }}/comment" method="POST" name="make_comment">
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
        <div class="comment_title text_size">
            Comments:
        </div>

        @foreach ($comments as $comment)

    <div class="comments_item mt-5 text_size container">
    <div class="comment_article text_size">
      {{$comment->message}}
    </div>
    <div class="autor_name_comment text_size">
    </div>
    {{$comment->author_email}}
    {{$comment->created_at}}
    </div>
  </div>

  </div>
    </div>
    {{ $comment->name }}
        @endforeach
        <div class="container text_size"> {{ $comments->links() }}</div>
</div>

</div>




    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">

            <strong class="me-auto text_size">You need to login for leave like or dislike </strong>

            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
      </div>
    </div>
<script src="/js/app.js"></script>
<script src="/js/like.js"></script>
@endsection
