<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #f2aa00;">

    {{ $sidebar_landing_link_super_admin }}
    {{ $sidebar_landing_link_admin }}
    {{ $sidebar_landing_link_user }}

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    {{ $sidebar_content_super_admin }}
    {{ $sidebar_content_admin }}
    {{ $sidebar_content_user }}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->