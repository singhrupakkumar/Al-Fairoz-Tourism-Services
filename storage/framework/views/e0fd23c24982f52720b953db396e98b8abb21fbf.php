
<?php $__env->startSection('content'); ?>
<section class="tj-contact-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="tj-heading-style">
									<h3>Customize Tour</h3>
									<p>Lorem Ipsum passages, and more recently with desktop publishing software like aldus pageMaker including versions of all the Lorem Ipsum generators</p>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<?php if(session()->has('message')): ?>
							    <div class="alert alert-success">
							        <?php echo e(session()->get('message')); ?>

							    </div>
								<?php endif; ?>
								<div class="form-holder">
									<form method="post" action="<?php echo e(route('customizeTourstore')); ?>" class="tj-contact-form" id="customize-booking-form" novalidate="novalidate">
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
													<input placeholder="Enter Your Email" name="email" type="text" id="email">
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-6 col-sm-6 no-pad">
												<!--Inner Holder Start-->
												<div class="inner-holder form-group">
													<label for="phone">Phone<span>*</span></label>
													<input placeholder="Enter Your Phone" name="phone" type="text" id="phone">
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-6 col-sm-6 no-pad">
												<!--Inner Holder Start-->
												<div class="inner-holder form-group">
													<label for="country">Country<span>*</span></label>
													<select name="country" id="car_list" class="selectpicker">
														<option value="">Select Country</option>
														<option type="hidden" hidden="" value="">country</option>
								                        <option value="Afghanistan">Afghanistan</option>
								                        <option value="Åland Islands">Åland Islands</option>
								                        <option value="Albania">Albania</option>
								                        <option value="Algeria">Algeria</option>
								                        <option value="American Samoa">American Samoa</option>
								                        <option value="Andorra">Andorra</option>
								                        <option value="Angola">Angola</option>
								                        <option value="Anguilla">Anguilla</option>
								                        <option value="Antarctica">Antarctica</option>
								                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
								                        <option value="Argentina">Argentina</option>
								                        <option value="Armenia">Armenia</option>
								                        <option value="Aruba">Aruba</option>
								                        <option value="Australia">Australia</option>
								                        <option value="Austria">Austria</option>
								                        <option value="Azerbaijan">Azerbaijan</option>
								                        <option value="Bahamas">Bahamas</option>
								                        <option value="Bahrain">Bahrain</option>
								                        <option value="Bangladesh">Bangladesh</option>
								                        <option value="Barbados">Barbados</option>
								                        <option value="Belarus">Belarus</option>
								                        <option value="Belgium">Belgium</option>
													</select>
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-6 col-sm-6 no-pad">
												<!--Inner Holder Start-->
												<div class="inner-holder form-group">
													<label for="Duration">Duration<span>*</span></label>
													<input type="number" min="1" name="duration_days" class="form-control" placeholder="duration in days" required="">
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-6 col-sm-6 no-pad">
												<!--Inner Holder Start-->
												<div class="inner-holder form-group">
													<label for="Travellers">Travellers<span>*</span></label>
													<input type="number" min="1" name="no_of_travellers" class="form-control" placeholder="number of travellers" required="">
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-6 col-sm-6 no-pad">
												<!--Inner Holder Start-->
												<div class="inner-holder">
													<label for="Date of Arrival">Date of Arrival</label>
													<input type="date" id="dateArrival" name="date_of_arrival" class="form-control" placeholder="Date of Arrival">
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-6 col-sm-6 no-pad">
												<!--Inner Holder Start-->
												<div class="inner-holder ">
													<label for="Date of Departure*">Date of Departure</label>
													<input type="date" id="dateDeparture" name="date_of_departure" class="form-control" placeholder="Date of Departure" >
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-6 col-sm-6 no-pad">
												<!--Inner Holder Start-->
												<div class="inner-holder">
													<label for="Date">Date</label>
													<input type="date" id="dateArrival" name="date_arrival" class="form-control" placeholder="dd---yyyy" >
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-6 col-sm-6 no-pad">
												<!--Inner Holder Start-->
												<div class="inner-holder">
													<label for="Date of Departure">Place</label>
													<input type="text" name="place_one" class="form-control" placeholder="">
												</div>
												<!--Inner Holder End-->
											</div>
											<div class="col-md-12 col-sm-12">
												<div class="inner-holder">
													<button class="btn-submit" type="submit" id="frm_submit_btn">Submit <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							
						</div>
					</div>
				</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/customize-tour.blade.php ENDPATH**/ ?>