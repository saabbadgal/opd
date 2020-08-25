@extends('layouts.materialize')
@section('content')
<style type="text/css">
</style>

{{-- Search Bar --}}

<div class="container justify-content-center ">
  <div class="row mt-5">
    <div class="col-lg-12 d-flex justify-content-center">
      <div class="search-box">
        <form action="">
          @if(!empty($city))
          <div class="form-group search-location ">
            <input type="text" class="form-control" placeholder="Search Location" value="{{ $city }}">
            <span class="form-text">Based on your Location</span>
          </div>
          @else
          <div class="form-group search-location">
            <input type="text" class="form-control" placeholder="Search Location" value="">
            <span class="form-text">Based on your Location</span>
          </div>
          @endif

          <div class="form-group search-info">
            <input type="text" class="form-control" placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc">
            <span class="form-text">Ex : Hospital or Clinics etc</span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

{{-- End Search Bar --}}

{{-- OPD Doctors List --}}

<div class="container my-5">
  <section class="team-section text-center dark-grey-text">
    <div class="row text-center text-md-left">
    
    @foreach ($doc as $key => $value)
    @if(!$value->doctor_opd()->exists())
    @continue
    @endif
    
    <div class="col-lg-6 col-md-12 mb-lg-0 d-md-flex justify-content-between">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 px-5 px-md-0">
              <div class="doc-img px-5 px-md-0">
                <a href="doctor-profile.html">
                  <img class="img-thumbnail" alt="User Image" src="https://picsum.photos/300/300/{{-- {{asset(env('loc_path').'img/doctor/')}}/{{$value->profile_pic  }} --}}">
                </a>
              </div>
            </div>
            <div class="col-lg-9">
              <h3 class="title mt-2 mt-sm-0">
              <a class="" href="{{-- {{route('doctor.profile', ['id' => $value->id]) }}  --}}">{{ $value->title }}. {{ $value->name }}</a>
              <span class="speciality">( {{ $value->education }} )</span>
              </h3>
              <h5 class="doc-department">{{ $value->specialist }}</h5>
              <div class="rating">
                <i class="fas fa-star filled"></i>
                <i class="fas fa-star filled"></i>
                <i class="fas fa-star filled"></i>
                <i class="fas fa-star filled"></i>
                <i class="fas fa-star filled"></i>
                <span class="d-inline-block average-rating">(17)</span>
              </div>
<ul class="available-info">

@foreach($value->doctor_opd as  $opd_val)
   
    <div>
    <a href="{{ env('START_URL') }}{{ $opd_val->org->sub_domain }}.{{ env('MAIN_URL')}} " class="text-muted h6 font-weight-normal">
      <i class="far fa-hospital"></i>{{$opd_val->org->name }}</a>&nbsp;
      <a class="teal-text" id="" href="{{$opd_val->id}}" data-toggle="modal" data-target="#exampleModalCenter{{$opd_val->id}}"><i class="far fa-clock"> </i> Timing</a>&nbsp;
      <a class="teal-text" href="{{ env('START_URL') }}{{ $opd_val->org->sub_domain }}.{{ env('MAIN_URL')}}/appointment/{{$opd_val->id}}"><i class="far fa-calendar-check"> </i> Book</a>
    </div>
      
    <div id="exampleModalCenter{{$opd_val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"data-gtm-vis-first-on-screen-2340190_1302="27688" data-gtm-vis-total-visible-time-2340190_1302="100"data-gtm-vis-has-fired-2340190_1302="1" aria-hidden="true" style="display: none;" class="modal">
    <div class="modal-dialog modal-dialog-centered modal-fluid" role="document">
      <div class="modal-content" style="background-color: rgb(255,255,255)">
        <div class="container">

    <div class="modal-header" style="border:none;">
    <h5 class="modal-titl font-weight-normal"><i class="far fa-hospital teal-text"></i> {{$opd_val->org->name}}, Location: {{$opd_val->org->address}} </h5>
       
    </div>
  </div>
   @php
      if(!empty($opd_val->shifts)){
          $shifts = json_decode($opd_val->shifts);
          $shift_name = [1=>'Morning','Afternoon','Evening'];
          }
      @endphp
    <div class="container">
   <div class="modal-body">

      <div class="card booking-schedule schedule-widget border-teal mb-0" style="border:none;"> 
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
            $day_wise = $opd_val->opd_detail->groupBy('day');
          @endphp

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

      <a class="timing" onclick="choose_time( '{{$date}}' , '{{$shift_val}}', '{{$val}}', this );" style="border:1px solid darkgrey;">
        <span>{{$shift_data[$shift_val]['start_time']}}</span> - <span> {{$shift_data[$shift_val]['end_time']}}</span>
      </a>
        @endforeach

      </li>
        @endforeach
        
      </ul>
      </div>
    </div>
   </div>
  </div> 
</div>

                @php
                                          
                $opd_detail = $opd_val->opd_detail->groupBy('day');

                $shift_data = json_decode($opd_val->shifts, true);
                @endphp
                          
                          
  
      </div>
    </div>
    <div class="container">
      <div class="modal-footer pt-0">
        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Close</button>
        <button id="" type="submit" class="btn btn-default submit-btn waves-effect waves-light"><a  href="{{ env('START_URL') }}{{ $opd_val->org->sub_domain }}.{{ env('MAIN_URL')}}/appointment/{{$opd_val->id}}" style="color: white; ">Book Now</a></button>
      </div>
      </div>
    </div>
  </div>
  </div>

            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

      @endforeach

  </div>
</section>
</div>
@endsection