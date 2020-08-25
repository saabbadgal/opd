@extends('layouts.materialize')
@section('content')
<style type="text/css">
</style>
<div class="container text-center" style="background-color: #f9f9f9">
  <div class="row text-center">
    <div class="col-md-12">
      <h1 id="heading-" class="pt-5 font-weight-bold" style="font-weight: 600 !important; color: #272b41 !important;">{{-- <i class="fas fa-user-md teal-text"></i> --}} Search Doctor, <span class="teal-text">  Make Online Appointment</span></h1>
      <h4 id="heading-" class="font-weight-bolder">Discover the best doctors, clinic & hospital the city nearest to you.</h4>
      <h4 class="teal-text pt-5 font-weight-bolder"> <i class="fas fa-city fs-l15 "></i> Choose your city</h4>
    </div>
    <div class="col-lg-12 mt-2">
      {!! Form::open(['route'=>'search','id'=>'search_form','class'=>'left-align']) !!}
      @php
      
      @endphp
      @foreach($city as $key => $city)
      <button class="btn btn-default btn-rounded" type="submit" name="city" value="{{$city}}">{{$city}} </button>
      @endforeach
      {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="container mt-5 pt-5">

<div class="row">
  <div class="col-lg-6">
    <img class=" img-fluid" src="{{asset(env('loc_path').'front/home2.png')  }}">
  </div>
  <div class="col-lg-6 pt-5">
     <h5 class="teal-text font-weight-light ">Find Nearest Medical Facility</h5>
     <h6 class="teal white-text p-1 " style="font-size: 36px; font-weight: 400;"> Our Functionalities</h3>
      <p class="font-weight-normal"> Lorem ipsum dolor amet consectetur adipisicing elitiuim sete eiusmod tempor incididunt ut labore etnalom dolore magn aiqua udiminimate veniam quis norud exercitation ullamco.</h6>
    <ul style="list-style-type: none;" class="pl-0">
        <li><i class="far fa-check-square teal-text pr-2 h3 pb-2" aria-hidden="true"></i><span class="h4 font-weight-normal"> Find the best doctor to cure particular problem</span></li>
        <li><i class="far fa-check-square teal-text pr-2 h3 pb-2" aria-hidden="true"></i><span class="h4 font-weight-normal">Easy steps to make online doctor appointment</span></li>
        <li><i class="far fa-check-square teal-text pr-2 h3 pb-2" aria-hidden="true"></i><span class="h4 font-weight-normal">Track Appointment from home</span></li>
        <li><i class="far fa-check-square teal-text pr-2 h3 pb-2" aria-hidden="true"></i><span class="h4 font-weight-normal">Provide advance information of rescheduling</span></li>
        <li><i class="far fa-check-square teal-text pr-2 h3 pb-2" aria-hidden="true"></i><span class="h4 font-weight-normal">Information delay and postpone of doctor schedule</span></li>
        <li><i class="far fa-check-square teal-text pr-2 h3 pb-2" aria-hidden="true"></i><span class="h4 font-weight-normal">Save lot of time of patients</span></li>






    </ul>
  </div>
</div>



</div>








<div class="container mt-5 pt-5">
  
  <!--Section: Content-->
  <section class="white-text">
    <div class="row">
      
      <div class="col-12">
        <div class="card z-depth-2">
          <div class="card-body p-0">
            <div class="row mx-0">
              
              <div class="col-md-6 no-padding   ">
                <img class=" img-fluid" src="{{asset(env('loc_path').'front/home.jpg')  }}">
              </div>
              <div class="col-md-6 teal  py-5 px-md-5">
                <h3 class=" ml-3 mb-4 pb-2 white-text">Our Functionalities</h3>
                <ul class="fa-ul mb-0">
                  <li class="mb-2"><span class="fa-li "><i class="fas fa-check"></i></span>Find the best doctor to cure particular problem</li>
                  <li class="mb-2"><span class="fa-li"><i class="fas fa-check"></i></span>Easy steps to make online doctor appointment</li>
                  <li class="mb-2"><span class="fa-li"><i class="fas fa-check"></i></span>Track Appointment from home</li>
                  <li class="mb-2"><span class="fa-li"><i class="fas fa-check"></i></span>Provide advance information of rescheduling</li>
                  <li class="mb-2"><span class="fa-li"><i class="fas fa-check"></i></span>Information delay and postpone of doctor schedule  </li>
                  <li class="mb-2"><span class="fa-li"><i class="fas fa-check"></i></span> Save lot of time of patients</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="row bg">
  <img class="col s12 bg" src="{{asset(env('loc_path').'front/bg.png')  }}">
</div>
@endsection