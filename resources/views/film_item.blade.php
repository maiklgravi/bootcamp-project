@extends('layout')
@section('content')
<div class="min-vh-100">
        <div class="row bg-dark">
            <div class="col-4 ms-5 mt-2 mb-4">
            <img src="/storage/{{$film->image}}">
            </div>
            <div class="col-6 name_film fs-1 w-70">
                {{ $film->name }}
                <div class="col-12 name_film fs-6">
                <div class="mt-2"> Country: Canada</div>
                <div class="mt-2">Screenwriter: Boon Leen</div>
                <div class="mt-2">Actor: Neen Tailor</div>
                <div class="mt-2">Duration : 138 min</div>
                <div class="mt-2">Genre : Commedy</div>
                <div class="mt-2">Description :{{ $film->description }}</div>
                </div>
            </div>
        </div>

    </div>

    <div class="row  film">
        <div class="col-12">
            <video controls class="film-v">
      <source src="01.mp4" type="video/mp4">
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

@endsection
