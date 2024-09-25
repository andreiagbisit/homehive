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
                <h1 id="header-h1">Manage Vehicle Sticker Applications</h1><br>

                <div class="text-center">
                    <a href="{{ route('appt.and.res.manage.rules.sticker.appt.admin') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-thumbtack"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Manage Rules</span>
                    </a>

                    <a href="#" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Generate Report</span>
                    </a>
                </div>
            </div>

            <!-- Table -->
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
                                    <th>Name of Applicant</th>
                                    <th>Registered Owner</th>
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
                                <tr>
                                    <td>1</td>
                                    <td>Andrei Joaqhim Ali Agbisit</td>
                                    <td>Lorem Agbisit</td>
                                    <td>Toyota</td>
                                    <td>Sprinter Trueno AE86</td>
                                    <td>Black & White</td>
                                    <td>ABC 1234</td>
                                    <td><span style="color: #28a745; font-weight: bold;">PAID</span></td>
                                    <td>GCash</td>
                                    <td>John Doe</td>
                                    <td>01/01/2024</td>
                                    <td>01/02/2024</td>
                                    <td>1:00 PM</td>
                                    <td class="text-center">
                                        <a href="{{ route('appt.and.res.view.appointment.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('appt.and.res.edit.appointment.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Jio Rhey Detros</td>
                                    <td>Ipsum Detros</td>
                                    <td>Mazda</td>
                                    <td>FD RX-7</td>
                                    <td>Black & Orange</td>
                                    <td>DEF 4567</td>
                                    <td><span style="color: #28a745; font-weight: bold;">PAID</span></td>
                                    <td>On-site Payment</td>
                                    <td>Jane Doe</td>
                                    <td>01/03/2024</td>
                                    <td>01/04/2024</td>
                                    <td>1:30 PM</td>
                                    <td class="text-center">
                                        <a href="{{ route('appt.and.res.view.appointment.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('appt.and.res.edit.appointment.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Edlan Vere Perez</td>
                                    <td>Dolor Perez</td>
                                    <td>Mitsubishi</td>
                                    <td>1998 Eclipse GSX</td>
                                    <td>Green and Black with Blue Stripes</td>
                                    <td>GHI 9876</td>
                                    <td><span style="color: #28a745; font-weight: bold;">PAID</span></td>
                                    <td>On-site Payment</td>
                                    <td>Michael Smith</td>
                                    <td>01/05/2024</td>
                                    <td>01/06/2024</td>
                                    <td>2:00 PM</td>
                                    <td class="text-center">
                                        <a href="{{ route('appt.and.res.view.appointment.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('appt.and.res.edit.appointment.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Terrence Liam Tongol</td>
                                    <td>Sit Tongol</td>
                                    <td>Nissan</td>
                                    <td>Skyline GT-R R34</td>
                                    <td>Gray with Blue Overalls</td>
                                    <td>JKL 5432</td>
                                    <td><span style="color: #28a745; font-weight: bold;">PAID</span></td>
                                    <td>GCash</td>
                                    <td>Mary Smith</td>
                                    <td>01/07/2024</td>
                                    <td>01/08/2024</td>
                                    <td>2:30 PM</td>
                                    <td class="text-center">
                                        <a href="{{ route('appt.and.res.view.appointment.admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ route('appt.and.res.edit.appointment.admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a><br>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteEntryModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>
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
    </x-slot>
</x-base>