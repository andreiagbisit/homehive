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
                category: 'Announcement',
                className: 'event-announcement'
            },
            {
                title: 'Clubhouse Opening Hours',
                start: '2024-09-03',
                category: 'Reminder',
                className: 'event-reminder'
            },
            {
                title: 'Releasing of Vehicle Stickers',
                start: '2024-09-03',
                category: 'Reminder',
                className: 'event-reminder'
            },
            {
                title: 'Morning Zumba Session',
                start: '2024-09-05',
                category: 'Event',
                className: 'event-event'
            },
            {
                title: 'Water Shortage',
                start: '2024-09-09',
                category: 'Interruption',
                className: 'event-interruption'
            },
            {
                title: 'Tennis Court Now Open',
                start: '2024-09-18',
                category: 'Announcement',
                className: 'event-announcement'
            },
            {
                title: 'Online Payment Collectors',
                start: '2024-09-27',
                category: 'Reminder',
                className: 'event-reminder'
            },
            {
                title: 'MILO Sports Clinic',
                start: '2024-10-01',
                category: 'Event',
                className: 'event-event'
            }
        ],

        windowResize: function(view) {
            if ($(window).width() < 768) {
                calendar.setOption('height', 600); // Set a fixed height for mobile view
            } else {
                calendar.setOption('height', 'auto'); // Reset height for larger screens
            }
        }
    });



    calendar.render();
});
