<!DOCTYPE html>
<html lang="en">
<?php
   $org_detail = OrgSidebar::get_org_detail();
 ?>


<!-- Mirrored from colorlib.com//polygon/adminityty/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Dec 2018 02:53:46 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title> {{  $org_detail->name }}</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <!-- feather Awesome -->
    {{-- <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/feather/css/feather.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('adminity/css/lightbox.min.css') }}" >
    <!-- themify-icons line icon -->


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('adminity/feather.css') }}">

     <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset(env('loc_path').'adminity/css/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/datatable/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset(env('loc_path').'adminity/css/datatable/responsive.bootstrap4.min.css') }}">

          <!--forms-wizard css-->
    <link rel="stylesheet" type="text/css" href="{{ asset(env('loc_path').'adminity/css/wizad/jquery.steps.css') }}">

           {{-- <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminityty/files/assets/pages/j-pro/css/demo.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminityty/files/assets/pages/j-pro/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminityty/files/assets/pages/j-pro/css/j-forms.css"> --}}
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

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('organization::component.header')

        {{-- @include('organization::component.ela-sidebar') --}}
            

            <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('organization::component.sidebar')
                    
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                @yield('content')

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->

   
    {{-- <script data-cfasync="false" src="{{ asset(env('loc_path').'admin/js/email-decode.min.js') }}"></script> --}}
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
    
    
 {{-- <script src="https://cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script> --}}

    {{-- <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/ckeditor/ckeditor.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('adminity/js/ckeditor/tinymce.min.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('adminity/js/ckeditor/ckeditor-custom.js')}}"></script> --}}

<!-- ck editor -->
    {{-- <script src="https://colorlib.com//polygon/adminityty/files/assets/pages/ckeditor/ckeditor.js"></script> --}}
    <!-- sweet alert js -->
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminityty/files/bower_components/sweetalert/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://colorlib.com//polygon/adminityty/files/assets/js/modal.js"></script>
   
    <script type="text/javascript" src="https://colorlib.com//polygon/adminityty/files/assets/js/modalEffects.js"></script>
    <script type="text/javascript" src="https://colorlib.com//polygon/adminityty/files/assets/js/classie.js"></script> --}}

     <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
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
     {{-- <script src="https://colorlib.com//polygon/adminityty/files/assets/pages/form-masking/inputmask.js"></script>
    <script src="https://colorlib.com//polygon/adminityty/files/assets/pages/form-masking/jquery.inputmask.js"></script>
    <script src="https://colorlib.com//polygon/adminityty/files/assets/pages/form-masking/autoNumeric.js"></script>
    <script src="https://colorlib.com//polygon/adminityty/files/assets/pages/form-masking/form-mask.js"></script> --}}

    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/script.min.js') }}"></script>
    @if(!empty($datatable))  
    <script type="text/javascript" src="{{ asset(env('loc_path').'adminity/js/own.js') }}"></script>
    @endif
<!-- Global site tag (gtag.js) - Google Analytics -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> --}}
    <script src="{{ asset(env('loc_path').'admin/js/custom.min.js') }}"></script>
    <!-- Required Jquery -->
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/js/bootstrap.min.js"></script> --}}
    <!-- jquery slimscroll js -->
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script> --}}
    <!-- modernizr js -->
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/modernizr.js"></script> --}}
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/css-scrollbars.js"></script> --}}

    <!-- Switch component js -->
   
    <!-- Tags js -->
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script> --}}
    <!-- Max-length js -->
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js"></script> --}}
    <!-- i18next.min.js -->
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next/js/i18next.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script> --}}

    @if(!empty($switch))
        <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/switchery/js/switchery.min.js"></script>
    <!-- Custom js -->

        <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/swithces.js"></script>
    @endif
   {{--  <script src="https://colorlib.com//polygon/adminty/files/assets/js/pcoded.min.js"></script>
    <script src="https://colorlib.com//polygon/adminty/files/assets/js/vartical-layout.min.js"></script>
    <script src="https://colorlib.com//polygon/adminty/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/script.js"></script> --}}


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>


<!-- Mirrored from colorlib.com//polygon/adminityty/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Dec 2018 02:57:01 GMT -->
</html>
