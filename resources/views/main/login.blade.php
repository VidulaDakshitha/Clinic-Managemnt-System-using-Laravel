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
            <form class="form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email"
                        autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <input class="btn btn-primary form-control" type="submit" value="Login">

            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="{{ route('password.request') }}">Forgot Password?</a>
                <p> Or </p>
                <a class="underlineHover" href="/registerp">Haven't created an account yet?</a>
            </div>

        </div>
    </div>
</div>
@endsection