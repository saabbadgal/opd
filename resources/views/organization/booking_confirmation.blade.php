@extends('layouts.materialize')
@section('content')

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
                <p>Token : <strong>{{ $token }} </strong><br> on <strong>{{ $date}} {{ $time }}  </strong></p>
                <a href="invoice-view.html" class="btn btn-primary view-inv-btn waves-effect waves-light">View Invoice</a>
              </div>
            </div>
          </div>
          <!-- /Success Card -->
          
        </div>
      </div>
      
    </div>
  </div>
@endsection