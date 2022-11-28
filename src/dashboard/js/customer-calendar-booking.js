var calendar;
var Calendar = FullCalendar.Calendar;
var allEvents = [];
var events = [];
$(function () {
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

  if (!!allScheds) {
    Object.keys(allScheds).map((k) => {
      var row = allScheds[k];
      allEvents.push({
        id: row.id,
        title: row.title,
        account_id: row.accountId,
        customerName: row.customerName,
        description: row.description,
        start: new Date(row.startDate.date),
        end: new Date(row.endDate.date),
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
    events: allEvents,
    eventBackgroundColor: "#db6551",
    select: function (info) {
      var _day = $("#day-details-modal");

      $('#appointmentTime option[value="9:30 - 10:30"]').prop(
        "disabled",
        false
      );
      $('#appointmentTime option[value="10:30 - 11:30"]').prop(
        "disabled",
        false
      );
      $('#appointmentTime option[value="13:30 - 14:30"]').prop(
        "disabled",
        false
      );
      $('#appointmentTime option[value="14:30 - 15:30"]').prop(
        "disabled",
        false
      );
      $('#appointmentTime option[value="15:30 - 16:30"]').prop(
        "disabled",
        false
      );
      $('#appointmentTime option[value="16:30 - 17:30"]').prop(
        "disabled",
        false
      );

      var day = ("0" + info.start.getDate()).slice(-2);
      var month = ("0" + (info.start.getMonth() + 1)).slice(-2);
      var today = info.start.getFullYear() + "-" + month + "-" + day;
      var date = new Date(today);

      var A = new Date(today + " 9:30:00");
      var B = new Date(today + " 10:30:00");
      var C = new Date(today + " 13:30:00");
      var D = new Date(today + " 14:30:00");
      var E = new Date(today + " 15:30:00");
      var F = new Date(today + " 16:30:00");

      for (const events of allEvents) {
        if (events.start.getDate() == date.getDate()) {
          console.log("DATE: ", events.start.getDate());
          if (events.start.getTime() == A.getTime()) {
            console.log("EQUAL A");
            $('#appointmentTime option[value="9:30 - 10:30"]').prop(
              "disabled",
              true
            );
          } else if (events.start.getTime() == B.getTime()) {
            console.log("EQUAL B");
            $('#appointmentTime option[value="10:30 - 11:30"]').prop(
              "disabled",
              true
            );
          } else if (events.start.getTime() == C.getTime()) {
            console.log("EQUAL C");
            $('#appointmentTime option[value="13:30 - 14:30"]').prop(
              "disabled",
              true
            );
          } else if (events.start.getTime() == D.getTime()) {
            console.log("EQUAL D");
            $('#appointmentTime option[value="14:30 - 15:30"]').prop(
              "disabled",
              true
            );
          } else if (events.start.getTime() == E.getTime()) {
            console.log("EQUAL E");
            $('#appointmentTime option[value="15:30 - 16:30"]').prop(
              "disabled",
              true
            );
          } else if (events.start.getTime() == F.getTime()) {
            console.log("EQUAL F");
            $('#appointmentTime option[value="16:30 - 17:30"]').prop(
              "disabled",
              true
            );
          }
        }
      }

      _day.find('[name="date"]').val(today);
      _day.modal("show");
    },
  });

  calendar.render();
});
