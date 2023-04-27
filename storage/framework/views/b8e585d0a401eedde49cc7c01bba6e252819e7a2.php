<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.users.index')); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
      <!--   <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.tours.index')); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Tours</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.destinations.index')); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Destination</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.customtours.index')); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Custom tours</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.contacts.index')); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Contact Requests</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.onedaytour.index')); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">One day Tour</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.multidaytour.index')); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Multi day Tour</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.vehicle-tour.index')); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Vehicle & Tour</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.vehicles.index')); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Vehicles</span>
            </a>
        </li>

        
    </ul>
</nav>
<?php /**PATH /var/www/html/tour/resources/views/admin/partials/sidebar.blade.php ENDPATH**/ ?>