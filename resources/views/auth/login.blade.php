@extends('layouts.materialize')

@section('content')

<div class="row py-4"></div>
 
<div class="row justify-content-center ">
<div class="col-lg-3 px-0">
<div class="card mb-0" id="login-box">

   @if(Session::has('book_opd_id'))
   <h4 class="card-header teal white-text text-center py-3">Login to Proceed Booking</h4>
   @else
    <h4 class="card-header teal white-text text-center py-3">Login</h4>
   @endif
  <!--Card content-->
  <div class="card-body">
    <!-- Form -->
    {!! Form::open(['route'=>'login', 'class'=>"text-center"]) !!}
      
  
        <input type="text" id="materialLoginFormEmail" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
         @if ($errors->any())
            @foreach ($errors->get('email') as $name)
              <p class="text-danger error-p">{{$name}}</p> 
            @endforeach
        @endif
       {{--  <label for="materialLoginFormEmail">E-mail</label> --}}
      
      <!-- Password -->
       
        <input type="password" id="materialLoginFormPassword" class="form-control mt-3" name="password" placeholder="Password">
        @if ($errors->any())
            @foreach ($errors->get('password') as $name)
              <p class="text-danger error-p">{{$name}}</p> 
            @endforeach
        @endif
       {{--  <label for="materialLoginFormPassword">Password</label> --}}
      
      <div class="d-flex justify-content-around">
        <div>
          <!-- Remember me -->
         {{--  <div class="form-check">
            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
            <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
          </div> --}}
        </div>
       {{--  <div>
          <!Forgot password ->
          <a href="">Forgot password?</a>
        </div> --}}
      </div>
      <button class="btn btn-outline-teal btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="register-link">Sign In</button>
      <p>Not a member?
        <a  style="font-weight: 500"  class=" teal text-white px-3 py-1" href="register"> Register</a>
      </p>
           {!! Form::close() !!}
    </div>
  </div>
</div>


{{-- <div class="col-lg-3 px-0">
    <img src="https://picsum.photos/342/375/" alt="" class="img-fluid">
</div> --}}
</div>
<div class="row py-4"></div>
 
  
@endsection
