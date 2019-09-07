{{-- add a custom css file just for this page --}}
<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.layout', compact('styles'))

@section('title', 'Supplier Manager')

@section('content')
<div class="container">
    <h3>Edit Supplier: {{ $supplier->name }}</h3>

    <form action="/supplier/{{ $supplier->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inpuSupName">Supplier Name</label>
                <input type="text" class="form-control" id="inpuSupName" placeholder="Supplier Name" required
                    name="name" value="{{ $supplier->name }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inpuSupEmail">Supplier Email</label>
                <input type="email" class="form-control" id="inpuSupEmail" placeholder="Supplier Email" required
                    name="email" value="{{ $supplier->email }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inpuSupContact">Contact Number</label>
                <input type="text" class="form-control" id="inpuSupContact" placeholder="Contact Number" required
                    name="contact_number" value="{{ $supplier->suppliercontacts()->first() }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" required
                value="{{ $supplier->address }}">
        </div>
        {{-- <div class=" form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"
                name="address2">
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" placeholder="Colombo" name="city" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Postal Code</label>
                <input type="text" class="form-control" id="inputZip" placeholder="61120" name="postal_code" required>
            </div>
        </div> --}}

        <hr>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputProduct">Product</label>
                <select id="inputProduct" class="form-control" name="product" required>
                    @if (count($products)>0)
                    @foreach ($products as $product)
                    <option>{{ $product->type }}</option>
                    @endforeach
                    @else
                    <option>No Product Types</option>
                    @endif
                </select>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Edit Supplier</button>
    </form>

</div>
@endsection