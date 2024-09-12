<!-- Topbar -->
<nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background-color: #ffcc3b;">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars" style="color: #000;"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw" style="color: #000;"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" style="font-size: 90%;">3</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header" style="background-color: #f2aa00; border-color: #f2aa00; font-size: 100%; font-weight: 700;">
                    NOTIFICATIONS
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div style="color: #000; font-size: 100%; font-weight: 500;">January 1, 2024</div>
                        <span style="color: #000; font-weight: 300;">Lorem ipsum, dolor sit amet.</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                    <div style="color: #000; font-size: 100%; font-weight: 500;">January 2, 2024</div>
                    <span style="color: #000; font-weight: 300;">Consectetur adipiscing elit.</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                    <div style="color: #000; font-size: 100%; font-weight: 500;">January 3, 2024</div>
                    <span style="color: #000; font-weight: 300;">Sed do, eiusmod tempor incididunt.</span>
                    </div>
                </a>
                <a class="dropdown-item text-center font-weight-bold" href="#" style="color: #000; font-size: 100%; font-weight: 400;">SHOW ALL NOTIFICATIONS</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline small" style="color: #000; font-weight: 500;">
            {{ Auth::user()->uname }} 
            <img class="img-profile rounded-circle"
                src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('img/default.png') }}">

    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="userDropdown">
        <!-- View Profile -->
        <a id="page-desc" class="dropdown-item" href="{{ route('profile.details') }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-secondary"></i>
            View Profile
        </a>

        <!-- Log Out -->
        <a id="page-desc" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-secondary"></i>
            Log Out
        </a>
    </div>
</li>


    </ul>

</nav>
<!-- End of Topbar -->
