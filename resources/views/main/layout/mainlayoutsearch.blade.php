<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="description" content="IHHRI">
    <meta name="keywords" content="homeopathic clinic">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/mainlayout/animate.css') }}" />
   
    <link href="{{ asset('css/patDashboard/contactus.css') }}" rel="stylesheet" type="text/css" >

    <!-- Stylesheets for search page-->
    <link href="{{ asset('css/searchCSS/jquery1.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/searchCSS/channeling_styles.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/searchCSS/bootstrap_date.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/searchCSS/fonts.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/searchCSS/bootstrap1.css') }}" rel="stylesheet" type="text/css" >


     
         <!-- stylesheets for register page-->
     
         {{-- <link href="{{ asset('css/registerCSS/style.css') }}" rel="stylesheet" type="text/css" >

         <link href="{{ asset('css/registerCSS/style.css') }}" rel="stylesheet" type="text/css" > --}}
         <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
         <link href="{{ asset('css/showdoc/style.css') }}" rel="stylesheet" type="text/css" >
         <link href="{{ asset('css/showdoc/custom.css') }}" rel="stylesheet" type="text/css" >


   
    @if (isset($styles))

    @foreach ($styles as $style)
    <link rel="stylesheet" href='{{ asset("$style") }}' />
    @endforeach

    @endif

</head>

<body  style="background: url(images/searchIMG/doctor.jpg) center center fixed; background-size:cover;">

   
 


    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Header section -->
    <header class="header-section">
        {{-- navigation bar --}}
        @include('main.layout.includes.header')
    </header>

    <main class="py-4">
            {{-- container for showing the error and success messages --}}
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
    {{-- main content --}}
    @yield('content')
</main>
    {{-- footer --}}
    @include('main.layout.includes.footer')


    <!--====== Javascripts & Jquery ======-->
     {{-- <script defer src="{{ asset('js/main/mainlayout/jquery-3.2.1.min.js') }}"></script> --}}
    <script defer src="{{ asset('js/main/mainlayout/bootstrap.min.js') }}"></script>
     {{-- <script defer src="{{ asset('js/main/mainlayout/owl.carousel.min.js') }}"></script> --}}
     {{-- <script defer src="{{ asset('js/main/mainlayout/circle-progress.min.js') }}"></script> --}}
    <script defer src="{{ asset('js/main/mainlayout/main.js') }}"></script> 

   

   



    

</body>

</html>