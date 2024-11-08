<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Vehicle Sticker - Book Appointment</title>
            </x-slot>
        </x-head>
    </x-slot>

    <x-slot name="sidebar_base">
        <x-sidebar-base>
            <x-slot name="sidebar_landing_link_user">
                <x-sidebar-landing-link-user></x-sidebar-landing-link-user>
            </x-slot>
        </x-sidebar-base>
    </x-slot>

    <x-slot name="topbar">
        <x-topbar></x-topbar>
    </x-slot>

    <x-slot name="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Vehicle Sticker - Book Appointment</h1>
            </div>

            <div class="col-lg-6">
                <p id="page-desc">* Personal details in the form are omitted, as the reservant will be the assigned owner of this account.</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Online Appointment Form</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <form class="user" method="POST" action="{{ route('vehicle.sticker.appointment.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 id="page-desc">I. Personal Information</h5><br>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p id="input-label">Registered Vehicle Owner <span style="color: red;">*</span></p>
                                        <input type="text" name="registered_owner" id="registered-owner" class="form-control form-control-user" required>
                                    </div>
                                    <hr>

                                    <h5 id="page-desc">II. Description of Vehicle</h5><br>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Make <span style="color: red;">*</span></p>
                                            <input type="text" name="make" id="make" class="form-control form-control-user" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="input-label">Series <span style="color: red;">*</span></p>
                                            <input type="text" name="series" id="series" class="form-control form-control-user" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <p id="input-label">Color <span style="color: red;">*</span></p>
                                            <input type="text" name="color" id="color" class="form-control form-control-user" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="input-label">Plate No. <span style="color: red;">*</span></p>
                                            <input type="text" name="plate_no" id="plate-no" class="form-control form-control-user" required>
                                        </div>
                                    </div><br>

                                    <h3 id="form-fee" class="font-weight-bold text-right">Fee: <span class="text-success">₱{{ $fee }}</span><h3><hr>

                                    <h5 id="page-desc">III. Mode of Payment</h5><br>

                                    <div class="form-group form-check">
                                        <input type="radio" name="payment_mode_id" value="2" class="form-check-input" id="onsite" onclick="togglePaymentOptions()">
                                        <label id="page-desc" for="onsite" class="h5 font-weight-bold form-check-label">On-site Payment</label>
                                        <p id="page-desc">Amount in cash should be prepared by the resident in the subdivision's HOA office.</p>
                                    </div>

                                    <div id="appt-fields">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <p id="input-label">Appointment Date</p>
                                                <input type="date" name="appt_date" class="form-control form-control-user" id="appointment-date">
                                            </div>
                                            <div class="col-sm-6">
                                                <p id="input-label">Appointment Time</p>
                                                <input type="time" name="appt_time" class="form-control form-control-user" id="appointment-time">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <p id="input-label">Date of Payment</p>
                                                <input type="date" name="date_of_payment" class="form-control form-control-user" required>
                                            </div>
                                        </div><hr>
                                    </div>

                                    <div class="form-group form-check">
                                        <input type="radio" name="payment_mode_id" value="1" class="form-check-input" id="gcash" onclick="togglePaymentOptions()">
                                        <label id="page-desc" for="gcash" class="h5 font-weight-bold form-check-label">GCash</label>
                                        <p id="page-desc">This mode of payment will still be initiated via the GCash app.</p>
                                    </div>

                                    <div id="gcash-options" style="display: none;">
                                        <div class="form-group">
                                            <label id="input-label" for="collector-select">Payment Collector</label><br>
                                            <select id="collector-select" name="payment_collector_id" class="form-control w-50">
                                                @foreach($collectors as $collector)
                                                    <option value="{{ $collector->id }}" data-qr-code="{{ $collector->gcash_qr_code_path }}">{{ $collector->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="qr-code-container"></div><br>

                                        <p id="upload-desc">After scanning the QR code, kindly upload the payment receipt with the provided upload form below. 
                                            The payment receipt from the GCash app that can be downloaded on your device.
                                        </p>

                                        <div id="upload-input-div" style="padding-bottom: 750px;" class="custom-file mb-5">
                                            <input id="upload-input-base" name="receipt_img" class="custom-file-input" type="file" accept=".jpg, .png">
                                            <label id="upload-input-text" class="custom-file-label" for="upload-input-base">Upload Receipt</label>
                                        </div>
                                    </div><hr>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" id="appt-and-res-button-submit" class="btn btn-warning btn-user btn-block font-weight-bold">
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
            document.addEventListener('DOMContentLoaded', function() {
                togglePaymentOptions(); // Initialize the view based on current selections

                const collectorSelect = document.getElementById('collector-select');
                const qrCodeContainer = document.getElementById('qr-code-container');
                const receiptInput = document.getElementById('upload-input-base');
                
                // Create the receipt preview container if it doesn't exist
                let receiptPreviewContainer = document.getElementById('receipt-preview-container');
                if (!receiptPreviewContainer) {
                    receiptPreviewContainer = document.createElement('div');
                    receiptPreviewContainer.id = 'receipt-preview-container';
                    receiptInput.parentNode.insertBefore(receiptPreviewContainer, receiptInput.nextSibling);
                }

                // Function to display the QR code for the selected collector
                function displayQRCode() {
                    const selectedOption = collectorSelect.options[collectorSelect.selectedIndex];
                    const qrCodePath = selectedOption.getAttribute('data-qr-code');

                    qrCodeContainer.innerHTML = ''; // Clear previous QR code

                    if (qrCodePath) {
                        const fullQrCodeUrl = `https://homehivemedia.blob.core.windows.net/homehivemedia/${qrCodePath}`;
                        const qrCodeImage = document.createElement('img');
                        qrCodeImage.src = fullQrCodeUrl;
                        qrCodeImage.className = 'img-fluid mt-3 mb-4';
                        qrCodeImage.alt = 'GCash QR Code';
                        qrCodeContainer.appendChild(qrCodeImage);
                    } else {
                        qrCodeContainer.innerHTML = '<p>No QR code available for this collector.</p>';
                    }
                }

                // Attach change and click event listeners to ensure QR code loads correctly
                collectorSelect.addEventListener('change', displayQRCode);
                collectorSelect.addEventListener('click', displayQRCode);

                // Trigger the display function on page load to show QR code for the first collector (if any)
                displayQRCode();

                // Display uploaded receipt preview
                receiptInput.addEventListener('change', function() {
                    const file = receiptInput.files[0];
                    receiptPreviewContainer.innerHTML = ''; // Clear any previous preview

                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const receiptImage = document.createElement('img');
                            receiptImage.src = e.target.result;
                            receiptImage.className = 'img-contain mt-3 mb-4';
                            receiptImage.alt = 'Uploaded Receipt Preview';
                            receiptPreviewContainer.appendChild(receiptImage);
                            receiptImage.style.maxWidth = '370px';
                            receiptImage.style.maxHeight = '678px';
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });

            function togglePaymentOptions() {
                const gcashCheckbox = document.getElementById('gcash');
                const onsiteCheckbox = document.getElementById('onsite');
                const collectorSelect = document.getElementById('collector-select');
                const gcashOptions = document.getElementById('gcash-options');
                const uploadInputDiv = document.getElementById('upload-input-div');
                const uploadDesc = document.getElementById('upload-desc');
                const apptFields = document.getElementById('appt-fields');

                if (gcashCheckbox.checked) {
                    collectorSelect.disabled = false;
                    gcashOptions.style.display = 'block';
                    uploadInputDiv.style.display = 'block';
                    uploadDesc.style.display = 'block';
                    apptFields.style.display = 'none';
                } else if (onsiteCheckbox.checked) {
                    apptFields.style.display = 'block';
                    collectorSelect.disabled = true;
                    gcashOptions.style.display = 'none';
                    uploadInputDiv.style.display = 'none';
                    uploadDesc.style.display = 'none';
                } else {
                    collectorSelect.disabled = true;
                    apptFields.style.display = 'none';
                    gcashOptions.style.display = 'none';
                    uploadInputDiv.style.display = 'none';
                    uploadDesc.style.display = 'none';
                }
            }
        </script>

    </x-slot>
</x-base>