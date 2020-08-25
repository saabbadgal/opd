@extends('layouts.materialize')
@section('content')
<div class="car my-3 text-center">
	<div class="section-header text-center">
		<h3 class="h1 mb-0">{{-- Welcome To --}} <span class="text-blue font-weight-normal"> {{ $data->name }} </span></h3>
		<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	</div>
</div>
<div class="section-header text-center">
	
	
</div>
<div class="container   ">
	<section class="mb-5">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="section-header mb-2">
					<h2>Book Our Doctor</h2>
					<p class="">Lorem Ipsum is simply dummy text </p>
				</div>
				<div class="about-content">
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
					<p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>
					
				</div>
			</div>
			<div class="col-lg-6 col-md-12 mb-4">
				<!--Panel-->
				<div class="view overlay z-depth-1-half">
					<img src="https://mdbootstrap.com/img/Photos/Others/img%20(29).jpg" class="img-fluid"
					alt="">
					
				</div>
				<!--/.Panel-->
			</div>
		</div>
	</section>
	
</div>
{{-- <section class="section section-specialities">
	<div class="container-fluid">
		<div class="section-header text-center">
			<h2>Clinic and Specialities</h2>
			<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>
	</div>
</section> --}}
<div class="row justify-content-center">
	<div class="col-lg- ">
		<div class="back-blue">
			<h3 class="text-white p-2 px-5 font-weight-normal">Our Doctors</h3>
		</div>
	</div>
</div>
<div class="container my-5">
	
	
	<section class="team-section text-center dark-grey-text">
		
		<div class="row text-center text-md-left">
			@foreach($data->org_dr as $key =>$val)
			<div class="col-lg-6 col-md-12 mb-lg-0 d-md-flex justify-content-between">
				
				<div class="card">
					
					<div class="card-body">
						<div class="row">
							<div class="col-lg-3 px-5 px-md-0">
								<div class="doc-img px-5 px-md-0">
									<a href="/doctor-profile/{{$val->doc->id}}">
										<img class="img-thumbnail" alt="User Image" src="https://picsum.photos/300/300/{{-- {{asset(env('loc_path').'img/doctor/')}}/{{$value->profile_pic  }} --}}">
									</a>
								</div>
							</div>
							<div class="col-lg-9">
								<h3 class="title mt-2 mt-sm-0">
								<a class="" href="/doctor-profile/{{$val->doc->id}}">{{ $val->doc->title}} {{$val->doc->name}}</a>
								<span class="speciality">( {{ $val->doc->education }}   )</span></h3>
								<h5 class="doc-department">{{ $val->doc->specialist  }}</h5>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<span class="d-inline-block average-rating">(17)</span>
								</div>
								<div class="clinic-details mb-0">
									<p class="doc-location mb-0"><i class="fas fa-map-marker-alt"></i> {{ $val->doc->address }} </p>
									
								</div>
								<div>
									<button class="btn btn-secondary btn-sm m-0" href="/doctor-profile/{{$val->doc->id}}">View Profile
								 
								</button>
								<button class="btn btn-secondary btn-sm" href="/doctor-profile/{{$val->doc->id}}">Book Now
								 
								</button>
								</div>
								 
							</div>
						</div>
					</div>
				</div>
			</div>
				@endforeach
			</div>
		</div>
	</section>
</div>

@endsection