@extends('layout')
@section('content')
<div class=" ">
	<div class="row bg-dark pb-4">
		<div class="col-4 ms-5 mt-2 ">
		<img src="09.jpg">	
		</div>
		<div class="col-6 name_film fs-1 w-70">
			{{$articles->title}}
            <div class="col-12 name_film fs-5">Category: {{$articles->category}}</div>
            <div class="col-12 name_film fs-5">Descrition: {{$articles->description}}</div>

            <div class="col-12 name_film fs-5">Tags: #new</div>
            <div class="col-12 name_film mt-5 fs-5">{{$articles->author->name}}/{{$articles->publised_at}}</div>
			
		</div>
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
    <div class="comments">
        <div class="comment_title">
Comments
        </div>
    <div class="comments_item mt-5 container">
    <div class="comment_article">
      {{$articles->comments()->count()}}
    </div>
    <div class="autor_name_comment">
      {{$articles->author->name}}/{{$articles->publised_at}}
    </div>
    </div>

    </div>
</div>
@endsection