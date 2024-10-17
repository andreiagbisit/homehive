<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Bulletin Board - Edit Post Category</title>
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
                <h1 id="header-h1">Bulletin Board - Edit Post Category</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Existing Bulletin Board Post Category</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <p class="col-lg-6 mb-4" style="color: #000;">
                                    Please fill in the necessary details provided with the following fields below to edit an existing category for the bulletin board. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                                </p>

                                <!-- Form for Editing the Category -->
                                <form method="POST" action="{{ route('bulletin.board.update.category.admin', $category->id) }}" class="user">
                                    @csrf
                                    @method('PATCH') <!-- Use PATCH for updates -->

                                    <!-- Category Name -->
                                    <div class="form-group row">
                                        <div class="col-sm-6 mt-4 mb-4">
                                            <h4 id="form-header-h4">
                                                Name <span style="color: red;">*</span>
                                            </h4>
                                            <input type="text" name="name" id="form-text" class="form-control form-control-user" required value="{{ old('name', $category->name) }}">
                                        </div>
                                    </div>
                                    <hr>

                                    <!-- Color Picker -->
                                    <h4 id="form-header-h4" class="mt-4 mb-4">
                                        Assigned Color <span style="color: red;">*</span>
                                    </h4>
                                    <p id="page-desc">
                                        Click the color box below to reveal a color picker.  Within the color picker, you may drag the selector or use the provided input-based color picker (e.g. RGB, HSV, HEX) by your browser.
                                        <br><br>
                                        <span style="color: red;">*</span>
                                        <b>
                                            The provided input-based color pickers may vary per browser, and a browser may include multiple input pickers.
                                        </b>
                                    </p>
                                    <input type="color" name="hex_code" id="bulletin-board-category-color-picker" required value="{{ old('hex_code', $category->hex_code) }}">
                                    <hr>

                                    <!-- Color Preview -->
                                    <h4 id="form-header-h4" class="mt-4">
                                        Assigned Color Preview
                                    </h4>
                                    <p id="page-desc">
                                        <b>&#8226; Bulletin Board Entry <span style="color: red;">(Desktop Layout)</span>:</b>
                                    </p>
                                    <div id="sample-bulletin-board-entry">
                                        Bulletin Board Entry Title
                                    </div><br>

                                    <p id="page-desc">
                                        <b>&#8226; Bulletin Board Entry <span style="color: red;">(Mobile Layout)</span> / Category Legend:</b>
                                    </p>
                                    <p id="chart-category" class="mr-2 mb-4">
                                        <i id="category-circle-icon" class="fas fa-circle"></i> <span id="category-name"></span><br>
                                    </p>

                                    <!-- Script for Real-Time Updates -->
                                    <script>
                                        function applyInitialValues() {
                                            var defaultText = document.getElementById('form-text').value;
                                            var defaultColor = document.getElementById('bulletin-board-category-color-picker').value;

                                            document.getElementById('category-name').innerText = defaultText;
                                            document.getElementById('sample-bulletin-board-entry').style.backgroundColor = defaultColor;
                                            document.getElementById('category-circle-icon').style.color = defaultColor;
                                        }

                                        window.onload = applyInitialValues;

                                        document.getElementById('form-text').addEventListener('input', function(event) {
                                            document.getElementById('category-name').innerText = event.target.value;
                                        });

                                        document.getElementById('bulletin-board-category-color-picker').addEventListener('input', function(event) {
                                            var selectedColor = event.target.value;
                                            document.getElementById('sample-bulletin-board-entry').style.backgroundColor = selectedColor;
                                            document.getElementById('category-circle-icon').style.color = selectedColor;
                                        });
                                    </script>
                                    <hr>

                                    <!-- Submit and Cancel Buttons -->
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                SAVE CHANGES
                                            </button>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="{{ route('bulletin.board.manage.categories.admin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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

    <x-slot name="modal_change_pw"></x-slot>
    <x-slot name="modal_dashboard_edit"></x-slot>
    <x-slot name="modal_delete_entry"></x-slot>
    <x-slot name="modal_bulletin_entry"></x-slot>
    <x-slot name="modal_bulletin_add"></x-slot>
    <x-slot name="modal_appt_and_res_manage"></x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>
