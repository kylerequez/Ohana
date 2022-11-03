<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   ='dummy_db';

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA APPOINTMENT </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <!-- END OF META TAGS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">

    <link rel="stylesheet" href="/Ohana/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Ohana/src/css/main.css">

    <!-- FONT AWESOME ICONS IMPORT -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Web Icon -->
    <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">

    <!-- Bootstrap CSS  CDN -->
    <!-- 5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">

    <!-- MORE icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- SCIPTS OF CALENDAR -->
    <script src="/Ohana/src/pages/test/js/jquery-3.6.0.min.js"></script>
    <script src="/Ohana/src/pages/test/js/bootstrap.min.js"></script>
    <script src="/Ohana/src/pages/test/fullcalendar/lib/main.min.js"></script>

    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }

        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>

</head>

<body style="background-color: #FAF8F0;">

    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <section class="calendar" style="margin-top:10%; ">
                <div class="calendarview">
                    <center>
                        <h1> CALENDAR </h1>
                    </center>
                </div>
                <!-- CALENDAR CONTENT -->

                <div class="container py-5" id="page-container" style="margin-top: 10%">
                    <div class="row">
                        <div class="col-md-9">
                            <div id="calendar"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="cardt rounded-0 shadow">
                                <div class="card-header bg-gradient bg-primary text-light">
                                    <h5 class="card-title">Schedule Form</h5>
                                </div>
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <form action="save_schedule.php" method="post" id="schedule-form">
                                            <input type="hidden" name="id" value="">
                                            <div class="form-group mb-2">
                                                <label for="title" class="control-label">Title</label>
                                                <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="description" class="control-label">Description</label>
                                                <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="start_datetime" class="control-label">Start</label>
                                                <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="end_datetime" class="control-label">End</label>
                                                <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-center">
                                        <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                                        <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </section>
        </div>
    </main>

    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>

    <!-- Script JS -->
    <script>
        var calendar;
        var Calendar = FullCalendar.Calendar;
        var events = [];
        $(function() {
            if (!!scheds) {
                Object.keys(scheds).map(k => {
                    var row = scheds[k]
                    events.push({
                        id: row.id,
                        title: row.title,
                        start: row.start_datetime,
                        end: row.end_datetime
                    });
                })
            }
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            calendar = new Calendar(document.getElementById('calendar'), {
                headerToolbar: {
                    left: 'prev,next today',
                    right: 'dayGridMonth,dayGridWeek,list',
                    center: 'title',
                },
                selectable: true,
                themeSystem: 'bootstrap',
                //Random default events
                events: events,
                eventClick: function(info) {
                    var _details = $('#event-details-modal')
                    var id = info.event.id
                    if (!!scheds[id]) {
                        _details.find('#title').text(scheds[id].title)
                        _details.find('#description').text(scheds[id].description)
                        _details.find('#start').text(scheds[id].sdate)
                        _details.find('#end').text(scheds[id].edate)
                        _details.find('#edit,#delete').attr('data-id', id)
                        _details.modal('show')
                    } else {
                        alert("Event is undefined");
                    }
                },
                eventDidMount: function(info) {
                    // Do Something after events mounted
                },
                editable: true
            });

            calendar.render();

            // Form reset listener
            $('#schedule-form').on('reset', function() {
                $(this).find('input:hidden').val('')
                $(this).find('input:visible').first().focus()
            })

            // Edit Button
            $('#edit').click(function() {
                var id = $(this).attr('data-id')
                if (!!scheds[id]) {
                    var _form = $('#schedule-form')
                    console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))
                    _form.find('[name="id"]').val(id)
                    _form.find('[name="title"]').val(scheds[id].title)
                    _form.find('[name="description"]').val(scheds[id].description)
                    _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
                    _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
                    $('#event-details-modal').modal('hide')
                    _form.find('[name="title"]').focus()
                } else {
                    alert("Event is undefined");
                }
            })

            // Delete Button / Deleting an Event
            $('#delete').click(function() {
                var id = $(this).attr('data-id')
                if (!!scheds[id]) {
                    var _conf = confirm("Are you sure to delete this scheduled event?");
                    if (_conf === true) {
                        location.href = "./delete_schedule.php?id=" + id;
                    }
                } else {
                    alert("Event is undefined");
                }
            })
        })
    </script>

    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>


    <?php
    $schedules = $conn->query("SELECT * FROM `schedule_list`");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
        $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
        $sched_res[$row['id']] = $row;
    }
    ?>
    <?php
    if (isset($conn)) $conn->close();
    ?>

    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>

</body>

</html>