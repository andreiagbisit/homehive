<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Collection Management</title>
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
            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                <h1 id="header-h1">Collection Management</h1>
            </div>

            <div class="d-sm-flex">
                <a href="{{ route('collection.mgmt.add.entry.admin') }}" class="btn btn-warning btn-icon-split mb-3" style="margin-right: 1%;">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text" style="color: #000; font-weight: 500;">Add Entry</span>
                </a>

                <a href="{{ auth()->user()->account_type_id == 1 ? route('manage.fund.collection.categories.superadmin') : route('manage.fund.collection.categories.admin') }}" class="btn btn-warning btn-icon-split mb-3" style="margin-right: 1%;">
                    <span class="icon text-white-50">
                        <i class="fas fa-tags"></i>
                    </span>
                    <span class="text" style="color: #000; font-weight: 500;">Manage Categories</span>
                </a>

                <a href="{{ route('collection.mgmt.manage.collectors.admin') }}" class="btn btn-warning btn-icon-split mb-3" style="margin-right: 1%;">
                    <span class="icon text-white-50">
                        <i class="fas fa-comment-dollar"></i>
                    </span>
                    <span class="text" style="color: #000; font-weight: 500;">Manage Collectors</span>
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- DataTables Example -->
            <div class="row">
                <div class="col-lg-10 mb-2">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: #000;">List of Successful and Pending Collections per Household Representative</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Payment No.</th>
                                            <th>Subject</th>
                                            <th>Category</th>
                                            <th>Household Representative</th>
                                            <th>Collector</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Mode of Payment</th>
                                            <th>Date of Payment</th>
                                            <th>Payment For</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payments as $payment)
                                            <tr>
                                                <td>{{ $payment->id }}</td> <!-- Payment No. -->
                                                <td>{{ $payment->title }}</td> <!-- Subject -->
                                                <td>{{ $payment->category->name ?? 'N/A' }}</td> <!-- Category -->
                                                <td>
                                                    {{ optional($payment->user)->fname ?? 'No User' }}
                                                    {{ optional($payment->user)->mname ?? '' }}
                                                    {{ optional($payment->user)->lname ?? '' }}
                                                </td> <!-- Household Representative -->
                                                <td>{{ $payment->collector->name ?? 'N/A' }}</td> <!-- Collector -->
                                                <td><b>₱{{ number_format($payment->fee, 2) }}</b></td> <!-- Amount -->
                                                <td>
                                                    <span style="color: {{ $payment->status_id == 1 ? '#28a745' : '#dc6335' }}; font-weight: bold;">
                                                        {{ $payment->paymentStatus->name }}
                                                    </span>
                                                </td> <!-- Status -->
                                                <td>{{ $payment->paymentMode->name ?? 'N/A' }}</td> <!-- Mode of Payment -->
                                                <td>{{ $payment->pay_date->format('m/d/Y') }}</td> <!-- Date of Payment -->
                                                <td>{{ $payment->month }} {{ $payment->year }}</td>
                                                <td class="text-center" style="display: flex;">
                                                    <a href="{{ route('collection.mgmt.view.entry.admin', ['id' => $payment->id]) }}" class="btn btn-primary btn-icon-split" title="View Entry" style="margin-right: 2%;">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-binoculars"></i>
                                                        </span>
                                                    </a><br>

                                                    <a href="{{ route('collection.mgmt.edit.entry.admin', ['id' => $payment->id]) }}" class="btn btn-success btn-icon-split" title="Edit Entry" style="margin-right: 2%;">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </a><br>

                                                    <a href="#" class="btn btn-danger btn-icon-split" title="Delete Entry" data-toggle="modal" data-target="#deleteEntryModal" onclick="setDeleteEntryUrl({{ $payment->id }})">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </span>
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
                            <form action="{{ route('generateReport') }}" method="GET" class="d-inline">
                                <div class="ml-2 mb-2">
                                    <span class="text" style="color: #000; font-weight: 700;">
                                        Select Month & Year
                                    </span>
                                </div>

                                <input id="report-generation-select" type="month" name="month" class="form-control mr-2" required>
                                <br>
                                
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
            deleteForm.action = `/collection-mgmt/delete-payment-admin/${id}`;
        }
        </script>
    </x-slot>
</x-base>
