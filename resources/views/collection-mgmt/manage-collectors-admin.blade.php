<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Manage Fund Collection Categories</title>
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
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Manage GCash Collectors</h1><br>

                <div class="text-center">
                    <a href="{{ route('collection.mgmt.add.collector.admin') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Add Collector</span>
                    </a>
                </div>
            </div>

            <!-- Tables -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #000;">List of Online Payment (GCash) Collectors</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Collector Name</th>
                                    <th>Profile Picture</th>
                                    <th>GCash No.</th>
                                    <th>GCash QR Code</th>
                                    <th>Color Hex</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td><img id="table-pfp" class="img-circle profile-avatar border border border-secondary rounded-circle" src="{{ url('/img/pfp_2.png') }}"></td>
                                    <td>09102345678</td>
                                    <td><img id="qr-code-container" src="{{ url('/img/gcash-qr-1.png') }}"></td>
                                    <td>#e74a3b</td>
                                    <td class="text-center">
                                        <a href="{{ route('collection.mgmt.view.collector.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('collection.mgmt.edit.collector.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Jane Doe</td>
                                    <td><img id="table-pfp" class="img-circle profile-avatar border border border-secondary rounded-circle" src="{{ url('/img/pfp_3.png') }}"></td>
                                    <td>09112345678</td>
                                    <td><img id="qr-code-container" src="{{ url('/img/gcash-qr-2.png') }}"></td>
                                    <td>#1cc88a</td>
                                    <td class="text-center">
                                        <a href="{{ route('collection.mgmt.view.collector.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('collection.mgmt.edit.collector.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Michael Smth</td>
                                    <td><img id="table-pfp" class="img-circle profile-avatar border border border-secondary rounded-circle" src="{{ url('/img/pfp_4.png') }}"></td>
                                    <td>09122345678</td>
                                    <td><img id="qr-code-container" src="{{ url('/img/gcash-qr-3.png') }}"></td>
                                    <td>#4e73df</td>
                                    <td class="text-center">
                                        <a href="{{ route('collection.mgmt.view.collector.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('collection.mgmt.edit.collector.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Mary Smth</td>
                                    <td><img id="table-pfp" class="img-circle profile-avatar border border border-secondary rounded-circle" src="{{ url('/img/pfp_5.png') }}"></td>
                                    <td>09132345678</td>
                                    <td><img id="qr-code-container" src="{{ url('/img/gcash-qr-4.png') }}"></td>
                                    <td>#f6c23e</td>
                                    <td class="text-center">
                                        <a href="{{ route('collection.mgmt.view.collector.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('collection.mgmt.edit.collector.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
        <x-modal-delete-entry></x-modal-delete-entry>
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
