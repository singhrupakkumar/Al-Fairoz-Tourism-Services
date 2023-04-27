@extends('layouts.app')

@section('content')
			<!--Inner Banner Section Start-->
	    	<div class="tj-inner-banner">
	    		<div class="container">
	    			<h2>Booking Form</h2>
	    		</div>
	    	</div>
			<!--Inner Banner Section End-->
			
			<!--Breadcrumb Section Start-->
	    	<div class="tj-breadcrumb">
				<div class="container">
					<ul class="breadcrumb-list">
						<li><a href="home-1.html">Home</a></li>
						<li class="active">Booking Form</li>
					</ul>
				</div>
	    	</div>
			<!--Breadcrumb Section End-->
			
			<section class="tj-booking-frm">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-12">
							<div class="tj-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="active"><a href="#point" data-toggle="tab">Confirm Booking</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane active" id="point">
									<form class="booking-frm" action="{{url('save_trip_booking')}}" id="ride-confirm-booking-form" novalidate="novalidate">
										@csrf
										<input type="hidden" name="booking_type" class="" value="{{$bookingType}}">
										<input type="hidden" name="booking_reference" class="booking_reference" value="">
										<div class="col-md-6 col-sm-6">
											<div class="field-holder form-group">
												<span class="fas fa-calendar-alt"></span>
												<input type="text" name="first_name" placeholder="Enter First Name"  value="">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="field-holder form-group">
												<span class="far fa-clock"></span>
												<input type="text" name="last_name" placeholder="Enter Last Name"  value="">
											</div>
										</div>
										
										<div class="col-md-6 col-sm-6">
											<div class="field-holder form-group">
												<span class="fas fa-calendar-alt"></span>
												<input type="text" name="phone"  placeholder="Enter Phone Number" value="">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="field-holder form-group">
												<span class="far fa-clock"></span>
												<input type="text" name="email" placeholder="Enter Email id"  value="">
											</div>
											@if($errors->has('email'))
											    <div class="error">{{ $errors->first('email') }}</div>
											@endif
										</div>
										
										<div class="col-md-12 col-sm-12">
											<button type="submit" class="book-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
										</div>
									</form>
								</div>
							</div>
						</div>

						
						<div class="col-md-4 col-sm-12">
							@if($bookingType == 'vehicle')
							@php
							$userSummary = Session::get('user_booking_first_step');
							
							@endphp
							<div class="booking-summary vehicle-booking">
								<h3>Booking Summary</h3>
								<ul class="booking-info">
									<li><span>Booking Reference: </span><div class="book-ref">38772</div></li>
									<li><span>Journey Type: </span>
									<div class="service_type">One Way Journey</div></li>
									<li><span>Selected Ride Car:</span>
									<div class="ride_car">Select Ride Car</div></li>
								</ul>
								<div class="journey-info">
									<h4 class="service_type">One Way Journey</h4>
								</div>
								<ul class="service-info">
									<li><span>From: </span><div class="startup_loc_s info-outer">{{ ($formLoc) ? $formLoc['name'] : 'Enter Startup Location' }}</div></li>
									<li><span>To: </span><div class="end_loc_s info-outer">{{ (@$toLoc) ? $toLoc['name'] : 'Enter Destination' }}</div></li>
									<li><span>Pickup Date: </span><div class="pick_date info-outer">{{$userSummary['pickup_date'] }}</div></li>
									<li><span>Pickup Time: </span><div class="pick_time info-outer">{{ $userSummary['pickup_time']  }}</div></li>
									<li><span>Dropoff Date: </span><div class="drop_date info-outer">{{ $userSummary['dropoff_date'] }}</div></li>
									<li><span>Dropoff Time: </span><div class="drop_time info-outer">{{ $userSummary['dropoff_time'] }}</div></li>
								</ul>
							</div>
							@endif

							@if($bookingType == 'one-day-tour' || $bookingType == 'multi-day-tour')
							@php
							$hotalSummary = Session::get('user_hotal_booking');
							@endphp
							<div class="booking-summary hotal-booking">
								<h3>Booking Summary</h3>
								<ul class="booking-info">
									<li><span>Booking Reference: </span><div class="book-ref">38772</div></li>
									<li><span>Journey Type: </span>
									<div class="service_type">{{$hotalSummary['service_type']}}</div></li>
									<li><span>Selected Hotal:</span>
									<div class="select_hotal">{{$hotalSummary['hotalName']}}</div></li>
									<li><span>Selected Hotal Location:</span>
									<div class="select_hotal_loc">{{$hotalSummary['hotalLocation']}}</div></li>
								</ul>
								<div class="journey-info">
									<h4 class="service_type">One Way Journey</h4>
								</div>
								<ul class="service-info">
									<li><span>Rooms : </span><div class="startup_loc_s info-outer selected_rooms">{{ $hotalSummary['rooms'] }}</div></li>
									<li><span>Arrival Time : </span><div class="startup_loc_s info-outer arrivaltimeHotal">{{$hotalSummary['check_in']}}</div></li>
									<li><span>Departure Time : </span><div class="end_loc_s info-outer departuretimeHotal">{{$hotalSummary['check_out']}}</div></li>
									<li><span>Adults : </span><div class="pick_date info-outer hotal_adults">{{$hotalSummary['adult_capacity']}}</div></li>
									<li><span>Children: </span><div class="pick_time info-outer hotal_child">{{$hotalSummary['child_capacity']}}</div></li>
								</ul>
							</div>
							@endif
						</div>
					</div>
				</div>
			</section>
			
			<section class="tj-cal-to-action">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="cta-box">
								<img src="images/cta-icon1.png" alt="">
								<div class="cta-text">
									<strong>Best Price Guaranteed</strong>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="cta-box">
								<img src="images/cta-icon2.png" alt="">
								<div class="cta-text">
									<strong>24/7 Customer Care</strong>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="cta-box">
								<img src="images/cta-icon3.png" alt="">
								<div class="cta-text">
									<strong>Easy Bookings</strong>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
				@endsection