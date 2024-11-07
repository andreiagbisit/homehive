<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Collection Management - Add Category</title>
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
                <h1 id="header-h1">Collection Management - Edit Category</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Existing Collection Category</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <p class="mb-4" style="color: #000;">
                                    Please fill in the necessary details provided with the following fields below to edit an existing category for managing funds. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                                </p>

                                <form class="user" action="{{ route('collection.mgmt.update.category.admin', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row mt-4 mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Name <span style="color: red;">*</span></p>
                                            <input type="text" name="name" id="form-text" class="form-control form-control-user" required value="{{ $category->name }}">
                                        </div>
                                    </div>
                                    <hr>

                                    <h4 id="form-header-h4" class="mt-4 mb-4">
                                        Assigned Color Preview <span style="color: red;">*</span>
                                    </h4>

                                    <p id="page-desc">
                                        Click the color box below to reveal a color picker. Within the color picker, you may drag the selector or use the provided input-based color picker (e.g. RGB, HSV, HEX) by your browser.
                                        <br><br>
                                        <span style="color: red;">*</span>
                                        <b>
                                            The provided input-based color pickers may vary per browser, and a browser may include multiple input pickers.
                                        </b>
                                    </p>
                                    <input type="color" name="hex_code" id="bulletin-board-category-color-picker" required value="{{ $category->hex_code }}">
                                    <hr>

                                    <div class="pl-3 pr-3 mt-4">
                                        <h4 id="form-header-h4">
                                            Assigned Color Preview
                                        </h4>

                                        <p id="page-desc">
                                            <b>&#8226; Dashboard - Collection Tallied per Category Entry:</b>
                                        </p>

                                        <div id="payment-tally-category-card" class="card shadow mb-4 shadow-lg rounded-lg">
                                            <div class="card-body" style="box-shadow: 2px 2px 10px #969696; border-radius: 5px; background-color: {{ $category->hex_code }};">
                                                <h4 id="payment-tally-h4" class="text-light">{{ $category->name }}</h4>
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 text-light">
                                                        <span class="h6" style="text-shadow: 2px 2px 4px #000;"><b>1</b> payment/s made</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            // Function to apply the initial values based on the predefined input values
                                            function applyInitialValues() {
                                                // Fetch the predefined values from the input fields
                                                var defaultText = document.getElementById('form-text').value;
                                                var defaultColor = document.getElementById('bulletin-board-category-color-picker').value;

                                                // Apply the predefined text to the category name
                                                document.getElementById('payment-tally-h4').innerText = defaultText;

                                                // Apply the predefined color to the bulletin board entry and circle icon
                                                document.getElementById('payment-tally-category-card-2').style.backgroundColor = defaultColor;
                                            }

                                            // Apply the initial values when the page loads
                                            window.onload = applyInitialValues;

                                            // Update values in real time based on user input
                                            document.getElementById('form-text').addEventListener('input', function(event) {
                                                var inputText = event.target.value;
                                                document.getElementById('payment-tally-h4').innerText = inputText;
                                            });

                                            document.getElementById('bulletin-board-category-color-picker').addEventListener('input', function(event) {
                                                var selectedColor = event.target.value;

                                                document.getElementById('payment-tally-category-card-2').style.backgroundColor = selectedColor;
                                            });
                                        </script>
                                    </div><br><hr>

                                    <!-- Rest of your form remains the same -->
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" class="btn btn-warning btn-user btn-block font-weight-bold" style="color: #000; font-size: 16px;">
                                                SAVE CHANGES
                                            </button>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="{{ route('manage.fund.collection.categories.admin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
