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

    <x-slot name="modal_bulletin_add">
        <x-modal-bulletin-add :categories="$categories" />
    </x-slot>

    <x-slot name="modal_appt_and_res_manage">
    </x-slot>

    <x-slot name="script">
    <script>
$(document).ready(function () {
    var calendarEl = document.getElementById('calendarBulletinBoard');

    // Dynamically generated category colors from your categories in the database
    var categoryColors = {
        @foreach ($categories as $category)
            '{{ $category->name }}': { background: '{{ $category->hex_code }}', border: '{{ $category->hex_code }}', text: '#ffffff' }, 
        @endforeach
    };

    // Use server-side rendered data (entries) passed from the controller
    var events = @json($entries->map(function($entry) {
        return [
            'title' => $entry->title,
            'start' => $entry->post_date,
            'className' => 'event-' . strtolower($entry->category->name),
            'extendedProps' => (object)[
                'category' => $entry->category->name,
                'dateAndTimePublished' => $entry->created_at->format('m-d-Y H:i A'),
                'author' => $entry->author ?? 'Unknown',
                'description' => $entry->description,
                // Uncomment the following line if you have image data available
                // 'imageUrl' => $entry->image_url ?? null
            ]
        ];
    }));

    // Initialize the calendar with dynamic data
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        events: events, // Load events dynamically from the controller

        eventClick: function (info) {
            // Handle event click if needed
        },

        eventDidMount: function (info) {
            var element = info.el;
            var event = info.event;

            // Format the date and time
            var publishedDateTime = new Date(event.extendedProps.dateAndTimePublished);
            var formattedDate = publishedDateTime.toLocaleDateString('en-US', { dateStyle: 'long' });
            var formattedTime = publishedDateTime.toLocaleTimeString('en-US', { timeStyle: 'short' });
            var formattedDateTime = `${formattedDate} ${formattedTime}`;

            // Handle modal logic for viewing event details
            element.setAttribute('data-toggle', 'modal');
            element.setAttribute('data-target', '#bulletinEntryModal');
            element.setAttribute('data-title', event.title);
            element.setAttribute('data-dateAndTimePublished', formattedDateTime);
            element.setAttribute('data-author', event.extendedProps.author);
            element.setAttribute('data-description', event.extendedProps.description);
            element.setAttribute('data-category', event.extendedProps.category);

            if (event.extendedProps.imageUrl) {
                element.setAttribute('data-image-url', event.extendedProps.imageUrl);
            }

            // Add click event to open the modal
            element.addEventListener('click', function (e) {
                e.preventDefault();

                // Populate modal with event details
                document.querySelector('#modalEventTitle').innerText = event.title;
                document.querySelector('#modalDateAndTimePublished').innerText = formattedDateTime;
                document.querySelector('#modalAuthor').innerText = event.extendedProps.author;
                document.querySelector('#modalDescription').innerText = event.extendedProps.description;
                document.querySelector('#modalCategory').innerText = event.extendedProps.category;

                // Set background color for category
                var categoryColor = categoryColors[event.extendedProps.category];
                var modalCategoryBox = document.querySelector('.info-box-category');
                modalCategoryBox.style.backgroundColor = categoryColor.background;
                modalCategoryBox.style.color = categoryColor.text;

                // Display event image if available
                if (event.extendedProps.imageUrl) {
                    var modalImage = document.getElementById('modalImage');
                    modalImage.src = event.extendedProps.imageUrl;
                    document.getElementById('modalImageContainer').style.display = 'block';
                } else {
                    document.getElementById('modalImageContainer').style.display = 'none';
                }
            });
        }
    });

    calendar.render();
});
</script>
