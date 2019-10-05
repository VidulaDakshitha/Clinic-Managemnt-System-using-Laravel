<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.layout')

@section('title', '')

@include('product.nav1')


<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>


@section('content')
<div class="container" id="app">
    @auth
    <h3> </h3>
    @else
    <h3>Not Logged In</h3>
    @endauth

 {{-- pdf start --}}
 <div id="printContainer">

        <img style="width: 400px;" src="{{ asset('images/main/mainlayout/logo_dark_long.png') }}" alt="">
    <hr>
        <h1>Expired Products Report</h1>
        @auth
        
        @else
        <h3>Not Logged In</h3>
        @endauth


        <table class="table">
            <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">name</th>
                                        <th scope="col">quantity</th>
                                        <th scope="col">type</th>
                                        <th scope="col">brand</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">EXP_Date</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @if(count($products) > 0)

                                    

                                    @foreach($products as $product)

                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->type}}</td>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->selling_price}}</td>
                                        <td style = "color: red">{{$product->expiry_date}}</td>
                                        
                                    </tr>

                                    @endforeach
                                    @endif
                                   
                                </tbody>
                            </table>
                        </div>
                        {{-- pdf end --}}
                    
                        <input type="image" value="submit" @click.preventDefault="print" src={{url('/images/product/submit1.png')}} alt="submit Button" width = "100px" height="40px" style="border: 0" >
                    </div>
                    <br><br>

@endsection