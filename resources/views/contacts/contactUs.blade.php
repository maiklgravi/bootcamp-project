@extends('layout')

@section('pageTitle')
    Contact us
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 m-4">
            <h4>Contact us</h4>
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
            <form action="{{ route('contactUs.send') }}" method="POST" name="contact-form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" value="{{ old('email') }}" required="required" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" value="{{ old('name') }}" required="required" class="form-control" name="name" id="name" placeholder="Nume">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Subject</label>
                        <select id="subject" class="form-control" name="subject">
                            <option value="">Select subject.</option>
                            <option @if(old('subject') === 'error') selected @endif value="error" >Error</option>
                            <option @if(old('subject') === 'offerts') selected @endif value="offerts" >Offerts</option>
                            <option @if(old('subject') === 'refund') selected @endif value="refund" >Money Refoun</option>
                        </select>
                    </div>
                   
                    <div class="form-group col-md-6">
                        <label for="name">Mesage</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="10">{{ old('message') }}</textarea>
                    </div>
                </div>
                
                @csrf
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>

@endsection

