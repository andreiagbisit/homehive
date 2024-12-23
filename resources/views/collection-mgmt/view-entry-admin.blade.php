<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>Collection Management - View Entry</title>
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
                <h1 id="header-h1">Collection Management - View Entry</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Entry Details</h6>
                        </div>

                        <div class="card-body">
                            <div class="col overflow-auto mt-4 mb-4">
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
                                            <td>{{ $payment->category->name ?? 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Household Representative</td>
                                            <td>
                                                    {{ optional($payment->user)->fname ?? 'No User' }}
                                                    {{ optional($payment->user)->mname ?? '' }}
                                                    {{ optional($payment->user)->lname ?? '' }}
                                            </td> <!-- Household Representative -->
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Collector</td>
                                            <td>{{ $payment->collector->name ?? 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Amount</td>
                                            <td><b>₱{{ number_format($payment->fee, 2)  }}</b></td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Status</td>
                                            <td><span style="color: {{ $payment->status_id == 1 ? '#28a745' : '#dc6335' }}; font-weight: bold;">
                                            {{ $payment->status_id == 1 ? 'PAID' : 'PENDING' }}
                                            </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Mode of Payment</td>
                                            <td>{{ $payment->paymentMode->name ?? 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Date of Payment</td>
                                            <td>{{ \Carbon\Carbon::parse($payment->pay_date)->format('m/d/Y') }}</td>
                                        </tr>
                                        
                                        <tr>
                                        <td id="tb-v-head">Payment For</td>
                                        <td>{{ $payment->month }} {{ $payment->year }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Receipt</td>
                                            <td>
                                                @if($payment->receipt_img)
                                                    <img src="https://homehivemedia.blob.core.windows.net/homehivemedia/{{ $payment->receipt_img }}" 
                                                        alt="GCash Receipt" class="img-fluid" style="max-width: 200px;">
                                                @else
                                                    No receipt uploaded.
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Reference No.</td>
                                            <td>
                                                {{ $payment->reference_no ?? 'No reference number provided.' }}
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div><hr>
                            
                            <div class="col-sm-3 float-right">
                                <a style="border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" id="appt-and-res-button-submit" href="{{ route('collection.mgmt.admin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
                                    BACK
                                </a>
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
