@extends('layout')
@section('content')
<div class="container p-0">
    <div class="card px-4">
        <form action="{{ route('paymentSubscribe') }}" method="POST" name="payments_subscribe">
        <p class="h8 py-3">Payment Details</p>
        <div class="row gx-3">
            <div class="col-12">
                <div class="input-group mb-3">
                <label class="input-group-text" for="mouthSubscribe">Options</label>
                <select class="form-select" name="mouthSubscribe" id="mouthSubscribe">
                  <option selected value=1>One mounth</option>
                  <option value=6>Six mounth</option>
                  <option value=12>Twelve mounth</option>
                </select>
              </div></div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Person Name</p> <input class="form-control mb-3" name="name" type="text" placeholder="Name" value="Barry Allen">
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Card Number</p> <input class="form-control mb-3" type="text" name="cardNumber" placeholder="1234 5678 435678">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expiry</p> <input class="form-control mb-3" name="expiry" type="text" placeholder="MM/YYYY">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p> <input class="form-control mb-3 pt-2 " name="crv" type="password" placeholder="***">
                </div>
            </div>
        </div>
        @csrf
                <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>
@endsection
