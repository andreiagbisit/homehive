<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Manage Roles</title>
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
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1" class="h3 mb-0 text-800">Manage Roles</h1><br>
            </div>

            <!-- Tables -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #000;">List of Created System User Roles</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>HOA President</td>
                                    <td class="text-center">
                                        <a href="{{ route('view.entry.super.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('edit.entry.super.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
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
                                    <td>HOA Vice President</td>
                                    <td class="text-center">
                                        <a href="{{ url('view-entry-super-admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ url('edit-entry-super-admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
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
                                    <td>HOA Secretary</td>
                                    <td class="text-center">
                                        <a href="{{ route('view.entry.super.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('edit.entry.super.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
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
                                    <td>HOA Treasurer</td>
                                    <td class="text-center">
                                        <a href="{{ route('view.entry.super.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('edit.entry.super.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
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
                                    <td>5</td>
                                    <td>Resident</td>
                                    <td class="text-center">
                                        <a href="{{ route('view.entry.super.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('edit.entry.super.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
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

    <x-slot name="modal_delete_entry">
        <x-modal-delete-entry></x-modal-delete-entry>
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>