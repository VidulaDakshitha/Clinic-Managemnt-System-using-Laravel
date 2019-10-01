<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-5">
    <div class="container">
        <!-- Navbar content -->
        <a href="/login" class="navbar-brand">
            <img style="width: 100px;" src="{{ asset('images/main/mainlayout/logo_light.png') }}" alt="">
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                  <a class="nav-link" href="{{ url('home_per') }}">Personal Record</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{url('/home_treat')}}">Treatment Record</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{url('/home_prescription')}}">Prescription</a>
                </li> 

                @yield('nav-items')

        
                            
                       
            </ul>
        </div>
    </div>
</nav>