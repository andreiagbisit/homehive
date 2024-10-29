<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Collection Management - Add Entry</title>
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
                <h1 id="header-h1">Collection Management - Add Entry</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Create New Entry</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                                Please fill in the necessary details provided with the following fields below to add a new collection entry as an invoice for a household to pay. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                            <div class="col">
                                <form class="user" method="POST" action="{{ route('payment.store') }}">
                                    @csrf
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Subject <span style="color: red;">*</span></p>
                                            <input type="text" name="title" class="form-control form-control-user" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label" for="form-select">Category <span style="color: red;">*</span></label><br>
                                            <select id="form-select" name="category_id" class="form-control w-100" required>
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label" for="household-select">Household Representative <span style="color: red;">*</span></label><br>
                                            <select id="household-select" name="user_id" class="form-control w-100 select2" required>
                                                <option value="">Select Representative</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->fname }} {{ $user->mname ?? '' }} {{ $user->lname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Amount <span style="color: red;">*</span></p>
                                            <input type="text" name="fee" class="form-control form-control-user" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label" for="collector-select">Collector <span style="color: red;">*</span></label><br>
                                            <select name="collector_id" class="form-control w-100" required>
                                                <option value="">Select Collector</option>
                                                @foreach($collectors as $collector)
                                                    <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label" for="form-select">Mode of Payment <span style="color: red;">*</span></label><br>
                                            <select name="mode_id" class="form-control w-100" required>
                                                <option value="1">Gcash</option>
                                                <option value="2">On-site Payment</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Date of Payment<span style="color: red;">*</span></p>
                                            <input type="date" name="pay_date" class="form-control form-control-user" required value="2024-01-01">
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label" for="form-select">Status <span style="color: red;">*</span></label><br>
                                            <select name="status_id" class="form-control w-100" required>
                                                <option value="1">PAID</option>
                                                <option value="2">PENDING</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label" for="month-select">Month Intended<span style="color: red;">*</span></label><br>
                                            <select name="month"class="form-control w-100" required>
                                                <option value="">Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label" for="year-select">Year Intended<span style="color: red;">*</span></label><br>
                                            <select name="year" class="form-control w-100" required>
                                                <option value="">Select Year</option>
                                                <!-- Dynamically generate years from current year -->
                                                @for ($year = now()->year - 10; $year <= now()->year + 20; $year++)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" id="appt-and-res-button-submit" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                ADD ENTRY
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

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select Representative",
                    allowClear: true
                });
            });
        </script>

    </x-slot>
</x-base>
