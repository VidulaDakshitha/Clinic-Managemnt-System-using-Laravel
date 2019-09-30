@extends('backend.lay')
@section('title', 'Record Management')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')
<div class="container">
    <div class="col-md-6">
        <legend>Prescription</legend>
        ID:<p>{{ $prescription->id }}</p>
        Doc_id:<p>{{ $prescription->doctor_id }}</p>
        Pid:<p>{{ $prescription->patient_id }}</p>
        Prescription:<p>{{ $prescription->description }}</p>

    </div>
</div>

@endsection
