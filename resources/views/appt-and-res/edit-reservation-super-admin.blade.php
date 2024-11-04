<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Manage Facility Reservations - Edit Reservation</title>
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
                <h1 id="header-h1">Manage Facility Reservations - Edit Reservation</h1>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Edit Existing Reservation</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-4" style="color: #000;">
                            Please fill in the necessary details provided with the following fields below to edit an existing reservation initiated by households to utilize the facilities provided by the subdivision. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>

                            <div class="col">
                                <form action="{{ route('update.reservation.superadmin', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Name of Applicant Dropdown -->
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p id="input-label">Applicant <span style="color: red;">*</span></p>    

                                            <select id="applicant-select" name="user_id" class="form-control" required>
                                                <option value="">Select User</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}" {{ $reservation->user_id == $user->id ? 'selected' : '' }}>
                                                        {{ $user->fname }} {{ $user->mname ?? '' }} {{ $user->lname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label" for="form-control-plaintext">Facility Reserved</label>
                                            <p class="form-control-plaintext">{{ $facility->name }}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">    
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label">Reservation Fee</label>
                                            <input id="reservation-fee" type="text" name="fee" class="form-control" value="{{ $reservation->fee }}" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label">Reservation Fee Payment Status</label>
                                            <select id="reservation-fee" name="status" class="form-control" required>
                                                <option value="1" {{ $reservation->payment_status == 'PAID' ? 'selected' : '' }}>PAID</option>
                                                <option value="2" {{ $reservation->payment_status == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label">Mode of Payment</label>
                                            <select id="fee-status" name="payment_mode" class="form-control" required>
                                                <option value="1" {{ $reservation->payment_mode_id == 1 ? 'selected' : '' }}>GCash</option>
                                                <option value="2" {{ $reservation->payment_mode_id == 2 ? 'selected' : '' }}>On-site Payment</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label">Payment Collector</label>
                                            <select id="collector-select" name="payment_collector_id" class="form-control" required>
                                                @foreach ($collectors as $collector)
                                                    <option value="{{ $collector->id }}" {{ $reservation->payment_collector_id == $collector->id ? 'selected' : '' }}>
                                                        {{ $collector->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label">Date of Payment</label>
                                            <input id="payment-date" type="date" name="payment_date" class="form-control" value="{{ $reservation->payment_date ? $reservation->payment_date->format('Y-m-d') : '' }}">
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label">Date of Reservation</label>
                                            <select id="reservation-date" name="appt_date" class="form-control" required>
                                                @foreach($availableDates as $date)
                                                    <option value="{{ $date }}" {{ $reservation->appt_date->format('Y-m-d') == $date ? 'selected' : '' }}>
                                                        {{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Time of Appointment -->
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label id="input-label">Start Time of Reservation</label>
                                            <select id="reservation-date" name="appt_start_time" class="form-control" required>
                                                @foreach($availableTimeSlots as $slot)
                                                    <option value="{{ $slot->start_time }}" {{ $reservation->appt_start_time == $slot->start_time ? 'selected' : '' }}>
                                                        {{ $slot->start_time }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label id="input-label">End Time of Reservation</label>
                                            <select id="reservation-date" name="appt_end_time" class="form-control" required>
                                                @foreach($availableTimeSlots as $slot)
                                                    <option value="{{ $slot->end_time }}" {{ $reservation->appt_end_time == $slot->end_time ? 'selected' : '' }}>
                                                        {{ $slot->end_time }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><br><hr><br>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3">
                                            <button type="submit" id="appt-and-res-button-submit" class="btn btn-warning btn-user btn-block font-weight-bold">SAVE CHANGES</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a id="appt-and-res-button-submit" href="{{ route('manage.facility.reservations.superadmin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">BACK</a>
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
