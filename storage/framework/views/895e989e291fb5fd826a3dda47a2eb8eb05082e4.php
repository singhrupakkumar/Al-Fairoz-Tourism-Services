

<?php $__env->startSection('content'); ?>
			<!--Inner Banner Section Start-->
	    	<div class="tj-inner-banner">
	    		<div class="container">
	    			<h2>Hotal</h2>
	    		</div>
	    	</div>
			<!--Inner Banner Section End-->
			
			<!--Breadcrumb Section Start-->
	    	<div class="tj-breadcrumb">
				<div class="container">
					<ul class="breadcrumb-list">
						<li><a href="home-1.html">Home</a></li>
						<li class="active">Hotal Detail</li>
					</ul>
				</div>
	    	</div>
			<!--Breadcrumb Section End-->

			
			<section class="fleet-detail">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<div class="tj-post-holder">
								<div class="text-box">

									<div class="detail-img"><img src="<?php echo e(asset('storage/upload_image/'.$results->image)); ?>"/></div>
									<h3><?php echo e($results->hotal_name); ?></h3>
									<p><?php echo e($results->description); ?></p>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-4">
								<div class="tj-sidebar-outer">
									<div class="fleet-features widget">
										<ul>
											<li><i class="fas fa-map-marker-alt"></i><span>City :</span> <?php echo e($results->city); ?></li>
											<li><i class="fas fa-phone"></i><span>Phone :</span> <?php echo e($results->phone_number); ?></li>
											<li><i class="fas fa-tachometer-alt"></i><span>Price :</span> $<?php echo e($results->price); ?></li>
											<li><i class="fa fa-home"></i><span>Address :</span> <?php echo e($results->address); ?></li>
											<li><i class="fas fa-user"></i><span>Adults :</span> <?php echo e($results->adults); ?></li>
											<li><i class="fas fa-child"></i><span>Children :</span> <?php echo e($results->children); ?></li>
											<li><i class="fas fa-hotel"></i><span>Available Rooms :</span> <?php echo e($results->available_rooms); ?></li>
										</ul>
										<div class="book_fleet">
											<form action="<?php echo e(route('home.booknow') . '/' . \App\Helpers::encrypt($results->id)); ?>" >
													<input type="hidden" name="waytype" value="<?php echo e($type); ?>">
													<input type="hidden" name="hotal_id" value="<?php echo e(\App\Helpers::encrypt($results->id)); ?>">
												<button type="submit" class="book-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
											</form>
											<!-- <a href="https://themesjungle.net/html/prime-cab/booking-form.html">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a> -->
										</div>
									</div>
									
								</div>
							</div>
					
					</div>
					
				</div>
			</section>
			
				<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/hotal-detail.blade.php ENDPATH**/ ?>