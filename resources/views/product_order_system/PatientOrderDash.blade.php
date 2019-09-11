

@extends('main.layout.mainlayout');

@section('styles')
<style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css "></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/order_system_css/orderStylesheet.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/order_management_script.js') }}"></script>
@endsection

@section('title', 'Patient Order Dashbord')
@section('content')



<div class="container-fluid">

    <br>
    <h3>Order History</h3>

    <!--Table and operation field -->
<div class="card mb-3" id="tablebackground"style="left: 5%;width: 90%;padding: 10px;margin: 15px;border-radius: 10px;box-shadow: 0 0 9px 0px #b1aeae;">
    <div class="card-header">
          <i class="fas fa-table"></i>
          <a href="paitientorderdash">
          <p class="h4"> General Order details </p>
          </a>
    </div>
    <div class="card-body">
          <div class="table-responsive" id="tableplane" style="border-radius: 10px;">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                       <!--Add button -->
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="dataTable_filter" class="dataTables_filter ">
                        <br>
                            <form action="paitientorderdash" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-row align-items-center">
                                            <div class="col-auto my-1">
                                                    <div class="custom-control custom-checkbox mr-sm-2">

                                                          <input type="search" name="dashsearchtxt" class="form-control mx-sm-3" required>

                                                    </div>
                                            </div>

                                            <div class="col-auto my-1">
                                              <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                              <select class="custom-select mr-sm-2" name="dashsearchtype">
                                                    <option value="orders.order_id">Order id</option>
                                                    <option value="products.name">Product name</option>
                                                    <option value="order_product.product_id">Product id</option>
                                                    <option value="orders.date">Date</option>
                                                    <option value="orders.status">Status</option>
                                              </select>
                                            </div>
                                            <!--need to add user id-->
                                             <input type="text" name="paitent_id" value="{{Auth::id()}} " hidden>
                                            <div class="col-auto my-1">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>

                                </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover table-striped dataTable table-sm " id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 109px;">Order id</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Product id</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 115px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Order placed Date</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 80px;">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Type</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 71px;">Quntity</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 141px;">Total</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 181px;">Action</th>

                </tr>
              </thead>

              <tbody>
                <!--loop is start-->
             @if (count($orderDetail)==0)
                      <td class="sorting_1">Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td > </td>
             @else
                   @foreach ($orderDetail as $key=> $orderrow)-

                        <tr role="row" class="odd">
                        <td class="sorting_1">{{$orderrow->order_id}}</td>
                          <td>{{$orderrow->product_id}}</td>
                          <td>{{$orderrow->name}}</td>
                          <td>{{$orderrow->date}} </td>
                        @if (($orderrow->status)=='waiting')
                             <td>
                                <div class="badge btn-warning text-wrap" style="width: 6rem;">
                                     {{$orderrow->status}}
                                 </div>
                              </td>
                            @else
                               @if (($orderrow->status)=='ready')
                                   <td>
                                      <div class="badge btn-primary text-wrap" style="width: 6rem;">
                                         {{$orderrow->status}}
                                      </div>
                                   </td>
                            @else
                               @if (($orderrow->status)=='shiped')
                                 <td>
                                      <div class="badge btn-success text-wrap" style="width: 6rem;">
                                          {{$orderrow->status}}
                                      </div>
                                 </td>
                                @endif
                              @endif
                        @endif
                          <td>{{$orderrow->type}} </td>
                          <td>{{$orderrow->quantity}} </td>
                          <td>{{$orderrow->total_payment}} </td>
                          <td class="d-flex">
                                <form action="paitientorderdash/edit" method="POST" target="_blank">
                                    {{ csrf_field() }}
                                    <input type="text" value="{{$orderrow->order_id}}" name="order_id_send" hidden>
                                      <input type="text" value="{{$orderrow->product_id}}" name="product_id_send" hidden>
                                      <input type="text" value="{{$orderrow->name}}" name="product_name_send" hidden>
                                      <input type="text" value="{{$orderrow->type}}" name="product_type_send" hidden>
                                      <input type="text" value="{{$orderrow->date}}" name="product_date_send" hidden>
                                      <input type="text" value=" {{$orderrow->status}}" name="order_statsu_send" hidden>
                                      <input type="text" value="{{$orderrow->quantity}}" name="product_quntity_send" hidden>
                                      <input type="text" value="{{$orderrow->total_payment}}" name="order_totapayment_send" hidden>

                                <input type="text" value="{{Auth::id()}}" name="paitent_id_send" hidden>


                                  <button type="button" class="btn btn-warning">Print</button>
                                  <button type="submit" class="btn btn-primary">Edit</button>
                                  </form>
                                  <!--delete order-->

                                            @if (($orderrow->status)=='waiting')
                                                 <form action="{{route('paitintorder.destroy',$orderrow->order_id)}}" method="post">
                                                     @csrf
                                                     @method('DELETE')
                                                       <button class="btn btn-danger" type = "submit" style="margin-left: 4px;">Delete</button>

                                                 </form>
                                              @else
                                              <button class="btn btn-danger" type = "submit" style="margin-left: 4px; height: 38px;" disabled>Delete</button>
                                            @endif
                          </td>
                        </tr>
                        @endforeach
              @endif
             </tbody>
              </table>
         </div>
        </div>
    </div>

<br>
<!--General item order-->
    <div class="card-header">
          <i class="fas fa-table"></i>
          <a href="paitientorderdash">
          <p class="h4"> Medical Item Order details </p>
          </a>
    </div>
    <div class="card-body">
          <div class="table-responsive" id="tableplane" style="border-radius: 10px;">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                       <!--Add button -->
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="dataTable_filter" class="dataTables_filter ">
                        <br>
                            <form action="paitientorderdash" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-row align-items-center">
                                            <div class="col-auto my-1">
                                                    <div class="custom-control custom-checkbox mr-sm-2">

                                                          <input type="search" name="dashsearchtxt" class="form-control mx-sm-3" required>

                                                    </div>
                                            </div>

                                            <div class="col-auto my-1">
                                              <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                              <select class="custom-select mr-sm-2" name="dashsearchtype">
                                                <option value="orders.order_id">Order id</option>
                                                <option value="products.name">Product name</option>
                                                <option value="order_product.product_id">Product id</option>
                                                <option value="orders.date">Date</option>
                                                <option value="orders.status">Status</option>
                                              </select>
                                            </div>
                                            <!--need to add user id-->
                                            <input type="text" name="paitent_id" value="1" hidden>
                                            <div class="col-auto my-1">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>

                                </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 109px;">Order id</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Product id</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 115px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Type</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Date</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 80px;">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 71px;">quantity</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 71px;">total_payment</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 181px;">Action</th>

                </tr>
              </thead>

              <tbody>
                <!--loop is start-->
                @if (count($medicalorder)<1)
                      <td class="sorting_1">Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
                         <td >Nothing to show</td>
              @else

                   @foreach ($medicalorder as $key=> $medicalitemrow)

                        <tr role="row" class="odd">
                          <td class="sorting_1">{{$medicalitemrow->order_id}}</td>
                          <td>{{$medicalitemrow->product_id}} </td>
                          <td>{{$medicalitemrow->name}} </td>
                          <td>{{$medicalitemrow->type}} </td>
                          <td>{{$medicalitemrow->date}} </td>
                          @if (($medicalitemrow->status)=='waiting')
                             <td>
                                <div class="badge btn-warning text-wrap" style="width: 6rem;">
                                     {{$medicalitemrow->status}}
                                 </div>
                              </td>
                            @else
                               @if (($medicalitemrow->status)=='ready')
                                   <td>
                                      <div class="badge btn-primary text-wrap" style="width: 6rem;">
                                         {{$medicalitemrow->status}}
                                      </div>
                                   </td>
                            @else
                               @if (($medicalitemrow->status)=='shiped')
                                 <td>
                                      <div class="badge btn-success text-wrap" style="width: 6rem;">
                                          {{$medicalitemrow->status}}
                                      </div>
                                 </td>
                                @endif
                              @endif
                        @endif

                          <td>{{$medicalitemrow->quantity}} </td>
                          <td>{{$medicalitemrow->total_payment}} </td>
                          <td class="d-flex">
                              <form action="paitientorderdash/edit" method="POST" target="_blank">
                                {{ csrf_field() }}
                                <input type="text" value="{{$medicalitemrow->order_id}}" name="order_id_send" hidden>
                                  <input type="text" value="{{$medicalitemrow->product_id}}" name="product_id_send" hidden>
                                  <input type="text" value="{{$medicalitemrow->name}}" name="product_name_send" hidden>
                                  <input type="text" value="{{$medicalitemrow->type}}" name="product_type_send" hidden>
                                  <input type="text" value="{{$medicalitemrow->date}}" name="product_date_send" hidden>
                                  <input type="text" value=" {{$medicalitemrow->status}}" name="order_statsu_send" hidden>
                                  <input type="text" value="{{$medicalitemrow->quantity}}" name="product_quntity_send" hidden>
                                  <input type="text" value="{{$medicalitemrow->total_payment}}" name="order_totapayment_send" hidden>
                                  <input type="text" value="1" name="paitent_id_send" hidden>

                              <button type="button" class="btn btn-warning">Print</button>
                              <button type="submit" class="btn btn-primary">Edit</button>
                              </form>

                         @if (($medicalitemrow->status)=='waiting')

                              <form action="{{route('paitintorder.destroy',$medicalitemrow->order_id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-round" type = "submit" style="margin-left: 4px;">Delete</button>
                              </form>

                        @else
                              <button class="btn btn-danger" type = "submit" style="margin-left: 4px; height: 38px;" disabled>Delete</button>
                        @endif



                          </td>
                        </tr>

                   @endforeach

            @endif



            </tbody>
            </table>
        </div>



    </div>

@endsection
