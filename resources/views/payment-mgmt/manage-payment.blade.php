<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Manage Payment - {{ $payment->title }}</title>
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
                <h1 id="header-h1">Manage Payment - {{ $payment->title }}</h1>
            </div>

            <div class="col-lg-6">
                <p id="page-desc">* Personal details in the form are omitted, as the applicant will be the assigned owner of this account.</p>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Manage Payment</h6>
                        </div>

                        <div class="card-body">
                            <div class="col overflow-auto">
                                <form method="POST" action="{{ route('payment.submit', ['id' => $payment->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 id="page-desc">I. Details</h5><br>

                                    <!-- payment-mgmt/manage-payment.blade.php -->
                                    <table id="tb" class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                            <td id="tb-v-head">Payment No.</td>
                                            <td>{{ $payment->id }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Subject</td>
                                            <td>{{ $payment->title }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Category</td>
                                            <td>{{ $payment->category ? $payment->category->name : 'No Category' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Payment For</td>
                                            <td>{{ $payment->month }} {{ $payment->year }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Fee</td>
                                            <td class="font-weight-bold text-success">₱{{ number_format($payment->fee, 2) }}</td>
                                        </tr>
                                    </table>

                                    <hr>

                                    <h5 id="page-desc">II. Mode of Payment</h5><br>
                                    
                                    <div class="form-group form-check">
                                        <input type="radio" class="form-check-input" id="onsite" onclick="togglePaymentOptions()">
                                        <label id="checkbox-label" class="h5 font-weight-bold form-check-label" for="onsite">On-site Payment</label>
                                        <p id="page-desc">Amount in cash should be prepared by the resident in the subdivision's HOA office.</p>
                                    </div>


                                    <hr>

                                    <div class="form-group form-check">
                                        <input type="radio" class="form-check-input" id="gcash" onclick="togglePaymentOptions()">
                                        <label id="checkbox-label" class="h5 font-weight-bold form-check-label" for="gcash">GCash</label>
                                        
                                        <p id="page-desc">This mode of payment will still be initiated via the GCash app. 
                                            The applicant should be referred to a GCash QR code linking to the payment collector's GCash account to commence payment,
                                            once the applicant has selected their payment collector of choice.
                                        </p>
                                    </div>

                                    <input type="hidden" name="mode_id" id="mode_id" value="{{ $payment->mode_id }}">
                                    <!--
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label" for="month-select">Month <span style="color: red;">*</span></label><br>
                                            <select id="month-select" name="month" class="form-control w-100" required>
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
                                            <label id="input-label" for="form-select">Year <span style="color: red;">*</span></label><br>
                                            <select id="year-select" name="year" class="form-control w-100" required>
                                                 Dynamic year generation 
                                                @for ($year = now()->year - 10; $year <= now()->year + 20; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>-->

                                    <div id="gcash-fields">
                                        <div class="form-group">
                                            <label id="input-label" for="collector-select">Payment Collector</label><br>
                                            <select id="collector-select" name="collector_id" class="form-control w-50" required>
                                                <option value="">Select a Collector</option>
                                                @foreach ($collectors as $collector)
                                                    <option value="{{ $collector->id }}" data-qr-code="{{ $collector->gcash_qr_code_path }}">
                                                        {{ $collector->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div id="qr-code-container"></div>

                                        <p id="upload-desc">After scanning the QR code, kindly upload the payment receipt with the provided upload form below. 
                                            The payment receipt from the GCash app that can be downloaded on your device.
                                        </p>

                                        <div id="upload-input-div" class="custom-file mb-5">
                                            <input id="upload-input-base" class="custom-file-input" type="file" name="receipt_img" accept=".jpg, .png" onchange="showPreview(event)">
                                            <label id="upload-input-text" class="custom-file-label" for="upload-input-base">Upload Receipt</label>
                                        </div>

                                        <div id="image-preview" style="display: none;">
                                            <img id="preview-img" src="#" alt="Receipt Preview" style="max-width: 50%; height: auto; padding: 5px;">
                                        </div><br>

                                        <p id="upload-desc-2"><span style="color: red;">*</span> Alternatively, you could just input the Reference No. indicated within the receipt with the provided field below.
                                        </p>

                                        <div id="reference-no-div">
                                            <div class="form-group row">
                                                <div class="col-sm-3 mb-3">
                                                    <p id="input-label">Reference No.</p>
                                                    <input id="collector-select" type="text" class="form-control" id="reference_no" name="reference_no" placeholder="XXXX XXXX X" value="{{ old('reference_no', $payment->reference_no) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <button id="appt-and-res-button-submit" type="submit" class="btn btn-warning btn-user btn-block font-weight-bold">
                                            SUBMIT PAYMENT
                                        </button>
                                        </div>

                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="{{ route('payment.mgmt') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
        <x-modal-delete-entry></x-modal-delete-entry>
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
            function showFileName() {
                const input = document.getElementById('upload-input-base');
                const label = document.getElementById('upload-input-text');
                label.innerText = input.files[0].name; // Update label text with the file name
            }
        </script>

        <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const collectorSelect = document.getElementById('collector-select');
                    const qrCodeContainer = document.getElementById('qr-code-container');

                    collectorSelect.addEventListener('change', function() {
                        const selectedOption = collectorSelect.options[collectorSelect.selectedIndex];
                        const qrCodePath = selectedOption.getAttribute('data-qr-code');
                        
                        // Clear previous QR code
                        qrCodeContainer.innerHTML = '';

                        // Display new QR code if available
                        if (qrCodePath) {
                            // Add "homehivemedia" to the base URL path
                            const fullQrCodeUrl = `https://homehivemedia.blob.core.windows.net/homehivemedia/${qrCodePath}`;

                            const qrCodeImage = document.createElement('img');
                            qrCodeImage.src = fullQrCodeUrl;
                            qrCodeImage.className = 'img-fluid mt-3 mb-4';
                            qrCodeImage.alt = 'GCash QR Code';
                            qrCodeContainer.appendChild(qrCodeImage);
                        }
                    });
                });
        </script>

        <script>
            // Function to toggle the display of gcash-fields based on selected checkboxes
            function togglePaymentOptions() {
                const gcashCheckbox = document.getElementById('gcash');
                const onsiteCheckbox = document.getElementById('onsite');
                const gcashFields = document.getElementById('gcash-fields');
                const modeIdInput = document.getElementById('mode_id');
                const collectorSelect = document.getElementById('collector-select');

                if (gcashCheckbox.checked) {
                    gcashFields.style.display = 'block'; // Show GCash fields
                    modeIdInput.value = 1; // Set GCash as selected mode
                    onsiteCheckbox.checked = false; // Uncheck "On-site Payment"
                    collectorSelect.setAttribute('required', 'required'); // Make collector required
                } else {
                    gcashFields.style.display = 'none'; // Hide GCash fields
                    collectorSelect.removeAttribute('required'); // Remove required attribute
                }

                if (onsiteCheckbox.checked) {
                    modeIdInput.value = 2; // Set On-site Payment as selected mode
                    gcashCheckbox.checked = false; // Uncheck "GCash"
                    collectorSelect.removeAttribute('required'); // Remove required attribute
                }
            }

            // Hide gcash-fields initially on page load
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('gcash-fields').style.display = 'none';
            });

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
        </script>
    </x-slot>
</x-base>