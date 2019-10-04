@extends('backend.layout')

@section('title', 'Product Management')

@include('product.nav1')

<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')

<div class="container">

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
                            <h1>Expired Products</h1>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>quantity</th>
                                        <th>type</th>
                                        <th>brand</th>
                                        <th>Price</th>
                                        <th>EXP_Date</th>
                                        <th>Remove</th>
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

                                        <td>
                                            <form action="/productdeleteexp/{{$product->product_id}}" method="POST">
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