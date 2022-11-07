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
                description: row.description,
                start: row.startDate.date,
                end: row.endDate.date,
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
            right: "dayGridMonth,dayGridWeek,list",
            center: "title",
        },
        selectable: true,
        themeSystem: "bootstrap",
        //Random default events
        events: events,
        eventClick: function(info) {
            var _details = $("#event-details-modal");
            var id = info.event.id;
            if (!!scheds[id]) {
                _details
                    .find("#title")
                    .text(scheds[id].title);
                _details
                    .find("#description")
                    .text(scheds[id].description);
                _details
                    .find("#start")
                    .val(String(scheds[id].startDate.date.replace(/\.\d+/, "")));
                _details
                    .find("#end")
                    .val(String(scheds[id].endDate.date.replace(/\.\d+/, "")));
                _details
                    .find("#edit,#delete")
                    .attr("data-id", id);
                _details.modal("show");
            } else {
                alert("Event is undefined");
            }
        },
        eventDidMount: function(info) {
            // Do Something after events mounted
        },
        editable: true,
    });

    calendar.render();

    // Form reset listener
    $("#schedule-form").on("reset", function() {
        $(this).find("input:hidden").val("");
        $(this).find("input:visible").first().focus();
    });

    // Edit Button
    $("#edit").click(function() {
        var id = $(this).attr("data-id");
        if (!!scheds[id]) {
            var _form = $("#schedule-form");
            console.log(id);
            console.log(
                scheds[id].startDate.date,
                String(scheds[id].startDate.date.replace(" ", "T"))
            );
            _form
                .find('[name="id"]')
                .val(id);
            _form
                .find('[name="title"]')
                .val(scheds[id].title);
            _form
                .find('[name="description"]')
                .val(scheds[id].description);
            _form
                .find('[name="start_datetime"]')
                .val(String(scheds[id].startDate.date.replace(" ", "T").replace(/\.\d+/, "")));
            console.log("Start");
            _form
                .find('[name="end_datetime"]')
                .val(String(scheds[id].endDate.date.replace(" ", "T").replace(/\.\d+/, "")));
            console.log("End");
            $("#event-details-modal").modal("hide");
            _form.find('[name="title"]').focus();
        } else {
            alert("The event does not exist!");
        }
    });

    // Delete Button / Deleting an Event
    $("#delete").click(function() {
        var id = $(this).attr("data-id");
        if (!!scheds[id]) {
            var _conf = confirm("Are you sure to delete this scheduled event?");
            if (_conf === true) {
                location.replace("/dashboard/appointments/delete/" + id);
            }
        } else {
            alert("Event is undefined");
        }
    });
});