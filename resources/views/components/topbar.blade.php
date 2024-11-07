<!-- Topbar -->
<nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background-color: #ffcc3b;">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars" style="color: #000;"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small" style="color: #000; font-weight: 500;">
                    {{ Auth::user()->uname }}</span>
                    <img class="img-profile rounded-circle"
                    src="{{ Auth::user()->profile_picture ?: 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png' }}"
                    alt="User Profile Picture"
                    style="width: 40px; height: 40px; object-fit: cover; display: inline-block;">
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
