
<?php $__env->startSection('content'); ?>
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tour Detail</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                        <div class="user-view  height-label-1 d-flex">
                        <label>Tour Name:</label>
                        <span class="ml-2"><?php echo e($hotalDetail->hotal_name ? $hotalDetail->hotal_name : 'N/A'); ?>

                        </span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Price:</label>
                        <span class="ml-2"> <?php echo e($hotalDetail->price ? $hotalDetail->price : 'N/A'); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>City:</label>
                        <span class="ml-2"> <?php echo e(($hotalDetail->city) ? $hotalDetail->city : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Address:</label>
                        <span class="ml-2"> <?php echo e(($hotalDetail->address) ? $hotalDetail->address : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Adults:</label>
                        <span class="ml-2"> <?php echo e(($hotalDetail->adults) ? $hotalDetail->adults : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Children:</label>
                        <span class="ml-2"> <?php echo e(($hotalDetail->children) ? $hotalDetail->children : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Available Rooms:</label>
                        <span class="ml-2"> <?php echo e(($hotalDetail->available_rooms) ? $hotalDetail->available_rooms : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Location:</label>
                        <span class="ml-2"> <?php echo e(($hotalDetail->name) ? $hotalDetail->name : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>image:</label>
                        <?php 
                        $image = 'deals-bg.jpg';
                        if($hotalDetail->image != null){
                            $image = $hotalDetail->image;
                        }else{
                            $image = 'deals-bg.jpg';
                        }
                        ?>
                        <span class="ml-2"><img src="<?php echo e(asset('storage/upload_image/'.$image)); ?>" /></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Description:</label>
                        <span class="ml-2"> <?php echo e(($hotalDetail->description) ? $hotalDetail->description : ''); ?></span>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/admin/hotals/show.blade.php ENDPATH**/ ?>