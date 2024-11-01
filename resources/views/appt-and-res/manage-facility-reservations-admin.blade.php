<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Manage Facility Reservations</title>
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
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Manage Facility Reservations</h1><br>

                <div class="text-center">
                    <a href="{{ route('manage.facilities.admin') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-school"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Manage Facilities</span>
                    </a>

                    <a href="#" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Generate Report</span>
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Tables -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #000;">List of Reservations</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name of Applicant</th>
                                    <th>Facility Reserved</th>
                                    <th>Date of Reservation</th>
                                    <th>Reservation Fee</th>
                                    <th>Reservation Fee Payment Status</th>
                                    <th>Mode of Payment</th>
                                    <th>Payment Collector</th>
                                    <th>Date of Payment</th>
                                    <th>Date of Appointment</th>
                                    <th>Time of Appointment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->id }}</td>
                                    <td>{{ $reservation->user->name }}</td>
                                    <td>{{ $reservation->facility->name }}</td>
                                    <td>{{ $reservation->start_date->format('m/d/Y') }}</td>
                                    <td>₱{{ number_format($reservation->fee, 2) }}</td>
                                    <td>
                                        <span style="color: {{ $reservation->paymentStatus && $reservation->paymentStatus->name == 'PAID' ? '#28a745' : '#dc3545' }}; font-weight: bold;">
                                            {{ $reservation->paymentStatus ? $reservation->paymentStatus->name : 'N/A' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($reservation->payment_mode_id == 1)
                                            GCash
                                        @elseif ($reservation->payment_mode_id == 2)
                                            On-Site
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $reservation->collector->name ?? 'N/A' }}</td>
                                    <td>{{ $reservation->payment_date ? $reservation->payment_date->format('m/d/Y') : 'N/A' }}</td>
                                    <td>{{ $reservation->appt_date->format('m/d/Y') }}</td>
                                    <td>{{ $reservation->appt_start_time }} - {{ $reservation->appt_end_time }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('appt.and.res.view.reservation.admin', $reservation->id) }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50"><i class="fas fa-binoculars"></i></span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('appt.and.res.edit.reservation.admin', $reservation->id) }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal" onclick="setDeleteReservationId({{ $reservation->id }})">
                                            <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            function setDeleteReservationId(id) {
                const deleteForm = document.querySelector('#deleteEntryModal form');
                deleteForm.action = `{{ url('/appt-and-res/delete-reservation-admin') }}/${id}`;
            }
        </script>

    </x-slot>
</x-base>