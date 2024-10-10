<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #f2aa00;">

    <!-- Sidebar Links Based on Account Type -->
    @if (auth()->user()->account_type_id == 1)
        <x-sidebar-landing-link-super-admin></x-sidebar-landing-link-super-admin>
        <x-sidebar-content-super-admin></x-sidebar-content-super-admin>
    @elseif (auth()->user()->account_type_id == 2)
        <x-sidebar-landing-link-admin></x-sidebar-landing-link-admin>
        <x-sidebar-content-admin></x-sidebar-content-admin>
    @elseif (auth()->user()->account_type_id == 3)
        <x-sidebar-landing-link-user></x-sidebar-landing-link-user>
        <x-sidebar-content-user></x-sidebar-content-user>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
