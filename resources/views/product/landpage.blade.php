@extends('backend.layout')

@include('product.nav1')

<link href={{ url('css/product/layout.css') }} rel="stylesheet" type="text/css">

@section('content')


<div class="bgded" style="background-image: url('images/product/01.jpg');"> 



    <div id="pageintro" class="hoc clear"> 
  
      <article>
        <div class="introtxt">
          <h2 class="heading">INVENTORY MANAGEMENT</h2>
          <h3>"One of the great responsibilities that I have is to manage my assets wisely, so that they create value!"</h3>
        </div>
        <footer>
          <ul class="nospace inline pushright">
            <li><a class="btn1" href= "/product" >Product Details</a></li>
            <li><a class="btn1" href="/supplier">Supplier Details</a></li>
          </ul>
        </footer>
      </article>
  
    </div>
  
  </div>
<br><br>

  <!-- JAVASCRIPTS -->
  <script src={{ url('css/product/scripts/jquery.min.js') }} ></script>
 
  <!-- IE9 Placeholder Support -->
  <script src= {{ url('css/product/scripts/jquery.placeholder.min.js') }} ></script>
  
  <!-- / IE9 Placeholder Support -->

@endsection
