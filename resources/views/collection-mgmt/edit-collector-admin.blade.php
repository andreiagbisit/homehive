<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Collection Management - Edit Collector</title>
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
                <h1 id="header-h1">Collection Management - Edit Collector</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Existing Online Payment (GCash) Collector</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <p class="mb-4" style="color: #000;">
                                    Please fill in the necessary details provided with the following fields below to edit existing details of a collector for the online payment option GCash, which will be utilized by the households in managing payments. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                                </p>

                                <form class="user" action="{{ route('collection.mgmt.update.collector.admin', $collector->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mt-4 mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Name <span style="color: red;">*</span></p>
                                            <input type="text" name="name" id="form-text-name" class="form-control form-control-user" required value="{{ $collector->name }}">
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">GCash No. <span style="color: red;">*</span></p>
                                            <input type="text" name="collector_gcash_number" id="form-text" class="form-control form-control-user" required value="{{ $collector->collector_gcash_number }}">
                                        </div>
                                    </div>
                                    <hr>

                                    <h4 id="form-header-h4" class="pl-2 mt-4">
                                        GCash QR Code <span style="color: red;">*</span>
                                    </h4><br>

                                    <div class="form-group text-center">
                                    <!-- Preview existing QR code if available -->
                                    <img class="d-inline justify-content-center" id="qr-code-preview" src="{{ $collector->gcash_qr_code_path ? Storage::disk('azure')->url($collector->gcash_qr_code_path) : '' }}" 
                                        style="display: {{ $collector->gcash_qr_code_path ? 'block' : 'none' }}; max-width: 300px; margin-bottom: 10px;">
                                    <br><br>

                                    <!-- Display error message if QR code upload fails validation -->
                                    @if ($errors->has('gcash_qr_code'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('gcash_qr_code') }}
                                        </div>
                                    @endif

                                    <p id="page-desc">
                                        <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b><br>
                                        <b>Maximum image size:</b> <b class="text-danger">20 MB</b>
                                    </p>

                                    <!-- File input for QR code -->
                                    <input id="gcash_qr_code" type="file" name="gcash_qr_code" accept=".jpg, .png" style="display: none;" onchange="previewQRCode()">
                                    <label class="btn btn-warning btn-icon-split" for="gcash_qr_code">
                                        <span class="icon text-white-50"><i class="fas fa-file-upload"></i></span>
                                        <span class="text" style="color: #000; font-weight: 500;">Upload New Image</span>
                                    </label><br>

                                    <!-- Remove Existing Image button -->
                                    <button type="button" onclick="removeQRCode()" class="btn btn-danger btn-icon-split" style="margin-bottom: 2%; margin-top: 10px;">
                                        <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
                                        <span class="text" style="color: #fff; font-weight: 500;">Remove Existing Image</span>
                                    </button>
                                    </div>

                                    <hr>


                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" class="btn btn-warning btn-user btn-block font-weight-bold" style="color: #000; font-size: 16px;">SAVE CHANGES</button>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="{{ route('collection.mgmt.manage.collectors.admin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
