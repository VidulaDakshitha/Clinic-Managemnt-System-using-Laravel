{{-- add a custom css file just for this page --}}
<?php  $styles=['css/order_system_css/orderStylesheet.css']; ?>
{{-- add a custom javascript file from the public folder --}}
<?php  $javascript_local=['js/order_management_script.js','js/jquery-3.4.1.js']; ?>
{{-- CDN Styles and JavaScripts --}}
<?php  $javascript_cdn=[]; ?>
{{-- add a custom css file from CDN --}}
<?php  $css_cdn=['https://fonts.googleapis.com/css?family=Nunito:200,600'];?>

@extends('main.layout.mainlayout', compact('styles', 'css_cdn', 'javascript_local', 'javascript_cdn'));


@section('content')

@section('title', 'Edit Order')

<h1 class="display-4 text-center">Edit Orders</h1>

        <div class=" container d-flex product-view-style" style="margin-top: 100px; ">
                <form  action="updateorder" method="POST"  >
                    {{ csrf_field() }}
                        <div class=" form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Order ID</label>
                            <input type="text" class="form-control" name="orderid" value={{$paitint_order[0]}} placeholder="Order ID" readonly="readonly">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Product ID</label>
                            <input type="text" class="form-control" name="product_id" value={{$paitint_order[1]}} placeholder="Product ID" readonly="readonly">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputAddress">Product Name</label>
                          <input type="text" class="form-control" name="productname" value="{{$paitint_order[3]}}" placeholder="Product Name" disabled>

                        </div>
                        <div class="form-group">
                          <label for="inputAddress2">Product Type</label>
                          <input type="text" class="form-control" name="producttype" value="{{$paitint_order[4]}}" placeholder="Product Type" disabled>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputCity">Order paced Date</label>
                            <input type="text" class="form-control" value="{{$paitint_order[5]}}" name="date" disabled>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputState">Current status</label>
                            <input type="text" class="form-control" value="{{$paitint_order[6]}}" name="status" disabled>
                          </div>
                          <div class="form-group col-md-2">
                            @if (($paitint_order[6])=='waiting')

                                  <label for="inputZip">Quntity</label>
                          <input type="number" class="form-control"  min="1" value="{{$paitint_order[7]}}" name="quntity"  >


                            @else

                                   <label for="inputZip">Quntity</label>
                               <input type="number" class="form-control" min="1"   value="{{$paitint_order[7]}}" name="quntity" disabled >

                            @endif


                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="inputZip">Total Pyament</label>
                            <input type="text" class="form-control" value="{{$paitint_order[8]}}" name="totalpaymet" disabled>
                          </div>


                        </div>


                        @if (($paitint_order[6])=='waiting')
                                  <button type="submit" class="btn btn-primary" >Update</button>
                        @else
                                  <div class="alert alert-warning" role="alert">
                                        You can't update this order!
                                  </div>
                                  <button type="submit" class="btn btn-primary " disabled>Update</button>
                        @endif
                        <button type="submit" class="btn btn-danger" onclick="closeWin()" >Cancel</button>


                </form>




        </div>
@endsection
