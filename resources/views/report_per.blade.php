<?php  $styles=['css/main/login/login.css']; ?>

@extends('backend.lay')

@section('title', 'Record Manager')



@section('content')
<div class="container" id="app">
    {{-- pdf start --}}
    <div id="printContainer">
        <h1>Personal Record report</h1>
       


        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Patient-ID</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @if(count($personal_records) > 0)
                        @foreach ($personal_records as $personal_record)
                         
                                    <tr>
                                        <td>{{$personal_record->record_id}}</td>
                                        <td>{{$personal_record->date}}</td>
                                        <td>{{$personal_record->patient_id}}</td>
                                        <td>{{$personal_record->disease}}</td>
                                        <td>{{$personal_record->description}}</td>
                                    <tr>
                           

                        @endforeach

                @else
                <p><i>No Records available, please add new one</i></p>
                @endif
            </tbody>
        </table>
    </div>
    {{-- pdf end --}}
    {{ $personal_records->links() }}

    <a href="{{ url('/home_per') }}" class="btn btn-primary">Back</a>

    <Button class="btn btn-primary" @click.preventDefault="print">Print Report</Button>
</div>
@endsection
