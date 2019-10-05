
<!DOCTYPE html>
<html>
 <head>
  <title>Feedbacks</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('css/chairhome/bootstrap.adminn.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chairhome/bootstrap-responsivee.min.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
    <link href="{{ asset('css/chairhome/font-awesomee.css') }}" rel="stylesheet">
    <link href="{{  asset('css/chairhome/homestyle.css') }}" rel="stylesheet">
    <link href="{{  asset('css/chairhome/dash.css') }}" rel="stylesheet">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
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
   
   
   <div class="row">

      
    
    

        <form action="/fedreport_search" method="GET">
            <h1 align="center">Feedbacks</h1>

            

            <br>
            <br>
            @csrf
                <input type="text" name="patient_id" placeholder="Generate report for Patient ID">
                <br>
                <br>
                
                
               
                
                <a href="" ><button class="btn btn-danger">GENERATE FEEDBACK REPORT</button></a>
               
                
    </form>

    <div>
        <form action="/fedsearch" method="get">
            <div class="input-group">
                <input type="search" name="search" placeholder="Search for a Patient ID" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        </form>
    </div>

    
    
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
            <th scope="col">Patient ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
      </tr>
     </thead>
     <tbody>
     @if (count($feedback_data)>0)
     @foreach($feedback_data as $feedback)
      <tr>
            <th scope="row"> {{ $feedback->patient_id }}</th>
            <td>{{ $feedback->name }}</td>
            <td>{{ $feedback->email }}</td>
            <td>{{ $feedback->message }}</td>
      </tr>
     @endforeach
     @else
                <p>No Feedbacks to show</p>
                @endif 
     </tbody>
    </table>
   </div>
  </div>
 </body>
</html>

