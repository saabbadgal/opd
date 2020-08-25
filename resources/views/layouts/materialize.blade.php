<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title> {{ @$tittle }}</title>

         <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        
        <link href="{{ asset(env('loc_path').'bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{ asset(env('loc_path').'bootstrap/css/mdb.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{ asset(env('loc_path').'bootstrap/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
      
       
       <style>

        </style>
    </head>
    <body>
        
        @include('component.main-header')
        @yield('content')

           
       
         <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/doccure.js') }}"></script>
        
        <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/custom.js') }}"></script>
        
        <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/jquery-3.4.1.min.js') }}"></script>
        <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/popper.min.js') }}"></script>
        <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/mdb.min.js') }}"></script>
        @if(!empty($address))
        <script src="{{ asset(env('loc_path').'materialize/js/country_state_city.js') }}"></script>
        @endif
        @if(!empty($search))
        <script src="{{ asset(env('loc_path').'materialize/js/search.js') }}"></script>
        @endif
        <script src="{{ asset(env('loc_path').'materialize/js/custom.js') }}"></script>
        @include('component.main-footer')
    </body>

</html>