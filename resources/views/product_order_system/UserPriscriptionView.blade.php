
@extends('main.layout.mainlayout');

@section('title', 'User Priscription');

@section('styles')
<style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css "></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="{{asset('js/app.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/order_system_css/orderStylesheet.css') }}">
@endsection
<script src="{{ asset('js/order_management_script.js') }}"></script>

@section('js')

@endsection

@section('content')



<div class="container-fluid" style="width: 80%; background-image: linear-gradient(to left bottom, #f8ffff, #defffd, #c6fff4, #b1ffe6, #a2ffd2);
">
    <div class="p-3 mb-2 bg-primary rounded-top text-white" style="background-image: linear-gradient(to left bottom, #c8ff49, #9ef863, #76ef7a, #4de48e, #1ad89e);">
         <h6>{{auth()->user()->name}} 's medical priscriptions</h6>
   </div>
        <!--Search-->

        <form method="POST" action="user-prescriptions">
                {{ csrf_field() }}
            <div class="form-row align-items-center">
              <div class="col-sm-3 my-1">

                <input type="text" class="form-control" name="searchtext" placeholder="type hear..." required>


              </div>

            <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                <div class="input-group">
                  <select class="custom-select mr-sm-2" name="searchtype">
                    <option value="prescriptions.id">prescriptions-id</option>
                    <option value="products.name">product name</option>
                    <option value="doctors.fullname">Doctor name</option>
                  </select>
            </div>
              </div>
              <div class="col-auto my-1">
              </div>
              <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
        </form>



          <!--table-->
        <div class="container-fluid" id="app">
         <div id="printContainer">
            <table class="table table-sm table-striped table-hover " id="table1" style="border-radius: 10px; ">
                 <div id="printContainer">
                      <thead thead-dark style="border-radius: 10px; " class="table table-hover"  >
                  <tr>
                    <th scope="col" style="border-radius: 10px; ">Priscription Id</th>
                    <th scope="col">Doctore name</th>
                    <th scope="col">Medical item name</th>
                    <th scope="col">Unit price</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>

                        @foreach ($userspricriptions as $key=> $userspricription)

                        <tr id="tr.{{$key}}" class="table-info">

                          <td scope="row" >{{$userspricription->id}}</td>
                          <td>{{$userspricription->fullname}}<td>
                          <td>{{$userspricription->name}}</td>
                          <td>Rs: {{$userspricription->selling_price}}</td>

                          <td>
                                <a href="{{route('product.addToCart',$userspricription->product_id)}}" class="btn btn-outline-success btn-sm active" role="button" aria-pressed="true">Buy this product</a>
                          </td>
                        </tr>

                  @endforeach

                </tbody>

            </div>
            </table>

             <script >

                window.onload = function(){
                         groupByFirst(document.getElementById('table1'));
                }
                </script>
         </div>

       </div>
















</div>

@endsection
