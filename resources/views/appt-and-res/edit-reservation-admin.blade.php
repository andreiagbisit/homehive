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
                                <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Name of Applicant Dropdown -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name of Applicant</label>
                                        <div class="col-sm-10">
                                            <select name="user_id" class="form-control" required>
                                                <option value="">Select User</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}" {{ $reservation->user_id == $user->id ? 'selected' : '' }}>
                                                        {{ $user->fname }} {{ $user->mname ?? '' }} {{ $user->lname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Facility Reserved</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-plaintext">{{ $facility->name }}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Reservation Fee</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="fee" class="form-control" value="{{ $reservation->fee }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Reservation Fee Payment Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control" required>
                                                <option value="1" {{ $reservation->payment_status == 'PAID' ? 'selected' : '' }}>PAID</option>
                                                <option value="2" {{ $reservation->payment_status == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mode of Payment</label>
                                        <div class="col-sm-10">
                                            <select name="payment_mode" class="form-control" required>
                                                <option value="1" {{ $reservation->payment_mode_id == 1 ? 'selected' : '' }}>GCash</option>
                                                <option value="2" {{ $reservation->payment_mode_id == 2 ? 'selected' : '' }}>On-site Payment</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Payment Collector</label>
                                        <div class="col-sm-10">
                                            <select name="payment_collector_id" class="form-control" required>
                                                @foreach ($collectors as $collector)
                                                    <option value="{{ $collector->id }}" {{ $reservation->payment_collector_id == $collector->id ? 'selected' : '' }}>
                                                        {{ $collector->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of Payment</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="payment_date" class="form-control" value="{{ $reservation->payment_date ? $reservation->payment_date->format('Y-m-d') : '' }}">
                                        </div>
                                    </div>

                                    <!-- Date of Appointment -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of Reservation</label>
                                        <div class="col-sm-10">
                                            <select name="appt_date" class="form-control" required>
                                                @foreach($availableDates as $date)
                                                    <option value="{{ $date }}" {{ $reservation->appt_date->format('Y-m-d') == $date ? 'selected' : '' }}>
                                                        {{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Time of Appointment -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Time of Reservation</label>
                                        <div class="col-sm-5">
                                            <select name="appt_start_time" class="form-control" required>
                                                @foreach($availableTimeSlots as $slot)
                                                    <option value="{{ $slot->start_time }}" {{ $reservation->appt_start_time == $slot->start_time ? 'selected' : '' }}>
                                                        {{ $slot->start_time }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <select name="appt_end_time" class="form-control" required>
                                                @foreach($availableTimeSlots as $slot)
                                                    <option value="{{ $slot->end_time }}" {{ $reservation->appt_end_time == $slot->end_time ? 'selected' : '' }}>
                                                        {{ $slot->end_time }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a href="{{ route('manage.facilities.admin') }}" class="btn btn-secondary">Back</a>
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
