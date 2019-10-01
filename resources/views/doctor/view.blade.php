@extends('main.layout.adminlayout');
@section('title', 'Doctor List')

@section('content')
<div class="container">
<script>
 function search(""){

 }
</script>

@if( isset($doctor))

    Details of {{$doctor['fullname']}};
    
        <img src ="{{ asset('images/admin/doctor.jpg') }}" style=" width:20%; height:20%; display: block;margin-right: auto; margin-left: auto;" /> 
        <br>
        <table class="table .table-striped ">
            <thead>
                <tr>
                <th> Name </th>
                <th> NIC/License </th>
                <th> Specialization </th>
                <th> Contact 1 </th>
                <th> Contact 2 </th>
            </thead>
            <tbody>
                <tr>
                <td> {{$doctor['fullname']}}; </td>
                <td> {{$doctor['nic']}} </td>
                <td> {{$doctor['type']}} </td>
                @if(isset($contact_set[0]))
                <td> {{ $contact_set[0]["contact_number"]}} </td>
                @else
                <td> Not set. </td>
                @endif
                @if(isset($contact_set[1]))
                <td> {{ $contact_set[1]["contact_number"]}} </td>
                @else
                <td> Not set. </td>
                @endif
            </tbody>
        </table>
        <div>
            View Appointments for this doctor:<br>
                <button type="submit" class="btn btn-primary" style= "background-color: green">Appointments</button>                       
                <br>
            View Schedule for this doctor: <br>
            <button type="submit" class="btn btn-primary" style= "background-color: green">Schedule</button> 
            <br>

            Edit details of this doctor: <br>
            <form method="GET" action="/manage/doctors/{{$doctor['doctor_id']}}/edit">
                <input type="hidden" name="_method" value="GET">
                <button type="submit" class="btn btn-primary" style= "background-color: red">Edit</button>    
            </form>                   
        </div>
    @endif
</div>
