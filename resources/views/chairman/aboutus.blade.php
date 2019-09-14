<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>About Us</title>
<!-- 

Highway Template

https://templatemo.com/tm-520-highway

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/animate.css') }}" />

    {{-- <link href="{{ asset('css/registerCSS/style.css') }}" rel="stylesheet" type="text/css" > --}}


    @if (isset($styles))

    @foreach ($styles as $style)
    <link rel="stylesheet" href='{{ asset("$style") }}' />
    @endforeach

    @endif


        
        <link href="{{ asset('css/about/aboutstyle.css') }}" rel="stylesheet">
        <link href="{{ asset('css/about/templatemo-style.css') }}" rel="stylesheet">

        <link href="{{ asset('css/about/aboutusletter.css') }}" rel="stylesheet">

        
	

        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        
    </head>

<body>

        <div class="container">
				<!-- Site Logo -->
				<a href="/" class="site-logo">
					<img src="{{ asset('images/main/mainlayout/logo_dark_long.png') }}" alt="">
				</a>
				<!-- responsive -->
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
				{{-- <h1>{{ Request::is('/')? "Home":"Not Home" }}</h1> --}}
				<!-- Main Menu -->
				<ul class="main-menu">
					<li class="{{ (Request::is('/') ? 'active' : '') }}"><a href="/">Home</a></li>
					<li class="{{ (Request::is('/about') ? 'active' : '') }}"><a href="/aboutus">About</a></li>
					<li class="{{ (Request::is('/users') ? 'active' : '') }}"><a href="/ServiceTest">Services</a></li>
					<li class="{{ (Request::is('/users') ? 'active' : '') }}"><a href="/gallery">Gallery</a></li>
					<!-- <li><a href="elements.html"><i class="flaticon-020-decay"></i></a></li> -->
					@auth
					<li class="dashboard-style"><a href="/login">Dashboard</a></li>
					<li class="logout-style"><a class="logout-style" href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a></li>
			
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
					@else
					<li class="login-style"><a href="/login">Sign In</a></li>
					@endauth
				</ul>
			</div>

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

    


    <div class="page-heading">
        <div class="heading">
            <div class="heading-content">
                <h1><b>About</b> <em>Us</em></h1>
            </div>
        </div>
    </div>


  <div class="services">

        @if(!auth::guest())
        <a class="btn btn-primary" href="/aboutus/create">
            Create Posts
    </a>
    @endif

    
      
    <div class="container">
            @if (count($notices)>0)
            @foreach ($notices as $notice)
                <div class="service left col-lg-6 col-md-12 col-sm-12 p-5">
                <img src="/storage/images/{{$notice->image}}" >
                <h2 class="text-center"><b>{{ $notice->title }}</b></h2>
                <p style="font-family:kanit;">{{ $notice->content }}</p>
                    @if(!auth::guest())
                        @if(auth::user()->id == $notice->doctor_id)
                            <a class="btn btn-primary" href="/aboutus/{{ $notice->notice_id }}/edit">Edit</a>
                            <form class="form" action="/aboutus/{{ $notice->notice_id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" value="Remove">
                            </form>
                        @endif
                    @endif
                </div>
            @endforeach
            @else
            <p>No posts to show</p>
            @endif    
        </div>

</div>


	<div class="about">
	  <div class="box">
          	<div class="icon">01</div>
	<div class="content">
          <h2><b>Our Mission</b></h2>
          <p style="font-family:kanit; font-size:18px">To be the foremost and preferred Private Healthcare Facility in the country</p>
        </div>
	</div>

        <div class="box">
          <div class="icon">02</div>
	<div class="content">
          <h2><b>Our Vision</b></h2>
          <p style="font-family:kanit; font-size:18px">To maintain exceptional and compassionate quality while offering cost effective healthcare solutions of international standards</p>
        </div>
	</div>

        <div class="box">
		<div class="icon">03</div>
	<div class="content">
          <h2><b>Our Promise</b></h2>
          <p style="font-family:kanit; font-size:18px">We will be sincere, compassionate and sensitive to make a difference in the lives we touch</p>
        </div>
	</div>
      
    </div>

<!-- Footer top section -->
<section class="footer-top-section set-bg" data-setbg="{{ asset('images/main/mainlayout/footer-bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-widget">
                    <div class="fw-about">
                        <a href="" class="site-logo-footer"> <img
                                src="{{ asset('images/main/mainlayout/logo_light_long.png') }}" alt=""></a>
                        <p>International Homoeopathic Hospital and Research Institute (I.H.H.R.I) is a medical
                            clinic and a Homeopathic research institute. The client request is to create a web based
                            application to manage their patient details, make appointments through the online and
                            also to make patients payments through online as well as the clinic</p>
                        <div class="fw-social">
                            <a href=""><i class="fa fa-pinterest"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-dribbble"></i></a>
                            <a href=""><i class="fa fa-behance"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5">
                <div class="footer-widget">
                    <div class="fw-links">
                        <h5 class="fw-title">Our Services</h5>
                        <ul>
                            <li><a href="">Auto-isopathy</a></li>
                            <li><a href="">Clinical Homeopathy</a></li>
                            <li><a href="">Homotoxicology</a></li>
                            <li><a href="">Classical Homeopathy</a></li>
                            <li><a href="">Complex homeopathy</a></li>
                            <li><a href="">Isopathy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-7">
                <div class="footer-widget">
                    <div class="fw-timetable">
                        <div class="fw-title">Opening Hours</div>
                        <div class="timetable-content">
                            <table>
                                <tr>
                                    <td>Monday</td>
                                    <td>8:00am - 12:00pm</td>
                                </tr>
                                <tr>
                                    <td>Tuesday</td>
                                    <td>8:00am - 12:00pm</td>
                                </tr>
                                <tr>
                                    <td>Wednesday</td>
                                    <td>8:00am - 12:00pm</td>
                                </tr>
                                <tr>
                                    <td>Thursday</td>
                                    <td>8:00am - 12:00pm</td>
                                </tr>
                                <tr>
                                    <td>Friday</td>
                                    <td>8:00am - 12:00pm</td>
                                </tr>
                                <tr>
                                    <td>Sunday</td>
                                    <td>8:00am - 12:00pm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer top section end -->


<!-- Footer section -->
<footer class="footer-section">
		<div class="container">
			<ul class="footer-menu">
				<li><a href="">Home</a></li>
				<li><a href="/aboutus">About us</a></li>
				<li><a href="/ServiceTest">Services</a></li>
				<li><a href="/feedback">Feedback</a></li>
			</ul>
			<div class="copyright">
				Copyright &copy;<script>
					document.write(new Date().getFullYear());
				</script> All rights reserved
			</div>
		</div>
	</footer>
	<!-- Footer top section end -->

	<script defer src="{{ asset('js/main/mainlayout/jquery-3.2.1.min.js') }}"></script>
    <script defer src="{{ asset('js/main/mainlayout/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('js/main/mainlayout/owl.carousel.min.js') }}"></script>
    <script defer src="{{ asset('js/main/mainlayout/circle-progress.min.js') }}"></script>
    <script defer src="{{ asset('js/main/mainlayout/main.js') }}"></script>


</body>
</html>