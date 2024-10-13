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

                                            <!-- Only show the buttons if this is NOT the logged-in user's row -->
                                            @if(Auth::user()->id !== $user->id)
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
        document.addEventListener('DOMContentLoaded', function () {
            // Attach click event to all verify-toggle buttons
            const verifyButtons = document.querySelectorAll('.verify-toggle-btn');

            verifyButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const userId = this.dataset.id; // Get the user ID
                    const buttonElement = this; // Store reference to the button

                    // Send AJAX request to toggle verification
                    fetch(`/users/${userId}/verify`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                        }
                    })
                    .then(response => response.json()) // Parse JSON response
                    .then(data => {
                        if (data.success) {
                            // Toggle button classes and content based on verification status
                            buttonElement.classList.toggle('btn-success', data.is_verified);
                            buttonElement.classList.toggle('btn-danger', !data.is_verified);

                            // Update the icon and text
                            buttonElement.querySelector('i').className = 
                                data.is_verified ? 'fas fa-check' : 'fas fa-times';
                            buttonElement.querySelector('.text').textContent = 
                                data.is_verified ? 'Verified' : 'Unverified';
                        }
                    })
                    .catch(error => console.error('Error:', error)); // Handle any errors
                });
            });
        });
    </script>
</x-slot>

</x-base>
