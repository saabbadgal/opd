@extends('layouts.materialize')
@section('content')
@php
// dump(Session::get('sub_domain'));
@endphp
<div class="row py-4"></div>

<div class="row justify-content-center ">
  <div class="col-lg-3 px-0">
    <div class="card mb-0" id="login-box">
      <h4 class="card-header teal white-text text-center py-3">Hospital Login</h4>
      <!--Card content-->
      <div class="card-body">
        
        
        <!-- Form -->
        <form class="text-center" style="color: #757575;" method="post" action="{{route('org.admin.login.check',['account'=>Session::get('sub_domain')])}}">
          @csrf
          <!-- Email -->
          
          <input type="text" id="materialLoginFormEmail" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
          @if ($errors->any())
          @foreach ($errors->get('email') as $name)
          <p class="text-danger error-p">{{$name}}</p>
          @endforeach
          @endif
          <!-- Password -->
          <input type="password" id="materialLoginFormPassword" class="form-control mt-3" name="password" placeholder="Password">
          @if ($errors->any())
          @foreach ($errors->get('password') as $name)
          <p class="text-danger error-p">{{$name}}</p>
          @endforeach
          @endif
          
          <button class="btn btn-outline-teal btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="register-link">Sign In</button>
          <!-- Register -->
          <p>Not a member?
            <a  style="font-weight: 500"  class=" teal text-white px-3 py-1" href="register"> Register</a>
          </p>
          
        </form>
        <!-- Form -->
      </div>
    </div>
    <!-- Material form login -->
  </div>
</div>
<div class="row py-4"></div>
@endsection