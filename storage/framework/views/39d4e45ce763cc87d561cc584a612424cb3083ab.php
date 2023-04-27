<?php $__env->startSection('content'); ?>
			
			<section class="tj-banner-form" id="homebanners">
				<div class="container">
					<div class="row">
						<!--Header Banner Caption Content Start-->
						<div class="col-md-8 col-sm-7">
							<div class="banner-caption">
								<div class="banner-inner bounceInLeft animated delay-2s">
									<strong>Enjoy the Freedom</strong>
									<h2>The Freedom of cab</h2>
									<div class="banner-btns">
										<a href="" class="btn-style-1"><i class="fab fa-apple"></i> Download App</a>
										<a href="" class="btn-style-2"><i class="fab fa-android"></i> Download App</a>
									</div>
								</div>
							</div>
						</div>
						<!--Header Banner Caption Content End-->
						<!--Header Banner Form Content Start-->
						<div class="col-md-4 col-sm-5">
							<div class="trip-outer"> 
							<?php if(session()->has('message')): ?>
							    <div class="alert alert-success">
							        <?php echo e(session()->get('message')); ?>

							    </div>
							<?php endif; ?> 
								<div class="trip-type-tabs">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#one-way" data-toggle="tab">One Way</a></li>
										<li class=""><a href="#two-way" data-toggle="tab">Tour</a></li>
									</ul>
								</div>
								<!--Banner Tab Content Start-->
								<div class="tab-content">
									<div class="tab-pane active" id="one-way">
										<!--Banner Form Content Start-->
										<input type="hidden" name="waytype" value="one-way">
										<form  action="<?php echo e(route('home.listing')); ?>" method="GET" class="trip-type-frm"> 
											<div class="field-outer">
												<span class="fas fa-search"></span>
												<div class="field-holder">
												<select name="pick_loc" id="car_list" class="selectpicker from-control">
													<option value="">Select Pickup Locations</option>
													<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
											</div>
											<div class="field-outer">
												<span class="fas fa-search"></span>
												<select name="drop_loc" class="selectpicker from-control">
													<option value="">Select Drop Locations</option>
													<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
											<div class="field-outer">
												<span class="fas fa-calendar-alt"></span>
												<input type="text" id="basicDate" name="pick_date" placeholder="Select your Date">
											</div>
											<div class="field-outer">
												<span class="far fa-clock"></span>
												<input type="text" id="timePicker" name="pick_time" placeholder="Select Timings">
											</div>
											<div class="field-outer">
												<span class="far fa-clock"></span>
												<input type="number" name="adult_capacity" class="from-control" placeholder="Adults (16+)">
											</div>
											<div class="field-outer">
												<span class="far fa-clock"></span>
												<input type="number" name="child_capacity" class="from-control" placeholder="Children">
											</div>
										
											<button type="submit" class="search-btn">Search Cabs <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>	
										</form>
										<!--Banner Form Content End-->
									</div>
									<div class="tab-pane" id="two-way">
										<!--Banner Form Content Start-->
										<form  action="<?php echo e(route('home.tour-listing')); ?>" method="GET" class="trip-type-frm"> 
											<input type="hidden" name="waytype" value="two-way">
											<div class="cell-md-8">
					                          <div class="form-group radio-inline-wrapper">
					                            <label class="radio-inline">
					                              <input name="tour_type" value="work" type="radio" checked="" class="radio-custom"><span class="radio-custom-dummy"></span>Work
					                            </label>
					                            <label class="radio-inline">
					                              <input name="tour_type" value="vacation" type="radio" class="radio-custom"><span class="radio-custom-dummy"></span>Vacation
					                            </label>
					                          </div>
					                        </div>
											<div class="field-outer">
												<span class="fas fa-search"></span>
												<div class="field-holder">
												<select name="location_id" id="location" class="selectpicker from-control">
													<option>Select Destination</option>
													<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
											</div>
											<div class="field-outer">
												<span class="far fa-clock"></span>
												<input type="number" name="rooms" class="from-control" placeholder="Rooms">
											</div>
											<div class="field-outer">
												<span class="far fa-clock"></span>
												<input type="text" id="two_way_time" name="arrivaltime" placeholder="Arrival Timings">
											</div>
											<div class="field-outer">
												<span class="far fa-clock"></span>
												<input type="text" id="departure_time" name="departure_time" placeholder="Departure Timings">
											</div>
											
											<div class="field-outer">
												<span class="far fa-clock"></span>
												<input type="number" name="adult_capacity" class="from-control" placeholder="Adults (16+)">
											</div>
											<div class="field-outer">
												<span class="far fa-clock"></span>
												<input type="number" name="child_capacity" class="from-control" placeholder="Children">
											</div>
											<button type="submit" class="search-btn">Search <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>	
										</form>
										<!--Banner Form Content End-->
									</div>
								</div>
								<!--Banner Tab Content End-->
							</div>
						</div>
						<!--Header Banner Form Content End-->
					</div>
				</div>
			</section>
			<!--Header Banner Content End-->
			
			<!--Offer Content Start-->
			<section class="tj-offers">
				<div class="row">
					<!--Offer Box Content Start-->
					<div class="col-md-3 col-sm-6">
						<div class="offer-box">
							<img src="<?php echo e(url('/')); ?>/prime-cab/images/offer-icon1.png" alt="">
							<div class="offer-info">
								<h4>Best Price Guaranteed</h4>
								<p>A more recently with desktop softy  like aldus page maker.</p>
							</div>
						</div>
					</div>
					<!--Offer Box Content End-->
					<!--Offer Box Content Start-->
					<div class="col-md-3 col-sm-6">
						<div class="offer-box">
							<img src="<?php echo e(url('/')); ?>/prime-cab/images/offer-icon2.png" alt="">
							<div class="offer-info">
								<h4>24/7 Customer Care</h4>
								<p>A more recently with desktop softy  like aldus page maker.</p>
							</div>
						</div>
					</div>
					<!--Offer Box Content End-->
					<!--Offer Box Content Start-->
					<div class="col-md-3 col-sm-6">
						<div class="offer-box">
							<img src="<?php echo e(url('/')); ?>/prime-cab/images/offer-icon3.png" alt="">
							<div class="offer-info">
								<h4>Home Pickups</h4>
								<p>A more recently with desktop softy  like aldus page maker.</p>
							</div>
						</div>
					</div>
					<!--Offer Box Content End-->
					<!--Offer Box Content Start-->
					<div class="col-md-3 col-sm-6">
						<div class="offer-box">
							<img src="<?php echo e(url('/')); ?>/prime-cab/images/offer-icon4.png" alt="">
							<div class="offer-info">
								<h4>Easy Bookings</h4>
								<p>A more recently with desktop softy  like aldus page maker.</p>
							</div>
						</div>
					</div>
					<!--Offer Box Content End-->
				</div>
			</section>
			<!--Offer Content End-->
			
			<!--Welcome Section Content Start-->
			<section class="tj-welcome">
				<div class="container">
					<div class="row">
						<!--Welcome Section Start-->
						<div class="col-md-6 col-sm-7">
							<div class="about-info">
								<div class="tj-heading-style">
									<h3>Who We Are</h3>
								</div>
								<p>Lorem Ipsum passages, and more recently with desktop publishing software like aldus pageMaker including versions of all the Lorem Ipsum generators on thet Internet tends to repeat predefined chunks as necessary, making this an web evolved over the years, sometimes by accident.</p>
								<a href="<?php echo e(route('home.listing')); ?>">See all Vehicles<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
								<ul class="facts-list">
									<li>
										<strong class="fact-count">100</strong>
										<i class="fa fa-percent"></i>
										<span>Happy Customer</span>
									</li>
									<li>
										<strong class="fact-count">200</strong>
										<i class="fas fa-plus"></i>
										<span>Luxury Cars</span>
									</li>
									<li>
										<strong class="fact-count">12,000</strong>
										<i class="fas fa-arrow-up"></i>
										<span>Kilometers Driven</span>
									</li>
								</ul>
							</div>
						</div>
						<!--Welcome Section End-->
						<!--Welcome Section Image Box Start-->
						<div class="col-md-6 col-sm-5">
							<div class="welcome-banner">
								<img src="<?php echo e(url('/')); ?>/prime-cab/images/welcome-img.jpg" alt="">
							</div>
						</div>
						<!--Welcome Section Image Box End-->
					</div>
				</div>
			</section>
			<!--Welcome Section Content End-->
			
			
			<section class="fleet-carousel">
				<div class="col-md-12 col-sm-12">
					<div class="tj-heading-style">
						<h3>Our Car Fleet</h3>
					</div>
				</div>
				<div class="carousel-outer">
					<div class="cab-carousel owl-carousel owl-theme" id="cab-carousel">
					<?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<div class="owl-item">
							<div class="fleet-item">
								<img src="<?php echo e(asset('storage/upload_image/'.$val->image)); ?>" alt="">
								<div class="fleet-inner">
									<h4><?php echo e($val->name); ?></h4>
									<ul>
										<li><i class="fas fa-taxi"></i><?php echo e($val->model); ?></li>
										<li><i class="fas fa-user-circle"></i><?php echo e($val->adults_capacity); ?> Passengers</li>
									</ul>
									<strong class="price">$<?php echo e($val->price); ?><span> / day</span></strong>
									<a href="<?php echo e(route('home.booknow'). '/'. \App\Helpers::encrypt($val->id)); ?>" target="_blank">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<?php endif; ?>
						
				
						<div class="owl-controls">
							<div class="owl-nav">
								<div class="owl-prev" style=""></div>
								<div class="owl-next" style=""></div>
							</div>
							<div class="owl-dots" style="display: none;"></div>
						</div>
					</div>
				</div>
			</section>

			<!--Cab Services Section Start-->
			<section class="cab-services">
				<div class="container">
					<div class="row">
						<!--Cab Services Heading Start-->
						<div class="tj-heading-style">
							<h3>Our Services</h3>
							<p>Lorem Ipsum passages, and more recently with desktop publishing software like aldus pageMaker including versions.</p>
						</div>
						<!--Cab Services Heading End-->
						<!--Cab Services Outer Start-->
						<div class="col-md-4 col-sm-4">
							<div class="cab-service-box">
								<!--Cab Services Thumb Start-->
								<figure class="service-thumb">
									<img src="<?php echo e(url('/')); ?>/prime-cab/images/cab-service-icon1.png" alt="">
								</figure>
								<!--Cab Services Thumb End-->
								<!--Cab Services Info Start-->
								<div class="service-desc">
									<h4>Restaurants</h4>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
								<!--Cab Services Info End-->
							</div>
						</div>
						<!--Cab Services Outer End-->
						<!--Cab Services Outer Start-->
						<div class="col-md-4 col-sm-4">
							<div class="cab-service-box">
								<!--Cab Services Thumb Start-->
								<figure class="service-thumb">
									<img src="<?php echo e(url('/')); ?>/prime-cab/images/cab-service-icon2.png" alt="">
								</figure>
								<!--Cab Services Thumb End-->
								<!--Cab Services Info Start-->
								<div class="service-desc">
									<h4>Airports</h4>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
								<!--Cab Services Info End-->
							</div>
						</div>
						<!--Cab Services Outer End-->
						<!--Cab Services Outer Start-->
						<div class="col-md-4 col-sm-4">
							<div class="cab-service-box">
								<!--Cab Services Thumb Start-->
								<figure class="service-thumb">
									<img src="<?php echo e(url('/')); ?>/prime-cab/images/cab-service-icon3.png" alt="">
								</figure>
								<!--Cab Services Thumb End-->
								<!--Cab Services Info Start-->
								<div class="service-desc">
									<h4>Hospitals</h4>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
								<!--Cab Services Info End-->
							</div>
						</div>
						<!--Cab Services Outer End-->
						<!--Cab Services Outer Start-->
						<div class="col-md-4 col-sm-4">
							<div class="cab-service-box">
								<!--Cab Services Thumb Start-->
								<figure class="service-thumb">
									<img src="<?php echo e(url('/')); ?>/prime-cab/images/cab-service-icon4.png" alt="">
								</figure>
								<!--Cab Services Thumb End-->
								<!--Cab Services Info Start-->
								<div class="service-desc">
									<h4>Beaches</h4>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
								<!--Cab Services Info End-->
							</div>
						</div>
						<!--Cab Services Outer End-->
						<!--Cab Services Outer Start-->
						<div class="col-md-4 col-sm-4">
							<div class="cab-service-box">
								<!--Cab Services Thumb Start-->
								<figure class="service-thumb">
									<img src="<?php echo e(url('/')); ?>/prime-cab/images/cab-service-icon5.png" alt="">
								</figure>
								<!--Cab Services Thumb End-->
								<!--Cab Services Info Start-->
								<div class="service-desc">
									<h4>Shopping Malls</h4>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
								<!--Cab Services Info End-->
							</div>
						</div>
						<!--Cab Services Outer End-->
						<!--Cab Services Outer Start-->
						<div class="col-md-4 col-sm-4">
							<div class="cab-service-box">
								<!--Cab Services Thumb Start-->
								<figure class="service-thumb">
									<img src="<?php echo e(url('/')); ?>/prime-cab/images/cab-service-icon6.png" alt="">
								</figure>
								<!--Cab Services Thumb End-->
								<!--Cab Services Info Start-->
								<div class="service-desc">
									<h4>Wedding Parties</h4>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
								<!--Cab Services Info End-->
							</div>
						</div>
						<!--Cab Services Outer End-->
					</div>
				</div>
			</section>		
			<!--Cab Services Section End-->
					
			<!--Booking Deals Section Start-->
			<section class="tj-deals">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="tj-heading-style">
								<h3>Deals on Booking</h3>
								<p>Lorem Ipsum passages, and more recently with desktop publishing software like aldus pageMaker</p>
							</div>
						</div>
						<?php $__empty_1 = true; $__currentLoopData = $tour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<!-- Deal Box Content Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deal-box">
								<figure class="deal-thumb">
									<img src="<?php echo e(asset('storage/upload_image/'.$val->image)); ?>" alt="">
								</figure>
								<div class="deal-info">
									<h4><?php echo e($val->hotal_name); ?></h4>
									<span>Starts from <strong>$<?php echo e($val->price); ?>/day</strong></span>
								</div>
							</div>
						</div>
						<!-- Deal Box Content End-->
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<?php endif; ?>
						
					</div>
				</div>
			</section>
			<!--Booking Deals Section End-->
					
			<!--Testimonials Section Start-->
			<section class="tj-reviews">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="tj-heading-style">
								<h3>Testimonials</h3>
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<!--Testimonials Slider Content Start-->
							<div id="testimonial-slider" class="reviews-slider owl-carousel owl-theme">
								<!--Review Item Start-->
								
								<!--Review Item End-->
								<!--Review Item Start-->
								
								<!--Review Item End-->
								<!--Review Item Start-->
								
								<!--Review Item End-->
								
								
									<div class="owl-item">
										<div class="review-item">
											<figure class="img-box">
												<img src="<?php echo e(url('/')); ?>/prime-cab/images/testimonial-img2.png" alt="">
											</figure>
											<div class="review-info">
												<strong>Stefy Grafi</strong>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon"></span>
												<div class="review-quote">
													<p>Lorem Ipsum passages, and more recently with desktop publish soft like aldus pageMaker including versions</p>
												</div>
											</div>
										</div>
									</div>
									<div class="owl-item">
										<div class="review-item">
											<figure class="img-box">
												<img src="<?php echo e(url('/')); ?>/prime-cab/images/testimonial-img1.png" alt="">
											</figure>
											<div class="review-info">
												<strong>James Peter</strong>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon"></span>
												<div class="review-quote">
													<p>Lorem Ipsum passages, and more recently with desktop publish soft like aldus pageMaker including versions</p>
												</div>
											</div>
										</div>
									</div>
									<div class="owl-item">
										<div class="review-item">
											<figure class="img-box">
												<img src="<?php echo e(url('/')); ?>/prime-cab/images/testimonial-img1.png" alt="">
											</figure>
											<div class="review-info">
												<strong>James Peter</strong>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon"></span>
												<div class="review-quote">
													<p>Lorem Ipsum passages, and more recently with desktop publish soft like aldus pageMaker including versions</p>
												</div>
											</div>
										</div>
									</div>
									<div class="owl-item">
										<div class="review-item">
											<figure class="img-box">
												<img src="<?php echo e(url('/')); ?>/prime-cab/images/testimonial-img2.png" alt="">
											</figure>
											<div class="review-info">
												<strong>Stefy Grafi</strong>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon rating"></span>
												<span class="icon-star-empty icomoon"></span>
												<div class="review-quote">
													<p>Lorem Ipsum passages, and more recently with desktop publish soft like aldus pageMaker including versions</p>
												</div>
											</div>
										</div>
									</div>
								
							</div>
								<div class="owl-controls">
									<div class="owl-nav">
										<div class="owl-prev" style=""></div>
										<div class="owl-next" style=""></div>
									</div>
									<div class="owl-dots" style="display: none;"></div>
								</div>
							</div>
							<!--Testimonials Slider Content End-->
						</div>	
					</div>
				</div>
			</section>
			<!--Testimonials Section End-->
			
			
			<!--News Content Start-->
			<section class="tj-news">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="tj-heading-style">
								<h3>Latest News</h3>
								<p>Lorem Ipsum passages, and more recently with desktop publishing software like aldus pageMaker including versions.</p>
							</div>
						</div>
						<!--Newsbox Content Start-->
						<div class="col-md-4 col-sm-6">
							<div class="news-box">
								<!--Newsbox Thumb Start-->
								<figure>
									<img src="<?php echo e(url('/')); ?>/prime-cab/images/news_img1.jpg" alt="">
								</figure>
								<!--Newsbox Thumb End-->
								<!--News Detail Content Start-->
								<div class="news-detail">
									<h4>Repeat predefined chunks</h4>
									<p>A more recently with desktop softy like aldo page maker repeat predefined.</p>
									<ul>
										<li><i class="far fa-clock"></i> Sep 19, 2018</li>
										<li><i class="far fa-comments"></i> 29</li>
									</ul>
								</div>
								<!--News Detail Content End-->
							</div>
						</div>
						<!--Newsbox Content End-->
						<!--Newsbox Content Start-->
						<div class="col-md-4 col-sm-6">
							<div class="news-box">
								<!--Newsbox Thumb Start-->
								<figure>
									<img src="<?php echo e(url('/')); ?>/prime-cab/images/news_img2.jpg" alt="">
								</figure>
								<!--Newsbox Thumb End-->
								<!--News Detail Content Start-->
								<div class="news-detail">
									<h4>Making it look readable</h4>
									<p>A more recently with desktop softy like aldo page maker repeat predefined.</p>
									<ul>
										<li><i class="far fa-clock"></i> Sep 19, 2018</li>
										<li><i class="far fa-comments"></i> 29</li>
									</ul>
								</div>
								<!--News Detail Content End-->
							</div>
						</div>
						<!--Newsbox Content End-->
						<!--News List Content Start-->
						<div class="col-md-4 col-sm-12">
							<div class="news-list">
								<!--News Outer Content Start-->
								<ul class="news-outer">
									<li>
										<figure>
											<img src="<?php echo e(url('/')); ?>/prime-cab/images/news_img3.jpg" alt="">
										</figure>
										<div class="news-info">
											<h4>Various versions have evole over the years</h4>
											<ul class="news-meta">
												<li><i class="far fa-clock"></i> Sep 19, 2018</li>
												<li><i class="far fa-comments"></i> 29</li>
											</ul>
										</div>
									</li>
									<li>
										<figure>
											<img src="<?php echo e(url('/')); ?>/prime-cab/images/news_img4.jpg" alt="">
										</figure>
										<div class="news-info">
											<h4>A galley of type and scrambe it to make a type</h4>
											<ul class="news-meta">
												<li><i class="far fa-clock"></i> Sep 19, 2018</li>
												<li><i class="far fa-comments"></i> 29</li>
											</ul>
										</div>
									</li>
									<li>
										<figure>
											<img src="<?php echo e(url('/')); ?>/prime-cab/images/news_img5.jpg" alt="">
										</figure>
										<div class="news-info">
											<h4>Treatise on the theory of ethics very popular</h4>
											<ul class="news-meta">
												<li><i class="far fa-clock"></i> Sep 19, 2018</li>
												<li><i class="far fa-comments"></i> 29</li>
											</ul>
										</div>
									</li>
								</ul>
								<!--News Outer Content End-->
							</div>
						</div>
						<!--News List Content End-->
					</div>
				</div>
			</section>
			<!--News Content End-->
			
			
			
			
			<!--Call To Action 2 Content Start-->
			<section class="tj-cal-to-action2">
				<div class="container">
					<div class="row">
						<div class="col-md-9 col-sm-9">
							<div class="cta-tagline">
								<h2>Incredible Destinations at Incredible Deals</h2>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-3">
							<div class="cta-btn">
								<a href="">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--Call To Action 2 Content End-->
			<script>
			$("#bookbutton").on("click", function() {
    $("body").scrollTop(0);
});
			</script>
			<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/welcome.blade.php ENDPATH**/ ?>