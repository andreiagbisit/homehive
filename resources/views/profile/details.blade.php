<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Profile Details</title>
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
                <h1 id="header-h1" class="h3 mb-0 text-800">Profile Details</h1><br>

                <div class="text-center">
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-user-cog"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Edit Profile</span>
                    </a>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Account Information</h6>
                        </div>

                        <div class="card-body">
                            <div class="col overflow-auto">
                                    <table id="tb" class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                            <td id="tb-v-head">Username</td>
                                            <td>{{ Auth::user()->uname }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">First Name</td>
                                            <td>{{ Auth::user()->fname }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Middle Name</td>
                                            <td>{{ Auth::user()->mname ?? 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Last Name</td>
                                            <td>{{ Auth::user()->lname }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Birthdate</td>
                                            <td>{{ Auth::user()->bdate }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Email Address</td>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Contact No.</td>
                                            <td>{{ Auth::user()->contact_no }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Street</td>
                                            <td>{{ Auth::user()->street }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">House Block No.</td>
                                            <td>{{ Auth::user()->house_blk_no }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">House Lot No.</td>
                                            <td>{{ Auth::user()->house_lot_no }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Profile Picture</td>
                                            <td>
                                                <img class="img-circle profile-avatar" 
                                                    src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('img/default.png') }}" 
                                                    style="border-radius: 50%; width: 232px; height: 232px; object-fit: cover;">
                                            </td>
                                        </tr>

                                    </table><hr>
                            </div>
                            
                            <div class="col-sm-3 float-right">
                                <a style="border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" id="appt-and-res-button-submit" href="#" onclick="history.go(-1)" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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

    <x-slot name="modal_delete_entry">
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>
