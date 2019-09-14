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
                                    <h2><a href="#">IHHR</a></h2>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="menu">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="{{ url('/')}}">HOME</a></li>
                                        <li><a href="#">Payment Details of Users</a></li>
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
                                        <a href="{{ url('payment')}}"><button class="btn btn-primary">Cashier Home</button></a>
                                        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="another-text">
                                        <h3>Payment details</h3>
                                        <p>As IHHR, we provide you to pay by card or bank slip <br> on special circumstances you may raise request to refund it </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <section class="contact">
                        <div class="container">
        
                             
                                <table>
                                    <tr>
                                        <th width = "50px"><b>No.</b></th>
                                        <th width = "300px">Patient ID</th>
                                        <th width = "300px">Order or Appointment ID</th>
                                        <th width = "300px">Card Number</th>
                                        <th width = "300px">Bank</th>
                                        <th width = "300px">Card Type</th>
                                    </tr>
                        
                                    @foreach ($payments as $payment) 
                                        <tr>
                                        <td><b>{{$payment -> id}}</b></td>
                                        <td>{{$payment->patientID}}</td>
                                        <td>{{$payment->orderID}}</td>
                                        <td>{{$payment->cardNum}}</td>
                                        <td>{{$payment->bank}}</td>
                                        <td>{{$payment->cardType}}</td>
                                        
                                        </tr>
                                    @endforeach
                                </table>
                        {!! $payments->links()!!}
                       
                </section>

    
</body>
</html>