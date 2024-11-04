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
                                    <h5 id="page-desc">I. Select Date and Time Slot</h5>
                                    <br>
                                    
                                    <!-- Date Selection Dropdown -->
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="date" id="input-label">Date <span style="color: red;">*</span></label>
                                            <select id="collector-select" name="appt_date" id="date" class="form-control form-control-user" required onchange="filterTimeSlots()">
                                                @foreach($availableDates as $date)
                                                    <option value="{{ $date->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="time" id="input-label">Time Slot <span style="color: red;">*</span></label>
                                            <select id="collector-select" name="appt_time" id="time-slot" class="form-control form-control-user" required>
                                                <option value="">Select Time Slot</option>
                                                @foreach($facility->timeSlots as $slot)
                                                    <option value="{{ $slot->start_time }}|{{ $slot->end_time }}" 
                                                        {{ isset($bookedSlots[$date->format('Y-m-d')]) && in_array($slot->start_time, $bookedSlots[$date->format('Y-m-d')]) ? 'disabled' : '' }}>
                                                        {{ $slot->start_time }} - {{ $slot->end_time }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Hidden inputs to store the start and end times separately -->
                                    <input type="hidden" name="appt_start_time" id="appt_start_time">
                                    <input type="hidden" name="appt_end_time" id="appt_end_time">

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
                                                    <option value="{{ $collector->id }}" data-qr-code="{{ $collector->gcash_qr_code_path }}">{{ $collector->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <!-- Collector QR Code Display -->
                                        <div id="collector-qr-code" style="display: none; margin-top: 10px;">
                                            <p>Collector QR Code:</p>
                                            <img id="qr-code-img" src="" alt="Collector QR Code" style="max-width: 50%; height: auto; border: 1px solid #ddd; padding: 5px;">
                                        </div>

                                        <p id="upload-desc">After scanning the QR code, kindly upload the payment receipt below. The receipt can be downloaded from the GCash app.</p>

                                        <div id="upload-input-div" class="custom-file mb-5">
                                            <input id="upload-input-base" name="receipt" type="file" class="custom-file-input" accept=".jpg, .png" onchange="showPreview(event)">
                                            <label id="upload-input-text" class="custom-file-label" for="upload-input-base">Upload Receipt</label>
                                        </div>

                                        <div id="image-preview" style="display: none; margin-top: 10px;">
                                            <p>Receipt Preview:</p>
                                            <img id="preview-img" src="#" alt="Receipt Preview" style="max-width: 50%; height: auto; border: 1px solid #ddd; padding: 5px;">
                                        </div>

                                        <p id="upload-desc-2"><span style="color: red;">*</span> Alternatively, you could just input the Reference No. indicated within the receipt with the provided field below.</p>

                                        <div class="form-group">
                                            <p id="input-label">Reference No.</p>
                                            <div class="col-sm-3 mb-3">
                                                <input id="collector-select" type="text" class="form-control" name="reference_no" placeholder="XXXX XXXX X">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button id="appt-and-res-button-submit" type="submit" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                SUBMIT PAYMENT
                                            </button>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="{{ route('appt.res') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
                const paymentMode = document.querySelector('input[name="payment_mode"]:checked').value;

                gcashFields.style.display = paymentMode === 'gcash' ? 'block' : 'none';

                // Send AJAX request to update the payment mode
                updatePaymentMode(paymentMode);
            }

            function updatePaymentMode(paymentMode) {
                const facilityId = document.querySelector('input[name="facility_id"]').value;

                fetch(`/update-payment-mode/${facilityId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ payment_mode: paymentMode })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Payment mode updated successfully.');
                    } else {
                        console.error('Error updating payment mode.');
                    }
                })
                .catch(error => console.error('Error:', error));
            }

            function showPreview(event) {
                const preview = document.getElementById('image-preview');
                const previewImg = document.getElementById('preview-img');
                
                if (event.target.files && event.target.files[0]) {
                    preview.style.display = 'block';
                    previewImg.src = URL.createObjectURL(event.target.files[0]);
                    previewImg.onload = function() {
                        URL.revokeObjectURL(previewImg.src); // Free up memory
                    };
                } else {
                    preview.style.display = 'none';
                    previewImg.src = '';
                }
            }

            const baseUrl = "https://homehivemedia.blob.core.windows.net/homehivemedia";

            function togglePaymentOptions() {
                const gcashFields = document.getElementById('gcash-fields');
                gcashFields.style.display = document.getElementById('gcash').checked ? 'block' : 'none';
            }

            function showPreview(event) {
                const preview = document.getElementById('image-preview');
                const previewImg = document.getElementById('preview-img');
                
                if (event.target.files && event.target.files[0]) {
                    preview.style.display = 'block';
                    previewImg.src = URL.createObjectURL(event.target.files[0]);
                    previewImg.onload = function() {
                        URL.revokeObjectURL(previewImg.src); // Free up memory
                    };
                } else {
                    preview.style.display = 'none';
                    previewImg.src = '';
                }
            }

            document.getElementById('collector-select').addEventListener('change', function() {
                const selectedCollector = this.options[this.selectedIndex];
                let qrCodePath = selectedCollector.getAttribute('data-qr-code');

                const qrCodeContainer = document.getElementById('collector-qr-code');
                const qrCodeImg = document.getElementById('qr-code-img');

                if (qrCodePath) {
                    // Prepend base URL if needed
                    if (!qrCodePath.startsWith('http')) {
                        qrCodePath = `${baseUrl}/${qrCodePath}`;
                    }
                    qrCodeImg.src = qrCodePath;
                    qrCodeContainer.style.display = 'block';
                } else {
                    qrCodeContainer.style.display = 'none';
                    qrCodeImg.src = '';
                }
            });

            function setAppointmentTimes() {
                const timeSlot = document.getElementById('time-slot').value;
                const [startTime, endTime] = timeSlot.split('|');
                
                document.getElementById('appt_start_time').value = startTime;
                document.getElementById('appt_end_time').value = endTime;
            }

            const bookedSlots = @json($bookedSlots);

            function filterTimeSlots() {
                const selectedDate = document.getElementById('date').value;
                const timeSlotSelect = document.getElementById('time-slot');

                for (let i = 0; i < timeSlotSelect.options.length; i++) {
                    const option = timeSlotSelect.options[i];
                    const [startTime] = option.value.split('|');
                    option.disabled = bookedSlots[selectedDate] && bookedSlots[selectedDate].includes(startTime);
                }
            }

        </script>

    </x-slot>
</x-base>