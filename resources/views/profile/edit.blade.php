<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Edit Profile</title>
            </x-slot>
        </x-head>
    </x-slot>

    <x-slot name="sidebar_base">
    <x-sidebar-base>
        <x-slot name="sidebar_landing_link_super_admin">
            @if (Auth::user()->account_type_id == 1)
                <x-sidebar-landing-link-super-admin></x-sidebar-landing-link-super-admin>
            @endif
        </x-slot>

        <x-slot name="sidebar_landing_link_user">
            @if (Auth::user()->account_type_id == 3)
                <x-sidebar-landing-link-user></x-sidebar-landing-link-user>
            @endif
        </x-slot>

        <x-slot name="sidebar_landing_link_admin">
            @if (Auth::user()->account_type_id == 2)
                <x-sidebar-landing-link-admin></x-sidebar-landing-link-admin>
            @endif
        </x-slot>

        <x-slot name="sidebar_content_super_admin">
            @if (Auth::user()->account_type_id == 1)
                <x-sidebar-content-super-admin></x-sidebar-content-super-admin>
            @endif
        </x-slot>

        <x-slot name="sidebar_content_user">
            @if (Auth::user()->account_type_id == 3)
                <x-sidebar-content-user></x-sidebar-content-user>
            @endif
        </x-slot>

        <x-slot name="sidebar_content_admin">
            @if (Auth::user()->account_type_id == 2)
                <x-sidebar-content-admin></x-sidebar-content-admin>
            @endif
        </x-slot>
    </x-sidebar-base>
</x-slot>

    <x-slot name="topbar">
        <x-topbar></x-topbar>
    </x-slot>

    <x-slot name="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @error('new_password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            @error('current_password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1" class="h3 mb-0 text-800">Edit Profile</h1>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Change Account Information</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <h5 id="page-desc">I. Account Name</h5><br>

                                <!-- Save Changes Form -->
                                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="user">
                                    @csrf
                                    @method('PATCH')

                                    <div class="col-sm-4">
                                        <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Username</p>
                                        <input type="text" name="username" class="form-control form-control-user" value="{{ $user->uname }}" required>

                                        @error('username')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <hr><br>

                                    <h5 id="page-desc">II. Personal Information</h5><br>

                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">First Name</p>
                                            <input type="text" name="first_name" class="form-control form-control-user" value="{{ $user->fname }}" required>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Middle Name</p>
                                            <input type="text" name="middle_name" class="form-control form-control-user" value="{{ $user->mname }}">
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Last Name</p>
                                            <input type="text" name="last_name" class="form-control form-control-user" value="{{ $user->lname }}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Birthdate</p>
                                            <input type="date" name="birthdate" class="form-control form-control-user" value="{{ $user->bdate }}" required>
                                        </div>
                                    </div>
                                    <hr><br>

                                    <h5 id="page-desc">III. Contact Information</h5><br>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Email</p>
                                            <input type="email" name="email" class="form-control form-control-user" value="{{ $user->email }}" required>
                                            @error('email')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Contact No.</p>
                                            <input type="text" name="contact_no" class="form-control form-control-user" value="{{ $user->contact_no }}" required>
                                        </div>
                                    </div>
                                    <hr><br>

                                    <h5 id="page-desc">IV. Address</h5><br>

                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Street</p>
                                            <input type="text" name="street" class="form-control form-control-user" value="{{ $user->street }}" required>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">House Block No.</p>
                                            <input type="text" name="block_no" class="form-control form-control-user" value="{{ $user->house_blk_no }}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">House Lot No.</p>
                                            <input type="text" name="lot_no" class="form-control form-control-user" value="{{ $user->house_lot_no }}" required>
                                        </div>
                                    </div>
                                    <hr><br>

                                    <h5 id="page-desc">V. Account Password</h5><br>

                                    <!-- Disabled password field just to display the current password -->
                                    <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Password <span style="color: red;"></span></p>

                                    <div class="col-sm-4">
                                        <input id="pw-field" type="password" name="password" class="form-control form-control-user">
                                    </div><br>

                                    <h6 class="btn ml-3">
                                        <input type="checkbox" class="form-check-input" id="show-pw" onclick="showPassword()">
                                        <label id="checkbox-label" class="form-check-label" for="show-pw">Show Password</label>
                                    </h6><br>

                                    <!-- Change Password Modal Trigger -->
                                    <a style="margin-bottom: 2%;" class="btn btn-warning btn-icon-split" href="#" data-toggle="modal" data-target="#changePasswordModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text" style="color:#000; font-weight: 500;">Change Password</span>
                                    </a>
                                    <hr><br>

                                    <h5 id="page-desc">VI. Profile Picture</h5><br>

                                    <div class="form-group text-center">
                                        <!-- Display profile picture or fallback to default -->
                                        <img class="img-circle profile-avatar" 
                                            src="{{ $user->profile_picture ?: $defaultProfilePictureUrl }}" 
                                            style="border-radius: 50%; width: 232px; height: 232px; object-fit: cover;">
                                        <p id="page-desc">
                                            * The image's resolution must at least be <b>232x232</b>.<br>
                                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b>
                                        </p>

                                        <!-- Form for Uploading New Image -->
                                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="user mb-3">
                                            @csrf
                                            @method('PATCH')

                                            <!-- File input for profile picture -->
                                            <input id="input-file" type="file" name="profile_picture" accept=".jpg, .png">
                                            <label class="btn btn-warning btn-icon-split mt-2" for="input-file">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-file-upload"></i>
                                                </span>
                                                <span class="text" style="color: #000; font-weight: 500;">
                                                    Upload New Image
                                                </span>
                                            </label><br>
                                            
                                            <!-- Save Changes Button (for image and other profile data) -->
                                            <div class="form-group row mt-3">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <button type="submit" id="appt-and-res-button-submit" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                        SAVE CHANGES
                                                    </button>
                                                </div>

                                                <!-- Back Button -->
                                                <div class="col-sm-6">
                                                    <a id="appt-and-res-button-submit" href="{{ url()->previous() }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
                                                        BACK
                                                    </a>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Separate Form to Remove Existing Image (placed right under the upload button) -->
                                        @if ($user->profile_picture && !$isDefaultProfilePicture)
                                        <form method="POST" action="{{ route('profile.remove.picture') }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger btn-icon-split mt-2">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                                <span class="text" style="color: #fff; font-weight: 500;">
                                                    Remove Existing Image
                                                </span>
                                            </button>
                                        </form>
                                    @endif
                                    </div>
                                <hr>
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
        <x-modal-change-pw></x-modal-change-pw>
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
