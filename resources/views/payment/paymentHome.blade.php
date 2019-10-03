<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment </title>

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
                                    <li class="active"><a href="{{url('/')}}" style = "color:#62a832;">Home</a></li>
                                        <li><a href="#" style = "color:#62a832;">Payments</a></li>
                                        <li><a href="#" style = "color:#62a832;">Dashboard</a></li>  
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header-text">
                                    <h1>Make online payment</h1>
                                    <p>You are able make online payments for your medicines, medical consume items and doctor appoinments.
                                         As IHHR we have made your operations more simple<br> Thank you!</p>
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
                                    <h3>Three Different Options</h3>
                                    <p>As IHHR, we provide you to pay by card or bank slip <br> on special circumstances you may raise request to refund it </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <section class="development">
                    <div class="blue">
                        <img src="img/development-shepe-blue.png" alt="">
                    </div>
                    <div class="white">
                        <img src="img/development-shepe-white.png" alt="">
                    </div>
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-4 col-sm-4">
                                <div class="design-development one">
                                    <i class="material-icons">lightbulb_outline</i>
                                    <h2>Card Payment</h2>
                                    <a href="/card"><button class="btn btn-primary">GO</button></a>
                                    <p>You may enter your card details and pay by the card</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="design-development two">
                                    <i class="material-icons">color_lens</i>
                                    <h2>Bank slip payment</h2>
                                    <a href="/slip"><button class="btn btn-primary">GO</button></a>
                                    <p>You may attach the payment slip and make the payment by slip</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="design-development three">
                                    <i class="material-icons">developer_board</i>
                                    <h2>Refund Payment</h2>
                                    <a href="{{ url('/paymentRefund')}}"><button class="btn btn-primary">GO</button></a>
                                    <p>You are only able to refund the payments which are made by card only</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    
</body>
</html>