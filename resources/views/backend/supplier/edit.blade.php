@extends('backend.layout')

@section('title', 'Supplier Manager')

@include('backend.supplier.nav')


@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{ asset('js/backend/supplier/main.js') }}"></script>
<script src="{{ asset('js/backend/supplier/lib/chosen/chosen.jquery.min.js') }}"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
<link rel="stylesheet" href="{{ asset('css/supplier/cs-skin-elastic.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/supplier/style.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('css/supplier/lib/chosen/chosen.min.css') }}">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content')
<div class="container">
    <h3>Edit Supplier: {{ $supplier->name }}</h3>

    <form action="/supplier/{{ $supplier->supplier_id }}" method="POST">
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
                    name="email" value="{{ $supplier->supplieremails->first()->email }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inpuSupContact">Contact Number</label>
                <input type="text" class="form-control" id="inpuSupContact" placeholder="Contact Number" required
                    name="contact_number" value="{{ $supplier->suppliercontacts->first()->contact_number }}"
                    maxlength="10">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" required
                value="{{ $supplier->location }}">
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

        {{-- <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputProduct">Product</label>
                <select id="inputProduct" class="form-control" name="product" required>
                    @if (count($products)>0)
                    @foreach ($products as $product)
                    <option {{ $supplier->products->first()->type === $product->type? 'selected':''  }}>
        {{ $product->type }}</option>
        @endforeach
        @else
        <option>No Product Types</option>
        @endif
        </select>
</div>
</div> --}}

<div class="card mb-5">
    <div class="card-header">
        <strong class="card-title">Products</strong>
    </div>
    <div class="card-body">
        <select id="inputProduct" name="product[]" required data-placeholder="Choose a product..." multiple
            class="standardSelect" required>
            @if (count($products)>0)
            @foreach ($supplier->products as $product)
            <option selected>{{ $product->name }}</option>
            @endforeach
            @foreach ($products as $product)
            <option>{{ $product->name }}</option>
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