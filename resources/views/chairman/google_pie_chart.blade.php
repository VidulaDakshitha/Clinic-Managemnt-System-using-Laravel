<html>
 <head>
  <title>Charts</title>
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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
   }
  </style>
  <script type="text/javascript">
   var analytics = <?php echo $gender; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Percentage of Male and Female registered Patients'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
 </head>
 <body>

   
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
          
        </div>
        
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



  <br />
  <div class="container">
   <h3 align="center">Charts</h3><br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Percentage of Male and Female registered Patients</h3>
    </div>
    <div class="panel-body" align="center">
     <div id="pie_chart" style="width:750px; height:450px;">

     </div>
    </div>
   </div>
   
  </div>
 </body>
</html>