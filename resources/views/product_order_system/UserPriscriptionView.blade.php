
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
    <div class="p-3 mb-2 bg-primary rounded-top text-white"> <h6>medical item order </div>
        <!--Search-->

        <form>
            <div class="form-row align-items-center">
              <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputName">Name</label>
                <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">
              </div>
              <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                <div class="input-group">

                  <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
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
                    <th scope="col">Doctorid</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                            <button type="button" class="rounded-pill btn btn-success ">Buy</button>
                    </td>
                  </tr>

                </tbody>
              </table>
          </div>
















</div>

@endsection
