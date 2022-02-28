@extends('layout')
@section('content')
<div class="container p-0 width_private">
    <div class="card px-4">
        <form action="{{ route('paymentSubscribe') }}" method="POST" name="payments_subscribe">
        <p class="h1 py-3">Payment Details:</p>
        <div class="row gx-3">
            <div class="alert alert-warning text_size mb-3" role="alert">

                <ul>

                <li>If you have subscribe remaining time  has not added to this subscribe.</li>

                </ul>
              </div>
            <div class="col-12">
             @if ($errors->any())
                <div class="alert alert-danger text_size">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="input-group mb-3">
                <label class="input-group-text text_size mb-3" for="mouthSubscribe">Options</label>
                <select class="form-select height_form mb-3" name="mouthSubscribe" id="mouthSubscribe" required>
                  <option selected value=1>One mounth (4$)</option>
                  <option value=6>Six mounth  (20$)</option>
                  <option value=12>Twelve mounth  (30$)</option>
                </select>
              </div></div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text text_size mb-3">Person Name</p> <input class="form-control height_form mb-3" name="name" type="text" placeholder="Name" value="" required>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text  text_size mb-3">Card Number</p> <input class="form-control height_form mb-3" type="text" name="cardNumber" placeholder="1234 5678 435678" required>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text text_size mb-3">Expiry</p> <input class="form-control height_form mb-3" name="expiry" type="text" placeholder="MM/YYYY" required>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text text_size mb-3">CVV/CVC</p> <input class="form-control height_form mb-3 pt-2 " name="crv" type="password" placeholder="***" required>
                </div>
            </div>
        </div>
        @csrf
                <button type="submit" class="btn text_size mb-3 btn-primary">Send</button>
        </form>
    </div>
</div>
@endsection
