@extends('layout')
@section('content')
<div class="dog fs-2  container mt-5 pt-5 h-50 mb-5 pb-5">
	<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput2" class="form-label">Name</label>
  <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Piter">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput3" class="form-label">First Name</label>
  <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="Parcer">
</div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Registration</button>
  </div>
</div>


@endsection