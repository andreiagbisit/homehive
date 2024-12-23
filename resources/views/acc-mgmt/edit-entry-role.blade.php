<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Account Management - Edit Role</title>
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
                <h1 id="header-h1">Account Management - Edit Role</h1>
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
                                
                                <p class="mb-4" style="color: #000;">
                                    Please fill in the necessary details provided with the following fields below to edit an existing account role and their privileges.
                                </p> 

                                <form method="POST" action="{{ route('acc.mgmt.update.entry.role', $user->id) }}" class="user">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row mb-5">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h4 id="form-header-h4" class="mt-4">
                                                Role Name <span style="color: red;"></span>
                                            </h4>
                                            <input 
                                                type="text" 
                                                name="name" 
                                                id="form-text" 
                                                class="form-control form-control-user" 
                                                value="{{ old('name', $user->subdivisionRole->name ?? '') }}" 
                                                required>
                                        </div>
                                    </div>
                                    <hr>

                                    
                                    <!-- Privilege Dropdown -->
                                    <div class="form-group row mb-5">
                                        <div class="col-sm-6">
                                            <h4 id="form-header-h4" class="mt-4">
                                                Privilege Type <span style="color: red;"></span>
                                            </h4>
                                            <select 
                                                name="account_type_id" 
                                                id="account_type_id" 
                                                class="form-control w-75">
                                                <option value="2" {{ old('account_type_id', $user->account_type_id) == 2 ? 'selected' : '' }}>
                                                    Admin
                                                </option>
                                                <option value="3" {{ old('account_type_id', $user->account_type_id) == 3 ? 'selected' : '' }}>
                                                    Resident
                                                </option>
                                            </select>
                                        </div>
                                    </div><hr><br>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" id="appt-and-res-button-submit" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                SAVE CHANGES
                                            </button>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="{{ route('manage.roles') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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