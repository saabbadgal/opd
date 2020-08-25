@extends('layouts.materialize')
@section('content')
@php
// dump(Auth::check(), Auth::user());
if(!empty($opd->shifts)){
$shifts = json_decode($opd->shifts);
$shift_name = [1=>'Morning','Afternoon','Evening'];
}
@endphp
<div class="content">
  <div class="container">
    <!-- Doctor Widget -->
    <div class="row">
      @if(Auth::check())
      <div class="col-lg-12">
        
        <div class="card">
          <div class="card-body">
            <div class="doctor-widget">
              <div class="doc-info-left">
                <div class="doctor-img">
                  <img src="{{ asset(env('loc_path').'front/3.png') }}" class="img-fluid" alt="User Image">
                </div>
                <div class="doc-info-cont">
                  <h4 class="doc-name">{{ $doctor->title}}. {{ $doctor->name}}</h4>
                  <p class="doc-speciality">{{ $doctor->education}}</p>
                  <p class="doc-department">{{ $doctor->specialist}}</p>
                  <div class="clinic-details">
                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $doctor->address}} </p>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          
          <!-- /Doctor Widget -->
        </div>
      </div>
      @endif
      @if(!Auth::check())
      <div class="col-lg-6">
        
        <ul class="nav nav-tabs nav-justified md-tabs " id="myTabJust" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"
            aria-selected="true">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just"
            aria-selected="false">Login</a>
          </li>
          
        </ul>
        <div class="tab-content card pt-5" id="myTabContentJust">
          <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
            
            <div class="login-header">
              <h3>Patient <span class="teal-text  "> Register</span>  {{-- <a href="doctor-register.html">Are you a Doctor?</a> --}}</h3>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            
            <!-- Register Form -->
            {!! Form::open(['route'=>'register']) !!}
            <div class="form-group form-focus">
              <input type="text" class="form-control floating" name="name" value="{{old('name')}}">
              <label class="focus-label">Name</label>
            </div>
            <div class="form-group form-focus">
              <input type="text" class="form-control floating" name="email">
              <label class="focus-label">Email</label>
            </div>
            <div class="form-group form-focus">
              <input type="password" class="form-control floating" name="password">
              <label class="focus-label">Create Password</label>
            </div>
            <div class="form-group form-focus">
              <input type="password" class="form-control floating" name="password_confirmation">
              <label class="focus-label">Confirm Password</label>
            </div>
            <div class="text-right">
              <a >Already have an account?</a>
            </div>
            <button class="btn btn-default btn-block btn-lg login-btn" type="submit">Signup</button>
            {{--   <div class="login-or">
              <span class="or-line"></span>
              <span class="span-or">or</span>
            </div> --}}
            {{--  <div class="row form-row social-login">
              <div class="col-6">
                <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
              </div>
              <div class="col-6">
                <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
              </div>
            </div> --}}
          </form>
          
          <!-- /Register Form -->
        </div>
        <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
          
          <div class="login-header">
            <h3>Patient <span class="teal-text  "> Login</span>  {{-- <a href="doctor-register.html">Are you a Doctor?</a> --}}</h3>
          </div>
          {!! Form::open(['route'=>'login']) !!}
          <div class="form-group form-focus">
            <input type="text" name="email" class="form-control floating">
            <label class="focus-label">Email</label>
          </div>
          <div class="form-group form-focus">
            <input type="password" name="password" class="form-control floating">
            <label class="focus-label">Password</label>
          </div>
          {{--  <div class="text-right">
            <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
          </div> --}}
          <button class="btn btn-default btn-block btn-lg login-btn"  type="submit">Login</button>
          
          
          
        </form>
      </div>
    </div>
    
  </div>
  
  @endif
  
</div>
</div>
</div>
</div>
@if(Auth::check())
<div class="content mx-lg-5" style="min-height: 210px;">
<div class="">
<div class="row">
<div class="col-12">
  
  
  <div class="row">
    <div style="border-left: 3px teal;" class="col-12 col-sm-4 col-md-6 ml-md-5 mb-md-4">
      <h4 class="mb-1 font-weight-normal"> {{$carbon->format('j F Y')}} <span class="teal-text">({{$carbon->format('l')}})</span>  </h4>
      {{--  <p class="text-muted">  {{$carbon->format('l')}}</p> --}}
    </div>
    
  </div>
  <!-- Schedule Widget -->
<div class="card booking-schedule schedule-widget border-teal">
    
    <!-- Schedule Header -->
<div class="schedule-header">
  <div class="row">
    <div class="col-2">
      <h4 class="text-center  pb-3 s-header" style=""> Shifts</h4>
    </div>
    <div class="col-10">
      <div class="day-slot">
        <ul>
          @for($i=1; $i<=7; $i++ )
          @php
          if($i!=1){
          $next = $carbon->addDay();
          $day[$next->format('Y-m-d')] =   $next->dayOfWeekIso;
          }else{
          $day[$carbon->format('Y-m-d')] =   $carbon->dayOfWeekIso;
          }
          @endphp
          @if($i==1)
          <li >
            <span> {{$carbon->format('D')}}</span>
            <span class="slot-date">{{$carbon->format('j M')}} <small class="slot-year">{{$carbon->format('Y')}}</small></span>
          </li>
          @else
          <li>
            <span>{{$next->format('D')}}</span>
            <span class="slot-date">{{$next->format('j M')}}  <small class="slot-year">{{$next->format('Y')}}</small></span>
          </li>
          @endif
          @endfor
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="schedule-cont">
  <div class="row">
    <div class="col-2">
      <div>
        @foreach($shifts as $shift_val)
        
        <div id="stl">
          <div id="sta" class="timing" style="background-color: #404040; color: white;" >{{$shift_name[$shift_val]}}</div>
        </div>

        @endforeach

          </div>
        </div>
        <div class="col-10">
          @php
          $day_wise = $opd_detail->groupBy('day');
          // $day_wise[5]->keyBy('shift_id');
          @endphp
          
          <!-- Time Slot -->
          <div class="time-slot">
            <ul class="clearfix">
              @foreach($day as $date => $val)
              <li>
                @if(empty($day_wise[$val]))
                
                <div class="py-5 text-center" style=" font-size: 16px; border:1px solid darkgrey; border-radius: 10px;"><i class="far fa-times-circle"></i> No Opd</div>
                
                @continue
                @endif
                @php
                $shift_data = $day_wise[$val]->keyBy('shift_id');
                @endphp
                @foreach($shifts as $shift_val)
                @if(empty($shift_data[$shift_val]))
                <div class="timing-2" style=" opacity: 0.4; color: black;" ><i class="fas fa-times"></i> No Shift</div>
                @continue
                @endif
                <a class="timing"  onclick="choose_time( '{{$date}}' , '{{$shift_val}}', '{{$val}}', this );" style="border:1px solid darkgrey;">
                  <span>{{$shift_data[$shift_val]['start_time']}}</span> to <span> {{$shift_data[$shift_val]['end_time']}}</span>
                </a>
                @endforeach
                {{-- <a class="timing" href="#">
                  <span>10:00</span> <span>AM</span>
                </a>
                <a class="timing" href="#">
                  <span>11:00</span> <span>AM</span>
                </a> --}}
              </li>
              @endforeach
              
            </ul>
          </div>
          <!-- /Time Slot -->
          
        </div>
      </div>
    </div>
    <!-- /Schedule Content -->
    
  </div>
  <!-- /Schedule Widget -->
  
  <!-- Submit Section -->
  {{-- {{route('appointment.book',12)}} --}}
  {!! Form::open(['route'=>['appointment.book', 'account'=>'medic-aid']]) !!}
  <div style="display:none; ">
    <input type="text" id="day" name="day">
    <input type="text" id="date" name="date">
    <input type="text" id="shift" name="shift_id">
    <input type="text" id="opd" value='{{$opd->id}}' name="opd_id">
  </div>
  <div class="submit-section proceed-btn text-right">
    <button id="proceed" type="submit" class="btn btn-default submit-btn" disabled="true">Book Now</button>
  </div>
  {!! Form::close() !!}
  
</div>
</div>
</div>
</div>
@endif
@endsection