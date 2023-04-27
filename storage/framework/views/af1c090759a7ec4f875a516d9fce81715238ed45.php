

<?php $__env->startSection('content'); ?>
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
									<form class="booking-frm" action="<?php echo e(url('save_trip_booking')); ?>" id="ride-confirm-booking-form" novalidate="novalidate">
										<?php echo csrf_field(); ?>
										<input type="hidden" name="booking_type" class="" value="<?php echo e($bookingType); ?>">
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
											<?php if($errors->has('email')): ?>
											    <div class="error"><?php echo e($errors->first('email')); ?></div>
											<?php endif; ?>
										</div>
										
										<div class="col-md-12 col-sm-12">
											<button type="submit" class="book-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
										</div>
									</form>
								</div>
							</div>
						</div>

						
						<div class="col-md-4 col-sm-12">
							<?php if($bookingType == 'vehicle'): ?>
							<?php
							$userSummary = Session::get('user_booking_first_step');
							
							?>
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
									<li><span>From: </span><div class="startup_loc_s info-outer"><?php echo e(($formLoc) ? $formLoc['name'] : 'Enter Startup Location'); ?></div></li>
									<li><span>To: </span><div class="end_loc_s info-outer"><?php echo e((@$toLoc) ? $toLoc['name'] : 'Enter Destination'); ?></div></li>
									<li><span>Pickup Date: </span><div class="pick_date info-outer"><?php echo e($userSummary['pickup_date']); ?></div></li>
									<li><span>Pickup Time: </span><div class="pick_time info-outer"><?php echo e($userSummary['pickup_time']); ?></div></li>
									<li><span>Dropoff Date: </span><div class="drop_date info-outer"><?php echo e($userSummary['dropoff_date']); ?></div></li>
									<li><span>Dropoff Time: </span><div class="drop_time info-outer"><?php echo e($userSummary['dropoff_time']); ?></div></li>
								</ul>
							</div>
							<?php endif; ?>

							<?php if($bookingType == 'one-day-tour' || $bookingType == 'multi-day-tour'): ?>
							<?php
							$hotalSummary = Session::get('user_hotal_booking');
							?>
							<div class="booking-summary hotal-booking">
								<h3>Booking Summary</h3>
								<ul class="booking-info">
									<li><span>Booking Reference: </span><div class="book-ref">38772</div></li>
									<li><span>Journey Type: </span>
									<div class="service_type"><?php echo e($hotalSummary['service_type']); ?></div></li>
									<li><span>Selected Hotal:</span>
									<div class="select_hotal"><?php echo e($hotalSummary['hotalName']); ?></div></li>
									<li><span>Selected Hotal Location:</span>
									<div class="select_hotal_loc"><?php echo e($hotalSummary['hotalLocation']); ?></div></li>
								</ul>
								<div class="journey-info">
									<h4 class="service_type">One Way Journey</h4>
								</div>
								<ul class="service-info">
									<li><span>Rooms : </span><div class="startup_loc_s info-outer selected_rooms"><?php echo e($hotalSummary['rooms']); ?></div></li>
									<li><span>Arrival Time : </span><div class="startup_loc_s info-outer arrivaltimeHotal"><?php echo e($hotalSummary['check_in']); ?></div></li>
									<li><span>Departure Time : </span><div class="end_loc_s info-outer departuretimeHotal"><?php echo e($hotalSummary['check_out']); ?></div></li>
									<li><span>Adults : </span><div class="pick_date info-outer hotal_adults"><?php echo e($hotalSummary['adult_capacity']); ?></div></li>
									<li><span>Children: </span><div class="pick_time info-outer hotal_child"><?php echo e($hotalSummary['child_capacity']); ?></div></li>
								</ul>
							</div>
							<?php endif; ?>
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
			
				<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/confirm-booking.blade.php ENDPATH**/ ?>