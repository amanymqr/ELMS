<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ELMS</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}
        ">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>





    <!-- Employees Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" data-toggle="collapse" href="#collapseEmployees" aria-expanded="false" aria-controls="collapseEmployees">
            <i class="fa-solid fa-user-group"></i>
            <span>Employees</span>
        </a>
        <div id="collapseEmployees" class="collapse {{ request()->routeIs('employees.*') ? 'show' : '' }}" aria-labelledby="headingEmployees" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('employees.create') ? 'active' : '' }}" href="{{ route('employees.create') }}">Add New</a>
                <a class="collapse-item {{ request()->routeIs('employees.index') ? 'active' : '' }}" href="{{ route('employees.index') }}">All Employees</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Leave Request Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link " data-toggle="collapse" href="#collapseLeaveRequest" aria-expanded="false" aria-controls="collapseLeaveRequest">
            <i class="fa-solid fa-heart"></i>
            <span>Leave Request</span>
        </a>
        <div id="collapseLeaveRequest" class="collapse " aria-labelledby="headingLeaveRequest" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('leave-types.create') ? 'active' : '' }}" href="{{ route('leave-types.create') }}">Add New</a>
                <a class="collapse-item {{ request()->routeIs('leave-types.index') ? 'active' : '' }} " href="{{ route('leave-types.index') }}">Leave Types </a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.leave-requests.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>leave request</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
