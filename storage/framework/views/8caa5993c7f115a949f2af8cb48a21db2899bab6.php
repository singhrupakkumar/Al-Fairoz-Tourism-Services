
		
			<header class="tj-header">
				<!--Header Content Start-->
				<div class="container">
					<div class="row">
						<!--Toprow Content Start-->
						<div class="col-md-3 col-sm-4 col-xs-12">
							<!--Logo Start-->
							<div class="tj-logo">
								<h1><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('storage/upload_image/'. \App\Helpers::setting()->logo )); ?>"></a></h1>
							</div>
							<!--Logo End-->
						</div>
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="info_box">
								<i class="fa fa-home"></i>
								<div class="info_text">
									<span class="info_title">Address</span>
									<span><?php echo e(\App\Helpers::setting()->address); ?></span>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="info_box">
								<i class="fa fa-envelope"></i>
								<div class="info_text">
									<span class="info_title">Email Us</span>
									<span><a href="mailto:<?php echo e(\App\Helpers::setting()->email); ?>">
											<?php echo e(\App\Helpers::setting()->email); ?></a></span>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div class="phone_info">
								<div class="phone_icon">
									<i class="fas fa-phone-volume"></i>
								</div>
								<div class="phone_text">
									<span><a href="tel:1-234-000-2345"><?php echo e(\App\Helpers::setting()->phone); ?></a></span>
								</div>
							</div>
						</div>
						<!--Toprow Content End-->
					</div>
				</div>
				
				<div class="tj-nav-row">
					<div class="container">
						<div class="row">
							<!--Nav Holder Start-->
							<div class="tj-nav-holder">
								<!--Menu Holder Start-->
								<nav class="navbar navbar-default"> 
									<div class="navbar-header">
									  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tj-navbar-collapse" aria-expanded="false"> 
										  <span class="sr-only">Menu</span>
										  <span class="icon-bar"></span> 
										  <span class="icon-bar"></span> 
										  <span class="icon-bar"></span>
									  </button>
									</div>
									<!-- Navigation Content Start -->
									<div class="collapse navbar-collapse" id="tj-navbar-collapse">
									  <ul class="nav navbar-nav">
										<li class="dropdown"> <a href="<?php echo e(url('/')); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
										
										</li>
										<li>
											<a href="<?php echo e(route('home.tour')); ?>?view=grid">Tour</a>
										</li>
										<li>
											<a href="<?php echo e(route('home.onedaytour')); ?>?view=grid">One Day Tour</a>
										</li>
										<li>
											<a href="<?php echo e(route('customizeTour')); ?>">Customize Tour</a>
										</li>
										
										<li>
											<a href="<?php echo e(route('locations')); ?>">Locations</a>
										</li>
										
										<li>
											<a href="<?php echo e(url('/page/about-us')); ?>">About Us</a>
										</li>
									
										<li>
											<a href="<?php echo e(url('/page/contact-us')); ?>">Contact Us</a>
										</li>
									   
									  </ul>
									</div>
									<!-- Navigation Content Start -->
								</nav>
								<!--Menu Holder End-->
								<div class="book_btn">
									<a href="<?php echo e(url('/booknow')); ?>" id="bookbutton">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
								</div>
							</div><!--Nav Holder End-->
						</div>
					</div>
				</div>
			</header><?php /**PATH /var/www/html/tour/resources/views/common/header.blade.php ENDPATH**/ ?>