@extends('main.layout.mainlayout');

{{-- all your css styles go in here --}}
@section('styles')
<link rel="stylesheet" href="{{ asset('css/main/login/login.css') }}">
@endsection

{{-- all your js scripts go in here --}}
@section('js')
<script src="{{ asset('js/main/login/test.js') }}"></script>
@endsection

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="d-none d-md-block" src="{{ asset('images/main/login/welcome_image.jpg') }}" alt="">
        </div>
        <div class="col-md-6 col-12 justify-content-center align-self-center">

            <h3 class="header">Welcome back, </h3>
            <hr>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <input class="btn btn-primary form-control" type="submit" value="Send Reset Email">

            </form>

        </div>
    </div>
</div>
@endsection