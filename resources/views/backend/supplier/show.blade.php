@extends('backend.layout')

@section('title', 'Supplier Manager')

@include('backend.supplier.nav')

@section('content')
<div class="container">
    <h2>Supplier: {{ $supplier->name }} details</h2>
    <hr>
    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Supplier Name:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $supplier->name }}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Supplier Contact Number:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $supplier->suppliercontacts->first()->contact_number}}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Supplier Email:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $supplier->supplieremails->first()->email}}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <h4>Supplier Address:</h4>
        </div>
        <div class="col-md-9">
            <h4>{{ $supplier->location }}</h4>
        </div>
    </div>

</div>
@endsection