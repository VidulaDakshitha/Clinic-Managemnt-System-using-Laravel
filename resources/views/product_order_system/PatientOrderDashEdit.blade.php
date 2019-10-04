
@extends('main.layout.mainlayout');

@section('styles')
<style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css "></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<link rel="stylesheet" href="  https://printjs-4de6.kxcdn.com/print.min.css">

<link rel="stylesheet" href="{{ asset('css/order_system_css/orderStylesheet.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/order_management_script.js') }}"></script>
<script src="  https://printjs-4de6.kxcdn.com/print.min.js"></script>
@endsection


@section('content')

@section('title', 'Edit Order')

<h1 class="display-4 text-center">Edit Orders</h1>

    <div class=" container d-flex product-view-style" style="margin-top: 100px; "  >
        <div id="printContainer-3" >
            <form  action="updateorder" method="POST"  >
                    {{ csrf_field() }}
                    <div >
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
                                  <input type="number" class="form-control"  min="1" value="{{$paitint_order[7]}}" name="newquntity"  >


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
                          <!--pass old--qunrirt-->
                          <input type="text" name="oldquntity" value="{{$paitint_order[7]}}" hidden>

                    </div>


                        @if (($paitint_order[6])=='waiting')
                                  <button id="noprint-submit" type="submit" class="btn btn-primary" >Update</button>
                        @else
                                  <div class="alert alert-warning" role="alert">
                                        You can't update this order!
                                  </div>
                                  <button id="noprint-submit" type="submit" class="btn btn-primary " disabled>Update</button>

                        @endif
                        <button id="nocell-m" type="submit" class="btn btn-danger" onclick="closeWin()" >Cancel</button>
                        <a id="noprint-m" class="btn btn-success print_btn" onclick="printJS({printable: 'printContainer-3',headerStyle:['text-align: center;','color: #3d9c34;'] , type: 'html', header: 'Order details',css:['/css/app.css','css/order_system_css/orderStylesheet.css'],ignoreElements:['noprint-m','nocell-m','noprint-submit']
                    })" > Generate report</a>

            </form>

        </div>

    </div>
@endsection
