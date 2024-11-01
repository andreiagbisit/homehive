<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Facility Name - Book Reservation</title>
            </x-slot>
        </x-head>
    </x-slot>

    <x-slot name="sidebar_base">
        <x-sidebar-base>
            <x-slot name="sidebar_landing_link_user">
                <x-sidebar-landing-link-user></x-sidebar-landing-link-user>
            </x-slot>

            <x-slot name="sidebar_landing_link_admin"></x-slot>
            <x-slot name="sidebar_landing_link_super_admin"></x-slot>

            <x-slot name="sidebar_content_user">
                <x-sidebar-content-user></x-sidebar-content-user>
            </x-slot>
            
            <x-slot name="sidebar_content_admin"></x-slot>
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
                <h1 id="header-h1">{{ $facility->name }} - Book Reservation</h1>
            </div>

            <div class="col-lg-6">
                <p id="page-desc">* Personal details in the form are omitted, as the reservant will be the assigned owner of this account.</p>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Online Reservation Form</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <form action="{{ route('facility-reservation.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="facility_id" value="{{ $facility->id }}">
                                    <h5 id="page-desc">I. Select Date and Time</h5>
                                    <br>
                                    
                                    <!-- Date Selection Dropdown -->
                                    <div class="form-group">
                                        <label for="date" id="input-label">Select a Date <span style="color: red;">*</span></label>
                                        <select name="appt_date" id="date" class="form-control form-control-user" required>
                                            @foreach($availableDates as $date)
                                                <option value="{{ $date->format('Y-m-d') }}">{{ $date->format('l, F j, Y') }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Time Slot Selection -->
                                    <div class="form-group">
                                        <label for="time" id="input-label">Select a Time Slot <span style="color: red;">*</span></label>
                                        <select name="appt_time" id="time" class="form-control form-control-user" required>
                                            @foreach($facility->timeSlots as $slot)
                                                <option value="{{ $slot->start_time }} - {{ $slot->end_time }}">
                                                    {{ $slot->start_time }} - {{ $slot->end_time }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <hr>

                                    <h5 id="page-desc">II. Mode of Payment</h5><br>
                                    
                                    <!-- On-site Payment Toggle -->
                                    <div class="form-group form-check">
                                        <input type="radio" class="form-check-input" name="payment_mode" id="onsite" value="onsite" onclick="togglePaymentOptions()" required>
                                        <label id="checkbox-label" class="h5 font-weight-bold form-check-label" for="onsite">On-site Payment</label>
                                        <p id="page-desc">Payment will be made in cash at the HOA office.</p>
                                    </div>

                                    <!-- GCash Payment Toggle -->
                                    <div class="form-group form-check">
                                        <input type="radio" class="form-check-input" name="payment_mode" id="gcash" value="gcash" onclick="togglePaymentOptions()">
                                        <label id="checkbox-label" class="h5 font-weight-bold form-check-label" for="gcash">GCash</label>
                                        <p id="page-desc">Proceed via GCash by selecting a collector and uploading the payment receipt.</p>
                                    </div>

                                    <!-- GCash Fields -->
                                    <div id="gcash-fields" style="display: none;">
                                        <div class="form-group">
                                            <label id="input-label" for="collector-select">Payment Collector</label>
                                            <select name="collector_id" id="collector-select" class="form-control w-50">
                                                <option value="">Select Collector</option>
                                                @foreach($collectors as $collector)
                                                    <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <p id="upload-desc">After scanning the QR code, kindly upload the payment receipt below. The receipt can be downloaded from the GCash app.</p>

                                        <div class="custom-file mb-5">
                                            <input id="upload-input-base" name="receipt" type="file" class="custom-file-input" accept=".jpg, .png">
                                            <label class="custom-file-label" for="upload-input-base">Upload Receipt</label>
                                        </div>

                                        <p id="upload-desc-2"><span style="color: red;">*</span> Alternatively, input the Reference No. from the receipt below.</p>

                                        <div class="form-group">
                                            <p id="input-label">Reference No.</p>
                                            <input type="text" name="reference_no" class="form-control form-control-user" placeholder="Reference Number">
                                        </div>
                                    </div>
                                    <br>

                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <button type="submit" class="btn btn-warning btn-user btn-block font-weight-bold">SUBMIT PAYMENT</button>
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
            function togglePaymentOptions() {
                const gcashFields = document.getElementById('gcash-fields');
                gcashFields.style.display = document.getElementById('gcash').checked ? 'block' : 'none';
            }
        </script>

    </x-slot>
</x-base>