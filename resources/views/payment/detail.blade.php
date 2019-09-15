@extends('layouts.app')
@section('content')

    <div class="container">
        
        <div class="row">
            <div class="fa fa-columns" aria-hidden="true">
                    <h3>Payment Details</h3>
                    <hr>
            </div>
        </div>   
            <div class="row">
                    <div class="fa fa-columns" aria-hidden="true">
                        <strong>Patient ID: </strong> {{$payment -> patientID}}
                    </div>
            </div>
            <div class="row">
                    <div class="fa fa-columns" aria-hidden="true">
                        <strong>Payment For: </strong> {{$payment -> paymentFor}}
                    </div>
            </div>
            <div class="row">
                    <div class="fa fa-columns" aria-hidden="true">
                        <strong>Amount(LKR.): </strong> {{$payment -> amount}}
                    </div>
            </div>
            <div class="row">
                <div class="fa fa-columns" aria-hidden="true">
                    <strong>Date: </strong> {{$payment -> date}}
                </div>
        </div>

            <div>
                <br>
                <a href="{{ route('payment.index')}}" class="btn btn-primary" role="button">Back</a>
            </div>
           
    </div>

@endsection