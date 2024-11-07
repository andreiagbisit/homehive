<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Manage Subdivision Facilities - Edit Facility</title>
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
                <h1 id="header-h1">Manage Subdivision Facilities - Edit Facility</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Existing Subdivision Facility</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                                Please fill in the necessary details provided with the following fields below to edit an existing facility within the subdivision that can be reserved by households for reservation. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="col">
                                <form action="{{ route('update.facility.superadmin', $facility->id) }}" method="POST" class="user">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h4 id="form-header-h4" class="mt-2 mb-3">
                                                Name <span style="color: red;">*</span>
                                            </h4>
                                            <input type="text" name="facility_name" id="facility_name" class="form-control form-control-user" required value="{{ $facility->name }}">
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h4 id="form-header-h4" class="mt-2 mb-3">
                                                Reservation Fee <span style="color: red;">*</span>
                                            </h4>
                                            <input type="number" name="fee" id="fee" class="form-control form-control-user" required value="{{ $facility->fee }}">
                                        </div>
                                    </div><hr>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h4 id="form-header-h4" class="mt-2 mb-3">
                                                Available Days <span style="color: red;">*</span>
                                            </h4>
                                            <div class="form-check">
                                                <input type="checkbox" name="available_days[]" value="Sunday" class="form-check-input" id="sunday">
                                                <label id="page-desc" class="form-check-label" for="sunday">Sunday</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="available_days[]" value="Monday" class="form-check-input" id="monday">
                                                <label id="page-desc" class="form-check-label" for="monday">Monday</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="available_days[]" value="Tuesday" class="form-check-input" id="tuesday">
                                                <label id="page-desc" class="form-check-label" for="tuesday">Tuesday</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="available_days[]" value="Wednesday" class="form-check-input" id="wednesday">
                                                <label id="page-desc" class="form-check-label" for="wednesday">Wednesday</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="available_days[]" value="Thursday" class="form-check-input" id="thursday">
                                                <label id="page-desc" class="form-check-label" for="thursday">Thursday</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="available_days[]" value="Friday" class="form-check-input" id="friday">
                                                <label id="page-desc" class="form-check-label" for="friday">Friday</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="available_days[]" value="Saturday" class="form-check-input" id="saturday">
                                                <label id="page-desc" class="form-check-label" for="saturday">Saturday</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h4 id="form-header-h4" class="mt-2 mb-3">
                                                Available Months <span style="color: red;">*</span>
                                            </h4>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="all_months" name="all_months" {{ count($facility->available_months ?? []) == 12 ? 'checked' : '' }}>
                                                <label id="page-desc" class="form-check-label" for="all_months">Available All Year</label>
                                            </div><br>
                                            <div id="months-checkboxes">
                                                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                                    <div class="form-check">
                                                        <input type="checkbox" name="available_months[]" value="{{ $month }}" class="form-check-input" id="{{ strtolower($month) }}" {{ in_array($month, $facility->available_months ?? []) ? 'checked' : '' }}>
                                                        <label id="page-desc" class="form-check-label" for="{{ strtolower($month) }}">{{ $month }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div><hr>

                                    <h4 id="form-header-h4" class="mt-4 mb-3">
                                        Time Slots <span style="color: red;">*</span>
                                    </h4>

                                    <div id="time-slots-container">
                                        @foreach($facility->timeSlots as $timeSlot)
                                            <div class="row time-slot" style="">
                                                <div class="col">
                                                    <label for="start_times[]" id="page-desc" style="font-weight: 700;">Start Time</label>
                                                    <input id="collector-select" type="time" name="start_times[]" class="form-control" style="margin-bottom: 8px;" required value="{{ \Carbon\Carbon::parse($timeSlot->start_time)->format('H:i') }}">
                                                </div>
                                                <div class="col">
                                                    <label for="end_times[]" id="page-desc" style="font-weight: 700;">End Time</label>
                                                    <input id="collector-select" type="time" name="end_times[]" class="form-control" required value="{{ \Carbon\Carbon::parse($timeSlot->end_time)->format('H:i') }}">
                                                </div>
                                                <button type="button" id="time-slot-button-remove" class="btn btn-sm btn-danger remove-time-slot">REMOVE</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" id="add-time-slot" class="btn btn-sm btn-primary mt-2">ADD</button>
                                    <br><hr>

                                    <div style="display: none;">
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
                                        <input type="color" id="bulletin-board-category-color-picker" name="bulletin-board-category-color-picker" required>
                                        <hr>

                                        <div class="pl-3 pr-3 mt-4">
                                            <h4 id="form-header-h4">
                                                Assigned Color Preview
                                            </h4>

                                            <p id="page-desc">
                                                <b>&#8226; Dashboard - Facility Reservation Rate Entry:</b>
                                            </p>

                                            <div class="card-body">
                                                <h4 id="dashboard-facility-reservation-name-percentage" class="font-weight-bold"></h4>
                                                <h6 id="facility-rate-desc">Reserved <span id="dashboard-facility-frequency" class="font-weight-bold">2 times</span> by households</h6>

                                                <div class="progress mb-4">
                                                    <div id="dashboard-facility-progress-bar" class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                            <script>
                                                function applyInitialValues() {
                                                    var defaultText = document.getElementById('facility_name').value;
                                                    document.getElementById('dashboard-facility-reservation-name-percentage').innerText = defaultText;

                                                    var defaultColor = document.getElementById('bulletin-board-category-color-picker').value;

                                                    document.getElementById('dashboard-facility-reservation-name-percentage').style.color = defaultColor;
                                                    document.getElementById('dashboard-facility-frequency').style.color = defaultColor;
                                                    document.getElementById('dashboard-facility-progress-bar').style.backgroundColor = defaultColor;
                                                }

                                                window.onload = applyInitialValues;

                                                document.getElementById('facility_name').addEventListener('input', function(event) {
                                                    var inputText = event.target.value;
                                                    document.getElementById('dashboard-facility-reservation-name-percentage').innerText = inputText;
                                                });
                                                
                                                document.getElementById('bulletin-board-category-color-picker').addEventListener('input', function(event) {
                                                    var selectedColor = event.target.value;

                                                    document.getElementById('dashboard-facility-reservation-name-percentage').style.color = selectedColor;
                                                    document.getElementById('dashboard-facility-frequency').style.color = selectedColor;
                                                    document.getElementById('dashboard-facility-progress-bar').style.backgroundColor = selectedColor;
                                                });
                                            </script>
                                        </div><hr><br>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3">
                                            <button type="submit" class="btn btn-warning btn-user btn-block font-weight-bold" style="color: #000; font-size: 16px;">
                                                SAVE CHANGES
                                            </button>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="{{ route('manage.facilities.admin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
        <script>
            document.getElementById('add-time-slot').addEventListener('click', function() {
                const container = document.getElementById('time-slots-container');
                const newSlot = document.createElement('div');
                newSlot.classList.add('row', 'time-slot', 'mt-2');
                newSlot.innerHTML = `
                    <div class="col">
                        <label for="start_times[]" id="page-desc" style="font-weight: 700;">Start Time</label>
                        <input id="collector-select" type="time" name="start_times[]" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="end_times[]" id="page-desc" style="font-weight: 700;">End Time</label>
                        <input id="collector-select" type="time" name="end_times[]" class="form-control" required>
                    </div>
                    <button type="button" id="time-slot-button-remove" class="btn btn-sm btn-danger remove-time-slot">REMOVE</button>
                    <br>
                `;
                container.appendChild(newSlot);
                newSlot.querySelector('.remove-time-slot').addEventListener('click', function() {
                    container.removeChild(newSlot);
                });
            });

            // Event listener to disable month checkboxes if "Available All Year" is selected
            document.getElementById('all_months').addEventListener('change', function() {
                const monthCheckboxes = document.querySelectorAll('#months-checkboxes input[type="checkbox"]');
                monthCheckboxes.forEach(checkbox => {
                    checkbox.disabled = this.checked;
                    checkbox.checked = false;
                });
            });
        </script>
    </x-slot>
</x-base>
