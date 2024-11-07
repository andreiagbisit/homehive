<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Payment Management</title>
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
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Payment Management</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table -->
            <div class="row">
                <div class="col-lg-8 mb-2">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: #000;">List of Successful and Pending Funds</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Payment No.</th>
                                            <th>Subject</th>
                                            <th>Category</th>
                                            <th>Payment For</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Mode of Payment</th>
                                            <th>Date of Payment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payments as $payment)
                                            <tr>
                                                <td>{{ $payment->id }}</td>
                                                <td>{{ $payment->title }}</td>
                                                <td>{{ $payment->category->name ?? 'N/A' }}</td>
                                                <td>{{ $payment->month }} {{ $payment->year }}</td>
                                                <td><b>₱{{ number_format($payment->fee, 2) }}</b></td>
                                                <td>
                                                    <span class="text-uppercase" style="color: {{ $payment->paymentStatus->name == 'Paid' ? '#28a745' : '#dc6335' }}; font-weight: bold;">
                                                        {{ $payment->paymentStatus->name }}
                                                    </span>
                                                </td>
                                                <td>{{ $payment->paymentMode->name ?? 'N/A' }}</td>
                                                <td>{{ $payment->pay_date ? $payment->pay_date->format('m/d/Y') : 'N/A' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('manage.payment', ['payment' => $payment->id]) }}" title="Manage Pending Payment" class="btn btn-warning btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-arrow-right"></i>
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