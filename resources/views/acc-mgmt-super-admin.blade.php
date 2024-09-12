<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Account Management</title>
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
                <h1 id="header-h1" class="h3 mb-0 text-800">Account Management</h1><br>

                <div class="text-center">
                <a href="{{ route('manage.roles.superadmin') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                    <span class="icon text-white-50">
                        <i class="fas fa-user-tag"></i>
                    </span>
                    <span class="text" style="color: #000; font-weight: 500;">Manage Roles</span>
                </a>
                </div>
            </div>

            <!-- Tables -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #000;">List of Created User Accounts</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Birthdate</th>
                                    <th>Email Address</th>
                                    <th>Contact No.</th>
                                    <th>Street</th>
                                    <th>House Block No.</th>
                                    <th>House Lot No.</th>
                                    <th>Subdivision Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->uname }}</td>
                                        <td>{{ $user->fname }}</td>
                                        <td>{{ $user->mname }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>{{ $user->bdate }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->contact_no }}</td>
                                        <td>{{ $user->street }}</td>
                                        <td>{{ $user->house_blk_no }}</td>
                                        <td>{{ $user->house_lot_no }}</td>
                                        <td>{{ $user->subdivision_role_id }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('superadmin.view', $user->id) }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-binoculars"></i>
                                                </span>
                                                <span class="text">View</span>
                                            </a><br>

                                            <a href="{{ route('superadmin.edit', $user->id) }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a><br>

                                            <form action="{{ route('superadmin.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
