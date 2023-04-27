

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
									<li id="vehicle_type" class="<?php echo e(($type == 'vehicle') ? 'active' : ''); ?>"><a href="#point" data-toggle="tab">Point to Point</a></li>
									<li id="hotal_type" class="<?php echo e(($type == 'hotal') ? 'active' : ''); ?>"><a href="#hotalBooking" data-toggle="tab">Tour Booking</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane <?php echo e(($type == 'vehicle') ? 'active' : ''); ?>" id="point">
									<form class="booking-frm" action="<?php echo e(route('home.confirm_booking')); ?>" method="POST" id="ride-booking-form" novalidate="novalidate">
										<?php echo csrf_field(); ?>
										<input type="hidden" name="bookingType" value="vehicle" >
										<div class="col-md-12 col-sm-12">
											<div class="field-holder">
												<label for="one_way">
													<input type="radio" name="service_type" id="one_way" checked="" value="One Way Journey">One Way
												</label>
												<label for="two_way">
													<input type="radio" name="service_type" id="two_way" value="Two Way Journey">Two Way
												</label>
											</div>
										</div>

										<div class="col-md-12 col-sm-12">
											<strong>Picking Up</strong>
											<div class="field-holder form-group">
												
												<?php
												if(!empty($formLoc)){
													$formLoc = $formLoc['id'];
												}else{
													$formLoc = '';
												}
												?>
												<select name="pickup_loc" id="pickup_start_loc" class="selectpicker">
														<option value="">Select Pickup Location</option>
														<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option data-pickup="<?php echo e($val->name); ?>" value="<?php echo e($val->id); ?>" <?php echo e(($val->id == $formLoc) ? 'selected' : ''); ?> ><?php echo e($val->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>

											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="field-holder form-group">
												<span class="fas fa-calendar-alt"></span>
												<input type="text" name="pickup_date" placeholder="Select your Date" id="basicDate" value="">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="field-holder form-group">
												<span class="far fa-clock"></span>
												<input type="text" name="pickup_time" placeholder="Select Timings" id="basic_pick_time" value="">
											</div>
										</div>
										<div class="col-md-12 col-sm-12">
											<strong>Dropoff</strong>
											<div class="field-holder form-group">
												
												<?php
												if(!empty($toLoc)){
													$toLoc = $toLoc['id'];
												}else{
													$toLoc = '';
												}
												?>
												<select name="dropoff_loc" id="pickup_end_loc" class="selectpicker">
														<option value="">Select Drop Location</option>
														<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option data-pickup="<?php echo e($val->name); ?>" value="<?php echo e($val->id); ?>" <?php echo e(($val->id == @$toLoc) ? 'selected' : ''); ?> ><?php echo e($val->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
												
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="field-holder form-group">
												<span class="fas fa-calendar-alt"></span>
												<input type="text" name="dropoff_date" id="drop_basicDate" placeholder="Select your Date" value="">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="field-holder form-group">
												<span class="far fa-clock"></span>
												<input type="text" name="dropoff_time" placeholder="Select Timings" id="dropp_basic_time" value="">
											</div>
										</div>
										
										<div class="col-md-12 col-sm-12">
											<div class="field-holder form-group">
												<div class="car-list">
												<?php
												if(@$vehicle_id){
													$disabled = 'disabled';
												}else{
													$disabled = '';
												}
												?>

													<select name="car_id" id="car_list" class="selectpicker" <?php echo e($disabled); ?>>
														<option value="">Select Car</option>
														<option value="Nissan Vela" data-hrrate="30" data-dayrate="150">Nissan Vela</option>
														<?php $__currentLoopData = @$vehicleName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option data-car="<?php echo e($val->id); ?>" data-hrrate="<?php echo e($val->name); ?>" data-dayrate="<?php echo e($val->name); ?>" value="<?php echo e($val->name); ?>" <?php echo e(($val->id == @$vehicle_id) ? 'selected' : ''); ?> ><?php echo e($val->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
													<input type="hidden" name="vehicle_id" value="<?php echo e((@$vehicle_id) ? $vehicle_id : '1'); ?>" id="car_id">
												</div>
											</div>
										</div>
										<div class="col-md-12 col-sm-12">
											<div class="field-holder">
												<div class="select-list" style="display: none;">
													<select name="service_rate" id="rate_list" class="selectpicker">
														<option value="default">Select Rate</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-sm-12">
											<p class="ride-terms">I understand and agree with the <a href="policy.html">Terms</a> of Service and Cancellation </p>
											<label for="book_terms">
												<input name="book_terms" id="book_terms" type="checkbox" checked="">
											</label>
										</div>
										<div class="col-md-12 col-sm-12">
											<button type="submit" class="book-btn">Next Step <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
										</div>
									</form>
								</div>
								<div class="tab-pane <?php echo e(($type == 'hotal') ? 'active' : ''); ?>" id="hotalBooking">
									<form class="booking-frm" action="<?php echo e(route('home.confirm_booking')); ?>" method="POST" id="ride-hotal-booking-form" novalidate="novalidate">
										<?php echo csrf_field(); ?>
										
										<input type="hidden" name="bookingType" value="<?php echo e(isset($tour_type) ? $tour_type : 'tour'); ?>" >
										<div class="col-md-12 col-sm-12">
											<div class="field-holder form-group">
												<select name="hotal_id" id="select_hotal" class="selectpicker">
														<option value="">Select Tour</option>
														<?php $__currentLoopData = $hotals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option data-hotal="<?php echo e($val->hotal_name); ?>" value="<?php echo e($val->id); ?>" <?php echo e(($val->id == @$hotal_id) ? 'selected' : ''); ?> ><?php echo e($val->hotal_name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
										<div class="col-md-12 col-sm-12">
											<div class="field-holder form-group">
												<select name="hotal_location" id="select_hotal_loc" class="selectpicker">
														<option value="">Select Location</option>
														<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option data-hotalLoc="<?php echo e($val->name); ?>" value="<?php echo e($val->id); ?>" <?php echo e(($val->id == @$results->location_id) ? 'selected' : ''); ?> ><?php echo e($val->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 form-group">
												
												<input type="hidden" name="rooms" class="from-control rooms_avaible" value="1"  placeholder="Rooms" style="width:100%">
											</div>
											<div class="col-md-12 col-sm-12 form-group">
												
												<input type="text" id="two_way_time" name="arrivaltime" placeholder="Arrival Timings" style="width:100%">
											</div>
											<?php if(@$tour_type == 'multi-day-tour'): ?>
											<div class="col-md-12 col-sm-12 form-group">
												
												<input type="text" id="departure_time" name="departure_time" placeholder="Departure Timings" style="width:100%">
											</div>
											<?php else: ?>
											<div class="col-md-12 col-sm-12 form-group">
												
												<input type="text" id="departure_time" name="departure_time" placeholder="Departure Timings" style="width:100%">
											</div>
											<?php endif; ?>
											
											<div class="col-md-12 col-sm-12 form-group">
												
												<input type="hidden" name="adult_capacity" value="1"  class="from-control adult_capacity" placeholder="Adults (16+)" style="width:100%">
											</div>
											<div class="col-md-12 col-sm-12 form-group">
												
												<input type="hidden" name="child_capacity"  value="1"  class="from-control child_capacity" placeholder="Children" style="width:100%">
											</div>
										
										<div class="col-md-12 col-sm-12">
											<p class="ride-terms">I understand and agree with the <a href="policy.html">Terms</a> of Service and Cancellation </p>
											<label for="book_terms">
												<input name="book_terms" id="book_terms" type="checkbox" checked="">
											</label>
										</div>
										<div class="col-md-12 col-sm-12">
											<button type="submit" class="book-btn">Next Step <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
										</div>
									</form>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-12">
							
							<?php if($type == 'vehicle' || $type == ''): ?>
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

							<?php
							$userBooking = Session::get('user_booking');
							?>
								<ul class="service-info">
									<li><span>From: </span><div class="startup_loc_s info-outer"></div></li>
									<li><span>To: </span><div class="end_loc_s info-outer"></div></li>
									<li><span>Pickup Date: </span><div class="pick_date info-outer"></div></li>
									<li><span>Pickup Time: </span><div class="pick_time info-outer"></div></li>
									<li><span>Dropoff Date: </span><div class="drop_date info-outer"></div></li>
									<li><span>Dropoff Time: </span><div class="drop_time info-outer"></div></li>
								</ul>
							</div>
							<?php endif; ?>
							<?php if($type == 'hotal'): ?>
							<div class="booking-summary hotal-booking-summary">
								<h3>Booking Summary</h3>
								<ul class="booking-info">
									<li><span>Booking Reference: </span><div class="book-ref">38772</div></li>
									<li><span>Journey Type: </span>
									<div class="service_type">Tour Booking</div></li>
									<li><span>Selected Tour:</span>
									<div class="select_hotal">Select Tour</div></li>
									<li><span>Selected Tour Location:</span>
									<div class="select_hotal_loc">Select Tour Location</div></li>
								</ul>
								<div class="journey-info">
									<h4 class="service_type">One Way Journey</h4>
								</div>
								<ul class="service-info">
									<!--li><span>Rooms : </span><div class="startup_loc_s info-outer selected_rooms"></div></li-->
									<li><span>Arrival Time : </span><div class="startup_loc_s info-outer arrivaltimeHotal"></div></li>
									<li><span>Departure Time : </span><div class="end_loc_s info-outer departuretimeHotal"></div></li>
									<!--li><span>Adults : </span><div class="pick_date info-outer hotal_adults"></div></li>
									<li><span>Children: </span><div class="pick_time info-outer hotal_child"></div></li-->
								</ul>
							</div>
							<?php endif; ?>
							<div class="booking-summary hotal-booking" style="display:none;">
								<h3>Booking Summary</h3>
								<ul class="booking-info">
									<li><span>Booking Reference: </span><div class="book-ref">38772</div></li>
									<li><span>Journey Type: </span>
									<div class="service_type">Tour Booking</div></li>
									<li><span>Selected Tour:</span>
									<div class="select_hotal">Select Tour</div></li>
									<li><span>Selected Tour Location:</span>
									<div class="select_hotal_loc">Select Tour Location</div></li>
								</ul>
								<div class="journey-info">
									<h4 class="service_type">One Way Journey</h4>
								</div>
								<ul class="service-info">
									<!--li><span>Rooms : </span><div class="startup_loc_s info-outer selected_rooms"></div></li-->
									<li><span>Arrival Time : </span><div class="startup_loc_s info-outer arrivaltimeHotal"></div></li>
									<li><span>Departure Time : </span><div class="end_loc_s info-outer departuretimeHotal"></div></li>
									<!--li><span>Adults : </span><div class="pick_date info-outer hotal_adults"></div></li>
									<li><span>Children: </span><div class="pick_time info-outer hotal_child"></div></li-->
								</ul>
							</div>
							<!-- <div class="booking-summary vehicle-booking-summary" style="display:none;">
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
									<li><span>From: </span><div class="startup_loc_s info-outer"></div></li>
									<li><span>To: </span><div class="end_loc_s info-outer"></div></li>
									<li><span>Pickup Date: </span><div class="pick_date info-outer"></div></li>
									<li><span>Pickup Time: </span><div class="pick_time info-outer"></div></li>
									<li><span>Dropoff Date: </span><div class="drop_date info-outer"></div></li>
									<li><span>Dropoff Time: </span><div class="drop_time info-outer"></div></li>
								</ul>
							</div> -->
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/booknow.blade.php ENDPATH**/ ?>