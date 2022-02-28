@extends('layout')
@section('content')
<div class="width_private">
<div class="helou_tab">
	Welcome {{ $user->name }}
</div>

<div class="price_table">

<div class="ms-5 mt-5">
    <div class="cabinet_status text_size">
	Your status: @if ($statusSubscribe)
        active
    @else
        inactive
    @endif
    <a href="/logout"><button class="btn btn-danger text_size ms-5" type="submit">LogOut</button></a>
</div>
</div>
<div class="ms-5 mt-5 ms-5 text_size">
    Make payment: <a href="{{route('paymnetForm')}}"><button class="btn text_size btn-success ms-5" type="submit">Pay</button></a>
</div>
<div class="ms-5 mt-5 ms-5 text_size">
    Contact Us: <a href="{{route('contactUs')}}"><button class="btn text_size ms-5 btn-success " type="submit">Contact</button></a>
</div>

</div>
</div>


@endsection
