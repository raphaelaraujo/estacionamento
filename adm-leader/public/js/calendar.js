
$(document).ready(function() {

    var date_last_clicked = null;

    $('#calendar').fullCalendar({
        eventSources: [{
            events: function(start, end, timezone, callback) {
                $.ajax({
                    url: '<?php echo base_url() ?>calendar/get_events',
                    dataType: 'json',
                    data: {
                        start: start.unix(),
                        end: end.unix()
                    },
                    success: function(msg) {
                        var events = msg.events;
                        callback(events);
                    }
                });
            }
        }, ],
        dayClick: function(date, jsEvent, view) {
            date_last_clicked = $(this);
            $(this).css('background-color', '#bed7f3');
            $('#addModal').modal();
        },
    });
});