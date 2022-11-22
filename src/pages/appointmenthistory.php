<!DOCTYPE html>
<html lang="en">

<head>
    <title> USER PROFILE </title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="/Ohana/src/css/userprofile.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        @media screen and (min-width: 360px) and (max-width: 929.98px) {}
    </style>
    <!-- CALENDAR BS-->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

    <link rel="stylesheet" href="/Ohana/src/dashboard/js/fullcalendar/lib/main.min.css">
    <script src="/Ohana/src/dashboard/js/jquery-3.6.0.min.js"></script>
    <script src="/Ohana/src/dashboard/js/fullcalendar/lib/main.min.js"></script>
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
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <section class="userprofile" style="margin-top:10%;">
                <div class="userheader mb-5">
                    <h1> APPOINTMENT HISTORY </h1>
                </div>
            </section>
            <div class="container py-5" id="page-container" style="margin-top: 0%">
                <div class="row">
                    <div class="col-md-9">
                        <div id="calendar"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="cardt rounded-0 shadow">
                            <div class="card-header text-light p-3" style="background-color:#db6551;">
                                <h5 class="card-title mt-4 text-center">Schedule Form</h5><br>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <form action="" method="post" id="schedule-form">
                                        <input type="hidden" name="id" value="">
                                        <div class="form-group my-2">
                                            <label for="title" class="control-label">Title</label>
                                            <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required readonly="readonly">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="type" class="control-label">Type</label>
                                            <input type="text" class="form-control form-control-sm rounded-0" name="type" id="type" required readonly="readonly">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="description" class="control-label">Description</label>
                                            <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required readonly="readonly"></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="accountId" class="control-label">Account ID</label>
                                            <input type="text" class="form-control form-control-sm rounded-0" name="accountId" id="accountId" required readonly="readonly">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="customerName" class="control-label">Customer</label>
                                            <input type="text" class="form-control form-control-sm rounded-0" name="customerName" id="customerName" required readonly="readonly">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="startDate" class="control-label">Start Time</label>
                                            <input type="datetime-local" step="60" class="form-control form-control-sm rounded-0" name="startDate" id="startDate" required readonly="readonly">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="endDate" class="control-label">End Time</label>
                                            <input type="datetime-local" step="60" class="form-control form-control-sm rounded-0" name="endDate" id="endDate" required readonly="readonly">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button class="btn btn-md rounded-0 my-4" name="btnSave" id="btnSave" type="submit" form="schedule-form" style="background-color:#db6551;color:white" disabled><i class="fa fa-save"></i>Save</button>
                                    <button class="btn btn-default border btn-md rounded-0 my-4" type="reset" form="schedule-form"><i class="fa fa-reset"></i>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Details Modal -->
            <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-0">
                        <div class="modal-header rounded-0">
                            <h5 class="modal-title">Schedule Details</h5>
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
        </div>
    </main>
    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>
    <!-- SCIPTS -->
    <!-- Chart library -->
    <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <?php
    include_once dirname(__DIR__) . "/models/Appointment.php";
    $sched_res = unserialize($_SESSION["appointments"]);
    ?>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
        console.log(scheds)
    </script>
    <script src="/Ohana/src/dashboard/js/calendar-script.js"></script>
</body>

</html>