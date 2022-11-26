<!DOCTYPE html>
<html lang="en">

<head>
    <title> USER PROFILE </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/userprofile.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

    <link rel="stylesheet" href="/Ohana/src/dashboard/js/fullcalendar/lib/main.min.css">
    <script src="/Ohana/src/dashboard/js/jquery-3.6.0.min.js"></script>
    <script src="/Ohana/src/dashboard/js/fullcalendar/lib/main.min.js"></script>

    <?php include_once 'stylesheets.php'; ?>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }

        .fc .fc-button-primary {
            background-color: #db6551;
            color: white;
            border-color: white;
        }

        .fc .fc-button-primary:not(:disabled).fc-button-active,
        .fc .fc-button-primary:not(:disabled):active,
        .fc .fc-button-primary:disabled {
            background-color: #c0b65a;
            color: white;
        }

        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #db6551 !important;
            border-style: solid;
            border-width: 1px !important;
        }

        .fc-daygrid-day-number {
            text-decoration: none;
            color: black;
        }

        .fc-col-header-cell-cushion {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        #header {
            margin-top: 10%;
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>

        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">

            <section class="set-appointment" id="customer-book">
                <div class="container">
                    <div class="userheader mb-5">
                        <h1 class="text-center" id="header"> Appointment Calendar </h1>
                    </div>
                    <div class="alert" role="alert" style="background-color:#eed1c2;">
                        Please be advised that your chosen time slot
                    </div>
                </div>
            </section>
            <section>
                <div class="container py-5 mb-5" id="page-container">
                    <div class="row">
                        <div class="col-md-9">
                            <div id="calendar"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="cardt rounded-0 shadow">
                                <div class="card-header text-light p-3" style="background-color:#db6551;">
                                    <h4 class="card-title mt-4 text-center"> Appointment Information </h4><br>
                                </div>
                                <div class="card-body mb-5">
                                    <div class="container-fluid">
                                        <form action="" method="post" id="schedule-form">
                                            <input type="hidden" name="id" value="">
                                            <div class="form-group my-2">
                                                <label for="title" class="control-label mt-2 mb-2">Title</label>
                                                <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required readonly="readonly">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="type" class="control-label mt-2 mb-2">Type</label>
                                                <input type="text" class="form-control form-control-sm rounded-0" name="type" id="type" required readonly="readonly">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="customerName" class="control-label mt-2 mb-2">Full Name </label>
                                                <input type="text" class="form-control form-control-sm rounded-0" name="customerName" id="customerName" required readonly="readonly">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="startDate" class="control-label mt-2 mb-2">Start Time</label>
                                                <input type="datetime-local" step="60" class="form-control form-control-sm rounded-0" name="startDate" id="startDate" required readonly="readonly">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="endDate" class="control-label mt-2 mb-2">End Time</label>
                                                <input type="datetime-local" step="60" class="form-control form-control-sm rounded-0" name="endDate" id="endDate" required readonly="readonly">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-center">
                                        <button class="btn btn-md rounded-0 my-4" name="btnSave" id="btnSave" type="submit" form="schedule-form" style="background-color:#db6551;color:white"><i class="fa fa-save"></i> Confirm Book </button>
                                        <button class="btn btn-default border btn-md rounded-0 my-4" type="reset" form="schedule-form"><i class="fa fa-reset"></i>Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-0">
                            <div class="modal-header rounded-0">
                                <h5 class="modal-title"> Appointment Information </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body rounded-0">
                                <div class="container-fluid">
                                    <dl>
                                        <dt class="text-muted">Title</dt>
                                        <dd id="title" class="fw-bold fs-4"></dd>
                                        <dt class="text-muted">Type</dt>
                                        <dd id="type" class=""></dd>
                                        <dt class="text-muted">Description</dt>
                                        <dd id="description" class=""></dd>
                                        <dt class="text-muted">Account ID</dt>
                                        <dd id="accountId" class=""></dd>
                                        <dt class="text-muted">Customer Name</dt>
                                        <dd id="customerName" class=""></dd>
                                        <dt class="text-muted">Start Time</dt>
                                        <input type="datetime-local" id="start" class="" disabled></input>
                                        <dt class="text-muted">End Time</dt>
                                        <input type="datetime-local" id="end" class="" disabled></input>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <?php
    include_once dirname(__DIR__) . "/models/Appointment.php";
    $sched_res = unserialize($_SESSION["appointments"]);
    ?>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
        console.log(scheds)
    </script>
    <script src="/Ohana/src/dashboard/js/calendar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>