@extends('layout')
@section('content')
<div class="text_size margin_left mt-4"> {{ $articles->links() }}</div>
@foreach ($articles as $article)

@include('blog.article',['article'=> $article])
{{ $article->name }}
@endforeach
<div class="text_size margin_left mt-4"> {{ $articles->links() }}</div>
@endsection
