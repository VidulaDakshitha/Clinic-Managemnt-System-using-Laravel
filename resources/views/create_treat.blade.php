@extends('backend.lay')

@section('title', 'Record Management')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>
<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-6">
      <form class="form-horizontal" method="POST" action="{{ url('/insert_treatment') }}" enctype="multipart/form-data">
       {{ csrf_field() }}
       
         <fieldset>
           <legend>Treatment Record</legend>
            @if (count($errors)>0)
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      {{ $error }}
                  </div>    
                @endforeach
            @endif
          
            <div class="form-group">
             Date:<input type="date" id="a" class="form-control-file" name="date" value="" required>
           </div>

           <div class="form-group">
            <label>Note on patient:</label>
            <textarea class="form-control" id="Description" name="description" rows="3"></textarea>
           </div>

           <button type="submit" class="btn btn-primary">Submit</button>
           <button type="reset" class="btn btn-primary">Cancel</button>
           <a href="{{ url('/home_treat') }}" class="btn btn-primary">Back</a>
         </fieldset>
       </form>
       <button type="button" onclick="myFunction()" class="btn-btn-primary">Demo</button>
       <script>
         function myFunction(){
         document.getElementById("a").value = "2019-10-16";
         document.getElementById("Description").value = "p:34 good improvement";
         }

       </script>
      </div>
    </div>
  </div>

@endsection