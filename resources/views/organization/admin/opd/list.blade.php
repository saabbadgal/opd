@extends('organization.admin.admin_layout')
@section('content')
@php
    $days = [1=>"Monday", 2=>"Tuesday",3=>"Wednesday",4=>"Thursday", 5=>"Friday",6=>"Saturday", 7=>"Sunday"];

    for($x = 0; $x <= 24; $x++) {
  		 $value = str_pad($x,2,0,STR_PAD_LEFT);
  		$hours[$value] = $value;
		}

		$mins = $hours;
		for($i=25; $i<60; $i++){
			$mins[$i]=$i;
		}
@endphp


	<div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">OPD  {{ date('d-m-Y') }}</h3>  </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">OPD</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
@if(Session('new_error')|| $errors->any())

   <form id="create_opd"  class="show form-horizontal" method="POST" action="{{ route('opd.save', ['account'=>Session::get('org_id')] ) }}">

@endif

   <form id="create_opd"  class="collapse form-horizontal" method="POST" action="{{ route('opd.save', ['account'=>Session::get('org_id')] ) }}">
    	{{-- @include('organization.opd.create') --}}
	</form>


		<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h2 class="fw-3 d-inline"> OPD LIST </h2> <button class="ml-3 btn btn-info fw-3 float-right" data-toggle="collapse" data-target="#create_opd" aria-expanded="false" aria-controls="create_opd">Create New Opd </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" display nowrap table table-hover table-striped table-bordered table-sm fw-3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               
                                                <th>Doctor</th>
                                                <th>Shifts</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($data as $opd_key => $opd_val)
                                        	<tr>
                                               
                                                <td>  {{ $opd_val->doctor_detail->name }}</td>
                                                <td><span> <?php 
                                                
                                                if(is_array($shift_ary = json_decode($opd_val['shifts'], true))) {
                                                	foreach ($shift_ary as $skey => $svalue) {
                                                		echo substr($shift[$svalue], 0,3).'&nbsp;';
                                                	}
                                                	//echo implode(', ', $shift_ary);
                                                }
                                                  ?> </span></td>
                                                <td> 
                                                	@if($opd_val['status'])
 														<span class="badge badge-success">Enable</span>
 													@else
 														<span class="badge badge-danger">Disable </span>
 													@endif
                                                </td>
                                                <td>
                                                	<a href="{{route('opd.edit',['id'=>$opd_val['id']])}}" class="btn-sm btn-primary">Edit</a>
                                                @if($opd_val['status'])
                                                    <a class="btn-sm btn-danger" href="{{ route('org.opd.delete',['id'=>$opd_val['id'] ]) }}"> Disable</a>
                                                @else
                                                    <a class="btn-sm btn-success" href="{{ route('org.opd.delete',['id'=>$opd_val['id'] ]) }}"> Enable</a>
                                                @endif
                                                </td>
                                            </tr>
                                        	@endforeach
                                           
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
	


    </div>

    <script type="text/javascript">
        // jQuery(document).on("click", ".mega-dropdown", function(i) {

    	// jQuery(document).on('click','.shift', function(){
    	// 	alert(123);
    	// });


    </script>
@endsection