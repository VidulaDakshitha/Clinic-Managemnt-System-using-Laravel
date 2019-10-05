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

@section('content')

@section('title', 'Product Search')


<div class="container-fluid">
  <!--cart-->
  <div class="ordersystem-cart">
    <a href="show-cart">
      <img src="assets/image/product-cart.png" alt="" style=" width: 26%;">
      <span class="badge"><strong style="color: #66bb22;font-size: 16px;"> Cart:</strong>
        <div class="badge badge-primary text-wrap ordersystem-cart-itemnumber">
          {{Session::has('cart')? Session::get('cart')->totalQty:''}} </div>
      </span>
    </a>
  </div>

  <!--show error and sucessfull msg-->
  @if(count($errors)>0)
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach ($errors->all as $errors)
      <li>
        <p>{{$errors}}</p>
      </li>
      @endforeach
    </ul>
  </div>
  @endif

  @if (\Session::has('success'))
  <div class="alert alert-success" role="alert">
    <p>{{\Session::get('success')}} </p>
  </div>
  @endif

  @if (\Session::has('order_placed'))
  <div class="alert alert-success" role="alert">
    <p>{{\Session::get('order_placed')}} </p>
  </div>
  @endif



  <!-- Search bar -->
  <a href="search-product">
    <h2 class="display-4 text-center" style="text-decoration: none; color: black;">Search Products</h2>
  </a>
  <div class="searchBar">
    <form action="search-product" method="POST">
      {{ csrf_field() }}
      <div class="input-group mb-3" style="box-shadow: 1px 2px 8px silver; ">
        <input type="text" name="productsearchtxt" class="form-control" placeholder="Search hear..."
          aria-label="Recipient's username" aria-describedby="basic-addon2" style="
                            width: 75%; " required>
        <!--Search catagery-->

        <select class="browser-default custom-select" name="category" required>
          <option value="name">Name</option>
          <option value="brand">Brand</option>
          <option value="type">Type</option>
          <option value="selling_price">Price</option>
        </select>

        <!--Search Button-->
        <div class="input-group-append">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
      </div>

    </form>
  </div>
  <!--Product Search error and Success show-->
  @if(count($errors)>0)
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach ($errors->all as $errors)
      <li>{{$errors}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  @if (\Session::has('success'))
  <div class="alert alert-success" role="alert">
    <p>{{\Session::get('success')}} </p>
  </div>
  @endif



  <!--product list start-->
  <div class="row ">
    <div class="card-columns" style="padding: 60px;">
      @if (count($product)==0)
      <div style="width: 500%;margin-left: 50%;">
        <img src="assets/image/nothigtoshow.png" class="img-fluid" alt="try again..using different words"
          style="border-radius: 20px;">
      </div>
      @else
      @foreach ($product as $key=> $productrow)
      <a href="viewproduct/{{$productrow->product_id}}" target="_blank">
        <div class="card">
          <img src="/storage/product_images/{{$productrow->image}}" class="card-img-top" alt="...">
          <div class="card-body" style="color: #302f2f;">
            <h5 class="card-title" id="prodcut-name">{{$productrow->name}}</h5>
            <h3 class="card-title" id="prodcut-price">Rs : <strong> {{$productrow->selling_price}}</strong></h3>
            <p class="card-text" id="prodcut-description">{{$productrow->description}}</p>
            <p class="card-text" id="prodcut-brandname">by <strong> {{$productrow->brand}}</strong></p>

            @if ($productrow->quantity==0)
            <div class="alert alert-warning" role="alert">
              Product out of stock :(
            </div>

            @endif

          </div>
        </div>
      </a>

      @endforeach


      @endif





    </div>
  </div>
  <!--product list end-->
</div>


@endsection