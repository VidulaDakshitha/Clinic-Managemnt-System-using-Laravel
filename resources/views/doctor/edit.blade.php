@extends('main.layout.adminlayout');
@section('title', 'Doctor List')

@section('content')
<script>
    function test(element){
        var element = document.getElementById('nic');
        if( element.)
    }
</script>
<div class="container">

    Edit details of {{$doctor['fullname']}}
    @if( isset($doctor))
    <form method="post" action="/manage/doctors/{{$doctor['doctor_id']}}">
        @method('PUT')
        <table class="table .table-striped ">
            <tbody>
                <tr>
                <td> Full Name  </td>
                <td> <input type="text" name="fullName" id="fullName" value ="{{$doctor['fullname']}}"  required/> </td>   
                </tr>  

                <tr>
                <td> NIC   </td>
                <td> <input type="text" name="nic" id="nic" value ="{{$doctor['nic']}}"  minlength="10" maxlength="12" required/>  </td>   
                </tr> 

                <tr>
                <td> Specialization </td>
                <td> <input type="text" name="type" id="type" value ="{{$doctor['type']}}"  required/> </td>   
                </tr> 

                <tr>    
                <td>  Primary Contact </td>
                @if(isset($contact[0]))
                <td> <input type="tel" name="telephone1" value ="{{$contact[0]['contact_number']}}" minlength="7" maxlength="10" required /> </td>   
                @else
                <td> <input type="tel" name="telephone1" placeholder = "Not Set." />      
                @endif
                </tr>

                <tr>
                <td>  Secondary Contact </td>
                @if(isset($contact[1]))               
                <td> <input type="tel" name="telephone2" value ="{{$contact[1]['contact_number']}}"  minlength="7" maxlength="10" /> </td>      
                @else
                <td> <input type="tel" name="telephone2" placeholder = "Not Set." />          
                @endif
                </tr>
            </tbody>
        </table>
        <div class="text-center">
        <button type="submit" class= "btn-lg btn-primary"> save </button>
        <input type="reset" class= "btn-lg btn-primary" >
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
    
    @else
        something went wrong.
    @endif
</div>
