@extends('backend.lay')
@section('title', 'Record Management')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>
<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
      <form class="form-horizontal" action="{{ url('/update_per') }}" enctype="multipart/form-data">
       {{ csrf_field() }}
       @method('PUT')
         <fieldset>
           <legend>Personal Record</legend>
            @if (count($errors)>0)
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      {{ $error }}
                  </div>    
                @endforeach
            @endif
          
            <div class="form-group">
             Date of advice :<input type="date" class="form-control-file" name="date" value="<?php echo $personal_records->date; ?>" required>
           </div>
           
           <div class="form-group">
             <label for="Pid">Name</label>
             <input type="string" class="form-control" id="pid" name="patient_id" placeholder="Enter Patient_id" value="<?php echo $personal_records->Patient_id; ?>">
           </div>

           <div class="form-group">
             <label for="Disease">Disease</label><?php echo $personal_records->disease; ?>
             <textarea class="form-control" id="Disease" name="disease" rows="3"></textarea>
           </div>

           <div class="form-group">
               <label for="Description">Description about disease</label><?php echo $personal_records->description; ?>
               <textarea class="form-control" id="Description" name="description" rows="3"></textarea>
           </div>

           <button type="submit" class="btn btn-primary">Submit</button>
           <button type="reset" class="btn btn-primary">Cancel</button>
           <a href="{{ url('/') }}" class="btn btn-primary">Back</a>
         </fieldset>
       </form>
      </div>
    </div>
  </div>
@endsection
