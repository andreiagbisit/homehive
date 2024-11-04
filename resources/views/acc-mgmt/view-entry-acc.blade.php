<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Account Management - View Entry</title>
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
                <h1 id="header-h1">Account Management - View Entry</h1>
            </div>

                    @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Entry Details</h6>
                        </div>

                        <div class="card-body">
                            <div class="col overflow-auto mt-4 mb-4">
                                    <table id="tb" class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                        <td id="tb-v-head">ID</td>
                                        <td>{{ $user->id }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">Username</td>
                                        <td>{{ $user->uname }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">Profile Picture</td>
                                        <td>
                                            <img class="img-circle profile-avatar border border-secondary rounded-circle" 
                                                 src="{{ $user->profile_picture ?: 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png' }}"
                                                 style="border-radius: 50%; width: 232px; height: 232px; object-fit: cover;">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">First Name</td>
                                        <td>{{ $user->fname }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">Middle Name</td>
                                        <td>{{ $user->mname }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">Last Name</td>
                                        <td>{{ $user->lname }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">Birthdate</td>
                                        <td>{{ $user->bdate }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">Email Address</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">Contact No.</td>
                                        <td>{{ $user->contact_no }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">Street</td>
                                        <td>{{ $user->street }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">House Block No.</td>
                                        <td>{{ $user->house_blk_no }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">House Lot No.</td>
                                        <td>{{ $user->house_lot_no }}</td>
                                    </tr>

                                    <tr>
                                        <td id="tb-v-head">Subdivision Role</td>
                                        <td>{{ $user->subdivisionRole->name ?? 'No role assigned' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                            
                            <div class="col-sm-3 float-right">
                                <a style="border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" id="appt-and-res-button-submit" href="{{ route('account.management.superadmin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
