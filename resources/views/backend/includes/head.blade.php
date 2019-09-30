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

                {{-- <li class="nav-item"><a class="nav-link" href="/supplier">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/supplier/create">Create New Supplier</a></li>
                <li class="nav-item"><a class="nav-link" href="/generate-supplier-report">Generate Report</a></li> --}}

                @yield('nav-items')

             <li>
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">Records</a>
                              
                                <a class="dropdown-item" href="{{ url('home_per') }}">Personal Record</a>
                                <ul>
                                    <li class="nav-item active">
                                    <a class="nav-link" href="{{url('home_per')}}">Home <span class="sr-only">(current)</span></a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="{{url('/create_per')}}">Create</a>
                                      </li>
                                </ul>
                                <a class="dropdown-item" href="">Treatment Record</a>
                                <ul>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('/home_treat')}}">Home <span class="sr-only"></span></a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="{{url('/create_treat')}}">Create</a>
                                      </li>
                                </ul>
                                <a class="dropdown-item" href="">Prescription</a>
                                <ul>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('/home_prescription')}}">Home <span class="sr-only"></span></a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="{{url('/create_prescription')}}">Create</a>
                                      </li>
                                </ul>
                                
                            </li>
                       
            </ul>
        </div>
    </div>
</nav>