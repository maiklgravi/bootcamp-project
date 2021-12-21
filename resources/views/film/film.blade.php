@extends('layout')
@section('content')
<div class="gener_select container ">
    <div class="gener_select_items">
        <div class="gener_select_item">Comedy</div>
        <div class="gener_select_item">Dramma</div>
        <div class="gener_select_item">Adventure</div>
        <div class="gener_select_item">Detective</div>
        <div class="gener_select_item">Thriller</div>
    </div>
    <div class="gener_select_items">
        <div class="gener_select_item">Mystic</div>
        <div class="gener_select_item">Historical</div>
        <div class="gener_select_item">Military</div>
        <div class="gener_select_item">Horrors</div>
        <div class="gener_select_item">Fantasy</div>
    </div>

</div>
<div class="container">
    <div class="searc_bar">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <select class="form-select me-2" aria-label="Default select example">
                <option selected>Genre</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <button class="btn btn-danger" type="submit">Search</button>
        </form>
    </div>
</div>
<div class="row my-5 px-4 ">
    <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
        <div class="cinema_previu">
            <a href="#"><img src="assets/film_images/09.jpg"></a>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
        <div class="cinema_previu">
            <a href="#"><img src="assets/film_images/10.jpg"></a>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
        <div class="cinema_previu">
            <a href="#"><img src="assets/film_images/11.jpg"></a>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 mb-5 mx-auto d-block cinema_previu">
        <div class="cinema_previu">
            <a href="#"><img src="assets/film_images/12.jpg"></a>
        </div>
    </div>
</div>

</div>
</div>
@endsection