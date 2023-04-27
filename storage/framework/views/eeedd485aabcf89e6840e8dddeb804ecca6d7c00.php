
<?php $__env->startSection('content'); ?>
			<!--Inner Banner Section Start-->
	    	<div class="tj-inner-banner">
	    		<div class="container">
	    			<h2><?php echo e($getPageData['name']); ?></h2>
	    		</div>
	    	</div>
			<!--Inner Banner Section End-->
			
			<!--Breadcrumb Section Start-->
	    	<div class="tj-breadcrumb">
				<div class="container">
					<ul class="breadcrumb-list">
						<li><a href="home-1.html">Home</a></li>
						<li class="active"><?php echo e($getPageData['name']); ?></li>
					</ul>
				</div>
	    	</div>
			<!--Breadcrumb Section End-->
			<?php if($getPageData['slug'] == 'about-us'): ?>
			<section class="tj-aboutus">
				<div class="container">
					<div class="row">
						<?php echo $getPageData['description']; ?>

					</div>
				</div>
			</section>
			<?php elseif($getPageData['slug'] == 'contact-us'): ?>
				<section class="tj-contact-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<?php echo $getPageData['description']; ?>

							</div>
							<div class="col-md-8 col-sm-8">
								<?php if(session()->has('message')): ?>
							    <div class="alert alert-success">
							        <?php echo e(session()->get('message')); ?>

							    </div>
								<?php endif; ?>
								<div class="form-holder">
									<form method="post" action="<?php echo e(route('contact.store')); ?>" class="tj-contact-form" id="contactus-form" novalidate="novalidate">
											<?php echo csrf_field(); ?>
										<div class="row">
											<div class="col-md-6 col-sm-6">
												<!--Inner Holder Start-->
												<div class="inner-holder form-group">
													<label for="name">Name<span>*</span></label>
													<input placeholder="Enter Your Name" name="name" type="text" id="name" required="">
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-6 col-sm-6 no-pad">
												<!--Inner Holder Start-->
												<div class="inner-holder form-group">
													<label for="email">Email<span>*</span></label>
													<input placeholder="Enter Your Email" name="email" type="email" id="email">
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-12 col-sm-12">
												<!--Inner Holder Start-->
												<div class="inner-holder form-group">
													<label for="subject">Subject<span>*</span></label>
													<input placeholder="Your Subject" name="subject" type="text" id="subject">
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-12 col-sm-12">
												<!--Inner Holder Start-->
												<div class="inner-holder form-group">
													<label for="message">Message<span>*</span></label>
													<textarea name="message" placeholder="Your Message" id="message"></textarea>
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-12 col-sm-12">
												<div class="inner-holder">
													<button class="btn-submit" type="submit" id="frm_submit_btn">Send Message <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="address-box">
									<div class="add-info">
										<i class="fas fa-home" aria-hidden="true"></i>
										<p><?php echo e(\App\Helpers::setting()->address); ?></p>
									</div>
									<div class="add-info">
										<i class="fas fa-phone" aria-hidden="true"></i>
										<p>
											<a href="tel:<?php echo e(\App\Helpers::setting()->phone); ?>"><?php echo e(\App\Helpers::setting()->phone); ?></a>
										</p>
									</div>
									<div class="add-info">
										<i class="far fa-envelope-open" aria-hidden="true"></i>
										<p>
											<a href="mailto:<?php echo e(\App\Helpers::setting()->email); ?>">
											<?php echo e(\App\Helpers::setting()->email); ?></a>
										</p>
									</div>
									
									
								</div>
								
								<div class="address-box mt-3">							
									<div class="maps">
										<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d27446.070229927616!2d76.7066112!3d30.6970624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1681459627855!5m2!1sen!2sin" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</section>
			<?php else: ?>	
			<section class="tj-aboutus">
				<div class="container">
					<div class="row">
						<?php echo $getPageData['description']; ?>

					</div>
				</div>
			</section>	
			<?php endif; ?>
			
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/page.blade.php ENDPATH**/ ?>