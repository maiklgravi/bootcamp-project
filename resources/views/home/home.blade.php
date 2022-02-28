@extends('layout')
@section('content')
<div>
	<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">

        @foreach ($baners as $baner)
        <div class="carousel-item @if ($baner->image === 'img1.jpg')
            active
        @endif" data-bs-interval="3000">
		  <img src="storage/{{ $baner->image }}" class="d-block w-100" alt="...">
		  <div class="carousel-caption  d-md-block">
		<a href="/film/{{ $baner->film_id }}">	<button type="button" class="btn btn-danger text_size btn-lg">MORE</button></a>
		  </div>
		</div>
        @endforeach

	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	  </button>
	</div>
	</div>
<main>


    <div class="name_capit fs-1 fw-bold ms-5 text_size mt-5">
        <div class="text_size">Recommended  <a href="/films"><button type="button" class="btn btn-danger text_size ms-5 btn-lg">More</button></a></div>
        </div>
    </div>
    <div class="row my-5 px-4 m-0 p-0">
        @foreach ($films as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
    </div>
    <div class="name_capit fs-1 text_size fw-bold ms-5 mt-5">
        <div class="text_size">
        Comedy
        <a href="/films?name=&category=1"><button type="button" class="btn btn-danger text_size ms-5 btn-lg">More</button>
        </a></div>
        </div>
    </div>


        <div class="row my-5 px-4 m-0 p-0">
        @foreach ($filmsComedyMostWiewed as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
        </div>
    <div class="name_capit fs-1 fw-bold ms-5 mt-5">
        <div class="text_size">
        Dramma <a href="/films?name=&category=2"><button type="button" class="btn btn-danger text_size ms-5 btn-lg">More</button></a>

        </div>
        </div>
    </div>
    <div class="row my-5 px-4 m-0 p-0">
        @foreach ($filmsDramaMostWiewed as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
    </div>

    <div class="name_capit fs-1 fw-bold ms-5 mt-5">
        <div class="text_size">
        Adventure
        <a href="/films?name=&category=3"><button type="button" class="btn btn-danger text_size ms-5 btn-lg">More</button></a>

        </div>
        </div>
    </div>
    <div class="row my-5 px-4 m-0 p-0">
    @foreach ($filmsAdventureMostWiewed as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
    </div>
    <div class="name_capit fs-1 fw-bold ms-5 mt-5 ">
       <div class="text_size"> Detective <a href="/films?name=&category=4"><button type="button" class="btn text_size btn-danger ms-5 btn-lg">More</button></a> </div>


        </div>
    </div>
    <div class="row my-5 px-4 m-0 p-0">
        @foreach ($filmsDetectiveMostWiewed as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
        </div>

    </main>
@endsection
