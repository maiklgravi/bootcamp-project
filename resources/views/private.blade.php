@extends('layout')
@section('content')
<div class="helou_tab">



	Welcome {{ $user->name }}

</div>
<div class="cabinet_status">
	Your status: @if ($statusSubscribe)
        active
    @else
        inactive
    @endif
    <a href="/logout"><button class="btn btn-danger ms-5" type="submit">LogOut</button></a>
</div>
<div class="price_table">
<div class="ms-5 mt-5">
    <b>Our price :</b>
</div>
<div class="ms-5 mt-5 ms-5">
    For: 1 mount 5$ <a href="{{route('paymnetForm')}}"><button class="btn btn-danger ms-5" type="submit">Pay</button></a>
</div>
<div class="ms-5 mt-5 ms-5">
    For: 6 mount 20$ <button class="btn btn-danger ms-5" type="submit">Pay</button>
</div>
<div class="ms-5 mt-5 mb-5" >
    For: 1 year 50$ <button class="btn btn-danger ms-5" type="submit">Pay</button>
</div>
</div>

@endsection
