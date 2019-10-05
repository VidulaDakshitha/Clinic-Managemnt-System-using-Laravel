
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Card</title>

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
                                        <li class="active"><a href="{{ url('paymentHome')}}" style = "color:#62a832;">HOME</a></li>
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
                <section class="contact">
                    <div class="blue">
                        <img src="img/contact-shepe-blue.png" alt="">
                    </div>
                    <div class="white">
                        <img src="img/contact-shepe-white.png" alt="">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="contact-text">
                                    <h2>Card details!</h2>
                                    <p>Please enter card details in order to proceed further with your payment!</p>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="contact-form">
                                <form action="{{ route('card.store')}}" method="POST">
                                @csrf
                                        <div class="first">
                                            <label>Patient ID</label>
                                            <input type="text" name="patientID" value={{$userId}} readonly>
                                        </div>
                                        <div class="last">
                                            <label>Order ID</label>
                                            <input type="text" name="orderID" value={{$latsorderid}} readonly>
                                        </div>
                                        <div class="first">
                                            <input type="text" id = "cardNum" name="cardNum" placeholder="Card Number" pattern="[0-9]{4} *[0-9]{4} *[0-9]{4} *[0-9]{4}" title="ERROR: Card number should contain 16 numbers" required >
                                        </div>
                                        <div class="last">
                                            <input type="text" id = "bank" name="bank" placeholder="Bank" required>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="first">
                                            <input type="text" id = "serialNum" name="serialNum" placeholder="Serial 3-digits(xxx)" pattern="[0-9]{3}" title="ERROR: Card serial should contain 3 numbers only" required>
                                        </div>
                                        <div class="last">
                                            <input type="text" id = "cardType" name="cardType" placeholder="Card Type(VISA or MASTER)" pattern = "(VISA)||(MASTER)" required>
                                        </div>

                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="checkbox-submit">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" required> Agree for terms & condition</label>
                                            </div>
                                            <div class="submit">
                                                <input type="submit" value="PAY">
                                                
                                            </div>
                                            
                                            
                                        </div>
                                    </form>

                                    <button onclick="myFunction()" class = "btn btn-primary">Demo</button>

                                    
                                            <script>
                                                function myFunction() {
                                                document.getElementById("cardNum").value = "1234123412341234";
                                                document.getElementById("bank").value = "HNB";
                                                document.getElementById("serialNum").value = "123";
                                                document.getElementById("cardType").value = "VISA";
                                                }
                                            </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

</body>
</html>
