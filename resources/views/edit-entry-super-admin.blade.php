<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Lorem Ipsum - Edit Entry</title>
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
                <h1 id="header-h1" class="h3 mb-0 text-800">Lorem Ipsum - Edit Entry</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Change Existing Entry</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <h5 id="page-desc">Text Fields</h5><br>

                                <form class="user">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Text Field 1 <span style="color: red;">*</span></p>
                                            <input type="text" id="form-text" class="form-control form-control-user" value="Dolor Sit" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Text Field 2</p>
                                            <input type="text" id="form-text" class="form-control form-control-user" value="Amet Consectetur">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label id="input-label" for="form-select">Drop-down Item</label><br>
                                        <select id="form-select" class="form-control w-75" required>
                                            <option>Lorem Ipsum</option>
                                            <option>Dolor Sit</option>
                                            <option>Amet Consectetur</option>
                                        </select>
                                    </div><hr>

                                    <h5 id="page-desc">Edit Image</h5><br>

                                    <div class="form-group text-center">
                                        <img id="img-preview" class="img-fluid mt-3 mb-4" src="{{ url('img/facilities.jpg') }}"><br>
                                        <p id="page-desc">
                                            * The image's resolution must at least be <b>390x300</b>. In smartphone-based layouts, it will be displayed in <b>246x300</b>.<br>
                                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b>
                                        </p>

                                        <input id="input-file" type="file" accept=".jpg, .png">
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

    <x-slot name="modal_delete_entry">
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>