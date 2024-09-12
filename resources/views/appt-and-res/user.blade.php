<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Appointments & Reservations</title>
            </x-slot>
        </x-head>
    </x-slot>
    
    <x-slot name="sidebar_base">
        <x-sidebar-base>
            <x-slot name="sidebar_landing_link_user">
                <x-sidebar-landing-link-user></x-sidebar-landing-link-user>
            </x-slot>

            <x-slot name="sidebar_landing_link_admin"></x-slot>
            <x-slot name="sidebar_landing_link_super_admin"></x-slot>

            <x-slot name="sidebar_content_user">
                <x-sidebar-content-user></x-sidebar-content-user>
            </x-slot>
            
            <x-slot name="sidebar_content_admin"></x-slot>
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
                <h1 id="header-h1" class="h3 mb-0 text-800">Appointments & Reservations</h1>
            </div>

            <!-- Content Rows -->
            <div class="row">
                <div class="col-lg mb-4">

                    <div class="card shadow mb-4">
                        <div class="card-header p-4">
                            <span id="appt-and-res-card-header" class="h4"><i id="i-w_backdrop-2" class="fas fa-building"></i>Facilities</span>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow m-4 py-3 border-left-warning">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img id="appt-and-res-img" class="img-fluid mt-3 mb-4" src="{{ url('img/clubhouse.jpg') }}"><hr>
                                            
                                            <h2 id="appt-and-res-card-title"><i id="i-w_backdrop-1" class="fas fa-home"></i>Clubhouse</h2>

                                            <a id="appt-and-res-button" href="{{ route('appt.and.res.form.facility.reservation') }}" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                BOOK RESERVATION
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card shadow m-4 py-3 border-left-warning">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img id="appt-and-res-img" class="img-fluid mt-3 mb-4" src="{{ url('img/bball-court.jpg') }}"><hr>

                                            <h2 id="appt-and-res-card-title"><i id="i-w_backdrop-1" class="fas fa-basketball-ball"></i>Basketball Court</h2>

                                            <a id="appt-and-res-button" href="{{ route('appt.and.res.form.facility.reservation') }}" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                BOOK RESERVATION
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card shadow m-4 py-3 border-left-warning">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img id="appt-and-res-img" class="img-fluid mt-3 mb-4" src="{{ url('img/pool.jpg') }}"><hr>

                                            <h2 id="appt-and-res-card-title"><i id="i-w_backdrop-1" class="fas fa-swimming-pool"></i>Swimming Pool</h2>

                                            <a id="appt-and-res-button-submit" href="{{ route('appt.and.res.form.facility.reservation') }}" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                BOOK RESERVATION
                                            </a>                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header p-4">
                            <span id="appt-and-res-card-header" class="h4"><i id="i-w_backdrop-2" class="fas fa-sticky-note"></i>Subdivision Sticker</span>
                        </div>

                        <div class="col-lg-6 mx-auto">
                            <div class="card shadow m-4 py-3 border-left-warning">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img id="appt-and-res-img" class="img-fluid mt-3 mb-4" src="{{ url('img/stickers.jpg') }}"><hr>

                                        <h2 id="appt-and-res-card-title"><i id="i-w_backdrop-1" class="fas fa-car-side"></i>Vehicle Sticker</h2>

                                        <a href="{{ route('appt.and.res.form.vehicle.sticker.appointment') }}" class="btn btn-warning btn-user btn-block" style="color: #000; font-weight: bold;">
                                            BOOK APPOINTMENT
                                        </a>
                                    </div>
                                </div>
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

    <x-slot name="modal_delete_entry">
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>