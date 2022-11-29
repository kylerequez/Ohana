var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];
$(function() {
    if (!!scheds) {
        Object.keys(scheds).map((k) => {
            var row = scheds[k];
            events.push({
                id: row.id,
                title: row.title,
                account_id: row.accountId,
                customerName: row.customerName,
                description: row.description,
                start: row.startDate.date,
                end: row.endDate.date,
                status: row.status,
            });
        });
    }

    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();

    calendar = new Calendar(document.getElementById("calendar"), {
        headerToolbar: {
            left: "prev,next today",
            right: "dayGridMonth",
            center: "title",
        },
        buttonText: {
            today: "Today",
            month: "Month",
            week: "Week",
        },
        selectable: true,
        themeSystem: "bootstrap5",
        events: events,
        eventBackgroundColor: "#db6551",
        eventClick: function(info) {
            var _form = $("#appointmentDetails");
            var id = info.event.id;

            if (!!scheds[id]) {
                _form.find("#title").val(scheds[id].title);
                _form.find("#description").text(scheds[id].description);
                _form.find("#type").val(scheds[id].type);
                _form.find("#status").val(scheds[id].status);
                _form
                    .find("#startDate")
                    .val(String(scheds[id].startDate.date.replace(/\.\d+/, "")));
                _form
                    .find("#endDate")
                    .val(String(scheds[id].endDate.date.replace(/\.\d+/, "")));
            }
        },
    });
    calendar.render();
});