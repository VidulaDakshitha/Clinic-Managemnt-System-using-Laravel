<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.layout')

@section('title', 'Product Manager')

@include('product.nav1')


@section('content')
<div class="container" id="app">
    {{-- pdf start --}}
    <div id="printContainer">
        <h1>Inventory Dashboard</h1>
        @auth
        <h3>Monthly Stock List</h3>
        
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

    <Button class="btn btn-primary" @click.preventDefault="print">Print Report</Button>
</div>
@endsection
