@extends('layout')
@section('content')
<div class=" ">
	<div class="row bg-dark pb-4">
		<div class="col-4 ms-5 mt-2 ">
      <img class="imaiges_blog" src="/storage/{{$article->image}}" alt="">
		</div>
		<div class="col-6 name_film fs-1 w-70">
			{{$article->title}}
            <div class="col-12 name_film fs-5">Category: {{$article->category}}</div>
            <div class="col-12 name_film fs-5">Descrition: {{$article->description}}</div>
            <div class="col-12 name_film fs-5">Name autor: {{$article->user->name}}</div>
            <div class="col-12 name_film fs-5">Tags: #new</div>
            <div class="col-12 name_film mt-5 fs-5"></div>
			
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
    <div>

    </div>
    <div class="comments">
        <div class="comment_title">
Comments {{$article->comments()->count()}}
        </div>



        @foreach ($comments as $comment)

    <div class="comments_item mt-5 container">
    <div class="comment_article">
      {{$comment->message}}
    </div>
    <div class="autor_name_comment">
    </div>
    {{$comment->author_email}}/{{$comment->created_at}}
    </div>
  </div>
  
  </div>
    </div>
    {{ $comment->name }}
        @endforeach
        <div class="container"> {{ $comments->links() }}</div>
</div>
@endsection