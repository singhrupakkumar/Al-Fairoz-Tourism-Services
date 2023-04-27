<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
      <!--   <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.tours.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Tours</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.destinations.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Destination</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.customtours.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Custom tours</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.contacts.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Contact Requests</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.onedaytour.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">One day Tour</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.multidaytour.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Multi day Tour</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.vehicle-tour.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Vehicle & Tour</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.vehicles.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Vehicles</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Destination</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic
                            Elements</a></li>
                </ul>
            </div>
        </li> --}}
    </ul>
</nav>
