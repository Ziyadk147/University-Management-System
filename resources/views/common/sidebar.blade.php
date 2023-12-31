<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @canany(['view-roles' , 'view-permissions','view-users'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>User Management</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('view-roles')
                    <a class="collapse-item" href="{{route('role.index')}}">Roles</a>
                @endcan
                @can('view-permissions')
                    <a class="collapse-item" href="{{route('permission.index')}}">Permissions</a>
                @endcan
                @can('view-users')
                    <a class="collapse-item" href="{{route('user.index')}}">Users</a>
                @endcan
            </div>
        </div>
    </li>
    @endcanany
    @canany(['view-classes' , 'view-courses'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClasses"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Classes And Courses</span>
        </a>
        <div id="collapseClasses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('view-classes')
                <a class="collapse-item" href="{{route('classes.index')}}">Classes</a>
                @endcan
                @can('view-courses')
                <a class="collapse-item" href="{{route('courses.index')}}">Courses</a>
                @endcan
            </div>
        </div>
    </li>
    @endcanany
    <li class="nav-item active">
        @can('view-resources')
        <a class="nav-link" href="{{route('resource.index')}}">
            <i class="fas fa-book"></i>
            <span>Resources</span>
        </a>
        @endcan

    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    {{--    <li class="nav-item">--}}
    {{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
    {{--           aria-expanded="true" aria-controls="collapseUtilities">--}}
    {{--            <i class="fas fa-fw fa-wrench"></i>--}}
    {{--            <span>Utilities</span>--}}
    {{--        </a>--}}
    {{--        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"--}}
    {{--             data-parent="#accordionSidebar">--}}
    {{--            <div class="bg-white py-2 collapse-inner rounded">--}}
    {{--                <h6 class="collapse-header">Custom Utilities:</h6>--}}
    {{--                <a class="collapse-item" href="utilities-color.html">Colors</a>--}}
    {{--                <a class="collapse-item" href="utilities-border.html">Borders</a>--}}
    {{--                <a class="collapse-item" href="utilities-animation.html">Animations</a>--}}
    {{--                <a class="collapse-item" href="utilities-other.html">Other</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </li>--}}
    <!-- Divider -->
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
