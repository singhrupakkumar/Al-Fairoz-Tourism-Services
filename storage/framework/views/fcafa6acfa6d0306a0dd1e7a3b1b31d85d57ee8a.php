
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
                        <label>Name:</label>
                        <span class="ml-2"><?php echo e($locDetail->name ? $locDetail->name : 'N/A'); ?>

                        </span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>City:</label>
                        <span class="ml-2"> <?php echo e(($locDetail->city) ? $locDetail->city : ''); ?></span>
                        </div>
                        
                        <div class="user-view  height-label-1 d-flex">
                        <label>image:</label>
                        <?php 
                        $image = 'deals-bg.jpg';
                        if($locDetail->image != null){
                            $image = $locDetail->image;
                        }else{
                            $image = 'deals-bg.jpg';
                        }
                        ?>
                        <span class="ml-2"><img src="<?php echo e(asset('storage/upload_image/'.$image)); ?>" height="250" width="250" /></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Description:</label>
                        <span class="ml-2"> <?php echo e(($locDetail->description) ? $locDetail->description : ''); ?></span>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/admin/destinations/show.blade.php ENDPATH**/ ?>