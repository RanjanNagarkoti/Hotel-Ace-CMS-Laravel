<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-text">Hotel Ace ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/hotel-ace/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/hotel-ace/admin/room') }}">
            <i class="fas fa-hotel"></i>
            <span>Rooms</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/hotel-ace/admin/booking/show">
            <i class="fas fa-clipboard-list"></i>
            <span>Booking</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('staffs') }}">
            <i class="fas fa-users"></i>
            <span>Staffs</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/hotel-ace/admin/users">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/hotel-ace/admin/comment">
            <i class="fas fa-comment"></i>
            <span>Comments</span></a>
    </li>


    @if (Auth::guard('admin')->user()->email == 'superadmin@gmail.com')
        <li class="nav-item">
            <a class="nav-link" href="/hotel-ace/admin/view">
                <i class="fas fa-user"></i>
                <span>Admins</span></a>
        </li>
    @endif

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
