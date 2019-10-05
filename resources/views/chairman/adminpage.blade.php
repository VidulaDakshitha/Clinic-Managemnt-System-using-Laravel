<?php
use App\Patient;
use App\Order;
use App\Doctor;
use App\Feedback;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard</title>
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
        <li class="active"><a href="/admin"><img src="img/adhome.png"/><span>Dashboard</span> </a> </li>
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

<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> 
              <h3>Stats</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats">Weclome Admin</h6>
                  <div id="big_stats" class="cf">
                    <div class="stat"> <h6>Total Users</h6></i> <span class="value">{{ Patient::count() }}</span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"><h6>Doctors</h6> <span class="value">{{ Doctor::count() }}</span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"><h6>Orders</h6><span class="value">{{ Order::count() }}</span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <h6>Feedbacks</h6> <span class="value">{{ Feedback::count() }}</span> </div>
                    <!-- .stat --> 
                  </div>
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
          <!-- /widget -->
          <div class="widget widget-nopad">
            <div class="widget-header">
              <h3> Calendar</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div id='calendar'>
              </div>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <div class="widget">
            <div class="widget-header">
              <h3>Recent Feedbacks</h3>
            </div>
            <!-- /widget-header -->
            @if (count($feedbacks)>0)
             @foreach ($feedbacks as $feedback)
            <div class="widget-content">
              <ul class="messages_layout">
                <li class="from_user left"> <a href="#" class="avatar"><img src="img/adminuser.png"/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">{{ $feedback->name }}</a>
                      
                    </div>
                    <div class="text">{{ $feedback->message }}</div>
                   
                  </div>
                </li>
                
                
              </ul>
            </div>
             @endforeach
                @else
                <p>No Feedbacks to show</p>
            @endif 
            <!-- /widget-content --> 
            
          </div>
          
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> 
              <h3>Important Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> <a href="/aboutus" class="shortcut"><img src="img/about-us.png"></i><span
                                        class="shortcut-label">About Us</span> </a><a href="/gallery" class="shortcut"><img src="img/gallery.png">
                                             <span class="shortcut-label">Gallery</span> </a><a href="/order-admindash" class="shortcut"><img src="img/adminshopping.png"> <span class="shortcut-label">Orders</span> </a><a href="/adminfeedback" class="shortcut"><img src="img/opinion.png"><span class="shortcut-label">Manage Feedbacks</span> </a><a href="/home_per" class="shortcut"><img src="img/24-hours.png"><span
                                                class="shortcut-label">Records</span> </a><a href="/adminchart" class="shortcut"><img src="img/adminanalytics.png"></i><span
                                                  class="shortcut-label">Charts</span> </a><a href="/feedback_pdf" class="shortcut"><img src="img/newspaper.png"> <span class="shortcut-label">Feedback Report</span> </a>  <a href="/patient_pdf/pdf" class="shortcut"><img src="img/newspaper.png"></i><span
                                                    class="shortcut-label">User Report</span> </a></div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>

         
          <!-- /widget -->
          <div class="widget">
            <div class="widget-header"> 
              <h3><a href="/adminchart"> Click here to view charts</a></h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <canvas id="area-chart" class="chart-holder" height="250" width="538"> </canvas>
              <!-- /area-chart --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
         
          <!-- /widget --> 
          
           
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>

<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{ asset('js/homeadmin/jqueryy-1.7.2.min.js') }}"></script> 
<script src="{{ asset('js/homeadmin/excanvaas.min.js') }}"></script> 
<script src="{{ asset('js/homeadmin/chaart.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('js/homeadmin/bootstrapp.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('js/homeadmin/fullcalendaar.min.js')}}"></script>
 
<script src="js/base.js"></script> 
<script>     

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    pointColor: "rgba(220,220,220,1)",
				    pointStrokeColor: "#fff",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    pointColor: "rgba(151,187,205,1)",
				    pointStrokeColor: "#fff",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }    

        $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            
          ]
        });
      });
    </script><!-- /Calendar -->

   

</body>
</html>
