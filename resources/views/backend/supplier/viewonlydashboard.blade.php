{{-- add a custom css file just for this page --}}
<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.layout', compact('styles'))

@section('title', 'Supplier Manager')

@include('product.nav1')


@section('content')
<div class="container">
    <h1>Supplier Dashboard(Protected Area - View Only)</h1>
    @auth
    <h3>Supplier List</h3>
    @else
    <h3>Not Logged In</h3>
    @endauth


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Supplier ID</th>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">Products</th>
            </tr>
        </thead>
        <tbody>
            @if(count($suppliers)>0)
            @foreach ($suppliers as $supplier)
            <tr>
                <th scope="row"> {{ $supplier->supplier_id }}</th>
                <td><a href="/supplier/{{ $supplier->supplier_id }}">{{ $supplier->name }}</a></td>
                <td><?php $city = preg_split('/\s+/', $supplier->location); echo $city[max(count($city)-1, 0)]; ?>
                </td>
                <td>
                    @if (count($supplier->products)>0)

                    @foreach ($supplier->products as $product)
                    <p>{{ $product->name }}</p>
                    @endforeach

                    @else
                    <p>Medicine</p>
                    @endif
                </td>
            </tr>
            @endforeach
            @else
            <p><i>No suppliers available, please add new one</i></p>
            @endif
        </tbody>
    </table>
    {{ $suppliers->links() }}
</div>
@endsection