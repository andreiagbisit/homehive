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
                <h1 id="header-h1">Manage Facility Reservations - Manage Settings</h1>
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
                            Fill in what is being asked to set preferences in initializing an online facility reservation. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                            <div class="col">
                                <form class="user">
                                    <div class="form-group row mt-4 mb-5">
                                        <div class="col-sm-6 mb-3 mb-sm-0">

                                            <h4 id="form-header-h4" class="mt-4 mb-4">
                                                Reservation Fee <span style="color: red;">*</span>
                                            </h4>

                                            <input type="text" id="form-text" class="form-control form-control-user" required value="₱200.00">
                                        </div>
                                    </div><hr>

                                    <h4 id="form-header-h4" class="mt-4 mb-4">
                                        Assigned Color Code (for Dashboard) <span style="color: red;">*</span>
                                    </h4>

                                    <p id="page-desc">
                                        Click the color box below to reveal a color picker.  Within the color picker, you may drag the selector or use the provided input-based color picker (e.g. RGB, HSV, HEX) by your browser.
                                        <br><br>
                                        <span style="color: red;">*</span>
                                        <b>
                                            The provided input-based color pickers may vary per browser, and a browser may include multiple input pickers.
                                        </b>
                                    </p>
                                    <input type="color" id="bulletin-board-category-color-picker" name="bulletin-board-category-color-picker" required>
                                    <hr>

                                    <div class="pl-3 pr-3 mt-4">
                                        <h4 id="form-header-h4">
                                            Assigned Color Preview
                                        </h4>

                                        <p id="page-desc">
                                            <b>&#8226; Dashboard - Collection Tallied per Category Entry:</b>
                                        </p>

                                        <div id="payment-tally-category-card-2" class="card-body">
                                            <h4 id="payment-tally-h4" class="text-light">Facility Reservation</h4>
                                            <div class="col-auto">
                                                <div id="payment-tally-percentage" class="h5 mb-0 mr-3 text-light">20% <span id="payment-tally-percentage-desc" class="h6">(2 collections made)</span></div>
                                            </div>

                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            // Function to apply the initial values based on the predefined input values
                                            function applyInitialValues() {
                                                // Fetch the predefined values from the input fields
                                                var defaultColor = document.getElementById('bulletin-board-category-color-picker').value;

                                                // Apply the predefined color to the bulletin board entry and circle icon
                                                document.getElementById('payment-tally-category-card-2').style.backgroundColor = defaultColor;
                                            }

                                            // Apply the initial values when the page loads
                                            window.onload = applyInitialValues;

                                            document.getElementById('bulletin-board-category-color-picker').addEventListener('input', function(event) {
                                                var selectedColor = event.target.value;

                                                document.getElementById('payment-tally-category-card-2').style.backgroundColor = selectedColor;
                                            });
                                        </script>
                                    </div><br><hr>

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
