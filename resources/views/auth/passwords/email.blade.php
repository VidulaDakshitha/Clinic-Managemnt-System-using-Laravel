{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}
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
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <img class="d-none d-md-block" src="{{ asset('images/main/login/welcome_image.jpg') }}" alt="">
        </div>
        <div class="col-md-6 col-12 justify-content-center align-self-center">

            <h3 class="header">Change your password, </h3>
            <hr>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Enter your email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <input class="btn btn-primary form-control" type="submit" value="Email The Reset Link">

            </form>

        </div>
    </div>
</div>
@endsection