@extends('main.layout.dashboardHeader')

@section('content')




<div class="wrapper ">
  <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    
            Tip 2: you can also add an image using data-image tag
        -->
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Patient Dashboard
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
          <li class="nav-item  ">
              <a class="nav-link" href="{{'/'}}">
                <i class="material-icons">home</i>
                <p>Home</p>
              </a>
            </li>
        <li class="nav-item  ">
          <a class="nav-link" href="{{'/patient'}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="#">
            <i class="material-icons">person</i>
            <p>User Profile</p>
          </a>
        </li>
        {{-- <li class="nav-item ">
          <a class="nav-link" href="./tables.html">
            <i class="material-icons">content_paste</i>
            <p>Table List</p>
          </a>
        </li> --}}

        <li class="nav-item ">
          <a class="nav-link" href="/contact">
            <i class="material-icons">location_ons</i>
            <p>Contact us</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="/feedback">
            <i class="material-icons">notifications</i>
            <p>Feedback</p>
          </a>
        </li>

      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="#pablo">User Profile</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <form class="navbar-form">
            <div class="input-group no-border">
              <input type="text" value="" class="form-control" placeholder="Search...">
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#pablo">
                <i class="material-icons">dashboard</i>
                <p class="d-lg-none d-md-block">
                  Stats
                </p>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="#">Profile</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input class="dropdown-item" type="submit" class="dropdown-item" value="Logout">
                  </form>

           
                {{-- <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Log out</a> --}}
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-category">Complete your profile</p>
              </div>
              <div class="card-body">
                <form action="/patient/{{ $result->patient_id }}" method="POST">
                  {{ csrf_field() }}
                  @method('PUT')
                  {{-- /about/{{ $result->id  }} --}}
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="bmd-label-floating">User ID (disabled)</label>
                        <input type="text" class="form-control" value="{{ $result->patient_id }}" readonly>
                      </div>
                      {{-- {{ $result->id }} --}}
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" class="form-control" value="{{$result->username}}" readonly>
                      </div>
                    </div>
                    {{-- <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <a href="{{ route('password.request') }}" ><input type="text" name="password" class="form-control" value="click to change password" disabled style="color: blue"></a>
                      </div>
                    </div> --}}
                  </div>
                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Full Name</label>
                        <input name="fullname" type="text" name="fullname" class="form-control"
                          value="{{$result->fullname}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Address1</label>
                        <input type="text" name="address1" class="form-control" value="{{$result->address1}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Address2</label>
                        <input type="text" name="address2" class="form-control" value="{{$result->address2}}">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">City</label>
                        <input type="text" name="city" class="form-control" value="{{$result->city}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">NIC</label>
                        <input type="text" name="nic" class="form-control" value="{{$result->nic}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Phone No</label>
                        <input type="number" name="phone" class="form-control" value="{{$result->phone}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Email Address</label>
                        <input name="email" type="email" class="form-control" value="{{$result->email}}" readonly>
                      </div>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                  <div class="clearfix"></div>
                </form>
              <button type="submit" class="btn btn-primary pull-right" onclick="reportgenerate()">Generate Report</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile">
              <div class="card-avatar">
                <a href="#pablo">
                  <img class="img" src="../../images/dashboardIMG/shantha.jpg" />
                </a>
              </div>
              <div class="card-body">
                <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                <h4 class="card-title">Dr Shantha Kumar</h4>
                <p class="card-description">
                  An energetic, self-motivated, ambitious person who has developed a mature and responsible approach to
                  any task that he undertakes, or situation that he is presented with. As a Homoeopath with thirty five
                  years’ experience in practice, teaching as well as administration and management Dr Shantha Kumar is
                  an amazing character in working with others to achieve a certain objective on time and with
                  excellence.
                </p>
                <a href="https://twitter.com/shantha35775683?lang=en" class="btn btn-primary btn-round">Follow</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="fixed-plugin">
  <div class="dropdown show-dropdown">
    <a href="#" data-toggle="dropdown">
      <i class="fa fa-cog fa-2x"> </i>
    </a>
    <ul class="dropdown-menu">
      <li class="header-title"> Sidebar Filters</li>
      <li class="adjustments-line">
        <a href="javascript:void(0)" class="switch-trigger active-color">
          <div class="badge-colors ml-auto mr-auto">
            <span class="badge filter badge-purple" data-color="purple"></span>
            <span class="badge filter badge-azure" data-color="azure"></span>
            <span class="badge filter badge-green" data-color="green"></span>
            <span class="badge filter badge-warning" data-color="orange"></span>
            <span class="badge filter badge-danger" data-color="danger"></span>
            <span class="badge filter badge-rose active" data-color="rose"></span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>

    </ul>
  </div>
</div>
<!--   Core JS Files   -->
 <script type="text/javascript" src="../../js/patDashboard/jquery.min.js"></script>
  <script type="text/javascript" src="../../js/patDashboard/popper.min.js"></script>
  <script type="text/javascript" src="../../js/patDashboard/bootstrap-material-design.min.js"></script>
  <script type="text/javascript" src="../../js/patDashboard/perfect-scrollbar.jquery.min.js"></script>
  <script type="text/javascript" src="../../js/patDashboard/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script src="../../js/jquery-3.4.1.js"></script>
  <script src="../../js/sweetalert2.js"></script>








  <script>
      $(document).ready(function() {
        $().ready(function() {
          $sidebar = $('.sidebar');
  
          $sidebar_img_container = $sidebar.find('.sidebar-background');
  
          $full_page = $('.full-page');
  
          $sidebar_responsive = $('body > .navbar-collapse');
  
          window_width = $(window).width();
  
          fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
  
          if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
            if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
              $('.fixed-plugin .dropdown').addClass('open');
            }
  
          }
  
          $('.fixed-plugin a').click(function(event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });
  
          $('.fixed-plugin .active-color span').click(function() {
            $full_page_background = $('.full-page-background');
  
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
  
            var new_color = $(this).data('color');
  
            if ($sidebar.length != 0) {
              $sidebar.attr('data-color', new_color);
            }
  
            if ($full_page.length != 0) {
              $full_page.attr('filter-color', new_color);
            }
  
            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data-color', new_color);
            }
          });
  
          $('.fixed-plugin .background-color .badge').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
  
            var new_color = $(this).data('background-color');
  
            if ($sidebar.length != 0) {
              $sidebar.attr('data-background-color', new_color);
            }
          });
  
          $('.fixed-plugin .img-holder').click(function() {
            $full_page_background = $('.full-page-background');
  
            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');
  
  
            var new_image = $(this).find("img").attr('src');
  
            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              $sidebar_img_container.fadeOut('fast', function() {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
              });
            }
  
            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
  
              $full_page_background.fadeOut('fast', function() {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
              });
            }
  
            if ($('.switch-sidebar-image input:checked').length == 0) {
              var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
  
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }
  
            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
          });
  
          $('.switch-sidebar-image input').change(function() {
            $full_page_background = $('.full-page-background');
  
            $input = $(this);
  
            if ($input.is(':checked')) {
              if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
              }
  
              if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
              }
  
              background_image = true;
            } else {
              if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
              }
  
              if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
              }
  
              background_image = false;
            }
          });
  
          $('.switch-sidebar-mini input').change(function() {
            $body = $('body');
  
            $input = $(this);
  
            if (md.misc.sidebar_mini_active == true) {
              $('body').removeClass('sidebar-mini');
              md.misc.sidebar_mini_active = false;
  
              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
  
            } else {
  
              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
  
              setTimeout(function() {
                $('body').addClass('sidebar-mini');
  
                md.misc.sidebar_mini_active = true;
              }, 300);
            }
  
            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
              window.dispatchEvent(new Event('resize'));
            }, 180);
  
            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
              clearInterval(simulateWindowResize);
            }, 1000);
  
          });
        });
      });
    </script>
















    




  

<script>
  function reportgenerate(){
    Swal.fire({
  title: 'Your report is being Generated',
  width: 600,
  padding: '3em',
  background: '#fff url("../../images/dashboardIMG/bg.png")',
  backdrop: `
    rgba(0,0,123,0.4)
    url("../../images/dashboardIMG/reload.gif")
    center left
    no-repeat
  `
}).then(function reportgenerate(){
    window.location.href='/pdfuser';
});
  }

  </script>





@endsection