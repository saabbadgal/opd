{{-- @extends('layouts.app') --}}
@extends('layouts.materialize')
@section('content')
<div class="row py-4"></div>

<div class="row justify-content-center ">
  <div class="col-lg-3 mb-0 px-0">
    <div class="card mb-0">
      <h4 class="card-header teal white-text text-center py-3"> Sign Up </h4>
      <div class="card-body px-lg-4 pt-0">
        {!! Form::open(['route'=>'register', 'class'=>"text-center"]) !!}
        


        <input type="text" id="materialRegisterFormFirstName" class="form-control mt-3" name="name" placeholder="Name">
        @if ($errors->any())
            @foreach ($errors->get('name') as $name)
              <p class="text-danger error-p">{{$name}}</p> 
            @endforeach
        @endif
        
        
       
        <input type="email" id="materialRegisterFormEmail" class="form-control mt-3" name="email" placeholder="E-mail">
         @if ($errors->any())
            @foreach ($errors->get('email') as $name)
              <p class="text-danger error-p">{{$name}}</p> 
            @endforeach
        @endif
          
          {{-- <label for="materialRegisterFormEmail">E-mail</label> --}}
       <input type="password" id="materialRegisterFormPassword" class="form-control mt-3" aria-describedby="materialRegisterFormPasswordHelpBlock" name="password" placeholder="Password at least 8 characters">
        @if ($errors->any())
            @foreach ($errors->get('password') as $name)
              <p class="text-danger error-p">{{$name}}</p> 
            @endforeach
        @endif
        
        {{-- <label for="materialRegisterFormPassword">Password</label> --}}
        {{-- <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-1">
        At least 8 characters and 1 digit
        </small> --}}
        
        
        <input type="password" id="materialConfirmFormPassword" class="form-control mt-3" aria-describedby="materialConfirmFormPassword" name="password_confirmation" placeholder="Confirm Password">
        {{-- <label for="materialConfirmFormPassword">Confirm Password</label> --}}
        
        <button class="btn btn-outline-teal btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Register</button>
        <p>Already Registered ?
          <a id="register-link" class=" teal text-white px-2 py-1" href="login"> Login</a>
        </p>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  {{-- <div class="col-lg-3 px-0 ">
    <img src="https://picsum.photos/342/461/" alt="" class="img-fluid">
  </div> --}}
</div>

<div class="row py-4"></div>
{{--
<div class="bgcolor">
  <div class="container">
    {!! Form::open(['route'=>'register', 'class'=>"row"]) !!}
    <div class="card col l8 offset-l2 offset-s1 s10 mv6 pb8 ">
      <div class="row mdb">
        <h1 class="fw100 mc0 p3 f4 center blue-text text-lighten-4 uc"> Patient <span class="fw400"> Signup</span> </h1>
        
      </div>
      <div class="row">
        <div class="input-field col l8 s10 offset-s1 offset-l2">
          @if($errors->has('name'))
          <i class="material-icons prefix blue-text text-lighten-4" >person</i>
          <input id="name" class="error" type="text" name="name" value="{{ old('name') }}">
          <label for="name" class="red-text" > Name</label>
          <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('name') }} </span>
          @else
          <i class="material-icons prefix blue-text text-lighten-4" >person</i>
          <input id="name" type="text" name="name" value="{{ old('name') }}">
          <label for="name"> Name</label>
          @endif
        </div>
      </div>
      
      <div class="input-field col l8 s10 offset-s1 offset-l2">
        @if($errors->has('email'))
        <i class="material-icons prefix blue-text text-lighten-4" >email</i>
        <input id="email" class="error" type="text" name="email" value="{{ old('email') }}">
        <label for="email" class="red-text"> Email </label>
        <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('email') }} </span>
        @else
        <i class="material-icons prefix blue-text text-lighten-4" >email</i>
        <input id="email" type="text" name="email" value="{{ old('email') }}"
        >
        <label for="email"> Email </label>
        @endif
      </div>
      <div class="input-field col l8 s10 offset-s1 offset-l2">
        @if($errors->has('password'))
        <i class="material-icons prefix blue-text text-lighten-4" >vpn_key</i>
        <input id="password" class="error" type="password" name="password">
        <label for="password" class="red-text"> Password </label>
        <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('password') }} </span>
        @else
        <i class="material-icons prefix blue-text text-lighten-4" >vpn_key</i>
        <input id="password" type="password" name="password">
        <label for="password"> Password </label>
        @endif
      </div>
      <div class="input-field col l8 s10 offset-s1 offset-l2">
        @if($errors->has('password_confirmation'))
        <i class="material-icons prefix blue-text text-lighten-4" >verified_user</i>
        <input id="cpassword" class="error" type="password" name="password_confirmation">
        <label for="cpassword" class="red-text">Confirm Password </label>
        <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('password_confirmation') }} </span>
        @else
        <i class="material-icons prefix blue-text text-lighten-4" >verified_user</i>
        <input id="cpassword" type="password" name="password_confirmation">
        <label for="cpassword">Confirm Password </label>
        @endif
      </div>
      <div class="input-field col l8 s10 offset-s1 offset-l2 mt5">
        <button class="btn waves-effect waves-light mdb " type="submit" name="action">Submit <i class="material-icons right">send</i>
        </button>
        
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div> --}}
@endsection