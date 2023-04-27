
<?php $__env->startSection('content'); ?>
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contact Request Detail</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                        <div class="user-view  height-label-1 d-flex">
                        <label>Name:</label>
                        <span class="ml-2"><?php echo e($contactReqDetail->name ? $contactReqDetail->name : 'N/A'); ?>

                        </span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Email:</label>
                        <span class="ml-2"> <?php echo e($contactReqDetail->email ? $contactReqDetail->email : 'N/A'); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Suject:</label>
                        <span class="ml-2"> <?php echo e(($contactReqDetail->subject) ? $contactReqDetail->subject : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Message:</label>
                        <span class="ml-2"> <?php echo e(($contactReqDetail->message) ? $contactReqDetail->message : ''); ?></span>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/admin/contact_request/show.blade.php ENDPATH**/ ?>