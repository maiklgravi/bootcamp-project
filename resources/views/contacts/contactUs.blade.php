@extends('layout')

@section('pageTitle')
    Contact us
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3 ">

            <form action="{{ route('contactUs.send') }}" method="POST" name="contact-form">
                <div class="form-row col-12 p-5 text_size">
                <div class="form-group mb-2"><h4 class="h1">Contact us:</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                        <label for="email" class="mb-2">Email:</label>
                        <input type="email"  value="{{ old('email') }}" required="required" class="form-control mb-2 height_form" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group ">
                        <label class="mb-2" for="name">Name:</label>
                        <input type="text"  value="{{ old('name') }}" required="required" class="form-control mb-2 height_form" name="name" id="name" placeholder="Nume">
                    </div>
                    <div class="form-group ">
                        <label class="mb-2" for="inputState">Subject:</label>
                        <select id="subject" class="form-control mb-2 height_form" name="subject">
                            <option value="">Select subject.</option>
                            <option @if(old('subject') === 'error') selected @endif value="error" >Error</option>
                            <option @if(old('subject') === 'offerts') selected @endif value="offerts" >Offerts</option>
                            <option @if(old('subject') === 'refund') selected @endif value="refund" >Money Refoun</option>
                        </select>
                    </div>

                    <div class="form-group ">
                        <label class="mb-2"for="name">Mesage:</label>
                        <textarea class="form-control mb-2 " name="message" id="message" cols="30" rows="10">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn text_size btn-primary">Send</button>
                </div>

                @csrf

            </form>
        </div>
    </div>

@endsection

