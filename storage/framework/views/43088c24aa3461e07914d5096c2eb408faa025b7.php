<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Al Fairoz Tourism Services</title>

    
    <?php echo $__env->make('admin.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" />
</head>

<body>
    <div class="container-scroller">
        <?php echo $__env->make('admin.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
            <div class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?> 
            </div>
        </div>
    </div>
    
    <?php echo $__env->make('admin.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.datatable.datatable-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?> 

</body>

</html>
<?php /**PATH /var/www/html/tour/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>