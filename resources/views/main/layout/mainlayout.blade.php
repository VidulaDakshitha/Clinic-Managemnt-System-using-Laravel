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

    {{-- <link href="{{ asset('css/registerCSS/style.css') }}" rel="stylesheet" type="text/css" > --}}
    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Style Sheed-->
    <link rel="stylesheet" type="text/css" href="css/order_system_css/orderStylesheet.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <!--char js-->
    <style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css "></style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Selector bootsrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <script type="text/javascript" src={{ url('js/order_management_script.js') }} ></script>
    <script type="text/javascript" src={{ url('js/jquery-3.4.1.js') }} ></script>



    @if (isset($styles))

    @foreach ($styles as $style)
    <link rel="stylesheet" href='{{ asset("$style") }}' />
    @endforeach

    @endif

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
    <script defer src="{{ asset('js/main/mainlayout/jquery-3.2.1.min.js') }}"></script>
    <script defer src="{{ asset('js/main/mainlayout/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('js/main/mainlayout/owl.carousel.min.js') }}"></script>
    <script defer src="{{ asset('js/main/mainlayout/circle-progress.min.js') }}"></script>
    <script defer src="{{ asset('js/main/mainlayout/main.js') }}"></script>

     <!--selector bootstrap javascript-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

     <!--bootstrap javascript-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
