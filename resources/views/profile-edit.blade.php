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
                <h1 id="header-h1" class="h3 mb-0 text-800">Edit Profile</h1>
            </div>

            <div class="col-lg-6">
                <p id="page-desc">Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.</p>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Change Account Information</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <h5 id="page-desc">I. Account Name</h5><br>

                                <form method="POST" action="{{ route('profile.update') }}" class="user">
                                    @csrf
                                    @method('PATCH')
                                    <div class="col-sm-4">
                                        <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Username <span style="color: red;">*</span></p>
                                        <input type="text" name="username" class="form-control form-control-user" required value="{{ old('username', $user->username) }}">
                                    </div><hr><br>
                                    
                                    <h5 id="page-desc">II. Personal Information</h5><br>

                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">First Name <span style="color: red;">*</span></p>
                                            <input type="text" name="first_name" class="form-control form-control-user" required value="{{ old('first_name', $user->first_name) }}">
                                        </div>
                                        
                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Middle Name</p>
                                            <input type="text" name="middle_name" class="form-control form-control-user" value="{{ old('middle_name', $user->middle_name) }}">
                                        </div>
                                        
                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Last Name <span style="color: red;">*</span></p>
                                            <input type="text" name="last_name" class="form-control form-control-user" required value="{{ old('last_name', $user->last_name) }}">
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Birthdate <span style="color: red;">*</span></p>
                                            <input type="date" name="birthdate" class="form-control form-control-user" required value="{{ old('birthdate', $user->birthdate) }}">
                                        </div>
                                    </div><hr><br>

                                    <h5 id="page-desc">III. Contact Information</h5><br>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Email <span style="color: red;">*</span></p>
                                            <input type="email" name="email" class="form-control form-control-user" required value="{{ old('email', $user->email) }}">
                                        </div>

                                        <div class="col-sm-4">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Contact No. <span style="color: red;">*</span></p>
                                            <input type="text" name="contact_no" class="form-control form-control-user" required value="{{ old('contact_no', $user->contact_no) }}">
                                        </div>
                                    </div><hr><br>

                                    <h5 id="page-desc">IV. Address</h5><br>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Street <span style="color: red;">*</span></p>
                                            <input type="text" name="street" class="form-control form-control-user" required value="{{ old('street', $user->street) }}">
                                        </div>

                                        <div class="col-sm-4 mb-3">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">House Block No. <span style="color: red;">*</span></p>
                                            <input type="text" name="block_no" class="form-control form-control-user" required value="{{ old('block_no', $user->block_no) }}">
                                        </div>

                                        <div class="col-sm-4">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">House Lot No. <span style="color: red;">*</span></p>
                                            <input type="text" name="lot_no" class="form-control form-control-user" required value="{{ old('lot_no', $user->lot_no) }}">
                                        </div>
                                    </div><hr><br>

                                    <h5 id="page-desc">V. Account Password</h5><br>

                                    <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Password <span style="color: red;">*</span></p>
                                    
                                    <div class="col-sm-4">
                                        <input id="pw-field" type="password" name="password" class="form-control form-control-user" required>
                                    </div><br>
                                    
                                    <h6 class="btn ml-3">
                                        <input type="checkbox" class="form-check-input" id="show-pw" onclick="showPassword()">
                                        <label id="checkbox-label" class="form-check-label" for="show-pw">Show Password</label>
                                    </h6><br>

                                    <a style="margin-bottom: 2%;" class="btn btn-warning btn-icon-split" href="#" data-toggle="modal" data-target="#changePasswordModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text" style="color:#000; font-weight: 500;">Change Password</span>
                                    </a>
                                    <hr><br>

                                    <h5 id="page-desc">VI. Profile Picture</h5><br>

                                    <div class="form-group text-center">
                                        <img class="img-circle profile-avatar" src="{{ url('img/pfp_1.png') }}"><br>
                                        <p id="page-desc">
                                            * The image's resolution must at least be <b>232x232</b>.<br>
                                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b>
                                        </p>

                                        <input id="input-file" type="file" name="profile_picture" accept=".jpg, .png">
                                        <label class="btn btn-warning btn-icon-split" for="input-file">
                                            <span class="icon text-white-50">
                                                    <i class="fas fa-file-upload"></i>
                                            </span>
                                            
                                            <span class="text" style="color: #000; font-weight: 500;">
                                                Upload New Image
                                            </span>
                                        </label><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text" style="color: #fff; font-weight: 500;">Remove Existing Image</span>
                                        </a>
                                    </div>
                                    <hr>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" id="appt-and-res-button-submit" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                SAVE CHANGES
                                            </button>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="#" onclick="history.go(-1)" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
        <x-modal-change-pw></x-modal-change-pw>
    </x-slot>

    <x-slot name="modal_delete_entry">
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>
