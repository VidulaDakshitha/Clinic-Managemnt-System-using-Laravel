@extends('main.layout.mainlayout');

@section('title', 'Welcome')

@section('content')
<div class='container'>
<div style="margin:auto;">
<form style="padding:20px; margin: 20px; width=80%; border: solid 2px;">
    <h3> Make an appointment with one of our doctors! </h3>
    <br>
  <div class="form-group">
    <label for="doctorList">Choose a Doctor</label>
    <br>
    <select id="doctorList" style=" width: 50%;" required>
        @foreach( $doctors as $d)
        <option value= {{$d['doctor_id']}}>
            Dr. {{$d['fname']}} {{$d['lname']}}
        </option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="appointmentDate">Appointment date:</label>
    <br>
    <input type="date" class="form-control" id="appointmentDate"  min= {{now()}} style=" width: 50%;" required>
  </div>
    
  <button type="submit" class="btn btn-primary green">Proceed</button>
</form>
</div>

</div>
@endsection