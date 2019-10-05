@extends('backend.layout')

@section('title', 'Product Management')

@include('product.nav1')

@section('content')
<div class="container">
    <h3>Edit Product: {{ $product->name }}</h3>

    <form action="/product/{{ $product->product_id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Product Name" id="name"
                value="{{ $product->name }}" maxlength="20" required>
        </div>
        <div class="form-group">
            <label>Selling Price</label>
            <input type="number" name="selling_price" class="form-control" placeholder="Enter Selling Price"
                id="selling_price" value="{{ $product->selling_price }}" min="100" max="10000" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" id="quantity"
                value="{{ $product->quantity }}" min="10" max="1000" maxlength="4" required>
        </div>
        <div class="form-group">
            <label>Potency</label>
            <input type="number" name="potency" class="form-control" placeholder="Enter Potency" min="1" max="90"
                id="potency" value="{{ $product->potency }}">
        </div>
        <div class="form-group">
            <label>EXP-Date</label>
            <input type="date" name="expiry_date" class="form-control" id="expiry_date" required
                value="{{ $product->expiry_date }}">
        </div>
        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" placeholder="Enter Product Brand" id="brand"
                maxlength="20" required value="{{ $product->brand }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control" placeholder="Enter Description" id="description"
                maxlength="50" required value="{{ $product->description }}">
        </div>
        <div class="form-group">
            <select class="form-control" name="type" id="type" required value="{{ $product->type }}">
                <option selected="selected">Product Type</option>
                <option value="medical">medical</option>
                <option value="general">general</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image" id="image" value="{{ $product->image }}" required>
        </div>
        <hr>

        <a href="/product" class="btn btn-secondary mr-1">Cancel</a>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <br><br>
    </form>

</div>
@endsection