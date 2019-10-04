<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>{{config('app.name','IHHR')}}</title>
     

       
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
      
   


        <!-- Jquery file-->
        <script src="js/jquery-3.4.1.js"></script>
        
        <!--sweet alert plugin-->
        <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="js/sweetalert2.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
        
        <!--css file-->
        <link href="{{ asset('css/patDashboard/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
       
        
      
        <link href="css/demo.css" rel="stylesheet" />


    </head>
    <body>
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
        
                     {{-- main content  --}}
                    @yield('content')
                </main>

       
        
    </body>
</html>