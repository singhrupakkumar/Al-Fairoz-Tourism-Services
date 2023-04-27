
<?php $__env->startSection('content'); ?>
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(ucfirst($vehicleBooking->type)); ?> Detail</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                        <div class="user-view  height-label-1 d-flex">
                        <label>Name:</label>
                        <span class="ml-2"><?php echo e($vehicleBooking->first_name ? $vehicleBooking->first_name . ' ' . $vehicleBooking->last_name : 'N/A'); ?>

                        </span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Email:</label>
                        <span class="ml-2"> <?php echo e($vehicleBooking->email ? $vehicleBooking->email : 'N/A'); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Phone:</label>
                        <span class="ml-2"> <?php echo e(($vehicleBooking->phone) ? $vehicleBooking->phone : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Vehicle Name:</label>
                        <span class="ml-2"> <?php echo e(($vehicleBooking->name) ? $vehicleBooking->name : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Vehicle Price:</label>
                        <span class="ml-2"> <?php echo e(($vehicleBooking->price) ? '$' . $vehicleBooking->price : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Pickup Location:</label>
                        <span class="ml-2"> <?php echo e(($vehicleBooking->pickup_loc) ?  $vehicleBooking->pickup_loc : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Dropoff Location:</label>
                        <span class="ml-2"> <?php echo e(($vehicleBooking->dropoff_loc) ?  $vehicleBooking->dropoff_loc : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Pickup Date:</label>
                        <span class="ml-2"> <?php echo e(($vehicleBooking->pickup_date) ?  $vehicleBooking->pickup_date : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Pickup Time:</label>
                        <span class="ml-2"> <?php echo e(($vehicleBooking->pickup_time) ?  $vehicleBooking->pickup_time : ''); ?></span>
                        </div>

                        </div>
                        </div> 
                        </div>
                        </div>
                        </div>
                        </div>
                        </section>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/admin/vehicle-tour/show.blade.php ENDPATH**/ ?>