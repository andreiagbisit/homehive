$(document).ready(function() {
    var calendarEl = document.getElementById('calendar');

    if (calendarEl) {
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
                    backgroundColor: '#e74a3b',
                    borderColor: '#e74a3b',
                    textColor: '#fff'
                },
                {
                    title: 'Releasing of Vehicle Stickers',
                    start: '2024-09-03',
                    backgroundColor: '#1cc88a',
                    borderColor: '#1cc88a',
                    textColor: '#000'
                },
                {
                    title: 'Morning Zumba Session',
                    start: '2024-09-05',
                    backgroundColor: '#4e73df',
                    borderColor: '#4e73df',
                    textColor: '#fff'
                },
                {
                    title: 'Water Shortage',
                    start: '2024-09-09',
                    backgroundColor: '#f6c23e',
                    borderColor: '#f6c23e',
                    textColor: '#000'
                },
                {
                    title: 'Tennis Court Now Open',
                    start: '2024-09-18',
                    backgroundColor: '#e74a3b',
                    borderColor: '#e74a3b',
                    textColor: '#fff'
                },
                {
                    title: 'Online Payment Collectors',
                    start: '2024-09-27',
                    backgroundColor: '#1cc88a',
                    borderColor: '#1cc88a',
                    textColor: '#000'
                },
                {
                    title: 'MILO Sports Clinic',
                    start: '2024-10-01',
                    backgroundColor: '#4e73df',
                    borderColor: '#4e73df',
                    textColor: '#fff'
                }
            ]
        });

        calendar.render();
    } else {
        console.error('Calendar element not found');
    }
});
