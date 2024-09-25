<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Collection Management - Add Entry</title>
            </x-slot>
        </x-head>
    </x-slot>
    
    <x-slot name="sidebar_base">
        <x-sidebar-base>
            <x-slot name="sidebar_landing_link_super_admin">
                <x-sidebar-landing-link-super-admin></x-sidebar-landing-link-super-admin>
            </x-slot>

            <x-slot name="sidebar_landing_link_user"></x-slot>
            <x-slot name="sidebar_landing_link_admin"></x-slot>

            <x-slot name="sidebar_content_super_admin">
                <x-sidebar-content-super-admin></x-sidebar-content-super-admin>
            </x-slot>
            
            <x-slot name="sidebar_content_user"></x-slot>
            <x-slot name="sidebar_content_admin"></x-slot>
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
                <h1 id="header-h1">Collection Management - Add Entry</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Create New Entry</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                                Please fill in the necessary details provided with the following fields below to add a new collection entry as an invoice for a household to pay. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                            <div class="col">
                                <form class="user">
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Subject <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label" for="form-select">Category <span style="color: red;">*</span></label><br>
                                            <select id="form-select" class="form-control w-100" required>
                                                <option>Maintenance</option>
                                                <option>Amenities & Services</option>
                                                <option>Security</option>
                                                <option>Facility Reservation</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Household Representative <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Amount <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <a id="appt-and-res-button-submit" href="#" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                ADD ENTRY
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
