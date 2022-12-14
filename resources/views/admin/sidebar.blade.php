<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="#">
                <span class="smini-visible">
                    D<span class="opacity-75">x</span>
                </span>
                <span class="smini-hidden">
                    Dash<span class="opacity-75">mix</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                    data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on"
                    onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </button>
                <!-- END Toggle Sidebar Style -->

                <!-- Dark Mode -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                    data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
                    <i class="far fa-moon" id="dark-mode-toggler"></i>
                </button>
                <!-- END Dark Mode -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ url('/redirect') }}">
                        <i class="nav-main-link-icon fa fa-location-arrow"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-primary">8</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    {{-- <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="nav-main-link-icon fa fa-user-md"></i>
              <i class="nav-main-link-icon fa fa-flask"></i>
              <span class="nav-main-link-name">Doctors</span>
              <span class="nav-main-link-name">Doctors</span>
            </a> --}}
                    {{-- <ul class="nav-main-submenu"> --}}
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('useraction') }}">
                        <span class="nav-main-link-name">Users</span>
                    </a>
                </li>
                <li class="nav-main-heading">Food Menus</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('/showfood') }}">
                        <span class="nav-main-link-name">Add Food Menu</span>
                        {{-- <span class="nav-main-link-badge badge rounded-pill bg-primary"></span> --}}
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('/showAllfood') }}">
                        <span class="nav-main-link-name">All Foods </span>
                        {{-- <span class="nav-main-link-badge badge rounded-pill bg-primary"></span> --}}
                    </a>
                </li>
                <li class="nav-main-heading">Chef Options</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('/add_chef') }}">
                        <span class="nav-main-link-name">Add Chefs</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('/chef_list') }}">
                        <span class="nav-main-link-name">Chef Lists</span>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-main-heading">Reservations & Orders</li>
            <a class="nav-main-link" href="{{ url('/showreservation') }}">
                <i class="nav-main-link-icon fa fa-volume-control-phone"></i>
                <span class="nav-main-link-name">All Reservations</span>
                {{-- <span class="nav-main-link-badge badge rounded-pill bg-primary"></span> --}}
            </a>

            <a class="nav-main-link" href="{{ url('/show_orders') }}">
                <i class="nav-main-link-icon fa fa-volume-control-phone"></i>
                <span class="nav-main-link-name">All Orders</span>
                {{-- <span class="nav-main-link-badge badge rounded-pill bg-primary"></span> --}}
            </a>

        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
