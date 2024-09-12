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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1" class="h3 mb-0 text-800">Collection Management</h1><br>

                <div class="text-center">
                    <a href="{{ route('add.entry.admin') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Add Entry</span>
                    </a>

                    <a href="{{ route('manage.fund.collection.categories.admin') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 2%;">
                        <span class="icon text-white-50">
                            <i class="fas fa-tags"></i>
                        </span>
                        <span class="text" style="color: #000; font-weight: 500;">Manage Categories</span>
                    </a>
                </div>
            </div>

            <!-- DataTables Example -->
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Gate Surveillance Equipment</td>
                                    <td>Security</td>
                                    <td>Andrei Joaqhim Ali Agbisit</td>
                                    <td>John Doe</td>
                                    <td>₱560.00</td>
                                    <td><span style="color: #28a745; font-weight: bold;">PAID</span></td>
                                    <td>GCash</td>
                                    <td>01/01/2024</td>
                                    <td class="text-center"></td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Clubhouse Refubishing Funds</td>
                                    <td>Maintenance</td>
                                    <td>Jio Rhey Detros</td>
                                    <td>Jane Smith</td>
                                    <td>₱430.00</td>
                                    <td><span style="color: #28a745; font-weight: bold;">PAID</span></td>
                                    <td>On-site Payment</td>
                                    <td>01/02/2024</td>
                                    <td class="text-center"></td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Swimming Pool Chloride</td>
                                    <td>Amenities & Services</td>
                                    <td>Edlan Vere Perez</td>
                                    <td></td>
                                    <td>₱320.00</td>
                                    <td><span style="color: #dc6335; font-weight: bold;">PENDING</span></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <a href="{{ url('view-entry-admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ url('edit-entry-admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
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
                                    <td>Water Tank Plumbing Fittings</td>
                                    <td>Maintenance</td>
                                    <td>Terrence Liam Tongol</td>
                                    <td></td>
                                    <td>₱210.00</td>
                                    <td><span style="color: #dc6335; font-weight: bold;">PENDING</span></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <a href="{{ url('view-entry-admin') }}" class="btn btn-primary btn-icon-split" style="margin-bottom: 5%;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-binoculars"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a><br>

                                        <a href="{{ url('edit-entry-admin') }}" class="btn btn-success btn-icon-split" style="margin-bottom: 5%;">
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

    <x-slot name="modal_delete_entry">
        <x-modal-delete-entry></x-modal-delete-entry>
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>