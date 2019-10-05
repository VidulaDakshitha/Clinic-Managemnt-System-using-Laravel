@extends('layouts.app')
@section('content')

    <div class="container">
        
        <div class="row">
            <div class="fa fa-columns" aria-hidden="true">
                    <h3>Add new payment</h3>
            </div>

            @if ($errors -> any())

            <div>
                <strong>Whoopss!!</strong> Inputs are wrong!!!<br>
            </div>

            <ul>
                @foreach ($errors as $error)
                        <li>{{$error}}</li>
                @endforeach
            </ul>
                
            @endif
        </div>
        
                        <form action="{{ route('payment.store') }}" method ="POST">
                        @csrf
                            <div class = "row">
                                <div>
                                    <strong>Patient ID: </strong>
                                    <input type="text" name = "patientID" placeholder="Patient ID" value = "{{$Array[0]}}" style = "margin-left:5px" required>
                                    <br>
                                </div>
                                <div style = "margin-left:10px">
                                        <strong>  Payment For: </strong>
                                        <input type="text" name = "paymentFor" placeholder="Payment For" value = "{{$Array[1]}}" required>
                                        <br>
                                </div>
                                <div style = "margin-left:10px">
                                        <strong>  Amount: </strong>
                                        <input type="text" name = "amount" placeholder="Amount" pattern ="[0-9]{2,}" title = "Only number values" value = "{{$Array[2]}}" required>
                                        <br>
                                </div>
                                <div style = "margin-left:10px">
                                    <strong>  Date: </strong>
                                    <input type="date" name ="date" value = "{{$Array[3]}}" required>
                                    <br>
                                </div>
                                

                                <div style = "margin-left:-940px; margin-top:-20px">
                                        <br>
                                        <br>
                                        <br>
                                <a href="{{ route('payment.index')}}" class="btn btn-primary" role="button">Back</a>
                                <a href="{{ url('/demoCreate')}}" class="btn btn-primary" role="button">Demo</a>

                                <button type="submit" class="btn btn-primary">Submit</button>

                                </div>

                            </div>
                        
                        
                        
                        </form>
           
    </div>

@endsection