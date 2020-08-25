@extends('layouts.materialize')
@section('content')
 
@php
// dump($doctor);
// dump($doctor->org_doctor_opd);
// dump($doctor->org_doctor_opd->opd_detail)
@endphp
<div class="content">
  <div class="container">
    <!-- Doctor Widget -->
    <div class="card">
      <div class="card-body">
        <div class="doctor-widget">
          <div class="doc-info-left">
            <div class="doctor-img">
              <img src="{{ asset(env('loc_path').'front/3.png') }}" class="img-fluid" alt="User Image">
            </div>
            <div class="doc-info-cont">
               

              <span class="doc-name">{{ $doctor->title}} {{ $doctor->name}}</span><span class="speciality doc-department"> ( {{ $doctor->education }} )</span>
              
              <p class="doc-department">{{ $doctor->specialist}}</p>
              <div class="rating">
                <i class="fas fa-star filled"></i>
                <i class="fas fa-star filled"></i>
                <i class="fas fa-star filled"></i>
                <i class="fas fa-star filled"></i>
                <i class="fas fa-star filled"></i>
                <span class="d-inline-block average-rating">(17)</span>
              </div>
              <div class="clinic-details mb-0">
                <p class="doc-location mb-1"><i class="fas fa-map-marker-alt"> </i> {{ $doctor->address}} </p>
                <p class="doc-location mb-1"><i class="far fa-envelope"> </i> {{ $doctor->email}} </p>
                <p class="doc-location mb-1"><i class="fas fa-phone"> </i> {{ $doctor->phone}} </p>
              </div>
              
            <div class="clinic-bookin">
              <a class=" btn btn-info btn-sm m-0 mt-2" id="" href="" data-toggle="modal" data-target="#exampleModalCenter{{$doctor->org_doctor_opd->id}}">Book Appointment</a>
              </div>
            </div>
          </div>
          <div class="doc-info-right">
            
           
           <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{{$doctor->description}} </div>
            
          </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          
         
          
        </div>
        <!-- /Doctor Widget -->
      </div>
    </div>
</div>
    @php
    $opd_detail = $doctor->org_doctor_opd->opd_detail->groupBy('day');
    
    $shift_data = json_decode($doctor->org_doctor_opd->shifts, true);
    
    foreach($opd_detail as $day => $shift) {
    
    $shift_detail =  $shift->keyBy('shift_id');
    
    foreach ($shift_data as $key => $value) {
    
    if(!empty($shift_detail[$value])){
    $shift_detail[$value]->start_time;
    }else{
       
    }
    }
    }
    $opd_detail->toArray();
    @endphp
    {{-- @endforeach --}}
    <div id="exampleModalCenter{{$doctor->org_doctor_opd->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-gtm-vis-first-on-screen-2340190_1302="27688" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1" aria-hidden="true" style="display:none;" class="modal " >
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            
          </div>
          <div class="modal-body">
            
            <div class="table-responsive">
              <table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead>
                  <tr role="row">
                    
                    
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 251px;">Day</th>
                    @foreach($shift_data as $key => $value)
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 251px;">{{$shifts[$value]}} </th>
                    @endforeach
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($opd_detail as $day => $shift)
                  @php
                  $shift_detail =  $shift->keyBy('shift_id');
                  @endphp
                  <tr role="row" class="odd">
                    <td class="sorting_1">{{ $days[$day]}}   </td>
                    @foreach($shift_data  as $sk => $sv)
                    @if(!empty($shift_detail[$sv]))
                    
                    <td>{{date('h:i', strtotime($shift_detail[$sv]['start_time']))}} To  {{ $shift_detail[$sv]['end_time']}}</td>
                    @else
                    <td>No Opd</td>
                    @endif
                    @endforeach
                    
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    @endsection