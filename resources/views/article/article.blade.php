@extends('layout')
@section('content')
<div class=" ">
	<div class="row bg-dark pb-4">
		<div class="col-4 ms-5 mt-2 ">
      <img class="imaiges_blog" src="/storage/{{$article->image}}" alt="">
		</div>
		<div class="col-6 name_film fs-1 w-70">
            <div class="row">
                <div class="col-9">
                {{$article->title}}
                </div>
                <div class="col-3">
                    @if ($property === true)
                   <a href="/blog/article/{{ $article->id }}/delete"> <button type="button" class="btn btn-danger text_adaptiv ms-5 btn-lg">Delete</button></div></a>
                   <a href="/blog/article/{{ $article->id }}/edit"><button type="button" class="btn btn-danger text_adaptiv ms-5 btn-lg">Edit</button></div></a>
                    @endif



                </div>
                </div>
            </div>
            <div class="col-12 name_film fs-5">Category: {{$article->category}}</div>
            <div class="col-12 name_film fs-5">Descrition: {{$article->description}}</div>
            <div class="col-12 name_film fs-5">Name autor: {{$article->user->name}}</div>

		</div>
	</div>

</div>
<div class="comments">
    <div class="meassag_bar container pt-5">

        <form action="/blog/article/{{ $article->id }}/comment" method="POST" name="make_comment">
          <div class="mb-3">@csrf
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Send comment</button>
          </div>
        </form>
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
