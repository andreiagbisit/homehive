<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Appointments & Reservations - Add Facility</title>
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
                <h1 id="header-h1">Appointments & Reservations - Add Facility</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Add New Subdivision Facility</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                                Please fill in the necessary details provided with the following fields below to add a new facility within the subdivision that can be reserved by households for reservation. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
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
                                <form action="{{ route('appt-and-res.store') }}" method="POST" class="user">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h4 id="form-header-h4" class="mt-2 mb-3">
                                                Name <span style="color: red;">*</span>
                                            </h4>
                                            <input type="text" name="facility_name" id="facility_name" class="form-control form-control-user" required>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h4 id="form-header-h4" class="mt-2 mb-3">
                                                Reservation Fee <span style="color: red;">*</span>
                                            </h4>
                                            <input type="number" name="fee" id="fee" class="form-control form-control-user" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Available Days <span style="color: red;">*</span></label><br>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="available_days[]" value="Monday" class="form-check-input" id="monday">
                                            <label class="form-check-label" for="monday">Monday</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="available_days[]" value="Tuesday" class="form-check-input" id="tuesday">
                                            <label class="form-check-label" for="tuesday">Tuesday</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="available_days[]" value="Wednesday" class="form-check-input" id="wednesday">
                                            <label class="form-check-label" for="wednesday">Wednesday</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="available_days[]" value="Thursday" class="form-check-input" id="thursday">
                                            <label class="form-check-label" for="thursday">Thursday</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="available_days[]" value="Friday" class="form-check-input" id="friday">
                                            <label class="form-check-label" for="friday">Friday</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="available_days[]" value="Saturday" class="form-check-input" id="saturday">
                                            <label class="form-check-label" for="saturday">Saturday</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="available_days[]" value="Sunday" class="form-check-input" id="sunday">
                                            <label class="form-check-label" for="sunday">Sunday</label>
                                        </div>

                                        <div class="form-group">
                                            <label>Available Months <span style="color: red;">*</span></label>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="all_months" name="all_months">
                                                <label class="form-check-label" for="all_months">Available All Year</label>
                                            </div>
                                            <div id="months-checkboxes">
                                                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                                    <div class="form-check">
                                                        <input type="checkbox" name="available_months[]" value="{{ $month }}" class="form-check-input" id="{{ $month }}">
                                                        <label class="form-check-label" for="{{ $month }}">{{ $month }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label>Time Slots <span style="color: red;">*</span></label>
                                        <div id="time-slots-container">
                                            <!-- First time slot row -->
                                            <div class="row time-slot">
                                                <div class="col">
                                                    <label for="start_times[]">Start Time</label>
                                                    <input type="time" name="start_times[]" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <label for="end_times[]">End Time</label>
                                                    <input type="time" name="end_times[]" class="form-control" required>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger remove-time-slot" style="height: fit-content; margin-top: 24px;">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" id="add-time-slot" class="btn btn-sm btn-primary mt-2">Add Time Slot</button>
                                    <hr>

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
                                                var defaultText = document.getElementById('form-text').value;
                                                document.getElementById('dashboard-facility-reservation-name-percentage').innerText = defaultText;

                                                var defaultColor = document.getElementById('bulletin-board-category-color-picker').value;

                                                document.getElementById('dashboard-facility-reservation-name-percentage').style.color = defaultColor;
                                                document.getElementById('dashboard-facility-frequency').style.color = defaultColor;
                                                document.getElementById('dashboard-facility-progress-bar').style.backgroundColor = defaultColor;
                                            }

                                            window.onload = applyInitialValues;

                                            document.getElementById('form-text').addEventListener('input', function(event) {
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
                                    </div><br><hr>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" class="btn btn-warning btn-user btn-block font-weight-bold">Add Facility</button>
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

        <script>
            document.getElementById('add-time-slot').addEventListener('click', function() {
                const container = document.getElementById('time-slots-container');
                const newSlot = document.createElement('div');
                newSlot.classList.add('row', 'time-slot', 'mt-2');
                newSlot.innerHTML = `
                    <div class="col">
                        <label for="start_times[]">Start Time</label>
                        <input type="time" name="start_times[]" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="end_times[]">End Time</label>
                        <input type="time" name="end_times[]" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-sm btn-danger remove-time-slot" style="height: fit-content; margin-top: 24px;">Remove</button>
                `;
                container.appendChild(newSlot);

                // Add event listener to remove button
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
