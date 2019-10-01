@extends('backend.lay')
@section('title', 'Record Management')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')

<div class="container" >
    <div class="row">
        <legend>Personal Record</legend>
        
            @if (session('info'))
              <div class="alert alert-success">
                 {{ session('info') }}
              </div>
            @endif
          
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Pid</th>
                <th scope="col">Disease</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
                    @if ( count($personal_records) > 0)
                    @foreach ($personal_records as $personal_record)
                        
                    
              <tr class="table-active">
                <td>{{$personal_record->record_id}}</td>
                <td>{{$personal_record->date}}</td>
                <td>{{$personal_record->patient_id}}</td>
                <td>{{$personal_record->disease}}</td>
                <td>{{$personal_record->description}}</td>
                <td>
                <a href='{{url("/read_per/{$personal_record->record_id}")}}' class="label label-primary"> Read </a>|
                <a href='{{url("/update_per/{$personal_record->record_id}")}}' class="label label-success"> Update </a>|
                <a href='{{url("/delete_per/{$personal_record->record_id}")}}' class="label label-danger"> Delete </a>
                </td>
              </tr>
                    @endforeach
                        
                    @endif
                
            </tbody>
          </table> 
    </div>
</div>


@endsection