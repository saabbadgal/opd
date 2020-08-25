@extends('organization/admin/dashboard/main')
@section('content')
<div class="theme-loader">
	<div class="ball-scale">
		<div class='contain'>
			<div class="ring">
				<div class="frame"></div>
			</div>
			<div class="ring">
				<div class="frame"></div>
			</div>
			<div class="ring">
				<div class="frame"></div>
			</div>
			<div class="ring">
				<div class="frame"></div>
			</div>
			<div class="ring">
				<div class="frame"></div>
			</div>
			<div class="ring">
				<div class="frame"></div>
			</div>
			<div class="ring">
				<div class="frame"></div>
			</div>
			<div class="ring">
				<div class="frame"></div>
			</div>
			<div class="ring">
				<div class="frame"></div>
			</div>
			<div class="ring">
				<div class="frame"></div>
			</div>
		</div>
	</div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
	<div class="pcoded-overlay-box"></div>
	<div class="pcoded-container navbar-wrapper">
<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
	<div class="navbar-logo">
		<a class="mobile-menu" id="mobile-collapse" href="#!">
			<i class="feather icon-menu"></i>
		</a>
		<a href="index-2.html">
			Medic-aid
			
		</a>
		<a class="mobile-options">
			<i class="feather icon-more-horizontal"></i>
		</a>
	</div>
	<div class="navbar-container container-fluid">
		<ul class="nav-left">
			<li>
				<a href="#!" onclick="javascript:toggleFullScreen()">
					<i class="feather icon-maximize full-screen"></i>
				</a>
			</li>
		</ul>
		<ul class="nav-right">
			<li class="user-profile header-notification">
				<a href="http://medic-aid.opd.com/admin/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
			</li>
		</ul>
	</div>
	
</div>
</nav>
	</div>
	
	<!-- Sidebar chat start -->
	
<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<nav class="pcoded-navbar">
	<div class="pcoded-inner-navbar main-menu">
		
<ul class="pcoded-item pcoded-left-item">
	<li class="">
		<a href="http://medic-aid.opd.com/admin/dashboard">
			<span class="pcoded-micon "><i class="fas fa-home text-custom"></i></span>
			<span class="pcoded-mtext ">Dashboard</span>
		</a>
	</li>
	<li class="">
		<a href="/">
			<span class="pcoded-micon"> <i class="fas fa-laptop text-success"></i></span>
			<span class="pcoded-mtext">Web Page</span>
		</a>
	</li>
	<li class="">
		<a href="http://medic-aid.opd.com/admin/org-web-page">
			<span class="pcoded-micon"> <i class="fas far fa-edit text-success"></i></span>
			<span class="pcoded-mtext">Customize Web Page</span>
		</a>
	</li>
	<li class="">
		<a href="http://medic-aid.opd.com/admin/doctors">
			<span class="pcoded-micon"><i class="fa fa-user-md text-primary"></i> </span>
			<span class="pcoded-mtext">Doctors</span>
		</a>
	</li>
	<li class="">
		<a href="http://medic-aid.opd.com/admin/opds">
			<span class="pcoded-micon"><i class="fab fa-medrt text-danger"></i></span>
			<span class="pcoded-mtext">Opd</span>
		</a>
	</li>
	<li class="">
		<a href="http://medic-aid.opd.com/admin/todays-opd">
			<span class="pcoded-micon"><i class="fas fa-mortar-pestle"></i></span>
			<span class="pcoded-mtext">Todays Opd</span>
		</a>
	</li>
	
	
	<li class="">
		<a href="http://medic-aid.opd.com/admin/opd-appointment/28">
			<span class="pcoded-micon"><i class="fas fa-arrow-circle-right text-custom"></i></span>
			<span class="pcoded-mtext">Dr Amandeep 2 </span>
		</a>
	</li>
</ul>
	</div>
</nav>
			
<div class="pcoded-content">
	<div class="pcoded-inner-content">
	<div class="pcoded-inner-content">
	<div class="main-body">
				<!-- Compiled and minified CSS -->
	<style type="text/css">
	.opd-detail{
	text-transform: uppercase;
	}
	</style>
<div class="main-body">
<div class="page-wrapper" style="min-height: 304px;">
									<!-- Page-header start -->
<div class="page-body">
<div class="row">
<div id="appointment" class="col-lg-12">
<div data-v-4338c7d5="">
<div data-v-4338c7d5="" class="row  mb-3">
	<div data-v-4338c7d5="" class="col-xl-3 col-sm-4">
		<div data-v-4338c7d5="" class="card text-center text-white bg-c-pink m-0">
		<div data-v-4338c7d5="" class="card-block-small ">
			<h5 data-v-4338c7d5="" class=" text-center f-16"><img data-v-4338c7d5="" src="http://medic-aid.opd.com/img/doctor/6.png" class="img-radius img-20">
			Dr. Amandeep 2 </h5>
			<h4 data-v-4338c7d5="" class="sub-title">Shift Switch</h4>
			<ul data-v-4338c7d5="">
			<li data-v-4338c7d5="">
				<input data-v-4338c7d5="" type="checkbox" class="js-small" data-switchery="true" style="display: none;"><span class="switchery switchery-small" style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;"><small style="left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
				<label data-v-4338c7d5=""> Morning</label>
			</li>
			<li data-v-4338c7d5="">
				<input data-v-4338c7d5="" type="checkbox" class="js-small" data-switchery="true" style="display: none;"><span class="switchery switchery-small" style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;"><small style="left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
				<label data-v-4338c7d5=""> Afternoon</label>
			</li>
			<li data-v-4338c7d5="">
				<input data-v-4338c7d5="" type="checkbox" class="js-small" data-switchery="true" style="display: none;"><span class="switchery switchery-small" style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;"><small style="left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
				<label data-v-4338c7d5=""> Evening</label>
			</li>
			</ul>
		</div>
		</div>
	</div>
<div data-v-4338c7d5="" class="col-xl-3 col-sm-4">
<div data-v-4338c7d5="" class="card text-white m-0 bg-c-blue">
<div data-v-4338c7d5="" class="card-block-small ">
	<h5 data-v-4338c7d5="" class="mb-1 text-center f-18"><i data-v-4338c7d5="" class="fas fa-sun"></i>Morning </h5>
	<!---->
	<!---->
	<h5 data-v-4338c7d5="" class="f-12 mb-1 text-center">   08:00 to 11:00</h5>
	<h5 data-v-4338c7d5="" class="f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Current </span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5>
	<h5 data-v-4338c7d5="" class=" f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Total</span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5>
	<h5 data-v-4338c7d5="" class=" f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Pending </span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5>
	<h5 data-v-4338c7d5="" class=" f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Done </span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5></div>
</div>
</div>
<div data-v-4338c7d5="" class="col-xl-3 col-sm-4">
<div data-v-4338c7d5="" class="card text-white m-0 bg-c-yellow">
	<div data-v-4338c7d5="" class="card-block-small ">
		<!---->
		<h5 data-v-4338c7d5="" class="mb-1 text-center f-18"><i data-v-4338c7d5="" class="fas fa-stopwatch"></i> After-noon </h5>
		<!---->
		<h5 data-v-4338c7d5="" class="f-12 mb-1 text-center">   02:00 to 04:00</h5>
		<h5 data-v-4338c7d5="" class="f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Current </span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5>
		<h5 data-v-4338c7d5="" class=" f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Total</span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5>
		<h5 data-v-4338c7d5="" class=" f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Pending </span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5>
		<h5 data-v-4338c7d5="" class=" f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Done </span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5></div>
	</div>
</div>
<div data-v-4338c7d5="" class="col-xl-3 col-sm-4">
	<div data-v-4338c7d5="" class="card text-white m-0 bg-c-green">
		<div data-v-4338c7d5="" class="card-block-small ">
			<!---->
			<!---->
			<h5 data-v-4338c7d5="" class="mb-1 text-center f-18"><i data-v-4338c7d5="" class="fas fa-clock"></i> Evening </h5>
			<h5 data-v-4338c7d5="" class="f-12 mb-1 text-center">   06:00 to 08:00</h5>
			<h5 data-v-4338c7d5="" class="f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Current </span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5>
			<h5 data-v-4338c7d5="" class=" f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Total</span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5>
			<h5 data-v-4338c7d5="" class=" f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Pending </span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5>
			<h5 data-v-4338c7d5="" class=" f-14"><span data-v-4338c7d5="" class="mr-5 float-left ml-2 mb-1">Done </span> <!----> <span data-v-4338c7d5="" class="float-right mr-2 mb-1"> 0 </span></h5></div>
		</div>
	</div>
</div>
<div data-v-4338c7d5="" class="row align-items-end mb-2">
	<div data-v-4338c7d5="" class="col-lg-12 z-depth-right-0 p-3 bg-white">
		<div data-v-4338c7d5="" class="row">
			<div data-v-4338c7d5="" class="col-3">
				<button data-v-4338c7d5="" type="button" data-toggle="modal" data-target="#newSignupAppointment" class="btn btn-info col-12">
				Signup Appointment
				</button>
			</div>
			<div data-v-4338c7d5="" class="col-3">
				<button data-v-4338c7d5="" type="button" data-toggle="modal" data-target="#existingUserAppointment" class="btn btn-success col-12">
				Existing User Appointment
				</button>
			</div>
			<div data-v-4338c7d5="" class="col-3">
				<button data-v-4338c7d5="" type="button" data-toggle="modal" data-target="#delayAppointment" class="btn btn-secondary col-12">
				Delay
				</button>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
<div data-v-4338c7d5="" id="delayAppointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="" class="modal fade bd-example-modal-lg">
<div data-v-4338c7d5="" role="document" class="modal-dialog modal-dialog-centerer modal-lg">
<div data-v-4338c7d5="" class="modal-content">
<div data-v-4338c7d5="" class="modal-header">Delay Appointment
	<button data-v-4338c7d5="" type="button" data-dismiss="modal" aria-label="Close" class="close"><span data-v-4338c7d5="" aria-hidden="true">×</span></button>
</div>
<div data-v-4338c7d5="" class="modal-body">
	<div data-v-4338c7d5="" class="col-lg-12">
		<!---->
	</div>
	<form data-v-4338c7d5="" class="form-horizontal">
		<div data-v-4338c7d5="" class="form-group row">
			<label data-v-4338c7d5="" class="col">Delay In Start</label>
			<input data-v-4338c7d5="" value="s" type="radio" checked="checked" class="form-control col">
			<label data-v-4338c7d5="" class="col">Between </label>
			<input data-v-4338c7d5="" value="b" type="radio" class="form-control col">
		</div>
		<div data-v-4338c7d5="" class="form-group">
			<label data-v-4338c7d5="">Appointment Date</label>
			<input data-v-4338c7d5="" type="text" class="form-control datepicker hasDatepicker" id="dp1583847023586">
		</div>
		<div data-v-4338c7d5="" class="form-group">
			<label data-v-4338c7d5="">Shift</label>
			<select data-v-4338c7d5="" class="form-control  ">
				<option data-v-4338c7d5="" value=""> Select Shift</option>
				<option data-v-4338c7d5="" value="1"> Morning</option>
				<!---->
				<!---->
			</select>
		</div>
		<!---->
		<!---->
		<div data-v-4338c7d5="" class="form-group">
			<label data-v-4338c7d5="">Reason</label>
			<textarea data-v-4338c7d5="" rows="6" cols="80"></textarea>
		</div>
		<div data-v-4338c7d5="" class="modal-footer">
			<button data-v-4338c7d5="" type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
			<button data-v-4338c7d5="" type="submit" class="btn btn-success">Apply</button>
		</div>
	</form>
</div>
</div>
</div>
</div>
<div data-v-4338c7d5="" id="existingUserAppointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="" class="modal fade ">
<div data-v-4338c7d5="" role="document" class="modal-dialog modal-dialog-centerer ">
<div data-v-4338c7d5="" class="modal-content">
<div data-v-4338c7d5="" class="modal-header bg-inverse">
	<h5 data-v-4338c7d5="" class="modal-title">Exististing User Appointment</h5>
	<button data-v-4338c7d5="" type="button" data-dismiss="modal" aria-label="Close" class="close"><span data-v-4338c7d5="" aria-hidden="true">×</span></button>
</div>
<div data-v-4338c7d5="" class="modal-body">
	<div data-v-4338c7d5="" class="col-lg-12">
		<!---->
	</div>
	<form data-v-4338c7d5="" class="form-horizontal m-3">
		<div data-v-4338c7d5="" class="form-group row">
			<label data-v-4338c7d5="" for="example-text-input" class="col-3 col-form-label" style="font-size: 14px;"> Type </label>
			<div data-v-4338c7d5="" class="col-7 p-0">
				<input data-v-4338c7d5="" id="enormal" value="n" type="radio" checked="checked">
				<label data-v-4338c7d5="" class="col-3" style="font-size: 14px;">Normal</label>
				<input data-v-4338c7d5="" id="eemergency" type="radio" value="e" class="mr-3">
				<label data-v-4338c7d5="" style="font-size: 14px;">Emergency</label>
			</div>
		</div>
		<!---->
		<div data-v-4338c7d5="" class="form-group row">
			<label data-v-4338c7d5="" class="col-3 col-form-label" style="font-size: 14px;">User Name</label>
			<div data-v-4338c7d5="" class="col-sm-8">
				<input data-v-4338c7d5="" id="user_name" name="user_name" type="text" class="form-control">
			</div>
		</div>
		<input data-v-4338c7d5="" type="hidden" value="2020-03-10">
		<div data-v-4338c7d5="" class="form-group row">
			<label data-v-4338c7d5="" class="col-3 col-form-label" style="font-size: 14px;">Shift </label>
			<div data-v-4338c7d5="" class="col-8">
				<select data-v-4338c7d5="" class="form-control  ">
					<option data-v-4338c7d5="" value=""> Select Shift</option>
					<option data-v-4338c7d5="" value="1"> Morning</option>
					<option data-v-4338c7d5="" value="2"> Afternoon</option>
					<option data-v-4338c7d5="" value="3"> Evening</option>
				</select>
			</div>
		</div>
		<div data-v-4338c7d5="" class="modal-footer">
			<button data-v-4338c7d5="" type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
			<button data-v-4338c7d5="" type="submit" class="btn btn-success">1 Make Appointment</button>
		</div>
	</form>
</div>
</div>
</div>
</div>
<div data-v-4338c7d5="" id="newSignupAppointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" class="modal fade ">
<div data-v-4338c7d5="" role="document" class="modal-dialog modal-dialog-centered ">
<div data-v-4338c7d5="" class="modal-content">
<div data-v-4338c7d5="" class="modal-header bg-inverse">
<h5 data-v-4338c7d5="" id="exampleModalLongTitle" class="modal-title">Signup Appointment</h5>
<button data-v-4338c7d5="" type="button" data-dismiss="modal" aria-label="Close" class="close"><span data-v-4338c7d5="" aria-hidden="true">×</span></button>
</div>
<form data-v-4338c7d5="">
<div data-v-4338c7d5="" class="modal-body">
<div data-v-4338c7d5="" class="col-lg-12">
	<!---->
</div>
<div data-v-4338c7d5="" class="row ">
	<div data-v-4338c7d5="" class="col-lg-12 ">
		<div data-v-4338c7d5="" class="form-group row">
			<label data-v-4338c7d5="" for="example-text-input" class="col-3 col-form-label" style="font-size: 14px;">Patient Name</label>
			<div data-v-4338c7d5="" class="col-7 p-0">
				<input data-v-4338c7d5="" type="text" placeholder="Patient Name" class="form-control  ">
			</div>
		</div>
		<div data-v-4338c7d5="" class="form-group row">
			<label data-v-4338c7d5="" for="example-text-input" class="col-3 col-form-label" style="font-size: 14px;">User Name</label>
			<div data-v-4338c7d5="" class="col-7 p-0">
				<input data-v-4338c7d5="" id="user_name" name="user_name" type="text" class="form-control">
			</div>
		</div>
		<div data-v-4338c7d5="" class="form-group row">
			<label data-v-4338c7d5="" for="example-text-input" class="col-3 col-form-label" style="font-size: 14px;"> Type </label>
			<div data-v-4338c7d5="" class="col-7 p-0">
				<input data-v-4338c7d5="" value="n" type="radio" checked="checked">
				<label data-v-4338c7d5="" class="col-3" style="font-size: 14px;">Normal</label>
				<input data-v-4338c7d5="" type="radio" value="e" class="mr-3">
				<label data-v-4338c7d5="" style="font-size: 14px;">Emergency</label>
			</div>
		</div>
		<!---->
		<input data-v-4338c7d5="" type="hidden" value="2020-03-10">
		<div data-v-4338c7d5="" class="form-group row">
			<label data-v-4338c7d5="" for="example-text-input" class="col-3 col-form-label" style="font-size: 14px;">Shift </label>
			<div data-v-4338c7d5="" class="col-7 p-0">
				<select data-v-4338c7d5="" class="col-lg-8 form-control">
					<option data-v-4338c7d5="" value=""> Select Shift</option>
					<option data-v-4338c7d5="" value="1"> Morning</option>
					<option data-v-4338c7d5="" value="2"> Afternoon</option>
					<option data-v-4338c7d5="" value="3"> Evening</option>
				</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div data-v-4338c7d5="" class="modal-footer">
	<button data-v-4338c7d5="" type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
	<button data-v-4338c7d5="" type="submit" data-dismiss="modal" class="btn btn-success">Make Appointment</button>
</div>
</form>
</div>
</div>
</div>
<div data-v-4338c7d5="" id="create-appointment" class="col-lg-12 collapse ">
<div data-v-4338c7d5="" class="card">
<div data-v-4338c7d5="" class="boder">
<div data-v-4338c7d5="" class="card-title mb-5">
<h2 data-v-4338c7d5="" class="text-center">Quick Registration and Apointment</h2></div>
<div data-v-4338c7d5="" class="card-body ml-5">
<div data-v-4338c7d5="" class="basic-form">
<form data-v-4338c7d5="">
	<div data-v-4338c7d5="" class="row mb-3">
	<div data-v-4338c7d5="" class="col-lg-12 mt-4">
	<div data-v-4338c7d5="" class="form-group row">
		<label data-v-4338c7d5="" for="example-text-input" class="col-3 col-form-label">Patient Name</label>
		<div data-v-4338c7d5="" class="col-7 p-0">
			<input data-v-4338c7d5="" type="text" placeholder="Patient Name" class="form-control  ">
		</div>
	</div>
	<div data-v-4338c7d5="" class="form-group row">
		<label data-v-4338c7d5="" for="example-text-input" class="col-3 col-form-label">User Name</label>
		<div data-v-4338c7d5="" class="col-7 p-0">
			<input data-v-4338c7d5="" id="user_name" name="user_name" type="text" class="form-control">
		</div>
	</div>
	<div data-v-4338c7d5="" class="form-group row">
		<label data-v-4338c7d5="" for="example-text-input" class="col-3 col-form-label">Appointment type </label>
		<div data-v-4338c7d5="" class="col-7 p-0">
			<input data-v-4338c7d5="" value="n" type="radio" checked="checked">
			<label data-v-4338c7d5="" class="col-3">Normal</label>
			<input data-v-4338c7d5="" type="radio" value="e" class="mr-3">
			<label data-v-4338c7d5="">Emergency</label>
		</div>
	</div>
	<!---->
	<div data-v-4338c7d5="" class="form-group row">
		<label data-v-4338c7d5="" for="example-text-input" class="col-3 col-form-label">Date </label>
		<div data-v-4338c7d5="" class="col-7 p-0">
			<input data-v-4338c7d5="" type="text" placeholder="Appointment Date" class="form-control datepicker hasDatepicker" id="dp1583847023587">
		</div>
	</div>
	<div data-v-4338c7d5="" cla <input data-v-4338c7d5="" id="user_name" name="user_name" type="text" class="form-control"></div>
	<div data-v-4338c7d5="" class="form-group">
		<label data-v-4338c7d5="">Appointment Date</label>
		<input data-v-4338c7d5="" type="text" class="form-control datepicker hasDatepicker" id="dp1583847023589">
	</div>
	<div data-v-4338c7d5="" class="form-group">
		<label data-v-4338c7d5="">Shift</label>
		<select data-v-4338c7d5="" class="form-control  ">
			<option data-v-4338c7d5="" value=""> Select Shift</option>
			<option data-v-4338c7d5="" value="1"> Morning</option>
			<option data-v-4338c7d5="" value="2"> Afternoon</option>
			<option data-v-4338c7d5="" value="3"> Evening</option>
		</select>
	</div>
	<button data-v-4338c7d5="" type="submit" data-target="#create-appointment" class="btn btn-dark btn-outline m-b-10 m-l-5">Submit</button>
	</div>
	</div>
		<!---->
	</form>
	</div>
	</div>
	</div>
</div>
</div>
									 
<div data-v-4338c7d5="">
<ul data-v-4338c7d5=""></ul>
</div>
 
<script type="text/javascript" src="http://medic-aid.opd.com/js/app.js"></script>
											
						 
							
							<!-- Compiled and minified CSS -->
							<style type="text/css">
							.opd-detail{
							text-transform: uppercase;
							}
							</style>
							
							@endsection