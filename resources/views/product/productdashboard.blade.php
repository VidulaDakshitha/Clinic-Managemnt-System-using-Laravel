{{-- add a custom css file just for this page --}}
<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.layout', compact('styles'))

@section('title', 'Product Management')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

    <link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>
    
    <link href= {{ url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800') }} rel='stylesheet' type='text/css'>
    

@section('content')
<div class="container">
    <h1>Inventory Dashboard</h1>
    @auth
    <h3> </h3>
    @else
    <h3>Not Logged In</h3>
    @endauth


    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Inventory Management</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>product_id</th>
                                        <th>name</th>
                                        <th>selling_price</th>
                                        <th>quantity</th>
                                        <th>potency</th>
                                        <th>expiry_date</th>
                                        <th>type</th>
                                        <th>brand</th>
                                        <th>description</th>
                                    </tr>
                                </thead>


                            <tbody>
                                @if(count($products) > 0)
                                                
                                     @foreach($products as $product)
     
                                    <tr>
                                            <td>{{$product->product_id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->selling_price}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->potency}}</td>
                                            <td>{{$product->expiry_date}}</td>
                                            <td>{{$product->type}}</td>
                                            <td>{{$product->brand}}</td>
                                            <td>{{$product->description}}</td>

                                        <td class="row">
                                             <a href="" class="btn btn-primary mr-1">Edit</a>
                                        <form action="" method="POST">
                                         @csrf
                                            @method('DELETE')
                                              <button type="submit" href="" class="btn btn-danger">Remove</button>
                                        </form>
                                        </td>
                                    </tr>

                                    @endforeach
                                @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->


</div>


<script src={{ url('css/product/vendors/jquery/dist/jquery.min.js') }}></script>
<script src={{ url('css/product/vendors/popper.js/dist/umd/popper.min.js') }}></script>
<script src={{ url('css/product/vendors/bootstrap/dist/js/bootstrap.min.js') }}></script>
<script src={{ url('css/product/assets/js/main.js') }}></script>


<script src={{ url('css/product/vendors/datatables.net/js/jquery.dataTables.min.js') }}></script>

<script src={{ url('css/product/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}></script>

<script src={{ url('css/product/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}></script>

<script src={{ url('css/product/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}></script>

<script src={{ url('css/product/vendors/jszip/dist/jszip.min.js') }}></script>


<script src={{ url('css/product/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}></script>

<script src={{ url('css/product/vendors/datatables.net-buttons/js/buttons.print.min.js') }}></script>

<script src={{ url('css/product/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}></script>

<script src={{ url('css/product/assets/js/init-scripts/data-table/datatables-init.js') }}></script>



@endsection