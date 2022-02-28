@extends('layout')
@section('content')
<div class="width_private">
    <form class="p-5 pb-0" method="POST" action="{{ route('user.registration') }}">
    @csrf
    <div class="form-group">
        <div class="h1 mb-4">
            Registration:        </div>
        <label for="email" class="text_size mb-2">Email:</label>
        <input class="form-control height_form mb-2" id="email" name="email" type="text" value="" placeholder="Email">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="name" class="text_size mb-2">Name:</label>
        <input class="form-control height_form mb-2" id="name" name="name" type="text" value="" placeholder="Name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="text_size mb-2">Password:</label>
        <input class="form-control height_form mb-2" id="password" name="password" type="password" value="" placeholder="Password">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn text_size btn-primary m-5" type="submit" name="sendMe" value="1">Log In</button>
    </div>
</form>
</div>

@endsection
