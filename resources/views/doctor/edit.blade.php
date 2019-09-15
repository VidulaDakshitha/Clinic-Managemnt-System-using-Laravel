@extends('main.layout.adminlayout');
@section('title', 'Doctor List')

@section('content')
<div class="container">

    Edit details of {{$doctor['fullname']}};

    @if( isset($doctor))
    <form method="post" action="/manage/doctors/{{$doctor['doctor_id']}}">
        @method('PUT');
        <table class="table .table-striped ">
            <tbody>
                <tr>
                <td> Full Name  </td>
                <td> <input type="text" value ="{{$doctor['fullname']}}" /> </td>   
                <tr>         
                <tr>
                <td> NIC   </td>
                <td> <input type="text" value ="{{$doctor['nic']}}" />  </td>   
                <tr>         
                <tr>
                <td> Specialization </td>
                <td> <input type="text" value ="{{$doctor['type']}}" /> </td>   
                <tr>             
            </tbody>
        </table>
        <button type="submit" class= "btn btn-primary"> save </button>
    </form>
        <div>
            View Appointments for this doctor:<br>
                <button type="submit" class="btn btn-primary" style= "background-color: green">Schedule</button>                       
                <br>
            View Schedule for this doctor: <br>
            <button type="submit" class="btn btn-primary" style= "background-color: green">Schedule</button>                       
        </div>
    @endif
</div>
