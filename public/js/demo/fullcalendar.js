$(document).ready(function() {
    var calendarEl = document.getElementById('calendar');

    var categoryColors = {
        'Announcement': { background: '#e74a3b', border: '#e74a3b', text: '#ffffff' },
        'Reminder': { background: '#1cc88a', border: '#1cc88a', text: '#000000' },
        'Event': { background: '#4e73df', border: '#4e73df', text: '#ffffff' },
        'Interruption': { background: '#f6c23e', border: '#f6c23e', text: '#000000' }
    };

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        events: [
            {
                title: 'Plaza Stalls/Lots for Rent',
                start: '2024-09-01',
                className: 'event-announcement',
                extendedProps: {
                    category: 'Announcement',
                    dateAndTimePublished:'09-01-2024 12:00 PM',
                    author:'Andrei Joaqhim Ali Agbisit',
                    description: 'Are you a local vendor, artisan, or entrepreneur looking for the perfect space to showcase your goods or services? We are excited to announce that stalls and lots are now available for rent at the subdivision’s plaza. This is an excellent opportunity to reach a diverse audience in a bustling, high-traffic area!',
                    imageUrl:'img/plaza.jpg'
                }
            },
            {
                title: 'Clubhouse Opening Hours',
                start: '2024-09-03',
                className: 'event-reminder',
                extendedProps: {
                    category: 'Reminder',
                    dateAndTimePublished:'09-03-2024 12:30 PM',
                    author:'Jio Rhey Detros',
                    description: 'We are thrilled to welcome you to our clubhouse! Whether you’re looking for a place to relax, socialize, or engage in various activities, our clubhouse offers a perfect setting for all. To ensure you make the most of your experience, here are our official opening hours: Monday - Friday: 8:00 AM - 9:00 PM, Saturday - Sunday: 9:00 AM - 10:00 PM, and Public Holidays: 10:00 AM - 6:00 PM',
                    imageUrl:'img/clubhouse-2.jpg'
                }
            },
            {
                title: 'Releasing of Vehicle Stickers',
                start: '2024-09-03',
                className: 'event-reminder',
                extendedProps: {
                    category: 'Reminder',
                    dateAndTimePublished:'09-03-2024 1:00 PM',
                    author:'Edlan Vere Perez',
                    description: 'We are pleased to inform all residents of [Subdivision Name] about the official release of the new Vehicle Stickers. These stickers are essential for all residents to ensure smooth and secure access to the subdivision. Please take note of the following details regarding the release and distribution process. Sticker release schedule is during Mondays-Fridays at 9:00 AM - 5:00 PM at our clubhouse.',
                    imageUrl:'img/stickers-2.jpg'
                }
            },
            {
                title: 'Morning Zumba Session',
                start: '2024-09-05',
                className: 'event-event',
                extendedProps: {
                    category: 'Event',
                    dateAndTimePublished:'09-05-2024 1:30 PM',
                    author:'Terrence Liam Tongol',
                    description: 'Get ready to start your day with energy and fun! Join us for an invigorating Morning Zumba Session at the subdivision covered court this Friday. Whether you’re a seasoned Zumba enthusiast or a first-timer, this event is designed to get your body moving, boost your mood, and kickstart your day in the best way possible!',
                    imageUrl:'img/zumba.jpg'
                }
            },
            {
                title: 'Water Shortage',
                start: '2024-09-09',
                className: 'event-interruption',
                extendedProps: {
                    category: 'Interruption',
                    dateAndTimePublished:'09-09-2024 2:00 PM',
                    author:'Andrei Joaqhim Ali Agbisit',
                    description: 'Dear residents, we would like to inform you of a temporary water shortage affecting our community due to extensive repairs starting this afternoon at 3:00 PM until 6:00 PM. We understand the inconvenience this may cause and are working closely with the relevant authorities to restore normal water supply as quickly as possible.',
                    imageUrl:'img/tap.jpg'
                }
            },
            {
                title: 'Tennis Court Now Open',
                start: '2024-09-18',
                className: 'event-announcement',
                extendedProps: {
                    category: 'Announcement',
                    dateAndTimePublished:'09-18-2024 2:30 PM',
                    author:'Jio Rhey Detros',
                    description: 'We are excited to announce the Grand Opening of the new Tennis Court in the subdivision! Whether you’re a seasoned player or just getting started, this state-of-the-art tennis court is now ready for all residents to enjoy. The tennis court will be available for use starting tomorrow at 10:00 AM.',
                    imageUrl:'img/tennis-court.jpg'
                }
            },
            {
                title: 'Online Payment Collectors',
                start: '2024-09-27',
                className: 'event-reminder',
                extendedProps: {
                    category: 'Reminder',
                    dateAndTimePublished:'09-27-2024 3:00 PM',
                    author:'Edlan Vere Perez',
                    description: 'As a friendly reminder, the Homeowners’ Association (HOA) has made it easier and more convenient for you to manage your payments through our Online Payment Collectors. Avoid the hassle of manual payments by using our secure, digital platform to stay on top of your dues and contributions.',
                    imageUrl:'img/phone-payment.jpg'
                }
            },
            {
                title: 'MILO Sports Clinic',
                start: '2024-10-01',
                className: 'event-event',
                extendedProps: {
                    category: 'Event',
                    dateAndTimePublished:'10-01-2024 3:30 PM',
                    author:'Terrence Liam Tongol',
                    description: 'Calling all young athletes and sports enthusiasts! We are excited to host the MILO Sports Clinic right here at the subdivision. This event is designed to inspire and develop the skills of young children in various sports through fun and engaging activities. Whether your child is a beginner or looking to improve their athletic abilities, the MILO Sports Clinic offers professional training and plenty of excitement.',
                    imageUrl:'img/milo-sports-clinic.jpg'
                }
            }
        ],

        eventDidMount: function(info) {
            var element = info.el;
            var event = info.event;

        // Parse the published date and time into a Date object
        var publishedDateTime = new Date(event.extendedProps.dateAndTimePublished);

        // Format date and time separately
        var formattedDate = publishedDateTime.toLocaleDateString('en-US', {
            dateStyle: 'long'
        });

        var formattedTime = publishedDateTime.toLocaleTimeString('en-US', {
            timeStyle: 'short'
        });

        // Concatenate the formatted date and time without "at"
        var formattedDateTime = `${formattedDate} ${formattedTime}`;

            // Make the entire event rectangle a clickable link
            element.setAttribute('role', 'button');
            element.setAttribute('data-toggle', 'modal');
            element.setAttribute('data-target', '#bulletinEntryModal');
            element.setAttribute('data-title', event.title);
            element.setAttribute('data-dateAndTimePublished', formattedDateTime);
            element.setAttribute('data-author', event.extendedProps.author);
            element.setAttribute('data-description', event.extendedProps.description);
            element.setAttribute('data-category', event.extendedProps.category || event.category); // Access category

            if (event.extendedProps.imageUrl) {
                element.setAttribute('data-image-url', event.extendedProps.imageUrl);
            }

            // Add click event to open the modal
            element.addEventListener('click', function(e) {
                e.preventDefault();

                // Set modal content
                document.querySelector('#modalEventTitle').innerText = event.title;
                document.querySelector('#modalDateAndTimePublished').innerText = formattedDateTime;
                document.querySelector('#modalAuthor').innerText = event.extendedProps.author;
                document.querySelector('#modalDescription').innerText = event.extendedProps.description;
                document.querySelector('#modalCategory').innerText = event.extendedProps.category || event.category;

                // Set background color for category based on categoryColors
                var categoryColor = categoryColors[event.extendedProps.category]; // Get category color
                var modalCategoryBox = document.querySelector('.info-box-category');
                modalCategoryBox.style.backgroundColor = categoryColor.background; // Set background color
                modalCategoryBox.style.color = categoryColor.text; // Set text color

                // Display the image for all categories if available
                if (event.extendedProps.imageUrl) {
                    var modalImageContainer = document.getElementById('modalImageContainer');
                    var modalImage = document.getElementById('modalImage');
                    modalImage.src = event.extendedProps.imageUrl;
                    modalImageContainer.style.display = 'block';
                } else {
                    document.getElementById('modalImageContainer').style.display = 'none'; // Hide image if none is provided
                }
            });
        },

        windowResize: function(view) {
            if ($(window).width() < 768) {
                calendar.setOption('height', 600); // Set a fixed height for mobile view
            } else {
                calendar.setOption('height', 'auto'); // Reset height for larger screens
            }
        }
    });

    // Check user role and display the edit and delete button accordingly
    if (currentUserAccountTypeId === 1 || currentUserAccountTypeId === 2) {
        $('#bulletinEntryModalEdit').show();
    } else if (currentUserAccountTypeId === 3) {
        $('#bulletinEntryModalEdit').hide();
    };

    if (currentUserAccountTypeId === 1 || currentUserAccountTypeId === 2) {
        $('#bulletinEntryModalDelete').show();
    } else if (currentUserAccountTypeId === 3) {
        $('#bulletinEntryModalDelete').hide();
    };

    calendar.render();

    $('#deleteEntryModal').on('show.bs.modal', function () {
        // Increase z-index for the delete modal and its backdrop
        $('#deleteEntryModal').css('z-index', parseInt($('#bulletinEntryModal').css('z-index')) + 10);
        $('.modal-backdrop').not('.modal-stack').css('z-index', parseInt($('#deleteEntryModal').css('z-index')) - 1).addClass('modal-stack');
    });
    
    $('#deleteEntryModal').on('hidden.bs.modal', function () {
        // When the delete modal is closed, remove only its backdrop
        $('.modal-backdrop').removeClass('modal-stack').remove();
    
        // Ensure the bulletin entry modal still has a backdrop if it's still open
        if ($('#bulletinEntryModal').hasClass('show')) {
            $('<div class="modal-backdrop fade show"></div>').appendTo(document.body);
        }
    });

    $('#bulletinEntryModal').on('hidden.bs.modal', function () {
        // Ensure that the backdrop is removed when the bulletin entry modal is closed
        $('.modal-backdrop').remove();
    });    
});
