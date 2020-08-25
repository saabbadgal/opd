@extends('layouts.materialize')
@section('content')


<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>




<div class="modal fade custom-modal show" id="add_time_slot" aria-modal="true" style="display: block; padding-right: 17px;">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Time Slots</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="hours-info">
                <div class="row form-row hours-cont">
                  <div class="col-12 col-md-10">
                    <div class="row form-row">
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>Start Time</label>
                          <select class="form-control">
                            <option>-</option>
                            <option>12.00 am</option>
                            <option>12.30 am</option>  
                            <option>1.00 am</option>
                            <option>1.30 am</option>
                          </select>
                        </div> 
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>End Time</label>
                          <select class="form-control">
                            <option>-</option>
                            <option>12.00 am</option>
                            <option>12.30 am</option>  
                            <option>1.00 am</option>
                            <option>1.30 am</option>
                          </select>
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="add-more mb-3">
                <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
              </div>
              <div class="submit-section text-center">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>




















<div class="content" style="min-height: 210px;">
  <div class="container">
  

    <div class="row">
      <div class="col-12">
        
        <div class="card">
          <div class="card-body">
            <div class="booking-doc-info">
              <a href="doctor-profile.html" class="booking-doc-img">
                <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
              </a>
              <div class="booking-info">
                <h4><a href="doctor-profile.html">Dr. Darren Elder</a></h4>
                <div class="rating">
                  <i class="fas fa-star filled"></i>
                  <i class="fas fa-star filled"></i>
                  <i class="fas fa-star filled"></i>
                  <i class="fas fa-star filled"></i>
                  <i class="fas fa-star"></i>
                  <span class="d-inline-block average-rating">35</span>
                </div>
                <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-4 col-md-6">
            <h4 class="mb-1">11 November 2019</h4>
            <p class="text-muted">Monday</p>
          </div>
          <div class="col-12 col-sm-8 col-md-6 text-sm-right">
            <div class="bookingrange btn btn-white btn-sm mb-3">
              <i class="far fa-calendar-alt mr-2"></i>
              <span>February 26, 2020 - March 3, 2020</span>
              <i class="fas fa-chevron-down ml-2"></i>
            </div>
          </div>
        </div>
        <!-- Schedule Widget -->
        <div class="card booking-schedule schedule-widget">
          
          <!-- Schedule Header -->
          <div class="schedule-header">
            <div class="row">
              <div class="col-md-12">
                
                <!-- Day Slot -->
                <div class="day-slot">
                  <ul>
                    <li class="left-arrow">
                      <a href="">
                        <i class="fa fa-chevron-left"></i>
                      </a>
                    </li>
                    <li>
                      <span>Mon</span>
                      <span class="slot-date">11 Nov <small class="slot-year">2019</small></span>
                    </li>
                    <li>
                      <span>Tue</span>
                      <span class="slot-date">12 Nov <small class="slot-year">2019</small></span>
                    </li>
                    <li>
                      <span>Wed</span>
                      <span class="slot-date">13 Nov <small class="slot-year">2019</small></span>
                    </li>
                    <li>
                      <span>Thu</span>
                      <span class="slot-date">14 Nov <small class="slot-year">2019</small></span>
                    </li>
                    <li>
                      <span>Fri</span>
                      <span class="slot-date">15 Nov <small class="slot-year">2019</small></span>
                    </li>
                    <li>
                      <span>Sat</span>
                      <span class="slot-date">16 Nov <small class="slot-year">2019</small></span>
                    </li>
                    <li>
                      <span>Sun</span>
                      <span class="slot-date">17 Nov <small class="slot-year">2019</small></span>
                    </li>
                    <li class="right-arrow">
                      <a href="">
                        <i class="fa fa-chevron-right"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- /Day Slot -->
                
              </div>
            </div>
          </div>
          <!-- /Schedule Header -->
          
          <!-- Schedule Content -->
          <div class="schedule-cont">
            <div class="row">
              <div class="col-md-12">
                
                <!-- Time Slot -->
                <div class="time-slot">
                  <ul class="clearfix">
                    <li>
                      <a class="timing" href="#">
                        <span>9:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>10:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>11:00</span> <span>AM</span>
                      </a>
                    </li>
                    <li>
                      <a class="timing" href="#">
                        <span>9:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>10:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>11:00</span> <span>AM</span>
                      </a>
                    </li>
                    <li>
                      <a class="timing" href="#">
                        <span>9:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>10:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>11:00</span> <span>AM</span>
                      </a>
                    </li>
                    <li>
                      <a class="timing" href="#">
                        <span>9:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>10:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>11:00</span> <span>AM</span>
                      </a>
                    </li>
                    <li>
                      <a class="timing" href="#">
                        <span>9:00</span> <span>AM</span>
                      </a>
                      <a class="timing selected" href="#">
                        <span>10:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>11:00</span> <span>AM</span>
                      </a>
                    </li>
                    <li>
                      <a class="timing" href="#">
                        <span>9:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>10:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>11:00</span> <span>AM</span>
                      </a>
                    </li>
                    <li>
                      <a class="timing" href="#">
                        <span>9:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>10:00</span> <span>AM</span>
                      </a>
                      <a class="timing" href="#">
                        <span>11:00</span> <span>AM</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- /Time Slot -->
                
              </div>
            </div>
          </div>
          <!-- /Schedule Content -->
          
        </div>
        <!-- /Schedule Widget -->
        
        <!-- Submit Section -->
        <div class="submit-section proceed-btn text-right">
          <a href="checkout.html" class="btn btn-primary submit-btn">Proceed to Pay</a>
        </div>
        <!-- /Submit Section -->
        
      </div>
    </div>
  </div>
</div>
<!-- Page Content -->
<div class="row align-items-center mb-4 text-center">
  <div class="col-lg-12">
    <h4 class="display-4">Doctor Profile</h4>
  </div>
  
  
</div>
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
              <h4 class="doc-name">Dr. Darren Elder</h4>
              <p class="doc-speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
              <p class="doc-department">Dentist</p>
              
              <div class="clinic-details">
                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a href="javascript:void(0);">Get Directions</a></p>
                
              </div>
              <div class="clinic-services">
                <span>Dental Fillings</span>
                <span>Teeth Whitneing</span>
              </div>
            </div>
          </div>
          <div class="doc-info-right">
            <div class="clini-infos">
              <ul>
                <li><i class="far fa-thumbs-up"></i> 9914263105</li>
                <li><i class="far fa-comment"></i>Saab@gmail.com</li>
                <li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                
              </ul>
            </div>
            
            <div class="clinic-booking">
              <a class="apt-btn" href="booking.html">Book Appointment</a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
          </li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Raw denim you
            probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master
            cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro
            keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
            placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi
          qui.</div>
          
        </div>
        
      </div>
      <!-- /Doctor Widget -->
    </div>
  </div>
  
  
  
  
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 order-md-last order-sm-last order-last map-left">
        
        <div class="row align-items-center mb-4 text-center">
          <div class="col-lg-12">
            <h4 class="display-4">Doctors List</h4>
          </div>
          
        </div>
        <!-- Doctor Widget -->
        <div class="card">
          <div class="card-body">
            <div class="doctor-widget">
              <div class="doc-info-left">
                <div class="doctor-img">
                  <a href="doctor-profile.html">
                  <img src="{{ asset(env('loc_path').'front/3.png') }}" class="img-fluid" alt="User Image">                      </a>
                </div>
                <div class="doc-info-cont">
                  <h4 class="doc-name"><a href="doctor-profile.html">Dr. Ruby Perrin</a></h4>
                  <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                  <h5 class="doc-department">Dentist</h5>
                  
                  <div class="clinic-details">
                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Florida, USA</p>
                    
                  </div>
                  <div class="clinic-services">
                    <span>Dental Fillings</span>
                    <span> Whitneing</span>
                  </div>
                </div>
              </div>
              <div class="doc-info-right">
                <div class="clini-infos">
                  <ul>
                    <li><i class="far fa-thumbs-up"></i> 98%</li>
                    <li><i class="far fa-comment"></i> 17 Feedback</li>
                    <li><i class="fas fa-map-marker-alt"></i> Florida, USA</li>
                    <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="" data-original-title="Lorem Ipsum"></i> </li>
                  </ul>
                </div>
                <div class="clinic-booking">
                  <a class="view-pro-btn" href="doctor-profile.html">View Profile</a>
                  <a class="apt-btn" href="booking.html">Book Appointment</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Doctor Widget -->
        
        
        
      </div>
      <!-- /content-left-->
      
      <!-- /map-right-->
    </div>
    <!-- /row-->
    
  </div>
  <div class="row align-items-center mb-4 text-center">
    <div class="col-lg-12">
      <h4 class="display-4">Form</h4>
    </div>
    
  </div>
  <div class="container">
    <div class="col-md-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-body">
          
          <!-- Profile Settings Form -->
          <form>
            <div class="row form-row">
              <div class="col-12 col-md-12">
                <div class="form-group">
                  <div class="change-avatar">
                    <div class="profile-img">
                      <img src="assets/img/patients/patient.jpg" alt="User Image">
                    </div>
                    <div class="upload-img">
                      <div class="change-photo-btn">
                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                        <input type="file" class="upload">
                      </div>
                      <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" value="Richard">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" value="Wilson">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>Date of Birth</label>
                  <div class="cal-icon">
                    <input type="text" class="form-control datetimepicker" value="24-07-1983">
                  </div>
                </div>
              </div>
              {{--  <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>Blood Group</label>
                  <select class="form-control select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option data-select2-id="3">A-</option>
                    <option>A+</option>
                    <option>B-</option>
                    <option>B+</option>
                    <option>AB-</option>
                    <option>AB+</option>
                    <option>O-</option>
                    <option>O+</option>
                  </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;">
                  <span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-di41-container"><span class="select2-selection__rendered" id="select2-di41-container" role="textbox" aria-readonly="true" title="A-">A-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
              </div> --}}
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>Email ID</label>
                  <input type="email" class="form-control" value="richard@example.com">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" value="+1 202-555-0125" class="form-control">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" value="806 Twin Willow Lane">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" value="Old Forge">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>State</label>
                  <input type="text" class="form-control" value="Newyork">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>Zip Code</label>
                  <input type="text" class="form-control" value="13420">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" class="form-control" value="United States">
                </div>
              </div>
            </div>
            <div class="submit-section">
              <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
            </div>
          </form>
          <!-- /Profile Settings Form -->
          
        </div>
      </div>
    </div>
  </div>
  <div class="row align-items-center mb-4 text-center">
    <div class="col-lg-12">
      <h4 class="display-4">Table</h4>
    </div>
    
  </div>
  <div class="content container text-center align-items-center">
    <!-- Page Header -->
    
    <!-- /Page Header -->
    
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead>
                  <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 251px;">Day</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 251px;">Morning</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 251px;">Afternoon</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 251px;">Evening</th>
                  </tr>
                </thead>
                <tbody>
                  <tr role="row" class="odd">
                    <td class="sorting_1">Monday</td>
                    <td>10:25</td>
                    <td>02:25</td>
                    <td>05:25</td>
                  </tr>
                  <tr role="row" class="odd">
                    <td class="sorting_1">Tuesday</td>
                    <td>10:25</td>
                    <td>02:25</td>
                    <td>05:25</td>
                  </tr>
                  <tr role="row" class="odd">
                    <td class="sorting_1">Wednesday</td>
                    <td>10:25</td>
                    <td>02:25</td>
                    <td>05:25</td>
                  </tr>
                  <tr role="row" class="odd">
                    <td class="sorting_1">Thursday</td>
                    <td>10:25</td>
                    <td>02:25</td>
                    <td>05:25</td>
                  </tr>
                  <tr role="row" class="odd">
                    <td class="sorting_1">Friday</td>
                    <td>10:25</td>
                    <td>02:25</td>
                    <td>05:25</td>
                  </tr>
                  <tr role="row" class="odd">
                    <td class="sorting_1">Saturday</td>
                    <td>10:25</td>
                    <td>02:25</td>
                    <td>05:25</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  
  <div class="content success-page-cont" style="min-height: 210px;">
    <div class="container-fluid">
      
      <div class="row justify-content-center">
        <div class="col-lg-6">
          
          <!-- Success Card -->
          <div class="card success-card">
            <div class="card-body">
              <div class="success-cont">
                <i class="fas fa-check"></i>
                <h3>Appointment booked Successfully!</h3>
                <p>Appointment booked with <strong>Dr. Darren Elder</strong><br> on <strong>12 Nov 2019 5:00PM to 6:00PM</strong></p>
                <a href="invoice-view.html" class="btn btn-primary view-inv-btn">View Invoice</a>
              </div>
            </div>
          </div>
          <!-- /Success Card -->
          
        </div>
      </div>
      
    </div>
  </div>
  <div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card">
      <div class="card-body">
        
        <!-- Profile Settings Form -->
        <form>
          <div class="row form-row">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <div class="change-avatar">
                  <div class="profile-img">
                    <img src="assets/img/patients/patient.jpg" alt="User Image">
                  </div>
                  <div class="upload-img">
                    <div class="change-photo-btn">
                      <span><i class="fa fa-upload"></i> Upload Photo</span>
                      <input type="file" class="upload">
                    </div>
                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" value="Richard">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" value="Wilson">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>Date of Birth</label>
                <div class="cal-icon">
                  <input type="text" class="form-control datetimepicker" value="24-07-1983">
                </div>
              </div>
            </div>
            
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>Email ID</label>
                <input type="email" class="form-control" value="richard@example.com">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>Mobile</label>
                <input type="text" value="+1 202-555-0125" class="form-control">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" value="806 Twin Willow Lane">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" value="Old Forge">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>State</label>
                <input type="text" class="form-control" value="Newyork">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>Zip Code</label>
                <input type="text" class="form-control" value="13420">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" value="United States">
              </div>
            </div>
          </div>
          <div class="submit-section">
            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
          </div>
        </form>
        <!-- /Profile Settings Form -->
        
      </div>
    </div>
  </div>
  
  <div class="content" style="min-height: 210px;">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-md-8 offset-md-2">
          
          <!-- Login Tab Content -->
          <div class="account-content">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7 col-lg-6 login-left">
                <img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
              </div>
              <div class="col-md-12 col-lg-6 login-right">
                <div class="login-header">
                  <h3>Login <span>Doccure</span></h3>
                </div>
                <form action="index.html">
                  <div class="form-group form-focus">
                    <input type="email" class="form-control floating">
                    <label class="focus-label">Email</label>
                  </div>
                  <div class="form-group form-focus">
                    <input type="password" class="form-control floating">
                    <label class="focus-label">Password</label>
                  </div>
                  <div class="text-right">
                    <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                  </div>
                  <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                  <div class="login-or">
                    <span class="or-line"></span>
                    <span class="span-or">or</span>
                  </div>
                  <div class="row form-row social-login">
                    <div class="col-6">
                      <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                    </div>
                    <div class="col-6">
                      <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                    </div>
                  </div>
                  <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>
                </form>
              </div>
            </div>
          </div>
          <!-- /Login Tab Content -->
          
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-md-8 offset-md-2">
          
          <!-- Register Content -->
          <div class="account-content">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7 col-lg-6 login-left">
                <img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">
              </div>
              <div class="col-md-12 col-lg-6 login-right">
                <div class="login-header">
                  <h3>Patient Register <a href="doctor-register.html">Are you a Doctor?</a></h3>
                </div>
                
                <!-- Register Form -->
                <form action="doctor-dashboard.html">
                  <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Name</label>
                  </div>
                  <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Mobile Number</label>
                  </div>
                  <div class="form-group form-focus">
                    <input type="password" class="form-control floating">
                    <label class="focus-label">Create Password</label>
                  </div>
                  <div class="text-right">
                    <a class="forgot-link" href="login.html">Already have an account?</a>
                  </div>
                  <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                  <div class="login-or">
                    <span class="or-line"></span>
                    <span class="span-or">or</span>
                  </div>
                  <div class="row form-row social-login">
                    <div class="col-6">
                      <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                    </div>
                    <div class="col-6">
                      <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                    </div>
                  </div>
                </form>
                <!-- /Register Form -->
                
              </div>
            </div>
          </div>
          <!-- /Register Content -->
          
        </div>
      </div>
    </div>
  </div>
  <!-- Material form login -->
  <div class="container ">
    <div class="row justify-content-center ">
      <div class="col-lg-5">
        
        <div class="card">
          <h5 class="card-header info-color white-text text-center py-4">
          <strong>Sign in</strong>
          </h5>
          <!--Card content-->
          <div class="card-body px-lg-5 pt-0">
            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="#!">
              <!-- Email -->
              <div class="md-form">
                <input type="email" id="materialLoginFormEmail" class="form-control">
                <label for="materialLoginFormEmail">E-mail</label>
              </div>
              <!-- Password -->
              <div class="md-form">
                <input type="password" id="materialLoginFormPassword" class="form-control">
                <label for="materialLoginFormPassword">Password</label>
              </div>
              <div class="d-flex justify-content-around">
                <div>
                  <!-- Remember me -->
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                    <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
                  </div>
                </div>
                <div>
                  <!-- Forgot password -->
                  <a href="">Forgot password?</a>
                </div>
              </div>
              <!-- Sign in button -->
              <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>
              <!-- Register -->
              <p>Not a member?
                <a href="">Register</a>
              </p>
              <!-- Social login -->
              <p>or sign in with:</p>
              <a type="button" class="btn-floating btn-fb btn-sm">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a type="button" class="btn-floating btn-tw btn-sm">
                <i class="fab fa-twitter"></i>
              </a>
              <a type="button" class="btn-floating btn-li btn-sm">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a type="button" class="btn-floating btn-git btn-sm">
                <i class="fab fa-github"></i>
              </a>
            </form>
            <!-- Form -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Material form login -->
  
  
  
  @endsection