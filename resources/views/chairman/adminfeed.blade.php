<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Manage Feedbacks</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{ asset('css/chairhome/bootstrap.adminn.css') }}" rel="stylesheet">
<link href="{{ asset('css/chairhome/bootstrap-responsivee.min.css') }}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{ asset('css/chairhome/font-awesomee.css') }}" rel="stylesheet">
<link href="{{  asset('css/chairhome/homestyle.css') }}" rel="stylesheet">
<link href="{{  asset('css/chairhome/dash.css') }}" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

    <!-- /navbar -->
<div class="subnavbar">
        <div class="subnavbar-inner">
          <div class="container">
            <ul class="mainnav">
              <li><a href="/admin"><img src="img/adhome.png"/><span>Dashboard</span> </a> </li>
              <li><a href="/gallery"><img src="img/gallery.png">
                <span>Gallery</span> </a>  </li>
              <li><a href="/ServiceTest"><img src="img/24-hours.png"/><span>Services</span> </a> </li>
              <li><a href="/aboutus"><img src="img/about-us.png"/><span>About Us</span> </a> </li>
             
              
                </ul>
              </li>
            </ul>
          </div>
          <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
      </div>

      <div class="container">
            <!-- Site Logo -->
            
            <!-- responsive -->
            <div class="nav-switch">
              <i class="fa fa-bars"></i>
            </div>
            {{-- <h1>{{ Request::is('/')? "Home":"Not Home" }}</h1> --}}
            <!-- Main Menu -->
            <ul class="main-menu">
            
              <!-- <li><a href="elements.html"><i class="flaticon-020-decay"></i></a></li> -->
              @auth
              
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

        <div class="container">
                @if (count($feedbacks)>0)
                @foreach ($feedbacks as $feedback)
                    <div class="service left col-lg-6 col-md-12 col-sm-12 p-5">
                    
                    <h2 class="text-center">Name : {{ $feedback->name }}</h2>
                    <h2>Email : {{ $feedback->email }}</h2>
                    <h2>Feedback : {{ $feedback->message }}</h2>
                        @if(!auth::guest())
                            
                                <form class="form" action="/feedback/{{ $feedback->feedback_id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-danger" value="Remove">
                                </form>
                            
                        @endif
                    </div>
                    
                @endforeach
                @else
                <p>No Feedbacks to show</p>
                @endif 
                {{ $feedbacks->links() }}   
            </div>
            


</body>

</html>
