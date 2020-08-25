@if(Auth::check())
<div class="top_header_wrapper d-none d-lg-block">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="top_header_add">
          <ul>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Address :</span> -512/fonia,canada</li>
            <li><i class="fa fa-phone" aria-hidden="true"></i><span>Call us :</span> +61 5001444-122</li>
            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> dummy@example.com</a></li>
          </ul>
        </div>
         
      </div>
    </div>
  </div>
</div>
<nav class="navbar  navbar-expand-lg navbar-light white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{ asset(env('loc_path').'front/logo.png') }}" height="42" alt="mdb logo">
    </a>
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Links -->
    <div class="collapse navbar-collapse" id="basicExampleNav">
      <!-- Left -->
      <ul class="navbar-nav mr-auto text-center">
        <li class="nav-item">
          <a class="nav-link waves-effect" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="{{ route('search') }}">Find</a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="" target="_blank">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="" target="_blank">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="/contact-us">Contact</a>
        </li>
      </ul>
      
      <ul class="nav header-navbar-rht justify-content-center">
             
            <li class="nav-item">
              <a class="nav-link header-login" href="{{route('logout')}}">logout </a>
            </li>
          </ul>
    </div>
  </div>
</nav>

@else

</nav>
<div class="top_header_wrapper d-none d-lg-block">
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="top_header_add">
        <ul>
          <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Address :</span> -512/fonia,canada</li>
          <li><i class="fa fa-phone" aria-hidden="true"></i><span>Call us :</span> +61 5001444-122</li>
          <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> dummy@example.com</a></li>
        </ul>
      </div>
      {{-- <div class="top_login">
        <ul>
          <li><i class="fa fa-sign-in" aria-hidden="true"></i><a href="{{route('login')}}">Log In / Sign Up  </a></li>
        </ul>
      </div> --}}
    </div>
  </div>
</div>
</div>
<!--Navbar-->
<nav class="navbar  navbar-expand-lg navbar-light white sticky-top">
<div class="container">
  <a class="navbar-brand" href="#">
    <img src="{{ asset(env('loc_path').'front/logo.png') }}" height="42" alt="mdb logo">
  </a>
  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Links -->
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <!-- Left -->
    <ul class="navbar-nav mr-auto text-center  link-hover">
      <li class="nav-item">
        <a class="nav-link waves-effect" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect" href="{{ route('search') }}">Find</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect" href="" target="_blank">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect" href="" target="_blank">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect" href="/contact-us">Contact</a>
      </li>
    </ul>
    <ul class="nav header-navbar-rht justify-content-center">
             
            <li class="nav-item">
              <a class="nav-link header-login" href="{{route('login')}}">login / Signup </a>
            </li>
          </ul>
    
 {{--    <ul class="navbar-nav nav-flex-icons  ">
      <li class="nav-item">
        
        <a class="btn btn-outline-teal btn-rounded waves-effect btn-sm" href="{{route('login')}}" >Login</a>
        <a class="btn btn-teal btn-rounded waves-effect btn-sm" href="{{route('register')}}">Register</a>
      </li>
    </ul>
    <!-- Right -->
    <ul class="navbar-nav nav-flex-icons ml-0">
      <li class="nav-item m-0">
        <a class="nav-link fb-ic " role="button"><i class="fab fa-lg fa-facebook-f"></i></a>
        
      </li>
      <li class="nav-item m-0">
        <a class="nav-link tw-ic " role="button"><i class="fab fa-lg fa-twitter"></i></a>
        
      </li>
      <li class="nav-item m-0">
        <a class="nav-link li-ic" role="button"><i class="fab fa-lg fa-linkedin-in"></i></a>
        
      </li>
      
      
    </ul> --}}
  </div>
</div>
</nav>




@endif