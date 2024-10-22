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
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Bulletin Board</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-7 mb-4">
                    <div class="card shadow mb-4 p-2">
                        <div class="card-body">
                            <div id="calendarBulletinBoard"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-2">
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
        <x-modal-bulletin-entry></x-modal-bulletin-entry>
    </x-slot>

    @if(Auth::check() && Auth::user()->account_type_id != 3)
    <x-slot name="modal_bulletin_add">
        <x-modal-bulletin-add :categories="$categories"></x-modal-bulletin-add>
    </x-slot>
    @else
        <x-slot name="modal_bulletin_add"></x-slot>
    @endif

    <x-slot name="modal_appt_and_res_manage">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>

        <!-- FullCalendar and modal interaction for view-only entries -->
        <script>
                document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendarBulletinBoard');
                var events = @json($entries); // Get events from controller

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: events,
                    eventClick: function (info) {
                        var event = info.event;

                        // Populate the modal with event details
                        document.getElementById('modalEventTitle').innerText = event.title || 'No Title';
                        document.getElementById('modalCategory').innerText = event.extendedProps.category || 'Uncategorized';
                        document.getElementById('modalAuthor').innerText = event.extendedProps.author || 'Unknown';
                        document.getElementById('modalDateAndTimePublished').innerText = event.extendedProps.dateAndTimePublished || 'Unknown';
                        document.getElementById('modalDescription').innerHTML = event.extendedProps.description || '';
                        
                        // Conditionally hide/show Edit and Delete buttons based on the user's role
                        var editButton = document.getElementById('bulletinEntryModalEdit');
                        var deleteButton = document.querySelector('.bulletinEntryModalDelete'); // Corrected to select by class

                        if (editButton) {
                            if ("{{ Auth::check() && Auth::user()->account_type_id == 3 }}") {
                                editButton.style.display = 'none';
                                deleteButton.style.display = 'none';
                            } else {
                                editButton.style.display = 'inline-block';
                                deleteButton.style.display = 'inline-block';
                            }
                        }

                        // Show the modal
                        $('#bulletinEntryModal').modal('show');
                    }
                });

                calendar.render();
            });
        </script>
    </x-slot>
</x-base>

<!-- Modal for viewing bulletin entry details -->
<div class="modal fade" id="bulletinEntryModal" tabindex="-1" role="dialog" aria-labelledby="bulletinEntryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulletinEntryModalLabel">Bulletin Entry Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="modalEventTitle"></h5>
                <div><strong>Category: </strong><span id="modalCategory">Uncategorized</span></div>
                <div><strong>Author: </strong><span id="modalAuthor">Unknown</span></div>
                <div><strong>Date Published: </strong><span id="modalDateAndTimePublished"></span></div>
                <div><strong>Description: </strong><p id="modalDescription"></p></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div
