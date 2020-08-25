<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title> {{ @$tittle }}</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        
        <link href="{{ asset(env('loc_path').'bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{ asset(env('loc_path').'bootstrap/css/mdb.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{ asset(env('loc_path').'bootstrap/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&display=swap" rel="stylesheet">
       <style>
             .nav-item .nav-link {
    font-weight: 500;
    font-size: 15px;
    text-transform: uppercase;
   ;
}
.no-padding{
    padding-right: 0;
    padding-left: 0;
}
.top_header_wrapper{
    float:left;
    width:100%;
    background-color:#2ec8a6;
    font-size:14px;
    color:#ffffff;
    position:relative;
    z-index:6;
    font-family:'Open Sans', sans-serif;
}
.top_header_add{
    float:left;
    width:auto;
    line-height: 50px;
}
.top_header_add ul{
    margin:0px;
    padding:0px;
    width:100%;
    
}
.top_header_add  li{
    float:left;
    width:auto;
    list-style:none;
    margin-right: 30px;
    margin-left:-3px;
}
.top_header_add ul li i{
    margin-right:10px;
    line-height:33px;
    border:2px solid #55d0b5;
    width:36px; height:36px;
    text-align:center;
}
.top_header_add ul li a{
    color:#ffffff;
}
.top_header_add ul li a:hover{
    color:#f4ab01;
    transition:0.4s;
}
.top_login{
    float:right;
    width:auto;
    width:170px;
    text-align:center;
    background-color:#22a98b;
    padding-top:19px;
    padding-bottom:16px;
}
.top_login ul{
    margin:0px;
    padding:0px;
    width:100%;
    line-height:5px;
    float:left; margin-left:20px;
}
.top_login ul li{
    float:left;
    width:auto;
    list-style:none;
}
.top_login ul li a{
    color:#ffffff;
    padding-left:20px;
}
.top_login ul li a:hover{
    color:#f4ab01;
    transition:0.4s;
}
.rp_mobail_menu_main_wrapper{
    float:none;
    padding-top:20px;
    
    width:100%;
}
#sidebar {
  position: fixed;
  display: block;
  height: 100%;
  top: 0px;
  left: -500px;
  background-color: #ffffff;
  overflow: scroll;
  overflow-x: hidden;
  z-index:1000;
}

#links {
  position: relative;
  float: left;
}

#link_list {
  list-style-type: none;
  width: 100%;
  padding: 0px 50px 0px 0px;
}

#link_list li {
  display: block;
  width: 100%;
}

#link_list li:hover {
  background-color: #2ec8a6;
}

#toggle {
  float: right;
  position: relative;
  bottom: 25px;
  right: 0;
  border-radius: 20px;
  text-align: center;
  cursor:pointer;
}
#toggle_close{
        position: absolute;
    z-index: 100;
    right: 20px;
    top: 15px;
    font-size: 25px;
    color: #000000;
    cursor: pointer;
}
@import url(https://fonts.googleapis.com/css?family=Raleway:400,200);
#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu {
  width: 300px;
  color: #ffffff;
  text-transform:capitalize;
}
#cssmenu ul ul {
  display: none;
}
.align-right {
  float: right;
}
#cssmenu ul li a {
  padding: 16px 22px;
  cursor: pointer;
  z-index: 2;
  font-size: 16px;
  text-decoration: none;
  color: #000000;
  font-weight:bold;
  border-bottom:1px solid #d3d3d3;
  background: #ffffff;
  -webkit-transition: all 0.5s;
  -o-transition: all 0.5s;
  -ms-transition: all 0.5s;
  -moz-transition: all 0.5s;
  transition: all 0.5s;
}
#cssmenu ul li:first-child a{
    border-top:1px solid #d3d3d3;
}
#cssmenu ul li:hover a, #cssmenu ul li.active a{
    background:#2ec8a6 !important;
    border-bottom:1px solid #d3d3d3;
    color:#ffffff;
     -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
ul ul > li.has-sub > a:before {
  top: 20px;
  background:#ffffff;
}
.menu_fixed{
    position:fixed !important;
    left:0 !important;
    right:0 !important;
    top:0 !important;
    z-index: 1000;
}
#sidebar h1 {
    font-size:20px;
    color:#2ec8a6 !important;
    padding-left: 20px;
    font-weight:bold;
    text-transform:uppercase;
    padding-bottom: 15px;
    margin-top: 15px;
}
#sidebar h1 span{
    margin:0;
    color:black;
    font-size:20px;
    background:#f9f9f9;
}
.navbar{
       font-family:'Open Sans', sans-serif;
}
.nav-item a{
  border-bottom: 2px solid rgba(20%, 100%, 20%, .0);
}
.nav-item a:hover{
   opacity: 1;
    background: transparent;
    border-bottom: 2px solid #2ec8a6;
    color: #000000;
     
    -webkit-transition: 0.6s ease;
    -moz-transition: 0.6s ease;
    -o-transition: 0.6s ease;
    -ms-transition: 0.6s ease;
     transition: 0.6s ease;
}

#stl{
   float: left;
    padding-left: 5px;
    padding-right: 5px; width: 100%

}
#sta{
    background-color: #e9e9e9;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
    color: #757575;
    display: block;
    font-size: 14px;
    margin-bottom: 10px;
    padding: 5px 5px;
    text-align: center;
    position: relative;
}
        </style>
    </head>
    <body>
        
        @include('component.main-header')
        @yield('content')
        <footer class="page-footer pb1 pt1 teal">
        </footer>
       
        
        <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/mdb.min.js') }}"></script>
         <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/jquery-3.4.1.min.js') }}"></script>
           <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/popper.min.js') }}"></script>
        <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript"  src="{{ asset(env('loc_path').'bootstrap/js/custom.js') }}"></script>
        @if(!empty($address))
        <script src="{{ asset(env('loc_path').'materialize/js/country_state_city.js') }}"></script>
        @endif
        @if(!empty($search))
        <script src="{{ asset(env('loc_path').'materialize/js/search.js') }}"></script>
        @endif
        <script src="{{ asset(env('loc_path').'materialize/js/custom.js') }}"></script>
        
    </body>
</html>