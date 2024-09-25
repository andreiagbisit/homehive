<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Manage Vehicle Sticker Applications - Edit Appointment</title>
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
                <h1 id="header-h1">Manage Vehicle Sticker Applications - Manage Rules</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Existing Preferences</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                            Fill in what is being asked to set preferences in initializing an online vehicle sticker appointment system. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                            <div class="col">
                                <form class="user">
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Reservation Fee <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required value="₱200.00">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6">
                                            <p id="input-label">Maximum Number of Vehicles per Household <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required value="5">
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <a id="appt-and-res-button-submit" href="#" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                SAVE CHANGES
                                            </a>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="#" onclick="history.go(-1)" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
                                                BACK
                                            </a>
                                        </div>
                                    </div>
                                </form>
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
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>
