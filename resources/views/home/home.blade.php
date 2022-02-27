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
		<a href="/film/article/{{ $baner->film_id }}">	<button type="button" class="btn btn-danger text_adaptiv btn-lg">MORE</button></a>
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


    <div class="name_capit fs-1 fw-bold ms-5 text_adaptiv mt-5">
        <div class="text_adaptiv">Recommended  <button type="button" class="btn btn-danger text_adaptiv ms-5 btn-lg">More</button></div>
        </div>
    </div>
    <div class="row my-5 px-4 ">
        @foreach ($films as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
    </div>
    <div class="name_capit fs-1 text_adaptiv fw-bold ms-5 mt-5">
        <div class="text_adaptiv">
        Comedy
        <button type="button" class="btn btn-danger ms-5 btn-lg">More</button>
        </div>
        </div>
    </div>


        <div class="row my-5 px-4 ">
        @foreach ($filmsComedyMostWiewed as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
        </div>
    <div class="name_capit fs-1 fw-bold ms-5 mt-5">
        <div class="text_adaptiv">
        Dramma
        <button type="button" class="btn btn-danger ms-5 btn-lg">More</button>
        </div>
        </div>
    </div>
    <div class="row my-5 px-4 ">
        @foreach ($filmsDramaMostWiewed as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
    </div>

    <div class="name_capit fs-1 fw-bold ms-5 mt-5">
        <div class="text_adaptiv">
        Adventure
        <button type="button" class="btn btn-danger ms-5 btn-lg">More</button>
        </div>
        </div>
    </div>
    <div class="row my-5 px-4 ">
    @foreach ($filmsAdventureMostWiewed as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
    </div>
    <div class="name_capit fs-1 fw-bold ms-5 mt-5 ">
       <div class="text_adaptiv"> Detective  <button type="button" class="btn btn-danger ms-5 btn-lg">More</button></div>


        </div>
    </div>
    <div class="row my-5 px-4 ">
        @foreach ($filmsDetectiveMostWiewed as $film)
        @include('home.recomanded',['film'=> $film])
        @endforeach
        </div>

    </main>
@endsection
