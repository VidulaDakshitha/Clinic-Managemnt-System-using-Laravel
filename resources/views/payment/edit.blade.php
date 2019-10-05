@extends('layouts.app')
@section('content')

    <div class="container">
        
        <div class="row">
            <div class="fa fa-columns" aria-hidden="true">
                    <h3>Update payment</h3>
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
        
        <form action="{{ route('payment.update' , $payment->id) }}" method ="POST">
        @csrf
        @method('PUT')
            <div class = "row">
                <div>
                    <strong>Patient ID: </strong>
                <input type="text" name = "patientID" value="{{$payment->patientID}}" style = "margin-left:5px" required>
                </div>
                <div style = "margin-left:10px">
                        <strong>Payment For: </strong>
                        <input type="text" name = "paymentFor" value="{{$payment->paymentFor}}" required>
                </div>
                <div style = "margin-left:10px">
                        <strong>Amount: </strong>
                        <input type="text" name = "amount" value="{{$payment->amount}}" pattern = "[0-9]{2,}" title = "Only number values" required>
                </div>
                <div style = "margin-left:10px">
                    <strong>  Date: </strong>
                    <input type="date" name = "date" value = "{{$payment->date}}" required>
                    <br>
                </div>
                

                <div style = "margin-left:-940px; margin-top:20px">
                        <br>
                <a href="{{ route('payment.index')}}" class="btn btn-primary" role="button">Back</a>

                <button type="submit" class="btn btn-primary">Save</button>

                </div>

            </div>
        
        
        
        </form>
    </div>

@endsection