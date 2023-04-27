
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-body d-flex justify-content-between">
                        <h4 class="card-title">Tours</h4>
                        <a href="<?php echo e(route('admin.hotal.add')); ?>" class="btn btn-primary">Add Tour</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table hotal_datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Address</th>
                                    <th>Price</th>
                                    <th>Available Rooms</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tour/resources/views/admin/hotals/index.blade.php ENDPATH**/ ?>