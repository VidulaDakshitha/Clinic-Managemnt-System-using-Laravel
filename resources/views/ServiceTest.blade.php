<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    
    <link href="{{ asset('css/ServiceAdmin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/button.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>
 
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
 
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 
     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    
        <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
        
                            </ul>
        
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li><a href="/Services" class="nav-link" role="button">Services</a></li>
                                    <li><a href="/AdminHome" class="nav-link" role="button">Home</a></li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>


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

<div class="services">
    @if(!auth::guest())
        <a class="btn btn-primary" href="/ServiceTest/create">
            Add new services
    </a>
    @endif
    <h1>Our Services</h1>
</div>  

<div class="services">
<div class="container">
    @if (count($posts)>0)
    @foreach ($posts as $post)
        <div class="service left col-lg-6 col-md-12 col-sm-12 p-5">
        <img src="/storage/images/{{$post->image}}" >
        <h2 class="text-center">{{ $post->title }}</h2>
        <p>{{ $post->description }}</p>
            @if(!auth::guest())
                @if(auth::user()->id == $post->user_id)
                    <a class="btn btn-primary" href="/ServiceTest/{{ $post->id }}/edit">Edit</a>
                    <form class="form" action="/ServiceTest/{{ $post->id }}" method="POST">
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

@if(!auth::guest())
    <a class="btn btn-primary" href="/AdHome">Back to Dashboard</a>
    @endif 

</div>


  </body>
</html>





{{-- 
    
    @if (count($posts)>0)
  <div >
    @foreach ($posts as $post)
        
        
        <div class="service left col-6">
            
        <img src="/storage/images/{{$post->image}}" >
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
            @if(!auth::guest())
            @if(auth::user()->id == $post->user_id)
        <a class="btn btn-primary" href="/ServiceTest/{{ $post->id }}/edit">Edit</a>
            <form class="form" action="/ServiceTest/{{ $post->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger" value="Remove">
            </form>
        @endif
    @endif
   @endforeach

    </div>
      @else
          <p>No posts to show</p>
      @endif--}}