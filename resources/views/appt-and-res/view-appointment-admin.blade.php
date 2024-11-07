<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>>Manage Vehicle Sticker Applications - View Appointment</title>
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
                <h1 id="header-h1">Manage Vehicle Sticker Applications - View Appointment</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0 font-weight-bold">Appointment Details</h6>
                        </div>

                        <div class="card-body">
                            <div class="col overflow-auto mt-4 mb-4">
                                    <table id="tb" class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                            <td id="tb-v-head">ID</td>
                                            <td>{{ $application->id }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Registered Vehicle Owner</td>
                                            <td>{{ $application->registered_owner }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Vehicle Make</td>
                                            <td>{{ $application->make }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Vehicle Series</td>
                                            <td>{{ $application->series }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Vehicle Color</td>
                                            <td>{{ $application->color }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Vehicle Plate No.</td>
                                            <td>{{ $application->plate_no }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td id="tb-v-head">Mode of Payment</td>
                                            <td>{{ $application->payment_mode_id == 1 ? 'GCash' : 'On-site Payment' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Payment Collector</td>
                                            <td>{{ $application->collector->name ?? 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Date of Payment</td>
                                            <td>{{ $application->date_of_payment ? $application->date_of_payment->format('m/d/Y') : 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Date of Appointment</td>
                                            <td>{{ $application->appt_date ? $application->appt_date->format('m/d/Y') : 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Time of Appointment</td>
                                            <td>{{ $application->appt_time ? \Carbon\Carbon::parse($application->appt_time)->format('H:i') : 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <td id="tb-v-head">Receipt </td>
                                            <td>
                                            @if ($application->receipt_img)
                                                <img src="https://homehivemedia.blob.core.windows.net/homehivemedia/{{ $application->receipt_img }}"
                                                    alt="GCash Receipt" class="img-fluid" style="max-width: 370px;"> 
                                                @else
                                                    No receipt uploaded.
                                            @endif
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div><hr>
                            
                            <div class="col-sm-3 float-right">
                                <a style="border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" id="appt-and-res-button-submit" href="{{ route('manage.vehicle.sticker.applications.admin') }}" class="btn btn-secondary btn-user btn-block font-weight-bold text-white">
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
