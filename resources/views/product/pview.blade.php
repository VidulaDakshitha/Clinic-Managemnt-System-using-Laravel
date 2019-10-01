@extends('backend.layout')

@section('title', 'Product Management')

@include('product.nav')

@section('content')

<div class="container">
    <h2>Product: {{ $product->name }} details</h2>
    <hr>
    <hr>

        <div class="col-md-9">
            <h4>{{  $product->image }}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Product Name:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{  $product->name }}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Quantity:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $product->quantity }}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Potency:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $product->potency }}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Product Type:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $product->type }}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Brand:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $product->brand }}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Selling Price:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $product->selling_price }}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>EXP Date:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $product->expiry_date }}</h4>
        </div>
    </div>
    <hr>
    <hr>

    <form action="/product" method="POST">
        @csrf
        <button type="submit" href="" class="btn btn-primary mr-1">BACK</button>
    </form>
    
</div>
@endsection