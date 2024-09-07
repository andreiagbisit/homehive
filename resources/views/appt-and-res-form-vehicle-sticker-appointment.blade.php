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
                <h1 id="header-h1" class="h3 mb-0 text-800">Vehicle Sticker - Book Appointment</h1>
            </div>

            <div class="col-lg-6">
                <p id="page-desc">* Personal details in the form are omitted, as the reservant will be the assigned owner of this account.</p>
                <p class="text-danger font-weight-bold">Households may register up to 5 vehicles.</p>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div id="tally-card-title" class="font-weight-bold text-danger text-uppercase mb-1">Registered Vehicles</div>
                                <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">2</div>
                            </div>
                            
                            <div class="col-auto">
                                <i class="fas fa-car-side fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Online Appointment Form</h6>
                        </div>

                        <div class="card-body">
                            <div class="col">
                                <form class="user">
                                    <h5 id="page-desc">I. Personal Information</h5><br>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p id="input-label">Registered Vehicle Owner <span style="color: red;">*</span></p>
                                        <input type="text" id="registered-owner" class="form-control form-control-user" required>
                                    </div>
                                    <hr>

                                    <h5 id="page-desc">II. Description of Vehicle</h5><br>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Make <span style="color: red;">*</span></p>
                                            <input type="text" id="make" class="form-control form-control-user" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Series <span style="color: red;">*</span></p>
                                            <input type="text" id="series" class="form-control form-control-user" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <p id="input-label">Color <span style="color: red;">*</span></p>
                                            <input type="text" id="color" class="form-control form-control-user" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Plate No. <span style="color: red;">*</span></p>
                                            <input type="text" id="plate-no" class="form-control form-control-user" required>
                                        </div>
                                    </div><br>
                                    
                                    <h3 id="form-fee" class="font-weight-bold text-right">Fee: <span class="text-success">₱123.00</span><h3><hr>

                                    <h5 id="page-desc">III. Mode of Payment</h5><br>
                                    
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="onsite" onclick="togglePaymentOptions()">
                                        <label id="checkbox-label" class="h5 font-weight-bold form-check-label" for="onsite">On-site Payment</label>
                                        <p id="page-desc">Amount in cash should be prepared by the resident in the subdivision's HOA office.</p>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Appointment Date</p>
                                            <input type="date" class="form-control form-control-user" id="appointment-date" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <p id="input-label">Appointment Time</p>
                                            <input type="time" class="form-control form-control-user" id="appointment-time" required>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="gcash" onclick="togglePaymentOptions()">
                                        <label id="checkbox-label" class="h5 font-weight-bold form-check-label" for="gcash">GCash</label>
                                        
                                        <p id="page-desc">This mode of payment will still be initiated via the GCash app. 
                                            The reservant should be referred to a GCash QR code linking to the payment collector's GCash account to commence payment,
                                            once the reservant has selected their payment collector of choice.
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label id="input-label" for="collector-select">Payment Collector</label><br>
                                        <select id="collector-select" class="form-control w-50" required>
                                            <option>John Doe</option>
                                            <option>Jane Doe</option>
                                            <option>Michael Smith</option>
                                            <option>Mary Smith</option>
                                        </select>
                                    </div>

                                    <div id="qr-code-container"></div><br><br>

                                    <p id="upload-desc">After scanning the QR code, kindly upload the payment receipt with the provided upload form below. 
                                        The payment receipt from the GCash app that can be downloaded on your device.
                                    </p>

                                    <div id="upload-input-div" class="custom-file">
                                        <input id="upload-input-base" class="custom-file-input" type="file" accept=".jpg, .png">
                                        <label id="upload-input-text" class="custom-file-label" for="upload-input-base">Upload Receipt</label><br><br>
                                    </div><br>

                                    <script>
                                        /* MODE OF PAYMENT - INITIAL STATE (DISABLE ALL FIELDS WHEN PAYMENT OPTIONS ARE UNCHECKED) */
                                        // Initialize form with all fields disabled
                                        document.addEventListener('DOMContentLoaded', function() {
                                            document.getElementById('appointment-date').disabled = true;
                                            document.getElementById('appointment-time').disabled = true;
                                            document.getElementById('collector-select').disabled = true;

                                            // Hide the QR code description and upload input initially
                                            const uploadDesc = document.getElementById('upload-desc');
                                            const uploadInputDiv = document.getElementById('upload-input-div');
                                            
                                            uploadDesc.style.display = 'none';
                                            uploadInputDiv.style.display = 'none';
                                        });

                                        /* PAYMENT COLLECTOR W/ CORRESPONDING QR CODE */

                                        document.getElementById('collector-select').addEventListener('change', function() {
                                            const selectedCollector = this.value;
                                            const qrCodeContainer = document.getElementById('qr-code-container');

                                            // Clear any existing QR code
                                            qrCodeContainer.innerHTML = '';

                                            let qrCodeSrc = '';

                                            // Determine the correct QR code image based on the selected collector
                                            switch(selectedCollector) {
                                                case 'John Doe':
                                                    qrCodeSrc = 'img/gcash-qr-1.png';
                                                    break;
                                                case 'Jane Doe':
                                                    qrCodeSrc = 'img/gcash-qr-2.png';
                                                    break;
                                                case 'Michael Smith':
                                                    qrCodeSrc = 'img/gcash-qr-3.png';
                                                    break;
                                                case 'Mary Smith':
                                                    qrCodeSrc = 'img/gcash-qr-4.png';
                                                    break;
                                                default:
                                                    qrCodeSrc = ''; // Optional: No QR code if no valid selection
                                            }

                                            // Create a new img element if a valid QR code is found
                                            if (qrCodeSrc) {
                                                const qrCodeImage = document.createElement('img');
                                                qrCodeImage.src = qrCodeSrc;
                                                qrCodeImage.className = 'img-fluid mt-3 mb-4'; // Apply your desired classes
                                                qrCodeImage.alt = 'GCash QR Code';

                                                // Append the image to the container
                                                qrCodeContainer.appendChild(qrCodeImage);
                                            }
                                        });
                                    </script>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <a id="appt-and-res-button-submit" href="#" class="btn btn-warning btn-user btn-block font-weight-bold">
                                                SUBMIT PAYMENT
                                            </a>
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

    <x-slot name="modal_delete_entry">
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>