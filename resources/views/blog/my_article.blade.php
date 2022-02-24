@extends('layout')
@section('content')
<div class="container"> {{ $articles->links() }}</div>
@foreach ($articles as $article)

@include('blog.article',['article'=> $article])
{{ $article->name }}
@endforeach
<div class="container"> {{ $articles->links() }}</div>
@endsection
