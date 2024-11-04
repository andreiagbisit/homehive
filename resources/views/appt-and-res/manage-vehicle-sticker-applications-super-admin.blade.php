<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Manage Vehicle Sticker Applications</title>
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
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Manage Vehicle Sticker Applications</h1>
            </div>

            <div class="d-sm-flex mb-4">
                <a href="{{ route('appt.and.res.manage.settings.sticker.appt.superadmin') }}" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-cogs"></i>
                    </span>
                    <span class="text" style="color: #000; font-weight: 500;">Manage Settings</span>
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table -->
            <div class="row">
                <div class="col-lg-10 mb-2">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: #000;">List of Applications</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Registered Vehicle Owner</th>
                                            <th>Vehicle Make</th>
                                            <th>Vehicle Series</th>
                                            <th>Vehicle Color</th>
                                            <th>Vehicle Plate No.</th>
                                            <th>Application Fee Payment Status</th>
                                            <th>Mode of Payment</th>
                                            <th>Payment Collector</th>
                                            <th>Date of Payment</th>
                                            <th>Date of Appointment</th>
                                            <th>Time of Appointment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applications as $application)
                                        <tr>
                                            <td>{{ $application->id }}</td>
                                            <td>{{ $application->registered_owner }}</td>
                                            <td>{{ $application->make }}</td>
                                            <td>{{ $application->series }}</td>
                                            <td>{{ $application->color }}</td>
                                            <td>{{ $application->plate_no }}</td>
                                            <td>
                                                <span style="color: {{ $application->status == 1 ? '#28a745' : '#dc3545' }}; font-weight: bold;">
                                                    {{ $application->status == 1 ? 'PAID' : 'PENDING' }}
                                                </span>
                                            </td>
                                            <td>{{ $application->payment_mode_id == 1 ? 'GCash' : 'On-site Payment' }}</td>
                                            <td>{{ $application->collector->name ?? 'N/A' }}</td>
                                            <td>{{ $application->date_of_payment ? $application->date_of_payment->format('m/d/Y') : 'N/A' }}</td>
                                            <td>{{ $application->appt_date ? $application->appt_date->format('m/d/Y') : 'N/A' }}</td>
                                            <td>{{ $application->appt_time ?? 'N/A' }}</td>
                                            <td class="text-center" style="display: flex;">
                                                <a href="{{ route('appt.and.res.view.appointment.superadmin', ['id' => $application->id]) }}" class="btn btn-primary btn-icon-split" title="View Entry" style="margin-right: 2%;">
                                                    <span class="icon text-white-50"><i class="fas fa-binoculars"></i></span>
                                                </a><br>

                                                <a href="{{ route('appt.and.res.edit.appointment.superadmin', $application->id) }}" class="btn btn-success btn-icon-split" title="Edit Entry" style="margin-right: 2%;">
                                                    <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                                </a><br>

                                                <a href="#" class="btn btn-danger btn-icon-split" title="Delete Entry" data-toggle="modal" data-target="#deleteEntryModal" onclick="setDeleteEntryUrl({{ $application->id }})">
                                                    <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
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

                <div class="col-lg-2 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 id="page-desc" class="m-0 font-weight-bold text-black">Report Generation</h6>
                        </div>
                        <div class="pt-4 pb-4 card-body d-flex justify-content-center">
                            <form method="GET" action="{{ route('vehicle.sticker.report') }}">
                                <select id="report-generation-select" name="month" class="form-control mr-2" required>
                                    <option value="">Select Month</option>
                                    @foreach(range(1, 12) as $month)
                                        <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
                                    @endforeach
                                </select><br>

                                <select id="report-generation-select" name="year" class="form-control mr-2" required>
                                    <option value="">Select Year</option>
                                    @for($year = date('Y') - 5; $year <= date('Y') + 5; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select><br>
                                
                                <!-- Generate Report Button -->
                                <button type="submit" class="btn btn-warning btn-icon-split ml-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-print"></i>
                                    </span>
                                    <span class="text" style="color: #000; font-weight: 500;">Generate Report</span>
                                </button>
                            </form>
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
        function setDeleteEntryUrl(id) {
            const deleteForm = document.querySelector('#deleteEntryModal form');

            // Set the action URL based on the user type
            const userType = {{ auth()->user()->account_type_id }};
            if (userType === 1) {
                deleteForm.action = `/appt-and-res/manage-vehicle-sticker-applications-super-admin/${id}`;
            } else if (userType === 2) {
                deleteForm.action = `/appt-and-res/manage-vehicle-sticker-applications-admin/${id}`;
            }
        }
        </script>
    </x-slot>
</x-base>