<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Bulletin Board</title>
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
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Bulletin Board</h1>
            </div>

            <a href="#" class="btn btn-warning btn-icon-split mb-3" data-toggle="modal" data-target="#bulletinEntryModalAdd">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text" style="color: #000; font-weight: 500;">Add Entry</span>
            </a>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="card shadow mb-2 p-2">
                        <div class="card-body">
                            <div id="calendarBulletinBoard"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 id="page-desc" class="m-0 font-weight-bold text-black">Legend</h6>
                        </div>
                        <div class="pt-4 pb-4 card-body d-flex justify-content-center">
                            <div class="small">
                                @foreach ($categories as $category)
                                    <span id="chart-category" class="mr-2">
                                        <i class="fas fa-circle" style="color: {{ $category->hex_code }};"></i> {{ $category->name }}<br>
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-4">
                            <a href="{{ route('bulletin.board.manage.categories.admin') }}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-tags"></i>
                                </span>
                                <span class="text" style="color: #000; font-weight: 500;">Manage Categories</span>
                            </a>
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

    <!-- Keep this modal content to avoid the Undefined variable error -->
    <x-slot name="modal_change_pw">
        <!-- Placeholder for modal content -->
        <x-modal-change-pw></x-modal-change-pw>
    </x-slot>

    <x-slot name="modal_dashboard_edit">
        <!-- Placeholder for modal content -->
        <x-modal-dashboard-edit></x-modal-dashboard-edit>
    </x-slot>

    <x-slot name="modal_delete_entry">
        <x-modal-delete-entry></x-modal-delete-entry>
    </x-slot>
<!--
    <x-slot name="modal_bulletin_entry">
        <x-modal-bulletin-entry></x-modal-bulletin-entry>
    </x-slot>
-->
       <!-- Event Details Modal (Place this before your script section) -->
       <x-slot name="modal_bulletin_entry">
        <div class="modal fade" id="bulletinEntryModal" tabindex="-1" role="dialog" aria-labelledby="bulletinEntryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEventTitle">Event Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Date and Time Published:</strong> <span id="modalDateAndTimePublished"></span></p>
                        <p><strong>Author:</strong> <span id="modalAuthor"></span></p>
                        <p><strong>Description:</strong></p>
                        <p id="modalDescription"></p>
                        <p><strong>Category:</strong> <span id="modalCategory"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="modal_bulletin_add">
        <x-modal-bulletin-add :categories="$categories" />
    </x-slot>

    <x-slot name="modal_appt_and_res_manage">
        <!-- Placeholder for modal content -->
        <x-modal-appt-and-res-manage></x-modal-appt-and-res-manage>
    </x-slot>

    <x-slot name="script">
<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load Bootstrap JS (for modals) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<!-- Load FullCalendar JS -->
<script src="{{ url('vendor/fullcalendar/main.min.js') }}"></script>

<!-- Load RichTextEditor -->
<script src="{{ url('vendor/richtexteditor/rte.js') }}"></script>
<script src="{{ url('vendor/richtexteditor/plugins/all_plugins.js') }}"></script>

<!-- Custom Script for Calendar and Modals -->

<script>
$(document).ready(function () {
    var calendarEl = document.getElementById('calendarBulletinBoard');

    // Use server-side rendered data (entries) passed from the controller
    var events = @json($entries);

    // Log the dynamic data to check if it's correct
    console.log(events);

    // Initialize FullCalendar with dynamic data
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        events: events,  // Use dynamic events from controller

        // Handle event click
        eventClick: function(info) {
            var eventObj = info.event;
            
            // Log event for debugging
            console.log(eventObj);

            // Handle modal logic or displaying the event details
            $('#bulletinEntryModal').modal('show'); // Show the modal (assuming Bootstrap is used)

            // Populate the modal with event details
            document.querySelector('#modalEventTitle').innerText = eventObj.title;
            document.querySelector('#modalDateAndTimePublished').innerText = eventObj.extendedProps.dateAndTimePublished;
            document.querySelector('#modalAuthor').innerText = eventObj.extendedProps.author;
            document.querySelector('#modalDescription').innerText = eventObj.extendedProps.description;
            document.querySelector('#modalCategory').innerText = eventObj.extendedProps.category;
 } });

    // Render the calendar
    calendar.render();
});
</script>

</x-slot>
</x-base>
