@extends('main.layout.dashboardHeader')

@section('content')

<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image='../../images/dashboardIMG/sidebar-1.jpg' >
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
          <li class="nav-item active  ">
            <a class="nav-link" href="{{'/patient'}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
          <a class="nav-link" href="/patient/{{ $research->patient_id }}/edit">
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
              <p>Contact Us</p>
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
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">{{ $research->fullname }}</a>
                  {{-- <a class="dropdown-item" href="#">Delete Account</a> --}}
                  <div class="dropdown-divider"></div>
                  <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input class="dropdown-item" type="submit" class="dropdown-item" value="Logout">
                  </form>
                  {{-- <form action="/userdelete/{{ $research->patient_id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }} --}}
                    <button type="submit" class="dropdown-item" onclick="deleteConfirmation({{$research->patient_id}})">Delete Account</button>
  
  
                  {{-- </form> --}}
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
              <a href="{{'/search'}}">
            <div class="col-lg-3 col-md-6 col-sm-6">
                
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">event_available</i>
                  </div>
                  <p class="card-category">Click To Make Appointment</p>
                  
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>
                  Make more appointments
                  </div>
                </div></a>
              </div>
            </div>

            <a href="/read_personal/{{$research->patient_id}}">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Your Personal medical records</p>
                  {{-- <h3 class="card-title">$34,245</h3> --}}
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Click to check details
                  </div>
                </div></a>
              </div>
            </div>
            
            <a href="/read_treatment/{{$research->patient_id}}">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Treatment Records</p>
                  {{-- <h3 class="card-title">75</h3> --}}
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Click to view them
                  </div>
                </div></a>
              </div>
            </div>

            <a href="{{'/user-prescriptions'}}">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">local_grocery_store</i>
                  </div>
                  <p class="card-category">Order Information</p>
                  {{-- <h3 class="card-title">30</h3> --}}
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="material-icons">update</i>proceed to order dashboard
                  </div>
                </div></a>
              </div>
            </div>
          </div>



          <div class="row">
          <a href="{{'/paitientorderdash'}}">
            <div class="col-lg-3 col-md-6 col-sm-6">
                
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">local_convenience_store</i>
                  </div>
                  <p class="card-category">Order Items</p>
                  <h3 class="card-title"> 24 / 7
                    
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>
                  Make more orders for you prescription
                  </div>
                </div></a>
              </div>
            </div>
            
            {{-- Add payment details --}}

            {{-- <a href="/paymentHome">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">payment</i>
                  </div>
                  <p class="card-category">Click To View or make Payment</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div></a>
              </div>
            </div> --}}
            <a href="http://www.instagram.com">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">face</i>
                  </div>
                  <p class="card-category">Follow us on instagram</p>
                  {{-- <h3 class="card-title">75</h3> --}}
                </div>
                <div class="card-footer">
                  {{-- <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div> --}}
                </div>
              </div></a>
            </div>
            <a href="https://twitter.com/shantha35775683?lang=en">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Followers</p>
                  <h3 class="card-title">30</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="material-icons">update</i> Just Updated..Click to follow
                  </div>
                </div></a>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Read Marker</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">info_outline</i>info
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">local_hospital</i> Treatments
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">local_hotel</i> Types
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>It is the safest mode of treatment available with absolutely NO side effects. Homeopathy cures all illnesses except Death.</td>
                            
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Suitable for people of all ages, even the most sensitive like an expectant mother or a newborn baby.</td>
                            
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Homeopathy is Molecular Imprint Therapeutics. An advanced branch of modern molecular medicine.
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Samuel Hahnemann (1755-1843), a German doctor and chemist, who is credited with founding homeopathy.</td>
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="messages">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Auto-isopathy
                            </td>
                          
                          </tr>




                          <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="" >
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Classical Homeopathy
                              </td>                             
                            </tr>



                            <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="" >
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Clinical Homeopathy
                                </td>                                
                              </tr>



                              <tr>
                                  <td>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-sign">
                                          <span class="check"></span>
                                        </span>
                                      </label>
                                    </div>
                                  </td>
                                  <td>Complex homeopathy
                                  </td>
                                  
                                </tr>



                                <tr>
                                    <td>
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" value="">
                                          <span class="form-check-sign">
                                            <span class="check"></span>
                                          </span>
                                        </label>
                                      </div>
                                    </td>
                                    <td>Homotoxicology
                                    </td>
                                   
                                  </tr>



                                  <tr>
                                      <td>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                              <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                      </td>
                                      <td>Isopathy
                                      </td>                                      
                                    </tr>                    
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="settings">


                      <table class="table">
                        <tbody>

                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Asthma</td>                            
                          </tr>


                          <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Ear Infections</td>                              
                            </tr>


                            <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Hay Fever</td>                              
                            </tr>

                            <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Mental Health Conditions</td>                              
                            </tr>


                            <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Allergies</td>                              
                            </tr>


                            <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>                              
                            </tr>


                            <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Dermatitis</td>                              
                            </tr>










                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Arthritis
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>High Blood Pressure</td>
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Top Feedback</h4>
                  <p class="card-category">These are the top feedbacks made</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>No</th>
                      <th>Name</th>
                      <th>Place</th>
                      <th>Feedback</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Achala Mendis</td>
                        <td>Ampara, Sri Lanka.</td>
                        <td>He is treating the patient in a friendly nature.. <br>Listening to patient's problem very peacefully.. <br>Giving good suggestions to recover the problems.. thanks</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Rupika Perera</td>
                        <td>Kandy, Sri Lanka.</td>
                        <td>I had been dealing with some intense pain from endometriosis.<br> Always in my hips and legs, pelvic area and the tension and pain ripples<br> through the body depending on the time of the month.<br> I was so lucky to be in the right place at the right time to see him.</td>
                      </tr>
                     
                    </tbody>
                  </table>
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
  <script src="js/patDashboard/jquery.min.js"></script>
  <script src="js/patDashboard/popper.min.js"></script>
  <script src="js/patDashboard/bootstrap-material-design.min.js"></script>
  <script src="js/patDashboard/perfect-scrollbar.jquery.min.js"></script>
  <script src="js/patDashboard/demo.js"></script>
  <script>src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"</script>





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
















  <!-- This is for the dialog box-->
<script>
    function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


                $.ajax({
                    type: 'POST',
                    url: "{{url('/userdelete')}}/" + id,                   
                    data: {_token:CSRF_TOKEN,"_method": 'DELETE'}, 
                    dataType: 'JSON',
                    success: function (results) {
                         if (results.success === true) {
                             swal("Done!", results.message, "success");
                         } else {
                           swal("Error!", results.message, "error");
                         }
                     }
                });

                window.location.href = "/";
            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
    </script>

  @endsection