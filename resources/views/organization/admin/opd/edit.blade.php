@extends('organization::layouts.ela')

@section('content')

@php
    $days = [1=>"Monday", 2=>"Tuesday",3=>"Wednesday",4=>"Thursday", 5=>"Friday",6=>"Saturday", 7=>"Sunday"];
    for($x = 0; $x < 24; $x++) {
         $value = str_pad($x,2,0,STR_PAD_LEFT);
        $hours[$value] = $value;
      }
      $min['00']='00';
        for($i=1; $i<6; $i++){
           $min_val = $i * 10;
          $min[$min_val] = $min_val;
        }
      
@endphp
<div class="container-fluid">
     <form class="form-horizontal" method="POST" action="{{ route('opd.update') }}">
      <input type="hidden" name="opd_id" value="{{ $id }}">
  <div class="card">
    @if(Session('new_error'))
     <div class="alert alert-danger">
        <ul>
            <li>{{  Session('new_error')}}</li>
        </ul>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h2 class="fw-3">OPD EDIT FORM</h2>
    {{-- <div class="form-group row mt-5">
        <label class="col-2"> Title </label>
        <div class="col-9">
            <input type="text" class="form-control" name="name" value="{{ $opd->name }}">
        </div>
     </div>
 --}}
    <div class="form-group row">
        <label class="col-2"> Docter </label>
        <div class="col-9">
          {{ Form::select('dr_id', $doctor, $opd->dr_id , ['class'=>'form-control', 'placeholder'=>'Select Doctor']) }}
        </div>
    </div>
    <div id="accordionExample" class="accordion col-lg-12 fw-3">
        {{ csrf_field() }}  
      <div class="card-title">
            <h2 class="fw-3 mt-3 mb-3 row">OPD SCHEDULE </h2>
      </div>
      <div class="card-body">
           <div class="row  col-12 border-bottom p-2">
              <div class="col-2 p-0 ">Day </div> 
              <div class="col-10 p-0">Shift's </div>
           </div>

         @foreach($days as $day_key => $day_val)
           <div class="row  col-12 border-bottom p-2">
              <div class="col-2 p-0 "> 
                @if($opd->opd_detail->contains('day', $day_key))
                  <input name="day[]" class="mr-2 days" id="{{ $day_key }}" value="{{ $day_key }}" type="checkbox" checked="checked">{{$day_val }}
                @else
                  <input name="day[]" class="mr-2 days" id="{{ $day_key }}" value="{{ $day_key }}" type="checkbox" >{{$day_val }} 
                @endif
              </div> 
              
              @php 
                 $get_shift =  null;
              @endphp

              @if($opd->opd_detail->contains('day', $day_key))
                @php 
                 $get_shift =  $opd->opd_detail->where('day', $day_key);
                @endphp
                <div id="shift_accord_{{$day_key}}" class="col-10 p-0 show {{ $day_key }}">
              @else
                <div id="shift_accord_{{$day_key}}" class="col-10 p-0 collapse {{ $day_key }}">
              @endif

              @foreach(@$shift as $key=>$val)
                    @if(!empty($get_shift) && $get_shift->contains('shift_id', $key) ) 
                    <div class="col-12 float-left">
                      <input name="day_shift[{{ $day_key }}][]" value="{{ $key }}" type="checkbox"  id="{{ $key }}{{ $day_key }}"   class="shift mr-2"  checked="checked">
                    @else
                      <div class="col-4 float-left">

                    <input name="day_shift[{{ $day_key }}][]" value="{{ $key }}" type="checkbox"   id="{{ $key }}{{ $day_key }}"   class="shift mr-2"  >

                    @endif
                    @php
                     $get_shift_data =null;
                    @endphp
                    <label class="text-left" for="{{ $key }}{{ $day_key }}">{{ $val }}</label>
                    @if(!empty($get_shift) && $get_shift->contains('shift_id', $key) ) 

                    @php
                    $get_shift_data = $get_shift->where('shift_id', $key)->first();
                     //$get_shift_data = $get_shift->where('shift_id' $key);
                    @endphp
                    <div id="" class="col-12 show {{ $key }}{{ $day_key }}">
                      <div class="row">
                          <div class="col  p-1">
                              <label class="fw-3"> Start Time </label><br>
                              {{   Form::select($day_key.'['.$key.'][start_hour]' , $hours,substr($get_shift_data->start_time, 0,2),['placeholder'=>"HH", 'class'=>'small-font cal_per_pat_time' , 'typo'=>'sh_', 'id'=>"sh_".$day_key."".$key ]) }}

                              {{   Form::select($day_key.'['.$key.'][start_min]',$min, substr($get_shift_data->start_time, 3,2),['placeholder'=>'mm', 'class'=>'small-font cal_per_pat_time', 'typo'=>'sm_', 'id'=>"sm_".$day_key."".$key ]) }}
                          </div>
                          <div class="col p-1 ">
                              <label class="fw-3"> End Time</label><br>
                           {{   Form::select($day_key.'['.$key.'][end_hour]',$hours,substr($get_shift_data->end_time, 0,2),['placeholder'=>"HH", 'class'=>'small-font cal_per_pat_time', 'typo'=>"eh_" , 'id'=>"eh_$day_key$key"  ]) }}
                              {{   Form::select($day_key.'['.$key.'][end_min]',$min, substr($get_shift_data->end_time, 3,2),['placeholder'=>'mm', 'class'=>'small-font cal_per_pat_time', 'typo'=>'em_', 'id'=>"em_$day_key$key"]) }}
                          </div><div class="col p-1">
                              <label class="fw-3"> Max Patient Attend</label>
                            <input  name="{{$day_key.'['.$key.'][average_patient]'}}" type="text" typo="mp_" id="mp_{{$day_key }}{{ $key }}" class="form-control cal_per_pat_time" placeholder="Patient attened" value="{{ $get_shift_data->average_patient }}">
                          </div><div class="col p-1">
                              <label class="fw-3">Per Patient Time</label>
                            <input name="{{$day_key.'['.$key.'][per_patient_time]'}}" id="pt_{{ $day_key }}{{ $key }}" type="text" class="form-control" placeholder="Per Patient time " value="{{ $get_shift_data->per_patient_time }}">
                          </div>
                        </div>
                     @else
                      <div class="col-12 collapse {{ $key }}{{ $day_key }}">
                        <div class="row">
                          <div class="col p-1">
                              <label class="fw-3"> Start Time</label><br>
                              {{   Form::select($day_key.'['.$key.'][start_hour]' , $hours,null,['placeholder'=>"HH", 'class'=>'small-font cal_per_pat_time', 'typo'=>"sh_", 'id'=>"sh_$day_key$key"]) }}

                              {{   Form::select($day_key.'['.$key.'][start_min]',$min, null,['placeholder'=>'mm', 'class'=>'small-font cal_per_pat_time', 'typo'=>"sm_" , 'id'=>"sm_$day_key$key"]) }}
                          </div>
                          <div class="col p-1 ">
                              <label class="fw-3"> End Time</label><br>
                           {{   Form::select($day_key.'['.$key.'][end_hour]',$hours,null,['placeholder'=>"HH", 'class'=>'small-font cal_per_pat_time', 'typo'=>"eh_" , 'id'=>"eh_$day_key$key"]) }}
                              {{   Form::select($day_key.'['.$key.'][end_min]',$min, null,['placeholder'=>'mm', 'class'=>'small-font cal_per_pat_time', 'typo'=>'em_', 'id'=>"em_$day_key$key"]) }}
                          </div><div class="col p-1">
                            <label class="fw-3">Max Patient Attend</label>
                            <input id="mp_{{ $day_key }}{{ $key }}" typo="mp_" name="{{$day_key.'['.$key.'][average_patient]'}}" type="text" class="form-control cal_per_pat_time" placeholder="Patient attened">
                          </div><div class="col p-1">
                              <label class="fw-3">Per Patient Time</label>
                            <input id="pt_{{ $day_key }}{{$key }}" name="{{$day_key.'['.$key.'][per_patient_time]'}}" type="text" class="form-control" placeholder="Per Patient time">
                          </div>
                        </div>
                     @endif
                        
                      
                  </div>
                   </div>
          @endforeach
              </div>
           </div>
           
         @endforeach
      </div>

              <div class="col-4 mt-4 p-0">
                    <input class="btn btn-outline-dark col-6 h-100" type="submit" value="Save">
                </div>
        </div>

    </div>

 </div>
</div>
</form>
</div>

    @endsection