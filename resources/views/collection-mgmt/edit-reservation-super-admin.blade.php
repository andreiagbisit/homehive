<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Manage Facility Reservations - Edit Reservation</title>
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
                <h1 id="header-h1">Manage Facility Reservations - Edit Reservation</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Existing Reservation</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                            Please fill in the necessary details provided with the following fields below to edit an existing reservation initiated by households to utilize the facilities provided by the subdivision. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                            <div class="col">
                                <form class="user">
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Name of Applicant <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required value="Andrei Joaqhim Ali Agbisit">
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Facility Reserved <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required value="Clubhouse">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Start Date of Reservation <span style="color: red;">*</span></p>
                                            <input type="date" id="form-text" class="form-control form-control-user" required value="2024-01-03">
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">End Date of Reservation <span style="color: red;">*</span></p>
                                            <input type="date" id="form-text" class="form-control form-control-user" required value="2024-01-04">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Duration Start Time of Reservation <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required value="1:00 PM">
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Duration End Time of Reservation <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required value="1:30 PM">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Reservation Fee <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required value="₱500.00">
                                        </div>
                                    
                                        <div class="col-sm-6">
                                            <label id="input-label" for="form-select">Mode of Payment <span style="color: red;">*</span></label><br>
                                            <select id="form-select" class="form-control w-100" required>
                                                <option>On-site Payment</option>
                                                <option selected="selected">GCash</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label" for="form-select">Payment Collector <span style="color: red;">*</span></label><br>
                                            <select id="form-select" class="form-control w-100" required>
                                                <option selected="selected">John Doe</option>
                                                <option>Jane Doe</option>
                                                <option>Michael Smith</option>
                                                <option>Mary Smith</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Date of Payment<span style="color: red;">*</span></p>
                                            <input type="date" id="form-date" class="form-control form-control-user" required value="2024-01-01">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Date of Appointment<span style="color: red;">*</span></p>
                                            <input type="date" id="form-date" class="form-control form-control-user" required value="2024-01-02">
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Time of Appointment<span style="color: red;">*</span></p>
                                            <input type="text" id="form-date" class="form-control form-control-user" required value="2:00 PM">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6">
                                            <label id="input-label" for="form-select">Payment Status <span style="color: red;">*</span></label><br>
                                            <select id="form-select" class="form-control w-100" required>
                                                <option selected="selected">PAID</option>
                                                <option>PENDING</option>
                                            </select>
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
