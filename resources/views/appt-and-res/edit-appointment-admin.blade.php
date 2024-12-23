<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Manage Vehicle Sticker Applications - Edit Payment Status</title>
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
                <h1 id="header-h1">Manage Vehicle Sticker Applications - Edit Payment Status</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Entry Payment Status</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                                Change the current status of the chosen vehicle sticker appointment entry. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                                <div class="col">
                                    <form method="POST" action="{{ route('update.application.status', ['id' => $application->id]) }}" class="user">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row mt-4 mb-4">
                                            <div class="col-sm-6">
                                            <h4 id="form-header-h4">
                                                Payment Status <span style="color: red;">*</span>
                                            </h4>

                                                <select id="collector-select" name="status" class="form-control w-100" required>
                                                    <option value="1" {{ $application->status == 1 ? 'selected' : '' }}>PAID</option>
                                                    <option value="2" {{ $application->status == 2 ? 'selected' : '' }}>PENDING</option>
                                                </select>
                                            </div>
                                        </div><br>

                                        <hr>

                                        <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" id="appt-and-res-button-submit" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                SAVE CHANGES
                                            </button>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="{{ route('manage.vehicle.sticker.applications.admin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
