
@extends('main.layout.mainlayout');

@section('title', 'User Priscription');

@section('styles')
<style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css "></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/order_system_css/orderStylesheet.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/order_management_script.js') }}"></script>
@endsection

@section('content')



<div class="container-fluid" style="width: 80%;">
    <div class="p-3 mb-2 bg-primary rounded-top text-white"> <h6>{{auth()->user()->name}} 's medical priscriptions</h6>
   </div>
        <!--Search-->

        <form method="POST" action="user-prescriptions">
                {{ csrf_field() }}
            <div class="form-row align-items-center">
              <div class="col-sm-3 my-1">

                <input type="text" class="form-control" name="searchtext" placeholder="Jane Doe">

              </div>

              <div class="col-sm-3 my-1">

                    <input type="date" class="form-control" name="searchtext" placeholder="Jane Doe">

                  </div>
              <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                <div class="input-group">
                  <select class="custom-select mr-sm-2" name="searchtype">
                    <option value="prescriptions.id">id</option>
                    <option value="products.name">Two</option>
                    <option value="date">Three</option>
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
        <div class="container-fluid">
            <table class="table table-sm table-striped table-hover table-dark">
                <thead>
                  <tr>
                    <th scope="col">Priscription Id</th>
                    <th scope="col">Medical item name</th>
                    <th scope="col">Unit price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                        @foreach ($userspricriptions as $userspricription)


                        <tr>
                          <th scope="row" >{{$userspricription->id}}</th>
                          <td>{{$userspricription->name}}</td>
                          <td>{{$userspricription->selling_price}}</td>
                          <td>
                                  <button type="button" class="rounded-pill btn btn-success ">Buy</button>
                          </td>
                        </tr>
                  @endforeach

                </tbody>
              </table>
          </div>
















</div>

@endsection
