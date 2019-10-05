@extends('backend.layout')

@section('title', 'Supplier Manager')

@include('backend.supplier.nav')

@section('content')
<div class="container">
    <div id="printContainer">
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
        <hr>
        <div class="row mt-5">
            <div class="col-md-3">
                <h4>Supplier Products:</h4>
            </div>
            <div class="col-md-9">
                @foreach ($supplier->products as $product)
                <a href="/supplier/product/{{ $product->product_id }}">
                    <h4>{{ $product->name }}</h4>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <a class="btn btn-primary col-12 col-md-1" href="/supplier/{{ $supplier->supplier_id }}/edit">Edit</a>
        <form action="/supplier/{{ $supplier->supplier_id }}" method="POST" class="col-12 col-md-2">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection