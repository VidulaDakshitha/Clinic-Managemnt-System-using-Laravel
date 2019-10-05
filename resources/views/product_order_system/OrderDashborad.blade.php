@extends('main.layout.mainlayout')


@section('title', 'Order Dashboard')

@section('styles')
<style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css "></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://unpkg.com/vue-html-to-paper/build/vue-html-to-paper.js"></script>
<script src="{{ asset('js/order_management_script.js') }}"></script>



<link rel="stylesheet" href="{{ asset('css/order_system_css/orderStylesheet.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('content')

<div class="container-fluid">

  <br>


  @if(count($errors)>0)
  <div class="alert alert-danger" id="messge_sucess1" role="alert">
    <ul>
      @foreach ($errors->all as $errors)
      <li>{{$errors}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  @if (!empty('$success'))
  <div class="alert alert-success" id="messge_sucess" role="alert">
    {{$success}}
  </div>
  @endif
  <br>

  <!--Dark them-->
  <div class="dropdown text-right">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="switchf" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      Dark
    </button>
    <br>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <div class="custom-control custom-switch" style="margin-left: 10px;">
        <input type="checkbox" class="custom-control-input" id="switch" onclick=" change_theam()">
        <label class="custom-control-label" for="switch">Dark mode</label>
      </div>
    </div>
  </div>

  <br>

  <!--Notification card-->
  <div class="d-flex" style="background: #fafafa;">
    <div class="row" style="width: 50%; height: 130px">
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white notify_cart_1 o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-comments"></i>
            </div>
            <div class="mr-5">Tota Order <strong> {{$total}} </strong></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white notify_cart_2 o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-list"></i>
            </div>
            <div class="mr-5">Redy order <strong> {{$ready}} </strong> </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white notify_cart_3 o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-shopping-cart"></i>
            </div>
            <div class="mr-5">Shiped Order <strong> {{$shiped}} </strong></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white notify_cart_4 o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-life-ring"></i>
            </div>
            <div class="mr-5">Waiting Order <strong> {{$waiting}} </strong></div>
          </div>
        </div>
      </div>
    </div>

    <div class="row container" style="width: 50%;">
      <canvas id="myChart" style="padding: 10px;display: block;height: 124px;width: 720px;"></canvas>
    </div>
  </div>
</div>
<!--Char.js chart Script file-->

<script>
  var ctx = document.getElementById('myChart');
    var witing={{$waiting}};
    var ready= {{$ready}};
    var shiped= {{$shiped}} ;

    console.log("shipd :"+shiped);


    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: ['shiped', 'waitting','packed' ],
            datasets: [{
                label: 'Order Shiped Informaintion',
              data: [shiped, witing,ready],
              //  data: [10, 20,30],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.9)',
                    'rgba(54, 162, 235, 0.9)',
                    'rgba(255, 206, 86, 0.9)'

                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>




<!--Table and operation field -->
<div class="card mb-3" id="tablebackground"
  style="padding: 15px;margin: 15px;border-radius: 10px;box-shadow: 0 0 9px 0px #b1aeae;">
  <div class="card-header">

    <a href="order-admindash">
      <p class="h4"> Order details </p>
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
            <form action="order-admindash" method="POST">
              {{ csrf_field() }}
              <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <div class="custom-control custom-checkbox mr-sm-2">

                    <input type="search" name="dashsearchtxt" placeholder="search heare" class="form-control mx-sm-3"
                      required>

                  </div>
                </div>

                <div class="col-auto my-1">
                  <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                  <select class="custom-select mr-sm-2" name="dashsearchtype">
                    <option value="orders.order_id">Order id</option>
                    <option value="orders.patient_id">Patient id</option>
                    <option value="patients.fullname">User name</option>
                    <option value="order_product.product_id">Product id</option>
                    <option value="products.name">Product name</option>
                    <option value="orders.date">Date</option>
                    <option value="orders.status">Status</option>
                  </select>
                </div>

                <div class="col-auto my-1">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>


            </form>

          </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row" id="app">
        <div class="col-sm-12"  id="printContainer">
          <table class="table table-bordered table-sm table-hover dataTable" id="dataTable" width="100%" cellspacing="0"
            role="grid" aria-describedby="dataTable_info" style="width: 100%; size:15px;">
            <thead>
              <tr role="row">
                <th class="table-active sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                  aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 109px;">
                  Order id</th>
                <th class="table-active sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                  aria-label="Position: activate to sort column ascending" style="width: 105px;">Patient id</th>
                  <th class="table-active sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                  aria-label="Position: activate to sort column ascending" style="width: 105px;">Patient name</th>
                  <th class="table-active sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                  aria-label="Position: activate to sort column ascending" style="width: 105px;">Product Name</th>
                <th class="table-active sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                  aria-label="Salary: activate to sort column ascending" style="width: 115px;">Product id</th>
                <th class="table-active sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                  aria-label="Office: activate to sort column ascending" style="width: 115px;">Date</th>
                <th class="table-active sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                  aria-label="Office: activate to sort column ascending" style="width: 80px;">Quntity</th>
                <th class=" table-active sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                  aria-label="Age: activate to sort column ascending" style="width: 71px;">Payamet</th>
                <th class="table-active sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                  aria-label="Start date: activate to sort column ascending" style="width: 151px;">Status</th>


              </tr>
            </thead>

            <tbody>
              <!--loop is start-->
              @if (count($order)<1) <td class="sorting_1">Nothing to show</td>
                <td>Nothing to show</td>
                <td>Nothing to show</td>
                <td>Nothing to show</td>
                <td>Nothing to show</td>
                <td>Nothing to show</td>
                <td>Nothing to show</td>
                <td>Nothing to show</td>
                <td>Nothing to show</td>


                @else
                <h3>Order Dashbord</h3>
                <p id="demo"></p>

                <br>
                @foreach ($order as $key=> $orderrow)

             <div id="printContainer_row">

                <tr role="row" class="odd">
                  <td class="sorting_1" >{{$orderrow->order_id}}</td>
                  <td >{{$orderrow->patient_id}}</td>
                  <td >{{$orderrow->fullname}}</td>
                  <td>{{$orderrow->name}}</td>
                  <td>{{$orderrow->product_id}}</td>

                  <td>{{$orderrow->date}}</td>
                  <td>{{$orderrow->quantity}}</td>
                  <td>{{$orderrow->total_payment}}</td>

                  <input id="order_id" value="{{$orderrow->order_id}}" hidden>
                  <input id="product_id" value="{{$orderrow->product_id}}" hidden>
                  <input id="product_date" value="{{$orderrow->date}}" hidden>
                  <input id="product_quantity" value="{{$orderrow->quantity}}" hidden>
                  <input id="product_total_payment" value="{{$orderrow->total_payment}}" hidden>


             </form>
                </div>
                  @if (($orderrow->status)=='shiped')
                  <td>
                    <div class="badge badge-success text-wrap" style="width: 6rem;">
                      {{$orderrow->status}}
                    </div>
                  </td>
                  @else
                  <td>

                    <form action="admindash_status" method="POST" class="form-inline">
                      <div class="input-group mb-2">
                            @if (($orderrow->status)=='waiting')
                        <div class="badge badge-primary text-wrap" style="width: 6rem;">
                          <p> {{$orderrow->status}} </p>
                        </div>
                            @else
                            <div class="badge badge-warning text-wrap" style="width: 6rem;">
                                    <p> {{$orderrow->status}} </p>
                                  </div>
                            @endif
                        {{ csrf_field() }}
                        <input type="text" name="order_id" value="{{$orderrow->order_id}}" hidden>
                        <select name="admindash_status" class="custom-select mr-sm-1" style=" width: 29%; ">
                          <option value="ready">ready</option>
                          <option value="shiped">shiped</option>
                          <option value="waiting">waiting</option>
                        </select>
                        <button type="submit" type="button" class="btn btn-primary">Update</button>
                      </div>
                    </form>

                  </td>
                  @endif

                  <div>

                </tr>
                <div>
                @endforeach

                @endif



            </tbody>
          </table>
          <script>
                var d = new Date();
                document.getElementById("demo").innerHTML = d;
        </script>

        </div>
        <div class="col-auto my-1">
            <Button class="btn btn-warning print_btn" @click.preventDefault="print"> Generate report</Button>

      </div>
    </div>
  </div>
</div>
</div>
</div>
< </div> @endsection
