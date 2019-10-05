{{-- add a custom css file just for this page --}}
<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.layout', compact('styles'))

@section('title', 'Supplier Manager')

@include('backend.supplier.nav')


@section('content')
<div class="container" id="app">
    <search-component></search-component>
</div>
@endsection