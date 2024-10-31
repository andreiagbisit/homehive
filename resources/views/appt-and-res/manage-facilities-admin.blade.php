<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Manage Subdivision Facilities</title>
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
                <h1 id="header-h1">Manage Subdivision Facilities HELLO</h1><br>

                <div class="text-center">   
                    <a href="{{ route('appt.and.res.add.facility.admin') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Add Facility</span>
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #000;">List of Available Facilities</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Facility</th>
                                    <th>Color Hex</th>
                                    <th>Fee</th>
                                    <th>Available Days</th>
                                    <th>Available Months</th>
                                    <th>Time Slots</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($facilities as $facility)
                                <tr>
                                    <td>{{ $facility->id }}</td>
                                    <td>{{ $facility->name }}</td>
                                    <td><span style="color: {{ $facility->hex_code }}; font-weight: bold;">{{ $facility->hex_code }}</span></td>
                                    <td>₱{{ number_format($facility->fee, 2) }}</td>
                                    <td>
                                        @foreach($facility->available_days as $day)
                                            <span class="badge badge-primary">{{ $day }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($facility->available_months as $month)
                                            <span class="badge badge-secondary">{{ $month }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($facility->timeSlots as $slot)
                                            <div>{{ $slot->start_time }} - {{ $slot->end_time }}</div>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('appt.and.res.view.facility.admin', $facility->id) }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('appt.and.res.edit.facility.admin', $facility->id) }}" class="btn btn-success btn-icon-split" style="margin-bottom: 2%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal" onclick="setDeleteFacilityId({{ $facility->id }})">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
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
            function setDeleteFacilityId(id) {
                const deleteForm = document.querySelector('#deleteEntryModal form');
                deleteForm.action = `{{ route('delete.facility.admin', '') }}/${id}`;
            }
        </script>
    </x-slot>
</x-base>