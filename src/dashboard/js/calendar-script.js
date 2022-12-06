var calendar;
var Calendar = FullCalendar.Calendar;
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
    buttonText: {
      today: "Today",
      month: "Month",
      week: "Week",
      day: "Day",
      list: "List",
    },
    selectable: true,
    themeSystem: "bootstrap5",
    events: events,
    eventBackgroundColor: "#db6551",
    eventClick: function (info) {
      var _details = $("#event-details-modal");
      var id = info.event.id;
      if (!!scheds[id]) {
        _details.find("#title").text(scheds[id].title);
        _details.find("#description").text(scheds[id].description);
        _details.find("#type").text(scheds[id].type);
        _details.find("#status").text(scheds[id].status);
        _details.find("#accountId").text(scheds[id].accountId);
        _details.find("#customerName").text(scheds[id].customerName);
        $("#status").prop("disabled", false);
        _details
          .find("#start")
          .val(String(scheds[id].startDate.date.replace(/\.\d+/, "")));
        _details
          .find("#end")
          .val(String(scheds[id].endDate.date.replace(/\.\d+/, "")));

        _details.find("#edit,#delete").attr("data-id", id);
        _details.modal("show");
      } else {
        alert("Event is undefined");
      }
    },
    eventDidMount: function (info) {
      // Do Something after events mounted
    },
  });

  calendar.render();

  // Form reset listener
  $("#schedule-form").on("reset", function () {
    $(this).attr("action", "");
    $(this).find("input:hidden").val("");
    $(this).find("input:visible").first().focus();
    $(this).find("input:visible").attr("readonly", "readonly");
    $("#status").prop("disabled", true);
    $("#btnSave").prop("disabled", true);
  });

  // Edit Button
  $("#edit").click(function () {
    var id = $(this).attr("data-id");
    if (!!scheds[id]) {
      var _form = $("#schedule-form");
      _form.attr("action", "/dashboard/appointments/update/" + id);
      $("#btnSave").removeAttr("disabled");
      _form.find('[name="id"]').val(id);
      _form.find('[name="title"]').val(scheds[id].title);
      _form.find('[name="type"]').val(scheds[id].type);
      _form.find('[name="description"]').val(scheds[id].description);
      _form.find('[name="status"]').val(scheds[id].status);
      _form.find('[name="accountId"]').val(scheds[id].accountId);
      _form.find('[name="customerName"]').val(scheds[id].customerName);
      _form
        .find('[name="startDate"]')
        .val(
          String(
            scheds[id].startDate.date.replace(" ", "T").replace(/\.\d+/, "")
          )
        )
        .attr("readonly", false);
      _form
        .find('[name="endDate"]')
        .val(
          String(scheds[id].endDate.date.replace(" ", "T").replace(/\.\d+/, ""))
        )
        .attr("readonly", false);
      $("#event-details-modal").modal("hide");
    } else {
      alert("The event does not exist!");
    }
  });

  // Delete Button / Deleting an Event
  // $("#delete").click(function () {
  //   var id = $(this).attr("data-id");
  //   if (!!scheds[id]) {
  //     var _conf = confirm("Are you sure to delete this scheduled event?");
  //     if (_conf === true) {
  //       location.replace("/dashboard/appointments/delete/" + id);
  //     }
  //   } else {
  //     alert("Event is undefined");
  //   }
  // });
});
