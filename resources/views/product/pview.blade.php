@extends('backend.layout')

@section('title', 'Product Management')

@include('product.nav')

@section('content')

<div class="container">
    <h2>Product: {{ $product->name }}</h2>
    <hr>

        <img src = "/storage/product_images/{{ $product->image}}" width = "200px" height="200px">
        


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

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Description:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $product->description }}</h4>
        </div>
    </div>

    <hr>

    <form action="/product" method="">
        @csrf
        <button type="submit" href="" class="btn btn-primary mr-1">BACK</button>
    </form>
    <br><br>
    
</div>
@endsection