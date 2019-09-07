{{-- add a custom css file just for this page --}}
<?php  $styles=['css/main/login/login.css']; ?>

@extends('main.layout.mainlayout', compact('styles'));

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
            <form class="form" action="/login" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Username">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password">
                </div>
                <input class="btn btn-primary form-control" type="submit" value="Login">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="/forgot">Forgot Password?</a>
                <p> Or </p>
                <a class="underlineHover" href="/register">Haven't created an account yet?</a>
            </div>

        </div>
    </div>
</div>
@endsection