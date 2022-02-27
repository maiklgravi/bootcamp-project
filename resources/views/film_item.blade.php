@extends('layout')
@section('content')
<div class="">
        <div class="row bg-dark">
            <div class="col-4 ms-5 mt-2 mb-4">
            <img src="/storage/{{$film->image}}">
            </div>
            <div class="col-6 name_film fs-1 w-70">
                {{ $film->name }}
                @if ($statusSubscribe)
                    I am
                @endif
                <div class="col-12 name_film fs-6">
                <div class="mt-2"> Country: {{ $film->country }}</div>
                <div class="mt-2">Screenwriter: {{ $film->screenwriter }}</div>
                <div class="mt-2">Actor: {{ $film->actors }}</div>
                <div class="mt-2">Duration : {{ $film->duration }}</div>
                <div class="mt-2">Genre : @foreach ($genres as $genre)
                    {{ $genre->name }}
                @endforeach</div>
                <div class="mt-2">Description :{{ $film->description }}</div>
                </div>
            </div>
        </div>

    </div>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button type="button" onclick="dislike({{ $film->id }})" class="btn btn-danger"><img src="/dislike.png" width="20vw"> <div id="dislike">{{ $film->dislike }}</div>
        </button>
        <button type="button" onclick="like({{ $film->id }})" class="btn btn-success"><img src="/like.png" width="20vw"><div id="like"> {{ $film->like }} </div></button>
      </div>

    <video class="min-vw-100" controls>
        <source src="/01.mp4" type="video/mp4">
      Your browser does not support the video tag.
      </video>
        </div>
    </div>

<div class="comments">
    <div class="meassag_bar container pt-5">
        <div class="mb-3  ">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Send comment</button>
          </div>
    </div>
    <div>

    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">

            <strong class="me-auto">You need to login for leave like or dislike </strong>

            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
      </div>
    </div>
<script src="/js/app.js"></script>
<script src="/js/like.js"></script>
@endsection
