<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Lorem Ipsum - Edit Entry</title>
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
                <h1 id="header-h1" class="h3 mb-0 text-800">Account Edit - Edit Entry</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Change Existing Entry</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <h5 id="page-desc">Text Fields</h5><br>

                                <form method="POST" action="{{ route('superadmin.update', $user->id) }}" class="user">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Username <span style="color: red;">*</span></p>
                                            <input type="text" name="uname" id="form-text" class="form-control form-control-user" value="{{ old('uname', $user->uname) }}" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">First Name <span style="color: red;">*</span></p>
                                            <input type="text" name="fname" id="form-text" class="form-control form-control-user" value="{{ old('fname', $user->fname) }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Middle Name</p>
                                            <input type="text" name="mname" id="form-text" class="form-control form-control-user" value="{{ old('mname', $user->mname) }}">
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Last Name <span style="color: red;">*</span></p>
                                            <input type="text" name="lname" id="form-text" class="form-control form-control-user" value="{{ old('lname', $user->lname) }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Birthdate <span style="color: red;">*</span></p>
                                            <input type="date" name="bdate" id="form-text" class="form-control form-control-user" value="{{ old('bdate', $user->bdate) }}" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Email Address <span style="color: red;">*</span></p>
                                            <input type="email" name="email" id="form-text" class="form-control form-control-user" value="{{ old('email', $user->email) }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Contact No. <span style="color: red;">*</span></p>
                                            <input type="text" name="contact_no" id="form-text" class="form-control form-control-user" value="{{ old('contact_no', $user->contact_no) }}" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Street <span style="color: red;">*</span></p>
                                            <input type="text" name="street" id="form-text" class="form-control form-control-user" value="{{ old('street', $user->street) }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">House Block No. <span style="color: red;">*</span></p>
                                            <input type="text" name="house_blk_no" id="form-text" class="form-control form-control-user" value="{{ old('house_blk_no', $user->house_blk_no) }}" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">House Lot No. <span style="color: red;">*</span></p>
                                            <input type="text" name="house_lot_no" id="form-text" class="form-control form-control-user" value="{{ old('house_lot_no', $user->house_lot_no) }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Subdivision Role</p>
                                            <select name="subdivision_role_id" id="form-select" class="form-control w-75">
                                                <option value="1" {{ old('subdivision_role_id', $user->subdivision_role_id) == 1 ? 'selected' : '' }}>Role 1</option>
                                                <option value="2" {{ old('subdivision_role_id', $user->subdivision_role_id) == 2 ? 'selected' : '' }}>Role 2</option>
                                                <option value="3" {{ old('subdivision_role_id', $user->subdivision_role_id) == 3 ? 'selected' : '' }}>Role 3</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>

                                    <hr>

                                    <h5 id="page-desc">Edit Image</h5><br>

                                    <div class="form-group text-center">
                                        <img id="img-preview" class="img-fluid mt-3 mb-4" src="{{ url('img/facilities.jpg') }}"><br>
                                        <p id="page-desc">
                                            * The image's resolution must at least be <b>390x300</b>. In smartphone-based layouts, it will be displayed in <b>246x300</b>.<br>
                                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b>
                                        </p>

                                        <input id="input-file" type="file" accept=".jpg, .png">
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
    </x-slot>

    <x-slot name="modal_delete_entry">
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>
