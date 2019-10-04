<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cashier</title>

    <link href="https://fonts.googleapis.com/css?family=Croissant+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/css_p/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('css/css_p/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_p/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_p/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_p/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_p/responsive.css') }}">
</head>
<body>
        <div class="wrapper">
                <header class="header">
                    <div class="blue">
                        <img src="{{ asset('img/header-shepe-blue.png') }}" alt="">
                    </div>
                    <div class="white">
                        <img src="{{ asset('img/header-shepe-white.png') }}" alt="">
                    </div>
                    <div class="container">
                        <img class="shepe1" src="{{ asset('img/shepe1.png') }}" alt="">
                        <img class="shepe2" src="img/shepe2.png" alt="">
                        <img class="shepe3" src="img/shepe2.png" alt="">
                        <img class="shepe4" src="img/shepe2.png" alt="">
                        <img class="shepe5" src="img/shepe1.png" alt="">
                        <img class="shepe6" src="img/shepe2.png" alt="">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="logo">
                                    <h2><a href="#" style = "color:#62a832;">IHHR</a></h2>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="menu">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="{{ url('/')}}" style = "color:#62a832;">HOME</a></li>
                                        <li class="active"><a href="{{ url('/payment')}}" style = "color:#62a832;">Cashier Home</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header-text">
                                        <h1>Cashier Dashboard</h1>
                                        <p>You are able make online payments for your medicines, medical consume items and doctor appoinments.
                                             As IHHR we have made your operations more simple<br> Thank you!</p>
                                             <br>
                                             <br>
                                             <br>
                                             <br>
                                             <br>
                                             <br>
                                        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="another-text">
                                        <h3>Add payment details</h3>
                                        <p>As IHHR, we provide you to pay by card or bank slip <br> on special circumstances you may raise request to refund it </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <section class="contact">
                        <div class="container">
        
                             
                                <a href="{{ route('payment.create')}}" style="margin-left: 300px;"><button class="btn btn-primary">ADD PAYMENT</button></a>
                                <a href="{{ url('/preport')}}" style="margin-left: 300px;"><button class="btn btn-danger">GENERATE REPORT</button></a>
                                <br>
                                <br>
                                
                               
                                @if ($message = Session::get('success'))
                                <div>
                                <p>{{$message}}</p>
                                </div>
                                    
                                @endif
                                
                                
                                <table>
                                    <tr>
                                        <th width = "50px"><b>No.</b></th>
                                        <th width = "300px">Patient ID</th>
                                        <th width = "300px">Payment For</th>
                                        <th width = "300px">Amount(LKR.)</th>
                                        <th width = "300px">Date</th>
                                        <th width = "800px">Action (WARNING!! By one click, data will be deleted)</th>
                                    </tr>
                        
                                    @foreach ($payments as $payment) 
                                        <tr>
                                        <td><b>{{$payment -> id}}</b></td>
                                        <td>{{$payment->patientID}}</td>
                                        <td>{{$payment->paymentFor}}</td>
                                        <td>{{$payment->amount}}</td>
                                        <td>{{$payment->date}}</td>
                                            
                                        <td>
                                                <form action="{{ route('payment.destroy', $payment->id) }}" method = "POST">
                                                <a href="{{route('payment.show', $payment->id)}}" class="btn btn-primary">Show</a>
                                                <a href="{{route('payment.edit', $payment->id)}}" class="btn btn-primary">Edit</a>
                                                
                                                @csrf
                                                @method('DELETE')
                        
                                                <button type ="submit" class="btn btn-danger">Delete</button>
                        
                                                </form>
                        
                        
                                        </td>
                                        
                                        </tr>
                                    @endforeach
                                </table>
                        {!! $payments->links()!!}
                       
                </section>

                <br>
                <br>
                <section class="contact" style = "margin-top:-100px;">
                        <div class="container">
                            <div class="col-md-8 col-sm-12">
                                <div class="contact-form" style = "margin-top:10px";>   

                                        <form action="/search1" method="GET">
                                            <h3>SEARCH PAYMENTS</h3>
                                            <br>
                                            <br>
                                                @csrf
                                                    <input type="text" name="patientID" placeholder="Patient ID">
                                                    <br>
                                                    <br>
                                                    
                                                    
                                                   
                                                    
                                                    <input type="submit" value="Search" class="btn btn-primary">
                                                   
                                                    
                                        </form>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <form action="/preport_search" method="GET">
                                            <h3>REPORT ACCORDING TO PATIENT ID</h3>
                                            <br>
                                            <br>
                                            @csrf
                                                <input type="text" name="patientID" placeholder="Patient ID">
                                                <br>
                                                <br>
                                                
                                                
                                               
                                                
                                                <a href="" ><button class="btn btn-danger">GENERATE REPORT</button></a>
                                               
                                                
                                    </form>
                                       
                                            </div>
                                        </div>
                                    </div>
                    </section>
                
                    <section class="contact">
                        <div class="container">
                                <div class="another-text">
                                        <h3>CARD PAYMENTS</h3>
                                </div>

                                <a href="{{ url('/preport_card')}}" style="margin-left: 300px;"><button class="btn btn-danger">GENERATE REPORT</button></a>
                                
                                <br>
                                <br>
                                <br>
                                

                                <table>
                                        <tr>
                                            <th width = "50px"><b>No.</b></th>
                                            <th width = "300px">Patient ID</th>
                                            <th width = "300px">Order or Appointment ID</th>
                                            <th width = "300px">Card Number</th>
                                            <th width = "300px">Bank</th>
                                            <th width = "300px">Card Type</th>
                                        </tr>
                            
                                        @foreach ($cards as $card) 
                                            <tr>
                                            <td><b>{{$card -> id}}</b></td>
                                            <td>{{$card->patientID}}</td>
                                            <td>{{$card->orderID}}</td>
                                            <td>{{$card->cardNum}}</td>
                                            <td>{{$card->bank}}</td>
                                            <td>{{$card->cardType}}</td>
                                            
                                            </tr>
                                        @endforeach
                                    </table>
                            {!! $cards->links()!!}


                        </div>
                    </section>




    
</body>
</html>

