<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>- Add Entry</title>
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
                <h1 id="header-h1">Manage GCash Collectors - View Collector</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Collector Details</h6>
                        </div>

                        <div class="card-body">
                            <div class="col overflow-auto mt-4 mb-4">
                                    <table id="tb" class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                            <td id="tb-v-head">ID</td>
                                            <td>1</td>
                                        </tr>
                                        
                                        <tr>
                                            <td id="tb-v-head">Collector Name</td>
                                            <td>John Doe</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Profile Picture</td>
                                            <td>
                                                <img class="img-circle profile-avatar border border border-secondary rounded-circle" src="{{ url('img/pfp_2.png') }}">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">GCash No.</td>
                                            <td>09102345678</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">GCash QR Code</td>
                                            <td>
                                                <img id="qr-code-container" src="{{ url('/img/gcash-qr-1.png') }}">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Color Hex</td>
                                            <td>#e74a3b</td>
                                        </tr>
                                    </table>
                                </form>
                            </div><hr><br>

                            <div class="pl-3 pr-3">
                                <h4 id="form-header-h4">
                                    Assigned Color Preview
                                </h4>

                                <p id="page-desc">
                                    <b>&#8226; Dashboard - Collector's Approach Rate Entry:</b>
                                </p>

                                <div class="card border-left-danger shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                            <div class="row no-gutters align-items-center">
                                                <img id="collector-rate-img" class="img-profile rounded-circle border border-secondary rounded-circle" src="{{ url('img/pfp_2.png') }}"><br>
                                                <h3 id="collector-rate-h3">John Doe</h3>
                                            </div><hr>

                                            <h6 id="collector-rate-desc">Selected by households <span class="text-danger font-weight-bold">2 times</span> as a payment collector</h6>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 text-danger font-weight-bold">20%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br><hr>
                            </div>
                            
                            <div class="col-sm-3 float-right">
                                <a style="border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" id="appt-and-res-button-submit" href="{{ route('collection.mgmt.manage.collectors.admin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
