<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <title> Organization</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="#">
        <meta name="keywords" content="">
        <meta name="author" content="#">
        <!-- Favicon icon -->
        <link rel="icon" href=" " type="image/x-icon">
        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'bootstrap/css/bootstrap.min.css') }}">
        <!-- feather Awesome -->
        
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/lightbox.min.css') }}" >
        <!-- themify-icons line icon -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/feather.css') }}">
        <!-- Data Table Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/datatable/buttons.dataTables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/datatable/responsive.bootstrap4.min.css') }}">
        <!--forms-wizard css-->
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/wizad/jquery.steps.css') }}">
        
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'css/yours.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/jquery.mCustomScrollbar.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/your.css') }}" >
        <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/switchery/css/switchery.min.css">
        <!-- Tags css -->
        <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css" />
        <!-- Style.css -->
    </head>
    
    @yield('content')


    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/popper.min.js') }}"></script>
    
    @if(!empty($yourjs))
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/yourjs.js') }}"></script>
    @endif
    @if(!empty($pack_js))
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/package.js') }}"></script>
    @endif
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/country-state-city.js') }}"></script>
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/modernizr.js') }}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/chart.js') }}"></script>
    <!-- amchart js -->
    <script src="{{ asset(env('loc_path').'adminity/js/chart/amcharts.js') }}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/chart/serial.js')}}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/chart/light.js') }}"></script>
    
    <script src="{{ asset(env('loc_path').'adminity/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/SmoothScroll.js')}}"></script>

    @if(!empty($datatable))
    <!-- data-table js -->
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/pdfmake.min.js')}}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/vfs_fonts.js')}}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/buttons.print.min.js')}}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/datatable/responsive.bootstrap4.min.js') }}"></script>
    @endif
    <script src="{{ asset(env('loc_path')."vendor/unisharp/laravel-ckeditor/ckeditor.js") }}"></script>
    <script src="{{ asset(env('loc_path')."/vendor/unisharp/laravel-ckeditor/adapters/jquery.js") }}"></script>
    <script src="{{ asset(env('loc_path').'adminity/js/pcoded.min.js')}}"></script>
    <!-- custom js -->
    <script src="{{ asset(env('loc_path').'adminity/js/vartical-layout.min.js') }}"></script>
    <script>
    $(document).ready(function(){
    $('.textarea').ckeditor();
    });
    </script>
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/lightbox.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/script.min.js') }}"></script>
    @if(!empty($datatable))
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/own.js') }}"></script>
    @endif

    <script src="{{ asset(env('loc_path').'admin/js/custom.min.js') }}"></script>
    
    @if(!empty($switch))
    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/switchery/js/switchery.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/swithces.js"></script>
    @endif
    
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-23581568-13');
    </script>