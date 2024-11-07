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
                <h1 id="header-h1">Bulletin Board</h1>
            </div>

            <a href="#" class="btn btn-warning btn-icon-split mb-4" data-toggle="modal" data-target="#bulletinEntryModalAdd">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text" style="color: #000; font-weight: 500;">Add Entry</span>
            </a>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

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
                            <a href="{{ route('bulletin.board.manage.categories.superadmin') }}" class="btn btn-warning btn-icon-split">
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

        <x-modal-bulletin-add :categories="$categories" />
        
        <!-- THIS IS THE MODAL TO SHOW BULLETIN ENTRY DETAILS -->
        <div class="modal fade" id="bulletinEntryModal" tabindex="-1" role="dialog" aria-labelledby="bulletinEntryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="color: #000; padding: 20px;">
                    <div class="modal-header">
                        <h6 class="modal-title" id="bulletinEntryModalLabel" style="font-weight: bold;">Bulletin Board - Entry Details</h6>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="modalContentArea">
                            <h1 id="modalEventTitle" class="mt-2"></h1>
                            <div class="info-container">
                                <!-- Category Box -->
                                <div class="info-box-category" id="modalCategoryBox">
                                    <i class="fas fa-tags icon-box-category"></i> 
                                    <span style="color: #fff;"><strong>Category</strong> <span id="icon-box-divider">|</span></span>&nbsp;
                                    <span id="modalCategory" style="color: #fff;"></span>
                                </div>

                                <!-- Published Box -->
                                <div class="info-box">
                                    <i class="fas fa-paper-plane icon-box"></i> 
                                    <span><strong>Published</strong> <span id="icon-box-divider">|</span></span>&nbsp;
                                    <span id="modalDateAndTimePublished"></span>
                                </div>

                                <!-- Author Box -->
                                <div class="info-box">
                                    <i class="fas fa-user-edit icon-box"></i> 
                                    <span><strong>Author</strong> <span id="icon-box-divider">|</span></span>&nbsp;
                                    <span id="modalAuthor"></span>
                                </div>
                            </div>

                            <!-- Image Section -->
                            <div id="modalImageContainer" style="display: none; margin-top: 20px;">
                                <img id="modalImage" src="" alt="Event Image" class="img-fluid">
                            </div><br>

                            <!-- Event description -->
                            <div id="modalDescriptionArea">
                                <p id="modalDescription"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <a id="bulletinEntryModalEdit" href="#" style="font-weight: bold; color: #000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-warning btn-user btn-block font-weight-bold col-sm-3">EDIT ENTRY</a>

                        <a href="#" id="bulletinEntryModalDelete" data-entry-id="" style="font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-danger btn-user btn-block font-weight-bold text-white col-sm-3" data-toggle="modal" data-target="#deleteEntryModal">DELETE ENTRY</a>
                        
                        <button style="font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-secondary btn-user btn-block font-weight-bold text-white col-sm-3" type="button" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>   
    </x-slot>

    <x-slot name="modal_bulletin_add">
        <x-modal-bulletin-add></x-modal-bulletin-add>
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

        <!-- Custom JavaScript to show the modal -->
        <script>
            $(document).ready(function() {
                $('#addEntryButton').click(function() {
                    $('#bulletinEntryModalAdd').modal('show');
                });
            });
        </script>
        
        <!-- Load FullCalendar JS -->
        <script src="{{ url('vendor/fullcalendar/main.min.js') }}"></script>
        
        <!-- Load RichTextEditor -->
        <script src="{{ url('vendor/richtexteditor/rte.js') }}"></script>
        <script src="{{ url('vendor/richtexteditor/plugins/all_plugins.js') }}"></script>

        <!-- FullCalendar - Bulletin Board -->
        <script>
            $(document).ready(function () {
                var calendarEl = document.getElementById('calendarBulletinBoard');

                // Use server-side rendered data (entries) passed from the controller
                var events = @json($entries);

                // Log the dynamic data to check if it's correct
                console.log(events);

                // Pass categories from Blade to JavaScript
                window.bulletinCategories = @json($categories);

                // Create an object to map category names to their hex codes
                var categoryColors = {};
                window.bulletinCategories.forEach(function(category) {
                    categoryColors[category.name] = category.hex_code;
                });

                // Apply category colors to events
                    events.forEach(function(event) {
                    var eventCategory = event.extendedProps.category ? event.extendedProps.category : 'Uncategorized'; // Fallback to 'Uncategorized'
                    
                    // Apply category colors, or set default if category is missing
                    if (categoryColors[eventCategory]) {
                        event.backgroundColor = categoryColors[eventCategory]; // Set the background color
                        event.borderColor = categoryColors[eventCategory];     // Set the border color
                        event.textColor = '#ffffff';
                    } else {
                        // Optionally, set a default color for 'Uncategorized' events
                        event.backgroundColor = '#cccccc'; // Light gray or any other fallback color
                        event.borderColor = '#cccccc';
                        event.textColor = '#000000';
                    }
                });

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
                        var entryId = eventObj.extendedProps.entryId;

                        // Set the entry ID on the Delete button
                        $('#bulletinEntryModalDelete').attr('data-entry-id', entryId);

                        // Show the modal
                        $('#bulletinEntryModal').modal('show');

                        $('#bulletinEntryModalDelete').on('click', function () {
                            var entryId = $(this).data('entry-id'); // Get the entry ID from the button

                            if (entryId) {
                                console.log("Setting Entry ID:", entryId);
                                
                                var formAction = '/bulletin-board/admin/' + entryId; // Create the delete URL

                                // Open the delete modal without a new backdrop
                                $('#deleteEntryModal').modal({
                                    backdrop: false, // Ensures no new backdrop is created
                                    show: true
                                });

                                // Open the modal
                                $('#delete-entry-form').attr('action', formAction); // Set the form action
                            } else {
                                console.error("Entry ID is missing from event properties");
                            }
                        });

                        // Log the event object and entryId for debugging
                        console.log("Event Object:", eventObj);
                        console.log("Extended Props:", eventObj.extendedProps);

                        document.addEventListener('DOMContentLoaded', function() {
                            const modal = document.querySelector('#bulletinEntryModal');
                            console.log(modal);  // Check if the modal exists in the DOM
                        });

                        var modalTitleElement = document.querySelector('#modalEventTitle');

                        if (!modalTitleElement) {
                            console.error("Modal element with ID 'modalEventTitle' not found!");
                            return;  // Stop execution if the modal element isn't found
                        }
                        console.log("Modal Event Title element found, setting content...");

                            // Log the event object and entryId for debugging
                        console.log("Event Object:", eventObj);
                        console.log("Entry ID:", eventObj.extendedProps.entryId);

                        var editButton = document.querySelector('#bulletinEntryModalEdit');
                                               
                        if (editButton) {
                            console.log("Edit Button Found:", editButton);
                            var entryId = eventObj.extendedProps.entryId;
                            if (entryId) {
                                console.log("Setting Edit Button href for Entry ID: ", entryId);
                                editButton.setAttribute('href', '/bulletin-board/edit-entry-super-admin/' + entryId);
                                console.log("New href:", editButton.getAttribute('href'));
                            } else {
                                console.error('No entry ID found for this event');
                            }
                        }

                        console.log(events);

                        // Handle modal logic or displaying the event details
                        $('#bulletinEntryModal').modal('show'); // Show the modal (assuming Bootstrap is used)

                        // Populate the modal with event details
                        document.querySelector('#modalEventTitle').innerText = eventObj.title || 'Unknown';
                        document.querySelector('#modalDateAndTimePublished').innerText = eventObj.extendedProps.dateAndTimePublished;
                        document.querySelector('#modalAuthor').innerText = eventObj.extendedProps.author;
                        document.querySelector('#modalDescription').innerHTML = eventObj.extendedProps.description || '';
                        var eventCategory = eventObj.extendedProps.category ? eventObj.extendedProps.category : 'Uncategorized';
                        document.querySelector('#modalCategory').innerText = eventCategory ;

                        var entryId = eventObj.extendedProps.entryId;
                        if (entryId) {
                            console.log("Setting Edit Button href for Entry ID: ", entryId);
                            editButton.setAttribute('href', '/bulletin-board/edit-entry-super-admin/' + entryId);
                        } else {
                            console.error('No entry ID found for this event');
                        }
                        
                        // Set delete button href or data-target for delete modal
                        // document.querySelector('#bulletinEntryModalDelete').setAttribute('data-target', '#deleteEntryModal-' + entryId);

                        // Get category name and apply corresponding background color from categoryColors
                        var categoryName = eventObj.extendedProps.category;
                        var categoryColor = categoryColors[categoryName]; // Get the hex code for the category

                        // Apply background color to the category box
                        if (categoryColor) {
                            document.querySelector('#modalCategoryBox').style.backgroundColor = categoryColor;
                        }

                        // Here we use innerHTML to ensure that the description renders HTML content
                        document.querySelector('#modalDescription').innerHTML = eventObj.extendedProps.description || '';
                }});

                // Render the calendar
                calendar.render();

                // Ensure that all backdrops are removed when modals are closed
                $('#deleteEntryModal, #bulletinEntryModal, #bulletinEntryModalAdd').on('hidden.bs.modal', function () {
                    if ($('.modal.show').length === 0) {
                        $('.modal-backdrop').remove();
                    }
                });
            });
        </script>

        <script>
            (function($) {
                "use strict"; // Start of use strict

                // Toggle the side navigation
                $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
                    $("body").toggleClass("sidebar-toggled");
                    $(".sidebar").toggleClass("toggled");
                    if ($(".sidebar").hasClass("toggled")) {
                    $('.sidebar .collapse').collapse('hide');
                    };
                });

                // Close any open menu accordions when window is resized below 768px
                $(window).resize(function() {
                    if ($(window).width() < 768) {
                    $('.sidebar .collapse').collapse('hide');
                    };
                    
                    // Toggle the side navigation when window is resized below 480px
                    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
                    $("body").addClass("sidebar-toggled");
                    $(".sidebar").addClass("toggled");
                    $('.sidebar .collapse').collapse('hide');
                    };
                });

                // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
                $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
                    if ($(window).width() > 768) {
                    var e0 = e.originalEvent,
                        delta = e0.wheelDelta || -e0.detail;
                    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
                    e.preventDefault();
                    }
                });

                // Scroll to top button appear
                $(document).on('scroll', function() {
                    var scrollDistance = $(this).scrollTop();
                    if (scrollDistance > 100) {
                    $('.scroll-to-top').fadeIn();
                    } else {
                    $('.scroll-to-top').fadeOut();
                    }
                });

                // Smooth scrolling using jQuery easing
                $(document).on('click', 'a.scroll-to-top', function(e) {
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                    scrollTop: ($($anchor.attr('href')).offset().top)
                    }, 1000, 'easeInOutExpo');
                    e.preventDefault();
                });

                })(jQuery); // End of use strict
                // Update the delete form with the correct entry ID when the delete button is clicked

        </script>
    </x-slot>
</x-base>
