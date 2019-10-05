<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.lay')

@section('title', 'Record Manager')



@section('content')
<div class="container" id="app">
        <form action = "/searchpre" method = "get" style="margin-left: 700px;">
            <div class = "input-group">
                <input type = "search" name = "search" placeholder="Search records" class="form-control">
                <span class = "input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        </form>
    {{-- pdf start --}}
    <div id="printContainer">
        <h1>Prescription report</h1>
       


        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Doctor-ID</th>
                    <th scope="col">Patient-ID</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @if(count($prescriptions) > 0)
                        @foreach ($prescriptions as $prescription)
                         
                                    <tr>
                                        <td>{{$prescription->id}}</td>
                                        <td>{{$prescription->doctor_id}}</td>
                                        <td>{{$prescription->patient_id}}</td>
                                        <td>{{$prescription->description}}</td>
                                    <tr>
                           

                        @endforeach

                @else
                <p><i>No Prescriptions available, please add new one</i></p>
                @endif
            </tbody>
        </table>
    </div>
    {{-- pdf end --}}
    {{ $prescriptions->links() }}

    <a href="{{ url('/home_prescription') }}" class="btn btn-primary">Back</a>

    <Button class="btn btn-primary" @click.preventDefault="print">Print Report</Button>
</div>
@endsection
