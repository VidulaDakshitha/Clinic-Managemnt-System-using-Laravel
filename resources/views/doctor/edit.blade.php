@extends('main.layout.adminlayout');
@section('title', 'Doctor List')

@section('content')
<div class="container">

    Edit details of {{$doctor['fullname']}}
    @if( isset($doctor))
    <form method="post" action="/manage/doctors/{{$doctor['doctor_id']}}">
        @method('PUT')
        <table class="table .table-striped ">
            <tbody>
                <tr>
                <td> Full Name  </td>
                <td> <input type="text" name="fullName" value ="{{$doctor['fullname']}}" /> </td>   
                <tr>         
                <tr>
                <td> NIC   </td>
                <td> <input type="text" name="nic" value ="{{$doctor['nic']}}" />  </td>   
                <tr>         
                <tr>
                <td> Specialization </td>
                <td> <input type="text" name="type" value ="{{$doctor['type']}}" /> </td>   
                <tr>     
                <td>  Primary Contact </td>
                <td> <input type="text" name="type" value ="{{$contact[0]['contact_number']}}" /> </td>   
                <tr>    
                <tr>     
                @if(isset($contact[1]))
                <td>  Secondary Contact </td>
                <td> <input type="text" name="type" value ="{{$contact[1]['contact_number']}}" /> </td>   
                <tr>          
                @endif
            </tbody>
        </table>
        <div class="text-center">
        <button type="submit" class= "btn-lg btn-primary"> save </button>
        </div>
    </form>
        <div>
            View Appointments for this doctor:<br>
            <form>
                <button type="submit" class="btn-block btn-primary" style= "background-color: green">Schedule</button>          
            </form>             
                <br>
            View Schedule for this doctor: <br>
            <form>
            <button type="submit" class="btn-block btn-primary" style= "background-color: green">Schedule</button>  
            </form>                     
        </div>
    @endif
</div>
