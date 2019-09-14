@extends('backend.layout')

@section('title', 'Product Management')

@include('product.nav')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

    <link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')

<!--Add Product Modal-->

<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <form action="/store" method="POST">
            {{ csrf_field() }}
      
              <div class="modal-body">

                    <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Product Name" id="name" maxlength= "20" required>
                        </div>
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="number" name="selling_price" class="form-control" placeholder="Enter Selling Price" id="selling_price" min="100" max="10000" required>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" id="quantity" min="10" max="1000" maxlength="4" required>
                        </div>
                        <div class="form-group">
                            <label>Potency</label>
                            <input type="number" name="potency" class="form-control" placeholder="Enter Potency" min="1" max="90" id="potency">
                        </div>
                        <div class="form-group">
                            <label>EXP-Date</label>
                            <input type="date" name="expiry_date" class="form-control" id="expiry_date" required>
                        </div>
                        <div class="form-group">
                                <label>Brand</label>
                                <input type="text" name="brand" class="form-control" placeholder="Enter Product Brand" id="brand" maxlength= "20" required>
                        </div>
                        <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter Description" id="description" maxlength= "50" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="type" id="type" required>
                                <option selected="selected">Product Type</option>
                                    <option value="Drug">Drug</option>
                                    <option value="GeneralProduct">General Product</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                    </div>

                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" value="Add Product" name="registerbtn" class="btn btn-primary">
                        </div>
                        
                        
            </div>
                        
            </form>

        </div>
    </div>
</div>

<!--Add Product Modal END-->



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
    
                    <div class="col-md-12" >
                        <div class="card">
                            <div class="card-header">
                                <h1>Stock Description</h1>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>name</th>
                                            <th>quantity</th>
                                            <th>potency</th>
                                            <th>type</th>
                                            <th>brand</th>
                                            <th>Price</th>
                                            <th>EXP_Date</th>
                                            <th>Update</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
    
    
                                <tbody>
                                    @if(count($products) > 0)
                                                    
                                         @foreach($products as $product)
         
                                        <tr>    
                                                <td>{{$product->product_id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>{{$product->potency}}</td>
                                                <td>{{$product->type}}</td>
                                                <td>{{$product->brand}}</td>
                                                <td>{{$product->selling_price}}</td>
                                                <td>{{$product->expiry_date}}</td>

                                                
                                                <td>
                                                    <form action="/update/{{$product->product_id}}" method="PUT">
                                                    @csrf
                                                        @method('UPDATE')    
                                                         <button type="submit" href="" class="btn btn-primary mr-1">Edit</button>
                                                    </form>
                                                </td>
                                                <td>
                                                   <form action="/productdelete/{{$product->product_id}}" method="POST">
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