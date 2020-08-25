@php
    $days = [1=>"Monday", 2=>"Tuesday",3=>"Wednesday",4=>"Thursday", 5=>"Friday",6=>"Saturday", 7=>"Sunday"];
    for($x = 0; $x < 24; $x++) {
         $value = str_pad($x,2,0,STR_PAD_LEFT);
        $hours[$value] = $value;
        }
        

        $min['00']='00';
        for($i=1; $i<6; $i++){
         echo  $min_val = $i * 10;
          $min[$min_val] = $min_val;
        }

        // dd($min);
        
@endphp

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
<div class="card">
            <h2 class="fw-3">OPD FORM</h2>
          {{--   <div class="form-group row mt-4">
                <label class="col-2"> Title </label>
                <div class="col-9">
                    <input type="text" class="form-control" name="name"  value="{{ old('name') }}" >
                </div>
             </div> --}}

             <div class="form-group row">
                <label class="col-2"> Docter </label>
                <div class="col-9">
                    {{ Form::select('dr_id', $doctor, old('dr_id'),['class'=>'form-control', 'placeholder'=>'Select Doctor'] ) }}
                    {{-- <select class="form-control"  name="dr_id" >
                        <option value=""> Select Doctor</option>
                        @foreach($doctor as $dr_key => $dr_val)
                            <option value="{{$dr_key}}">{{ $dr_val }} </option>
                        @endforeach
                    </select> --}}
                </div>
             </div>

              <div class="form-group row mt-4">
                <label class="col-2"> Additional Information </label>
                <div class="col-9">
                  <textarea class="form-control" name="description"  value="{{ old('name') }}"> </textarea>
                   {{--  <input type="text" class="form-control" name="description"  value="{{ old('name') }}" > --}}
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
                            <input name="day[]" class="mr-2 days" id="{{ $day_key }}"  data-toggle="collapse"  aria-controls="shift_accord_{{$day_key}}" value="{{ $day_key }}" type="checkbox" >{{$day_val }} 
                        </div> 
                        <div id="shift_accord_{{$day_key}}" class="row col-10 p-0 collapse {{ $day_key }}">
                            @foreach(@$shift as $key=>$val)
                                            <!-- Default inline 1-->
                                <div class="col-3 float-left">
                                  <input name="day_shift[{{ $day_key }}][]" value="{{ $key }}" type="checkbox"  class="shift mr-2" id="{{ $key }}{{ $day_key }}"
                                   >
                                  <label class=" fw-3 text-left" for="{{ $key }}{{ $day_key }}">{{ $val }}</label>
                                  

                                  <div id="" class="col-12 collapse {{ $key }}{{ $day_key }}">
                                   
                                      <div class="row">
                                        <div class="col p-1">
                                            <label class="fw-3"> Start Time</label><br>
                                            {{   Form::select($day_key.'['.$key.'][start_hour]' , $hours,null,['placeholder'=>"HH", 'class'=>'small-font cal_per_pat_time', 'typo'=>'sh_', 'id'=>"sh_$day_key$key"]) }}

                                            {{   Form::select($day_key.'['.$key.'][start_min]',$min, null,['placeholder'=>'mm', 'class'=>'small-font cal_per_pat_time', 'typo'=>'sm_' , 'id'=>"sm_$day_key$key"]) }}
                                        </div>
                                        <div class="col p-1 ">
                                            <label class="fw-3"> End Time</label><br>
                                         {{   Form::select($day_key.'['.$key.'][end_hour]',$hours,null,['placeholder'=>"HH", 'class'=>'small-font cal_per_pat_time' , 'typo'=>'eh_' , 'id'=>"eh_$day_key$key"]) }}
                                            {{   Form::select($day_key.'['.$key.'][end_min]',$min, null,['placeholder'=>'mm', 'class'=>'small-font cal_per_pat_time', 'typo'=>'em_', 'id'=>"em_$day_key$key"]) }}
                                        </div><div class="col p-1">
                                            <label class="fw-3">Max Patient Attend</label>
                                          <input  name="{{$day_key.'['.$key.'][average_patient]'}}" type="text" class="form-control cal_per_pat_time" placeholder="Patient attened" typo="mp_" id="mp_{{ $day_key }}{{ $key }}">
                                        </div><div class="col p-1">
                                            <label class="fw-3">Per Patient Time</label>
                                          <input name="{{$day_key.'['.$key.'][per_patient_time]'}}" type="text" class="form-control" placeholder="Per Patient Time" id="pt_{{$day_key}}{{$key}}">
                                        </div>
                                      </div>
                                    
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