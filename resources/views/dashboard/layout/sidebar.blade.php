<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="nav-item {{ request()->routeIs('dashboard.types.index') || request()->routeIs('dashboard.types.create') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('dashboard.types.index') || request()->routeIs('dashboard.types.create') ? '' : 'collapsed' }}"
            href="#" data-toggle="collapse" data-target="#collapseType" aria-expanded="true"
            aria-controls="collapseType">
            <i class="fas fa-fw fa-tag"></i>
            <span>Types</span>
        </a>
        <div id="collapseType"
            class="collapse {{ request()->routeIs('dashboard.types.index') || request()->routeIs('dashboard.types.create') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('dashboard.types.index') ? 'active' : '' }}"
                    href="{{ route('dashboard.types.index') }}">All Types</a>
                <a class="collapse-item {{ request()->routeIs('dashboard.types.create') ? 'active' : '' }}"
                    href="{{ route('dashboard.types.create') }}">Add New</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseParts"
            aria-expanded="true" aria-controls="collapseParts">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Parts</span>
        </a>
        <div id="collapseParts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">All Parts</a>
                <a class="collapse-item" href="cards.html">Add New</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li
        class="nav-item {{ request()->routeIs('dashboard.blogs.index') || request()->routeIs('dashboard.blogs.create') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('dashboard.blogs.index') || request()->routeIs('dashboard.blogs.create') ? '' : 'collapsed' }}"
            href="#" data-toggle="collapse" data-target="#collapseBlogs" aria-expanded="true"
            aria-controls="collapseBlogs">
            <i class="fas fa-fw fa-file"></i>
            <span>Blogs</span>
        </a>
        <div id="collapseBlogs"
            class="collapse {{ request()->routeIs('dashboard.blogs.index') || request()->routeIs('dashboard.blogs.create') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('dashboard.blogs.index') ? 'active' : '' }}"
                    href="{{ route('dashboard.blogs.index') }}">All Blogs</a>
                <a class="collapse-item {{ request()->routeIs('dashboard.blogs.create') ? 'active' : '' }}"
                    href="{{ route('dashboard.blogs.create') }}">Add New</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Payments</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
