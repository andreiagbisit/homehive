$(document).ready(function() {
    var calendarEl = document.getElementById('calendarBulletinBoard');

    // Use dynamic category colors
    var categoryColors = {};
    window.bulletinCategories.forEach(function(category) {
        categoryColors[category.name] = {
            background: category.hex_code,
            border: category.hex_code,
            text: '#ffffff'
        };
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        events: [
        ],

        /*eventClick: function(info) {
            // Access the description from the event's extended properties
            var description = info.event.extendedProps.description;

            // Assuming you have a rich text editor initialized (e.g., CKEditor or RTE)
            var editor = new RichTextEditor('#richTextEditorContainer');
            
            // Set the description into the editor
            editor.setHTML(description);

            // Alternatively, if using a specific rich text editor, like CKEditor or TinyMCE:
            // CKEditor example:
            // CKEDITOR.instances.editor1.setData(description);
            
            // TinyMCE example:
            // tinymce.get('richTextEditorContainer').setContent(description);
        },*/
        
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

                    // Get entry ID from the event's extendedProps and set the "Edit Entry" button's href
                    var entryId = eventObj.extendedProps.entryId; // Ensure the entryId is passed
                    if (entryId) {
                        // Set the href attribute for the "Edit Entry" button
                        document.querySelector('#bulletinEntryModalEdit').setAttribute('href', '/bulletin-board/edit-entry-admin/' + entryId);
                    } else {
                        console.error('No entry ID found for this event');
                    }

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
