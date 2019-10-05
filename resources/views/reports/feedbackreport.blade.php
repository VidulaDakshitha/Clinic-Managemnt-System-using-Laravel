@extends('backend.layout')

@include('chairman.nav')

@section('styles')

<link href="{{ asset('css/chairhome/bootstrap.reportadmin.css') }}" rel="stylesheet">
<link href="{{ asset('css/chairhome/bootstrap-responsivee.min.css') }}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{ asset('css/chairhome/font-awesomee.css') }}" rel="stylesheet">
<link href="{{  asset('css/chairhome/homestyle.css') }}" rel="stylesheet">
<link href="{{  asset('css/chairhome/dash.css') }}" rel="stylesheet">


@endsection

@section('content')

  

<div class="container">
    @if(count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
 </div>

     {{-- pdf start --}}
     <div id="printContainer">
            <h1>Feedback Report</h1>

            <div class="col-md-4 p-3">
                <form action="/fedsearch" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            

             <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if(count($feedbacks)>0)
                    @foreach ($feedbacks as $feedback)
                    <tr>
                        <th scope="row"> {{ $feedback->patient_id }}</th>
                        <td>{{ $feedback->name }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->message }}</td>
                        
                    </tr>
                    @endforeach
                    @else
                    <p><i>No feedbacks to show</i></p>
                    @endif
                </tbody>
            </table>

        </div>
        {{-- pdf end --}}

            {{ $feedbacks->links() }}

            <Button class="btn btn-primary" @click.preventDefault="print">Print</Button>
            
        </div>

        @endsection