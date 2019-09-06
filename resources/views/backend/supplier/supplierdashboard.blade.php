{{-- add a custom css file just for this page --}}
<?php  $styles=['css/main/login/login.css']; ?>

@extends('main.layout.mainlayout', compact('styles'));

@section('title', 'Supplier Manager')

@section('content')
<div class="container">
    <h1>Supplier Dashboard(Protected Area)</h1>
    @auth
    <h3>Logged In as the Supplier Manager</h3>
    @else
    <h3>Not Logged In</h3>
    @endauth
</div>
@endsection