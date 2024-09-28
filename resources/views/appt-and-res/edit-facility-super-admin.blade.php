<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Manage Subdivision Facilities - Edit Facility</title>
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
                <h1 id="header-h1">Manage Subdivision Facilities - Edit Facility</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Existing Subdivision Facility</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                                Please fill in the necessary details provided with the following fields below to edit an existing facility within the subdivision that can be reserved by households for reservation. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                            <div class="col">
                                <form class="user">
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h4 id="form-header-h4" class="mt-2 mb-3">
                                                Name <span style="color: red;">*</span>
                                            </h4>
                                            <input type="text" id="form-text" class="form-control form-control-user" required value="Clubhouse">
                                        </div>
                                    </div>
                                    <hr>

                                    <h4 id="form-header-h4" class="pl-2">
                                        Image
                                    </h4>

                                    <div class="form-group text-center pl-2">
                                        <img id="appt-and-res-img" class="img-fluid mt-3 mb-4" src="{{ url('img/clubhouse.jpg') }}"><br><br>
                                                
                                                <span id="media-upload-info">
                                                    <i class="fas fa-image pr-2"></i> clubhouse.jpg | 64 KB
                                                </span><br><br>

                                        <p id="page-desc">
                                            * The image's resolution must at least be <b>232x232</b>.<br>
                                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b><br>
                                            <b>Maximum image size:</b> <b class="text-danger">20 MB</b>
                                        </p>

                                        <!-- File input for profile picture -->
                                        <input id="input-file" type="file" name="profile_picture" accept=".jpg, .png" required>
                                        <label class="btn btn-warning btn-icon-split" for="input-file">
                                            <span class="icon text-white-50">
                                                    <i class="fas fa-file-upload"></i>
                                            </span>
                                            
                                            <span class="text" style="color: #000; font-weight: 500;">
                                                Upload New Image
                                            </span>
                                        </label><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text" style="color: #fff; font-weight: 500;">Remove Existing Image</span>
                                        </a>
                                    </div><hr>

                                    <h4 id="form-header-h4" class="mt-4 mb-4">
                                        Assigned Color <span style="color: red;">*</span>
                                    </h4>

                                    <p id="page-desc">
                                        Click the color box below to reveal a color picker.  Within the color picker, you may drag the selector or use the provided input-based color picker (e.g. RGB, HSV, HEX) by your browser.
                                        <br><br>
                                        <span style="color: red;">*</span>
                                        <b>
                                            The provided input-based color pickers may vary per browser, and a browser may include multiple input pickers.
                                        </b>
                                    </p>
                                    <input type="color" id="bulletin-board-category-color-picker" name="bulletin-board-category-color-picker" required value="#e74a3b">
                                    <hr>

                                    <div class="pl-3 pr-3 mt-4">
                                        <h4 id="form-header-h4">
                                            Assigned Color Preview
                                        </h4>

                                        <p id="page-desc">
                                            <b>&#8226; Dashboard - Facility Reservation Rate Entry:</b>
                                        </p>

                                        <div class="card-body">
                                            <h4 id="dashboard-facility-reservation-name-percentage" class="font-weight-bold"></h4>
                                            <h6 id="facility-rate-desc">Reserved <span id="dashboard-facility-frequency" class="font-weight-bold">2 times</span> by households</h6>

                                            <div class="progress mb-4">
                                                <div id="dashboard-facility-progress-bar" class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <script>
                                            function applyInitialValues() {
                                                var defaultText = document.getElementById('form-text').value;
                                                document.getElementById('dashboard-facility-reservation-name-percentage').innerText = defaultText;

                                                var defaultColor = document.getElementById('bulletin-board-category-color-picker').value;

                                                document.getElementById('dashboard-facility-reservation-name-percentage').style.color = defaultColor;
                                                document.getElementById('dashboard-facility-frequency').style.color = defaultColor;
                                                document.getElementById('dashboard-facility-progress-bar').style.backgroundColor = defaultColor;
                                            }

                                            window.onload = applyInitialValues;

                                            document.getElementById('form-text').addEventListener('input', function(event) {
                                                var inputText = event.target.value;
                                                document.getElementById('dashboard-facility-reservation-name-percentage').innerText = inputText;
                                            });
                                            
                                            document.getElementById('bulletin-board-category-color-picker').addEventListener('input', function(event) {
                                                var selectedColor = event.target.value;

                                                document.getElementById('dashboard-facility-reservation-name-percentage').style.color = selectedColor;
                                                document.getElementById('dashboard-facility-frequency').style.color = selectedColor;
                                                document.getElementById('dashboard-facility-progress-bar').style.backgroundColor = selectedColor;
                                            });
                                        </script>
                                    </div><br><hr>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <a id="appt-and-res-button-submit" href="#" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                ADD FACILITY
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
