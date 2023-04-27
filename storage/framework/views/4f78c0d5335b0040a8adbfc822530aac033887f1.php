
<?php $__env->startSection('content'); ?>
    <!-- demo dashoboard for now -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome <?php echo e($user ? $user->name : 'Guest'); ?></h3>
                            <p>Here you can find information and manage different aspects of your application.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main-panel ends -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>