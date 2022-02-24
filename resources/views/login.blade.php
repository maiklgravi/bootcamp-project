@extends('layout')
@section('content')
<form class="" method="POST" action="{{ route('user.login') }}">
    @csrf
    <div class="form-group">
        <label for="email" class="">Email:</label>
        <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="">Password:</label>
        <input class="form-control" id="password" name="password" type="password" value="" placeholder="Password">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary mb-3" type="submit" name="sendMe" value="1">In</button>
    </div>

</form>
<a href="/registration"><button class="btn btn-primary mb-3">Registration</button></a>
@endsection
