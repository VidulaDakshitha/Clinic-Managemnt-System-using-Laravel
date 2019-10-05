@extends('backend.l')
@section('title', 'Record Management')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')
<div class="container">
    <div class="col-md-6">
        <legend>Personal Record</legend>
        
        ID:<p>{{$personal_record->record_id}}</p>
        Date:<p>{{$personal_record->date}}</p>
        Patient_id:<p>{{$personal_record->patient_id}}</p>
        Disease:<p>{{$personal_record->disease}}</p>
        Description about disease:<p>{{$personal_record->description}}</p>
        
    </div>
    <a href="{{ url('/patient') }}" class="btn btn-primary">Back</a>
</div>

@endsection
