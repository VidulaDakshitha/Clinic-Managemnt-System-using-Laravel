@extends('main.layout.mainlayout');

@section('title', 'Welcome')

@section('content')
<div class='container'>

@if(isset($error))
<div class="alert alert-danger" role="alert">
  Could not save the previous entry.
</div>
@endif

@if(isset($success))
<div class="alert alert-primary" role="alert">
   Previous entry added succesfully!.
</div>
@endif

<div style="margin:auto;">
<form action="/manage/doctors" method='post' style="padding:20px; margin: 20px; width=80%; border: solid 2px;">
   
    <h3> Add a doctor. </h3>
    <br>
  <div class="form-group">
    <label for="fullName">Full Name:</label>
    <br>
    <input type="text" name="fullName" required>
  </div>  
  <div class="form-group">
    <label for="nic">NIC/Lisence:</label>
    <br>
    <input type="text" name="nic" required>
  </div> 
  <div class="form-group">
    <label for="type">speciality</label>
    <br>
    <select name="type">
        <option> Type-1 <option>
        <option> Type-2 <option>
        <option> Type-3 <option>
        <option> Type-4 <option>
        <option> Type-5 <option>
    </select>
  </div> 
  <div class="form-group">
    <label for="contact1">Contact 1:</label>
    <br>
    <input type="text" name="contact1" required>
  </div> 
  <div class="form-group">
    <label for="contact2">Contact 2:</label>
    <br>
    <input type="text" name="contact2" required>
  </div>     
  <button type="submit" class="btn btn-primary" style= "background-color: green">Add</button>
</form>
</div>

</div>
@endsection
