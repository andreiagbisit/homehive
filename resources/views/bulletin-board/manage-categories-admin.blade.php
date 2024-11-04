<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Manage Bulletin Board Post Categories</title>
            </x-slot>
        </x-head>
    </x-slot>
    
    <x-slot name="sidebar_base">
        <x-sidebar-base>
            <x-slot name="sidebar_landing_link_admin">
                <x-sidebar-landing-link-admin></x-sidebar-landing-link-admin>
            </x-slot>

            <x-slot name="sidebar_landing_link_user"></x-slot>
            <x-slot name="sidebar_landing_link_super_admin"></x-slot>

            <x-slot name="sidebar_content_admin">
                <x-sidebar-content-admin></x-sidebar-content-admin>
            </x-slot>
            
            <x-slot name="sidebar_content_user"></x-slot>
            <x-slot name="sidebar_content_super_admin"></x-slot>
        </x-sidebar-base>
    </x-slot>

    <x-slot name="topbar">
        <x-topbar></x-topbar>
    </x-slot>

    <x-slot name="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Manage Bulletin Board Post Categories</h1>
            </div>

            <div class="d-sm-flex mb-4">
                <a href="{{ route('bulletin.board.add.category.admin') }}" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text" style="color: #000; font-weight: 500;">Add Category</span>
                </a>
            </div>

            @if(session('success'))
                        <div class="alert alert-success">
                        {{ session('success') }}
                        </div>
            @endif 

            <!-- Tables -->
            <div class="row">
                <div class="col-lg-5 mb-2">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: #000;">List of Post Categories</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Color Hex</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category) 
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td><span style="color: {{ $category->hex_code }}; font-weight: bold;">{{ $category->hex_code }}</span></td>
                                                <td class="text-center" style="display: flex; justify-content: center;">
                                                <a href="{{ route('bulletin.board.view.category.admin', ['id' => $category->id]) }}" 
                                                class="btn btn-primary btn-icon-split" title="View Entry" style="margin-right: 2px;">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-binoculars"></i>
                                                    </span>
                                                </a>

                                                    <a href="{{ route('bulletin.board.edit.category.admin', $category->id) }}" 
                                                    class="btn btn-success btn-icon-split" title="Edit Entry" style="margin-right: 2px;">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </a>

                                                    <a href="#" class="btn btn-danger btn-icon-split" 
                                                    title="Delete Entry"
                                                    data-toggle="modal" 
                                                    data-target="#deleteEntryModal" 
                                                    data-entry-url="{{ route('bulletin.board.delete.category.admin', $category->id) }}">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
        $('#deleteEntryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);  // Button that triggered the modal
            var entryUrl = button.data('entry-url');  // Extract delete URL from data attribute

            var modal = $(this);
            modal.find('#delete-entry-form').attr('action', entryUrl);  // Set the form action to the delete URL
        });
    </script>
    </x-slot>
</x-base>