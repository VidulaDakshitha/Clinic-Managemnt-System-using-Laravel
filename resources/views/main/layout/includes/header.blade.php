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
        <li class="{{ (Request::is('/about') ? 'active' : '') }}"><a href="/about">About</a></li>
        <li class="{{ (Request::is('/users') ? 'active' : '') }}"><a href="/contact">Service</a></li>
        <li class="{{ (Request::is('/users') ? 'active' : '') }}"><a href="/contact">Contact</a></li>
        <!-- <li><a href="elements.html"><i class="flaticon-020-decay"></i></a></li> -->
        <li class="login-style"><a href="/login">Sign In</a></li>
    </ul>
</div>