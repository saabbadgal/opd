<div class="modal-content">
<table class=" highlight centered yellow lighten-5"> 
          <thead> 
            <tr> 
              <th class="fw600 p2 border-green ">Day</th> 
              @foreach($shift_ids as $sval) 
              <th class="fw600 p2 border-green">{{ $shifts[$sval] }}</th> 
              @endforeach 
            </tr> 
          </thead> 
          <tbody> 

             

            @foreach($opd as $key => $value) 
            <tr> 
              <td class="p2 border-green">{{ $days[$key] }} </td> 
              @php
              $shift_data = $value->keyBy('shift_id'); 
              @endphp 
              @foreach ($shift_ids as  $svalue) 
                @if(!empty($shift_data[$svalue])) 
                  <td class="fw100 fs13 p2 border-green">{{ date('h:i' ,strtotime($shift_data[$svalue]->start_time))}} To {{ date('h:i' , strtotime($shift_data[$svalue]->end_time)) }}</td> 
                @else 
                  <td class="fw100 fs13 p2 border-green" ><span class="new badge red" data-badge-caption="OFF"> </span></td> 
                @endif
              @endforeach
          </tr>
      @endforeach
  </tbody>
</table>
</div>
<div class="modal-footer">
      <a href="{{ $boking_url }}" class="modal-close waves-effect waves-green btn-flat"> <span class="new badge teal" data-badge-caption="Book Appointment"></span></a>
    </div>