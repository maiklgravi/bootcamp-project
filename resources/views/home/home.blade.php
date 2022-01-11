@extends('layout')
@section('content')
<div>
	<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
		<div class="carousel-item active" data-bs-interval="3000">
		  <img src="assets/film_images/img1.jpg" class="d-block w-100" alt="...">
		  <div class="carousel-caption  d-md-block">
			<button type="button" class="btn btn-danger text_adaptiv btn-lg">MORE</button>
		  </div>
		</div>
		<div class="carousel-item" data-bs-interval="3000">
		  <img src="assets/film_images/img2.jpg" class="d-block w-100" alt="...">
		  <div class="carousel-caption  d-md-block">
			<button type="button" class="btn btn-danger text_adaptiv btn-lg">MORE</button>
		  </div>
		</div>
		<div class="carousel-item" data-bs-interval="3000">
		  <img src="assets/film_images/img3.jpg" class="d-block w-100" alt="...">
		  <div class="carousel-caption  d-md-block">
			<button type="button" class="btn btn-danger text_adaptiv btn-lg">MORE</button>
		  </div>
		</div>
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
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu text_adaptiv">
                <img src="assets/film_images/5.jpg" class="image_width">
                <div class="ms-2">
                <div class="fw-bold ">
                    1+1
                </div>
                <div class="status_item">
                    Free
                </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/6.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/7.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/8.jpg" class="image_width">
            </div>
        </div>
    </div><div class="name_capit fs-1 fw-bold ms-5 mt-5">
        <div class="text_adaptiv">
        Dramma
        <button type="button" class="btn btn-danger ms-5 btn-lg">More</button>
        </div>
        </div>
    </div>
    <div class="row my-5 px-4 ">
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/9.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/10.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/11.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/12.jpg" class="image_width">
            </div>
        </div>
    </div><div class="name_capit fs-1 fw-bold ms-5 mt-5">
        <div class="text_adaptiv">
        Adventure
        <button type="button" class="btn btn-danger ms-5 btn-lg">More</button>
        </div>
        </div>
    </div>
    <div class="row my-5 px-4 ">
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/13.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/14.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/15.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/16.jpg" class="image_width">
            </div>
        </div>
    </div><div class="name_capit fs-1 fw-bold ms-5 mt-5 ">
       <div class="text_adaptiv"> Detective  <button type="button" class="btn btn-danger ms-5 btn-lg">More</button></div>
       
            
        </div>
    </div>
    <div class="row my-5 px-4 ">
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/17.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/18.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/19.jpg" class="image_width">
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
            <div class="cinema_previu">
                <img src="assets/film_images/20.jpg" class="image_width">
            </div>
        </div>
    </div>
    
    </main>
@endsection