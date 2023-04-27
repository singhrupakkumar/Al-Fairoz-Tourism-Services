
<?php $__env->startSection('content'); ?>
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(ucfirst($hotalBooking->type)); ?> Detail</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                            <div class="user-view  height-label-1 d-flex">
                        <label>Hotal Phone Number:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->phone_number) ?  $hotalBooking->phone_number : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Price:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->price) ? '$' .  $hotalBooking->price : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Address:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->address) ?  $hotalBooking->address : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Adults:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->adults) ?  $hotalBooking->adults : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Children:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->children) ?  $hotalBooking->children : ''); ?></span>
                        </div>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Available Rooms:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->available_rooms) ?  $hotalBooking->available_rooms : ''); ?></span>
                        </div>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Check In:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->pickup_date) ?  date('d-m-Y', strtotime($hotalBooking->pickup_date)) : ''); ?></span>
                        </div>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Check Out:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->dropoff_date) ?   date('d-m-Y', strtotime($hotalBooking->dropoff_date)) : ''); ?></span>
                        </div>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Name:</label>
                        <span class="ml-2"><?php echo e($hotalBooking->first_name ? $hotalBooking->first_name . ' ' . $hotalBooking->last_name : 'N/A'); ?>

                        </span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Email:</label>
                        <span class="ml-2"> <?php echo e($hotalBooking->email ? $hotalBooking->email : 'N/A'); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Phone:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->phone) ? $hotalBooking->phone : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Hotal Name:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->hotal_name) ? $hotalBooking->hotal_name : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>City:</label>
                        <span class="ml-2"> <?php echo e(($hotalBooking->city) ?  $hotalBooking->city : ''); ?></span>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/admin/vehicle-tour/show-hotal-detail.blade.php ENDPATH**/ ?>