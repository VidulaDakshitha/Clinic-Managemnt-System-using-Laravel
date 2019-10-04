@extends('backend.layout')

@section('title', 'Supplier Manager')

@include('backend.supplier.nav')

@section('js')

@endsection

@section('styles')

@endsection

@section('content')
<div class="container">
    <h3>Settings</h3>

    <form action="/supplier" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inpuSupName">Name</label>
                <input type="text" class="form-control" id="inpuSupName" placeholder="Supplier Name" required
                    name="name" value="{{ $user->name }}">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inpuSupEmail">Email</label>
                <input type="email" class="form-control" id="inpuSupEmail" placeholder="Supplier Email" required
                    name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inpuSupContact">Contact Number</label>
                <input type="text" class="form-control" id="inpuSupContact" placeholder="Contact Number" required
                    name="contact_number" maxlength="10" value="0766710504">
            </div>
        </div>



        <hr>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
@endsection