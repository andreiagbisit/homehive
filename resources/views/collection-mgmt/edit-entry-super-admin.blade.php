<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Collection Management - Edit Entry</title>
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
                <h1 id="header-h1">Collection Management - Edit Entry</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Existing Entry</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                            Please fill in the necessary details provided with the following fields below to edit an existing collection entry associated with households. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                            <div class="col">
                                <form class="user" method="POST" action="{{ route('payment.update', $payment->id) }}">
                                    @csrf
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Subject <span style="color: red;">*</span></p>
                                            <input type="text" name="title" class="form-control form-control-user" required value="{{ old('title', $payment->title) }}">
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label" for="form-select">Category <span style="color: red;">*</span></label><br>
                                            <select id="form-select" name="category_id" class="form-control w-100" required>
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id', $payment->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
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
                                                    <option value="{{ $user->id }}" {{ old('user_id', $payment->user_id) == $user->id ? 'selected' : '' }}>
                                                        {{ $user->fname }} {{ $user->mname ?? '' }} {{ $user->lname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Amount <span style="color: red;">*</span></p>
                                            <input type="text" name="fee" class="form-control form-control-user" required value="{{ old('fee', $payment->fee) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label" for="collector-select">Collector <span style="color: red;">*</span></label><br>
                                            <select name="collector_id" class="form-control w-100" required>
                                                <option value="">Select Collector</option>
                                                @foreach($collectors as $collector)
                                                    <option value="{{ $collector->id }}" {{ old('collector_id', $payment->collector_id) == $collector->id ? 'selected' : '' }}>
                                                        {{ $collector->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label" for="form-select">Mode of Payment <span style="color: red;">*</span></label><br>
                                            <select name="mode_id" class="form-control w-100" required>
                                                <option value="1" {{ old('mode_id', $payment->mode_id) == 1 ? 'selected' : '' }}>Gcash</option>
                                                <option value="2" {{ old('mode_id', $payment->mode_id) == 2 ? 'selected' : '' }}>On-site Payment</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Date of Payment<span style="color: red;">*</span></p>
                                            <input type="date" name="pay_date" class="form-control form-control-user" required value="{{ old('pay_date', $payment->pay_date) }}">
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
                                                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                                    <option value="{{ $month }}" {{ old('month', $payment->month) == $month ? 'selected' : '' }}>{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label" for="year-select">Year Intended<span style="color: red;">*</span></label><br>
                                            <select name="year" class="form-control w-100" required>
                                                <option value="">Select Year</option>
                                                <!-- Dynamically generate years from current year -->
                                                @for ($year = now()->year - 10; $year <= now()->year + 20; $year++)
                                                    <option value="{{ $year }}" {{ old('year', $payment->year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
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
