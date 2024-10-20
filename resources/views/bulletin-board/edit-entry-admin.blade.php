<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Bulletin Board - Edit Entry</title>
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
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Bulletin Board - Edit Entry</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-7 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Change Existing Entry</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                            <p class="mb-4" style="color: #000;">
                                Please fill in the necessary details provided with the following fields below to publish an entry in the bulletin board. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>
                            
                            <form action="{{ route('bulletin.board.update.admin', $entry->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                            <div class="col-lg-3 mb-4">
                                <h4 id="form-header-h4">Event Date <span style="color: red;">*</span></h4>
                                <input style="border-radius: 10rem; padding: 1.5rem 1rem;" 
                                    type="date" 
                                    name="post_date" 
                                    class="form-control form-control-user" 
                                    value="{{ old('post_date', $entry->post_date ? $entry->post_date->format('Y-m-d') : '') }}" required>
                            </div>

                            <div class="col-lg-8 mb-4">
                                <h4 id="form-header-h4">Title <span style="color: red;">*</span></h4>
                                <input style="border-radius: 10rem; padding: 1.5rem 1rem;" 
                                    type="text" 
                                    class="form-control form-control-user" 
                                    name="title" 
                                    value="{{ old('title', $entry->title) }}" required>
                            </div>

                            <div class="col-lg-8 mb-4">
                                <h4 id="form-header-h4">Category <span style="color: red;">*</span></h4>
                                @foreach ($categories as $category)
                                    <div class="form-group form-check">
                                        <input style="margin-top: 10px;" 
                                            type="radio" 
                                            class="form-check-input" 
                                            name="category_id" 
                                            id="bulletinCategoryPick{{ $category->id }}" 
                                            value="{{ $category->id }}" 
                                            {{ $entry->category_id == $category->id ? 'checked' : '' }}>
                                        <label id="checkbox-label" class="form-check-label mb-2">
                                            <span id="chart-category" class="rounded-label" 
                                                style="background-color: {{ $category->hex_code }};">
                                                {{ $category->name }}
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                           <!-- <h4 id="form-header-h4" class="pl-2">
                                Entry Image
                            </h4>

                            <div class="form-group text-center">
                                <img id="modalImage" src="{{ url('img/plaza.jpg') }}"><br><br>
                                <span id="media-upload-info">
                                    <i class="fas fa-image pr-2"></i> plaza.jpg | 410 KB
                                </span><br><br>

                                <p id="page-desc">
                                    * The image must at least be <b>858x453</b>. In smartphone-based layouts, it will be displayed at <b>245x350</b>.<br>
                                    <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b><br>
                                    <b>Maximum image size:</b> <b class="text-danger">20 MB</b>
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
                            </div> -->

                            <div class="col-lg-20 mb-3 pl-2">
                                <h4 id="form-header-h4">
                                    Entry Details <span style="color: red;">*</span>
                                <h4>
                                <!-- Initialize the RichTextEditor on this textarea -->
                                <textarea id="richtexteditor" name="description" required>{{ old('description', $entry->description) }}</textarea>
                            </div>
                            <hr>


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <!-- Your form fields go here -->

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <!-- Rename this ID to avoid conflict -->
                                    <button id="saveChangesButton" type="submit" class="btn btn-warning btn-user btn-block font-weight-bold">SAVE CHANGES</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#" onclick="history.go(-1)" class="btn btn-secondary btn-user btn-block font-weight-bold">BACK</a>
                                    </div>
                                </div>
                            </form>
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
    <link rel="stylesheet" href="{{ url('vendor/richtexteditor/rte_theme_default.css') }}">
    <script src="{{ url('vendor/richtexteditor/rte.js') }}"></script>
    <script src="{{ url('vendor/richtexteditor/plugins/all_plugins.js') }}"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize the rich text editor on the textarea
        var editor = new RichTextEditor("#richtexteditor");

        // Populate the editor with old content or existing content
        editor.setHTML(`{!! old('description', $entry->description) !!}`);

        // Sync content of the editor with the underlying textarea on form submission
        document.querySelector('form').addEventListener('submit', function() {
            var content = editor.getHTML();
            document.querySelector('textarea[name="description"]').value = content; // Sync the value
        });
    });
    </script>
    </x-slot>
</x-base>
