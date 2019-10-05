@extends('backend.layout')

@section('title', 'Product Management')

@include('product.nav1')

<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')

<!--Add Product Modal-->

<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/store" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="modal-body">

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name" id="name"
                            maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label>Selling Price</label>
                        <input type="number" name="selling_price" class="form-control" placeholder="Enter Selling Price"
                            id="selling_price" min="100" max="10000" required>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity"
                            id="quantity" min="10" max="1000" maxlength="4" required>
                    </div>
                    <div class="form-group">
                        <label>Potency</label>
                        <input type="number" name="potency" class="form-control" placeholder="Enter Potency" min="0"
                            max="90" id="potency">
                    </div>
                    <div class="form-group">
                        <label>EXP-Date</label>
                        <input type="date" name="expiry_date" class="form-control" id="expiry_date" required pattern = "(?:20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)")>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <input type="text" name="brand" class="form-control" placeholder="Enter Product Brand"
                            id="brand" maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Description"
                            id="description" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="type" id="type" required>
                            <option selected="selected">Product Type</option>
                            <option value="medical">medical</option>
                            <option value="general">general</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" style="margin-left: 15px;">Image</label>
                    <input type="file" class="form-control-file" style="margin-left: 15px;" name="image" id="image">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" value="Add Product" name="registerbtn" class="btn btn-primary">

                    <button type="button" onclick="myFunction()" class = "btn btn-primary">Demo</button>

                    <script>
                            function myFunction() {
                            document.getElementById("name").value = "Silk Stay Soap";
                            document.getElementById("selling_price").value = "400.00";
                            document.getElementById("quantity").value = "30";
                            document.getElementById("potency").value = "0";
                            document.getElementById("expiry_date").value = "2020-10-13";
                            document.getElementById("brand").value = "S.B.L";
                            document.getElementById("description").value = "Fairness Homoeopathic Soap";
                            document.getElementById("type").value = "general";
                            document.getElementById("image").value = " ";

                        }
                    </script>

                </div>


        </div>

        </form>

    </div>
</div>
</div>

<!--Add Product Modal END-->



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
                            <h1>Stock Description</h1>
                            <button type="submit" href="" class="btn btn-primary mr-1" data-toggle="modal"
                                data-target="#addproduct" style="margin-left: 550px;margin-top: -45px;">Add NewProduct</button>

                            <form action="/exp" method="GET">
                                @csrf
                                <button type="submit" href="" class="btn btn-danger mr-1"
                                    style="margin-left: 700px;margin-top: -45px;">Expired Products</button>
                            </form>

                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>quantity</th>
                                        <th>type</th>
                                        <th>brand</th>
                                        <th>Potency</th>
                                        <th>Price</th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @if(count($products) > 0)

                                    @foreach($products as $product)

                                    @if($product->expiry_date <= date('Y-m-d'))

                                    <tr>
                                        <td style = "color: red">{{$product->name}}</td>
                                        <td style = "color: red">{{$product->quantity}}</td>
                                        <td style = "color: red">{{$product->type}}</td>
                                        <td style = "color: red">{{$product->brand}}</td>
                                        <td style = "color: red">{{$product->potency}}</td>
                                        <td style = "color: red">{{$product->selling_price}}</td>

                                        <td>
                                            <form action="/product/{{ $product->product_id}}" method="GET">
                                                @csrf
                                                <button type="submit" href="" class="btn btn-primary mr-1">View</button>
                                            </form>
                                        </td>

                                        <td>
                                            <a href="/product/{{ $product->product_id}}/edit"
                                                class="btn btn-primary mr-1">Edit</a>
                                        </td>
                                        <td>
                                            <form action="/productdelete/{{$product->product_id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="" class="btn btn-danger">Remove</button>
                                            </form>
                                        </td>

                                    </tr>

                                    @else

                                    <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->type}}</td>
                                            <td>{{$product->brand}}</td>
                                            <td>{{$product->potency}}</td>
                                            <td>{{$product->selling_price}}</td>
    
                                            <td>
                                                <form action="/product/{{ $product->product_id}}" method="GET">
                                                    @csrf
                                                    <button type="submit" href="" class="btn btn-primary mr-1">View</button>
                                                </form>
                                            </td>
    
                                            <td>
                                                <a href="/product/{{ $product->product_id}}/edit"
                                                    class="btn btn-primary mr-1">Edit</a>
                                            </td>
                                            <td>
                                                <form action="/productdelete/{{$product->product_id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" href="" class="btn btn-danger">Remove</button>
                                                </form>
                                            </td>
    
                                        </tr>
                                    @endif
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