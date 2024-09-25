<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Collection Management - Add Collector</title>
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
                <h1 id="header-h1">Collection Management - Add Collector</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Add New Online Payment (GCash) Collector</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <p class="mb-4" style="color: #000;">
                                    Please fill in the necessary details provided with the following fields below to add a collector for the online payment option GCash, which will be utilized by the households in managing payments. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                                </p>

                                <form class="user">
                                    <div class="form-group row mt-4 mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Name <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">GCash No. <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" required>
                                        </div>
                                    </div><hr>

                                    <h4 id="form-header-h4" class="pl-2 mt-4">
                                        Entry Image <span style="color: red;">*</span>
                                    </h4><br>

                                    <div class="form-group text-center">
                                        <!-- Only one profile picture display -->
                                        <img class="img-circle profile-avatar border border border-secondary rounded-circle mb-1" 
                                            src="{{ url('/img/pfp_2.png') }}" 
                                             style="border-radius: 50%; width: 232px; height: 232px; object-fit: cover;"><br><br>
                                             <span id="media-upload-info">
                                                <i class="fas fa-image pr-2"></i> pfp_2.png | 169 KB
                                            </span><br><br>
                                        <p id="page-desc">
                                            * The image's resolution must at least be <b>232x232</b>.<br>
                                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b><br>
                                            <b>Maximum image size:</b> <b class="text-danger">20 MB</b>
                                        </p>

                                        <!-- File input for profile picture -->
                                        <input id="input-file" type="file" name="profile_picture" accept=".jpg, .png">
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
                                    </div>
                                    <hr>

                                    <h4 id="form-header-h4" class="pl-2 mt-4">
                                        GCash QR Code <span style="color: red;">*</span>
                                    </h4><br>

                                    <div class="form-group text-center">
                                        <!-- Only one profile picture display -->
                                        <img id="qr-code-container" src="{{ url('/img/gcash-qr-1.png') }}"><br><br>
                                             <span id="media-upload-info">
                                                <i class="fas fa-image pr-2"></i> gcash-qr-1.png | 127 KB
                                            </span><br><br>
                                        <p id="page-desc">
                                            * The image's resolution must at least be <b>240x320</b>.<br>
                                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b><br>
                                            <b>Maximum image size:</b> <b class="text-danger">20 MB</b>
                                        </p>

                                        <!-- File input for profile picture -->
                                        <input id="input-file" type="file" name="profile_picture" accept=".jpg, .png">
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
                                    </div>
                                    <hr>

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
                                            <b>&#8226; Dashboard - Collector's Approach Rate Entry:</b>
                                        </p>

                                        <div id="collector-approach-rate-left-border" class="card shadow py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="row no-gutters align-items-center">
                                                        <img id="collector-rate-img" class="img-profile rounded-circle border border-secondary rounded-circle" src="{{ url('img/pfp_2.png') }}"><br>
                                                        <h3 id="collector-rate-h3">John Doe</h3>
                                                    </div><hr>

                                                    <h6 id="collector-rate-desc">Selected by households <span id="collector-approach-rate-frequency" class="font-weight-bold">2 times</span> as a payment collector</h6>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div id="collector-approach-rate-percentage" class="h5 mb-0 mr-3 font-weight-bold">20%</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div id="collector-approach-rate-progress-bar" class="progress-bar" style="width: 20%;" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            // JavaScript to update styles in real-time based on color picker input
                                            document.getElementById('bulletin-board-category-color-picker').addEventListener('input', function(event) {
                                                var selectedColor = event.target.value;  // Get the selected color from the color picker

                                                // Apply the selected color to various elements
                                                document.getElementById('collector-approach-rate-left-border').style.borderLeftColor = selectedColor;
                                                document.getElementById('collector-approach-rate-frequency').style.color = selectedColor;  // Update the text color
                                                document.getElementById('collector-approach-rate-percentage').style.color = selectedColor;  // Update the percentage text color
                                                document.getElementById('collector-approach-rate-progress-bar').style.backgroundColor = selectedColor;  // Update the progress bar color
                                            });
                                        </script>
                                    </div><br><hr>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <a id="appt-and-res-button-submit" href="#" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                ADD COLLECTOR
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
