@extends('layout')
@section('content')
<div class="width_private">
<form  method="POST" class="p-5 pb-0" action="{{ route('user.login') }}">
    @csrf
    <div class="form-group">
        <div class="h1 mb-5">Login:</div>
        <label for="email" class="text_size mb-3">Email:</label>
        <input class="form-control height_form mb-3" id="email" name="email" type="text" value="" placeholder="Email">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="text_size mb-3">Password:</label>
        <input class="form-control height_form mb-3" id="password" name="password" type="password" value="" placeholder="Password">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mt-5">
        <div class=""><button class="btn text_size btn-primary mb-3 " type="submit" name="sendMe" value="1">Log In</button></div>
    </div>

</form>
<div class="p-5"><a href="/registration"><button class="btn btn-success text_size mb-3">Registration</button></a> </div>
</div>
@endsection
