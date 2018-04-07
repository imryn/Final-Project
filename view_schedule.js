
$(function() {
    
    $('#viewCalendar').fullCalendar({
        
        googleCalendarApiKey: 'AIzaSyCUB4dkAVG8cMM_4A4hgQjmon7YeEhzYpE',
        events: {
        googleCalendarId: 'sadnakidintouch@gmail.com'
                },
        businessHours: [ 
            {
                dow: [0,1,2,3,4,5], // Sunday, Monday, Tuesday, Wednesday,thursday, friday
                start: '08:00', // 8am
                end: '17:30' // 5:30pm
            }
            ],

        eventSources: [
            {
                url:  '/ordini/ajax_calendar/',
                type: 'POST',
            }
            ],
        
        header:
            {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
        selectable: true, // this is marking the box on an hour
        selectHelper: true,
        editable: true,
        defaultView: 'listWeek'
        })

});


