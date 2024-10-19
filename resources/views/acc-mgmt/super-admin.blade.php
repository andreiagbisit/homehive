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
                <h1 id="header-h1">Account Management</h1><br>

                <div class="text-center">
                <a href="{{ route('manage.roles') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                    <span class="icon text-white-50">
                        <i class="fas fa-user-tag"></i>
                    </span>
                    <span class="text" style="color: #000; font-weight: 500;">Manage Roles</span>
                </a>
                </div>
            </div>

            @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
            @endif

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
                                    <th>Profile Picture</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Birthdate</th>
                                    <th>Email Address</th>
                                    <th>Email Verified</th>
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
                                        <td>
                                        <img id="table-pfp" class="img-circle profile-avatar"
                                                src="{{ $user->profile_picture ? $user->profile_picture : 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png' }}"
                                                style="width: 40px; height: 40px; object-fit: cover;">
                                        </td>
                                        <td>{{ $user->fname }}</td>
                                        <td>{{ $user->mname }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>{{ $user->bdate }}</td>
                                        <td>{{ $user->email }}</td>
                                                                                <!-- New Email Verified Status Column -->
                                        <td>
                                            @if ($user->email_verified_at)
                                                <span class="badge badge-success">Verified</span>
                                            @else
                                                <span class="badge badge-danger">Not Verified</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->contact_no }}</td>
                                        <td>{{ $user->street }}</td>
                                        <td>{{ $user->house_blk_no }}</td>
                                        <td>{{ $user->house_lot_no }}</td>
                                        <td>{{ $user->subdivisionRole->name ?? 'No Role Assigned' }}</td> <!-- Updated line --> 
                                        <td class="text-center">
                                            <a href="{{ route('acc.mgmt.view.entry', $user->id) }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
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

                                            <!-- Only show the buttons if:
                                                - This is NOT the superadmin's row when an admin is logged in 
                                                - OR the logged-in user is the superadmin -->
                                                @if(
                                                !($user->account_type_id === 1 && Auth::user()->account_type_id === 2) ||  // Admins can't see on superadmin's row
                                                Auth::user()->account_type_id === 1 // Superadmin can see on all rows, including their own
                                            )
                                                <!-- Verify/Unverify Button -->
                                                <button class="btn btn-icon-split {{ $user->is_verified ? 'btn-success' : 'btn-danger' }} verify-toggle-btn"
                                                        data-id="{{ $user->id }}" style="margin-bottom: 5%;">
                                                    <span class="icon text-white-50">
                                                        <i class="{{ $user->is_verified ? 'fas fa-check' : 'fas fa-times' }}"></i>
                                                    </span>
                                                    <span class="text">
                                                        {{ $user->is_verified ? 'Verified' : 'Unverified' }}
                                                    </span>
                                                </button><br>

                                                <!-- Delete Button -->
                                                <form action="{{ route('superadmin.destroy', $user->id) }}" method="POST" style="display: inline-block;"
                                                    data-delete 
                                                    data-fname="{{ $user->fname }}" 
                                                    data-mname="{{ $user->mname }}" 
                                                    data-lname="{{ $user->lname }}"
                                                >
                                                <!-- Delete Button (Trigger Modal) -->
                                                <a href="#" class="btn btn-danger btn-icon-split d-inline-block" 
                                                    data-toggle="modal" 
                                                    data-target="#deleteEntryModal" 
                                                    data-entry-url="{{ route('superadmin.destroy', $user->id) }}">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>
                                                </form>
                                            @endif
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

    <script>
    // Existing delete modal logic
    $('#deleteEntryModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var entryUrl = button.data('entry-url');  // Extract the delete URL from data attribute

        var modal = $(this);
        modal.find('#delete-entry-form').attr('action', entryUrl);  // Set the form action to the delete URL
    });

    // New verify/unverify logic
    document.querySelectorAll('.verify-toggle-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-id');
            var url = `/users/${userId}/verify`; // Adjust this URL to match your routes

            // Send an AJAX request to toggle verification
            fetch(url, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token for security
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the button style and text based on the new is_verified status
                    if (data.is_verified) {
                        this.classList.remove('btn-danger');
                        this.classList.add('btn-success');
                        this.querySelector('.icon i').classList.remove('fa-times');
                        this.querySelector('.icon i').classList.add('fa-check');
                        this.querySelector('.text').textContent = 'Verified';
                    } else {
                        this.classList.remove('btn-success');
                        this.classList.add('btn-danger');
                        this.querySelector('.icon i').classList.remove('fa-check');
                        this.querySelector('.icon i').classList.add('fa-times');
                        this.querySelector('.text').textContent = 'Unverified';
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>

</x-slot>

</x-base>
