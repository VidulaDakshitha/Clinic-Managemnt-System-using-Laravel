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
    <h3>Create New Supplier</h3>

    <form action="/supplier" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inpuSupName">Supplier Name</label>
                <input type="text" class="form-control" id="inpuSupName" placeholder="Supplier Name"
                    v-model="supplierCreateForm.name" required name="name">
            </div>
            <div class="form-group col-md-4">
                <label for="inpuSupEmail">Supplier Email</label>
                <input type="email" class="form-control" id="inpuSupEmail" placeholder="Supplier Email" required
                    name="email" v-model="supplierCreateForm.email">
            </div>
            <div class="form-group col-md-4">
                <label for="inpuSupContact">Contact Number</label>
                <input type="text" class="form-control" id="inpuSupContact" placeholder="Contact Number" required
                    v-model="supplierCreateForm.contactNumber" name="contact_number" maxlength="10">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address"
                v-model="supplierCreateForm.address1" required>
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"
                v-model="supplierCreateForm.address2" name="address2">
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" placeholder="Colombo" name="city"
                    v-model="supplierCreateForm.city" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Postal Code</label>
                <input type="text" class="form-control" id="inputZip" placeholder="61120" name="postal_code"
                    v-model="supplierCreateForm.postalCode" required>
            </div>
        </div>

        <hr>

        <div class="card mb-5">
            <div class="card-header">
                <strong class="card-title">Products</strong>
            </div>



            <div class="card-body">
                <select id="inputProduct" name="product[]" required data-placeholder="Choose products..."
                    class="standardSelect" multiple>

                    @if (count($products)>0)

                    @foreach ($products as $product)
                    <option>{{ $product->name }}</option>
                    @endforeach

                    @else
                    <option>No Product Types</option>
                    @endif
                </select>

            </div>
        </div>


        <button type="submit" class="btn btn-primary">Add New Supplier</button>
        <button type="button" @click.preventDefault="addSupplierFormCreateData" class="btn btn-info"
            style="color: white;">
            Add Demo
            Data
        </button>
    </form>

</div>
@endsection