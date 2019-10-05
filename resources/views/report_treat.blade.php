<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.lay')

@section('title', 'Record Manager')



@section('content')
<div class="container" id="app">
        <form action = "/searchtreat" method = "get" style="margin-left: 700px;">
            <div class = "input-group">
                <input type = "search" name = "search" placeholder="Search records" class="form-control">
                <span class = "input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        </form>
    {{-- pdf start --}}
    <div id="printContainer">
        <h1>Treatment Record report</h1>
       


        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @if(count($treatment_records) > 0)
                        @foreach ($treatment_records as $treatment_record)
                         
                                    <tr>
                                        <td>{{$treatment_record->record_id}}</td>
                                        <td>{{$treatment_record->date}}</td>
                                        <td>{{$treatment_record->description}}</td>
                                    <tr>
                           

                        @endforeach

                @else
                <p><i>No Records available, please add new one</i></p>
                @endif
            </tbody>
        </table>
    </div>
    {{-- pdf end --}}
    {{ $treatment_records->links() }}

    <a href="{{ url('/home_treat') }}" class="btn btn-primary">Back</a>

    <Button class="btn btn-primary" @click.preventDefault="print">Print Report</Button>
</div>
@endsection
