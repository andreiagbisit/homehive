<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Appointment & Reservation Management</title>
            </x-slot>
        </x-head>
    </x-slot>
    
    <x-slot name="sidebar_base">
        <x-sidebar-base>
            <x-slot name="sidebar_landing_link_admin">
                <x-sidebar-landing-link-admin></x-sidebar-landing-link-admin>
            </x-slot>

            <x-slot name="sidebar_landing_link_user"></x-slot>
            <x-slot name="sidebar_landing_link_super_admin"></x-slot>

            <x-slot name="sidebar_content_admin">
                <x-sidebar-content-admin></x-sidebar-content-admin>
            </x-slot>
            
            <x-slot name="sidebar_content_user"></x-slot>
            <x-slot name="sidebar_content_super_admin"></x-slot>
        </x-sidebar-base>
    </x-slot>

    <x-slot name="topbar">
        <x-topbar></x-topbar>
    </x-slot>

    <x-slot name="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Appointment & Reservation Management</h1><br>

                <div class="text-center">
                    <a href="#" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-grip-horizontal"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Manage</span>
                    </a>
                </div>
            </div>

            <!-- Content Rows -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow mb-4 py-3 border-left-warning">
                        <div class="card-body">
                            <div class="text-center">
                                <img id="appt-and-res-img" class="img-fluid mt-3 mb-4" src="{{ url('img/facilities.jpg') }}">
                                <hr>
                                <h2 id="appt-and-res-card-link"><i id="i-w_backdrop-1" class="fas fa-building"></i>Facilities</h2>
                                <a href="{{ route('manage.facility.reservations.admin') }}" 
                                    style="color: #000; font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5; flex-direction: column;" 
                                    class="d-inline-flex btn btn-warning btn-user btn-block font-weight-bold col-sm-5">
                                    MANAGE RESERVATIONS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card shadow mb-4 py-3 border-left-warning">
                        <div class="card-body">
                            <div class="text-center">
                                <img id="appt-and-res-img" class="img-fluid mt-3 mb-4" src="{{ url('img/stickers.jpg') }}">
                                <hr>
                                <h2 id="appt-and-res-card-link"><i id="i-w_backdrop-1" class="fas fa-car-side"></i>Vehicle Sticker</h2>

                                <a href="{{ route('manage.vehicle.sticker.applications.admin') }}"
                                    style="color: #000; font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5; flex-direction: column;" 
                                    class="d-inline-flex btn btn-warning btn-user btn-block font-weight-bold col-sm-5">
                                    MANAGE APPLICATIONS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </x-slot>

    <x-slot name="footer">
        <x-footer></x-footer>
    </x-slot>

    <x-slot name="scroll_to_top">
        <x-scroll-to-top></x-scroll-to-top>
    </x-slot>

    <x-slot name="modal_logout">
        <x-modal-logout></x-modal-logout>
    </x-slot>

    <x-slot name="modal_change_pw">
    </x-slot>

    <x-slot name="modal_dashboard_edit">
    </x-slot>

    <x-slot name="modal_delete_entry">
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="modal_bulletin_add">
    </x-slot>

    <x-slot name="modal_appt_and_res_manage">
        <x-modal-appt-and-res-manage></x-modal-appt-and-res-manage>
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>