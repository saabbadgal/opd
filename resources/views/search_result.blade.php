 

@if(empty($data))
 <h3 class="fw100 col  offset-l1"> No Result Found </h3>

@else

<div class="left-align">
 {{ $data->links() }} 
</div>
 <div>
    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
 </div>

@foreach($data as $key => $val)
@php
  $val->id;
  $exp_yr =0;
  if(!empty($val->start_experience)){
    $from = new DateTime($val->start_experience);
    $to   = new DateTime('today');
    $exp_yr = $from->diff($to)->y;
  }
@endphp
 @if($loop->iteration % 2==0)
    <div class=" white p2   mb1">
@else
  <div class=" white p2   mb1">
  @endif
      <div class="row mc0">
        @if(!empty($val->profile_pic))
          <img src="{{asset(env('loc_path').'img/doctor/')}}/{{$val->profile_pic  }}" alt="" class="border-grey col h200 l2 p1 responsive-img">
        @else
          <img src="{{ asset(env('loc_path').'front/image/dummy-dr.jpeg') }}" alt="" class="col s5 l2 circle responsive-img">
        @endif
         <a href="{{ route('dr.profile',['id'=>$val->id]) }}"> <h5 class="fw100 show-on-small hide-on-large-only"> {{ $val->title }} {{ $val->name }}</h5>
          </a>

           <p class="mc0 fw100 fs13 mt1 show-on-small hide-on-large-only">{{ $val->education }} {{ $val->specialist }} </p>
          @if(!empty($exp_yr))
            <p class="mc0 fw100 fs13 show-on-small hide-on-large-only"> {{ $exp_yr }} Year Experience</p>
          @endif
          <p class="mc0 fw100 fs13 show-on-small hide-on-large-only"> {{ $val->available_in_city }}</p>


        <div class="col l5 s12 own-text"> 
          <a class="own-text text-darken-4" href="{{ route('dr.profile',['id'=>$val->id]) }}"> 
          <h5 class="mc0  hide-on-med-and-down show-on-large"> {{ $val->title }} {{ $val->name }} </h5>
        </a>
          <p class="mc0  fs13 mt1 hide-on-med-and-down show-on-large">{{ $val->education }} {{ $val->specialist }} </p>
          @if(!empty($exp_yr))
            <p class="mc0  fs13 hide-on-med-and-down show-on-large"> {{ $exp_yr }} Year Experience</p>
          @endif
          <p class="mc0  fs13 hide-on-med-and-down show-on-large"> {{ $val->available_in_city }}</p>
          <p class="mc0  fs13 col l12 s12 p0">
            @if(strlen($val->description)>190)
              <span class="less_text" > {{ substr($val->description , 0,190)}} ...<a class="read cursor own-text fw600" >Read More</a>
              </span>
              <span class="hide full_text"> {{$val->description}} <a class="read cursor own-text fw600">Less</a></span>
            @else
             {{$val->description}}
            @endif
          </p>
        </div>
        <div class="col l5 s12 own-text p0">
          <h6 class="fw200 mc0 ml2"> Associate </h6>
          @foreach ($val->dr_org as $key => $value) 

          @php
            $ckeck_opd = Schedule::check_opd($value->org_detail->id, $value->user_id);
          @endphp
            <div class="card blue lighten-4">
              <div class="card-content"> 
                <span class="card-title activator f1">{{ $value->org_detail->name }}<i class="material-icons right">more_vert</i></span>
                <p>
              </div>
              <div id="opd_schedule{{ $value->org_detail->id }}{{$value->user_id }}" class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{  $value->org_detail->name }} Timings<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
              </div>
            </div>
            @php
                  echo '<script type="text/javascript"> get_opd_schedule('.$value->org_detail->id.','. $value->user_id.') </script>';
            @endphp

            <span class="mt1 col l12 s12 p0">
              <a id="{{ $value->org_detail->id }}{{$value->user_id }}" class="opd_schedule tooltipped" data-position="left" data-tooltip="View Opd Timing">
                <i class="material-icons set_pos_ico  icon_{{ $value->org_detail->id }}{{$value->user_id }}">more_vert</i>
              </a> 

               <a class="own-text fw700" href="{{ env('START_URL') }}{{ $value->org_detail->sub_domain }}.{{ env('MAIN_URL') }}"> {{  $value->org_detail->name }}  </a>



@if($ckeck_opd)
                <a id="{{ $value->org_detail->id }}{{$value->user_id }}" href="#opd_schedule{{ $value->org_detail->id }}{{$value->user_id }}" ic="0" class="opd_schedule modal-trigger blue-text text-darken-4 fs12 cursor" >  
               <i class="material-icons set_pos_ico  icon_{{ $value->org_detail->id }}{{$value->user_id }}">chevron_right </i>View Timing </a>

              <a  class="blue-text text-darken-4 fs12  link_{{ $value->org_detail->id }}{{$value->user_id }}" href=""> <i class=" material-icons set_pos_ico" > access_alarms </i> Book Appointment</a> 
              <a data-position="top" data-tooltip="Book Appointment" class="booking-wh  btn-floating btn-small blue pulse  fw200 tooltipped link_{{ $value->org_detail->id }}{{$value->user_id }}" href=""> <i class="boking-ico-pos material-icons" >access_alarms</i></a>   

              <blink> <span  class="green-text text-darken-2  fs11 " id="avail{{ $value->org_detail->id }}{{$value->user_id }}"> 
              </span></blink>
             
            </span> 
              <div id="opd_schedule{{ $value->org_detail->id }}{{$value->user_id }}" class="modal black-text modal-fixed-footer"> 

                
                <p class="ml5 fw100"> <i class="material-icons set_pos_ico">location_on</i>{{  $value->org_detail->address }} {{  $value->org_detail->city }} </p>
               </div>
                @php
                  echo '<script type="text/javascript"> get_opd_schedule('.$value->org_detail->id.','. $value->user_id.') </script>'; 


                  echo '<script type="text/javascript"> $(".modal").modal(); </script>';
                @endphp
@endif

            @endforeach 
        </div>


      </div>
    </div> --}}


 

 