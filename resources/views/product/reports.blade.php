<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.layout')

@section('title', '')

@include('product.nav1')


@section('content')
<div class="container" id="app">

        <form action = "/reportsearch" method = "get" style="margin-right: 650px;">
            <div class = "input-group">
                <input type = "search" name = "search" placeholder="Search for product" class="form-control">
                <span class = "input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        </form>

        <br>
        <br>

    {{-- pdf start --}}
    <div id="printContainer">

            <img style="width: 400px;" src="{{ asset('images/main/mainlayout/logo_dark_long.png') }}" alt="">
        <hr> 
        <h1>Inventory Dashboard</h1>
        @auth
        <h3>Stock Report</h3>
        
        @else
        <h3>Not Logged In</h3>
        @endauth


        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Potency</th>
                    <th scope="col">Type</th>
                    <th scope="col">Exp Date</th>
                    <th scope="col">Price</th> 
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @if(count($products) > 0)
                        @foreach ($products as $product)
                            @if($product->expiry_date <= date('Y-m-d'))
                
                                    <tr>
                                        <td style = "color: red">{{$product->name}}</td>
                                        <td style = "color: red">{{$product->quantity}}</td>
                                        <td style = "color: red">{{$product->brand}}</td>
                                        <td style = "color: red">{{$product->potency}}</td>
                                        <td style = "color: red">{{$product->type}}</td>
                                        <td style = "color: red">{{$product->expiry_date}}</td>
                                        <td style = "color: red">{{$product->selling_price}}</td>
                                        <td style = "color: red">{{$product->description}}</td>
                                    <tr>

                            @else
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->potency}}</td>
                                        <td>{{$product->type}}</td>
                                        <td>{{$product->expiry_date}}</td>
                                        <td>{{$product->selling_price}}</td>
                                        <td>{{$product->description}}</td>
                                    <tr>
                            @endif

                        @endforeach

                @else
                <p><i>No Products available, please add new one</i></p>
                @endif
            </tbody>
        </table>
    </div>
    {{-- pdf end --}}
    {{ $products->links() }}

    <input type="image" value="submit" @click.preventDefault="print" src={{url('/images/product/submit1.png')}} alt="submit Button" width = "100px" height="40px" style="border: 0" >
</div>
<br><br>

@endsection
