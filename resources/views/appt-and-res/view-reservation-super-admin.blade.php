<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Manage Facility Reservations - View Reservation</title>
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
                <h1 id="header-h1">Manage Facility Reservations - View Reservation</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Appointment Details</h6>
                        </div>

                        <div class="card-body">
                            <div class="col overflow-auto mt-4 mb-4">
                                    <table id="tb" class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                            <td id="tb-v-head">ID</td>
                                            <td>1</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Name of Applicant</td>
                                            <td>Andrei Joaqhim Ali Agbisit</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Facility Reserved</td>
                                            <td>Clubhouse</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Start Date of Reservation</td>
                                            <td>01/03/2024</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">End Date of Reservation</td>
                                            <td>01/04/2024</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Duration Start time of Reservation</td>
                                            <td><b>1:00 PM</b></td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Duration End time of Reservation</td>
                                            <td><b>1:30 PM</b></td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Reservation Fee</td>
                                            <td><b>GCash</b></td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Mode of Payment</td>
                                            <td><b>GCash</b></td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Payment Collector</td>
                                            <td><b>John Doe</b></td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Date of Payment</td>
                                            <td><b>01/01/2024</b></td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Date of Appointment</td>
                                            <td><b>01/02/2024</b></td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Time of Appointment</td>
                                            <td><b>01/02/2024</b></td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Reservation Fee Payment Status</td>
                                            <td><b>01/02/2024</b>PAID</td>
                                        </tr>
                                    </table>
                                </form>
                            </div><hr>
                            
                            <div class="col-sm-3 float-right">
                                <a style="border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" id="appt-and-res-button-submit" href="#" onclick="history.go(-1)" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
                                    BACK
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
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>
