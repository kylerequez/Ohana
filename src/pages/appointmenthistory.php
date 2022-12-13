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

    <?php include_once 'stylesheets.php'; ?>
   
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
            margin-top: -2%;
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'rnavbar.php'; ?>
        <div class="container-fluid">
            <section class="userprofile">
                <div class="userheader mb-5">
                <img src="/Ohana/src/images/Pages/appoint.png" id="header" class="img-responsive" width="100%">
                </div>
                <div class="container">
                    <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                        <center>
                            <div class="alert alert-warning text-center" role="alert" style="width:400px;">
                                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                                unset($_SESSION["msg"]); ?>
                            </div>
                        </center>
                    <?php
                        unset($_SESSION["msg"]);
                    }
                    ?>
                </div>
            </section>
            <div class="container py-5 mb-5" id="page-container">
                <div class="row">
                    <div class="col-md-9">
                        <div id="calendar"></div>
                    </div>
                    <div class="col-md-3">
                        <form id="appointmentDetails">
                            <div class="cardt rounded-0 shadow">
                                <div class="card-header text-light p-3" style="background-color:#db6551;">
                                    <h4 class="card-title mt-4 text-center"> Appointment Information </h4><br>
                                </div>
                                <div class="card-body mb-5 pb-4">
                                    <div class="container-fluid">
                                        <input type="hidden" name="id" value="">
                                        <div class="form-group my-2">
                                            <label for="title" class="control-label mt-2 mb-2">Title</label>
                                            <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="type" class="control-label mt-2 mb-2">Type</label>
                                            <input type="text" class="form-control form-control-sm rounded-0" name="type" id="type" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="description" class="control-label mt-2 mb-2">Description</label>
                                            <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" disabled></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="startDate" class="control-label mt-2 mb-2">Start Time</label>
                                            <input type="datetime-local" step="60" class="form-control form-control-sm rounded-0" name="startDate" id="startDate" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="endDate" class="control-label mt-2 mb-2">End Time</label>
                                            <input type="datetime-local" step="60" class="form-control form-control-sm rounded-0" name="endDate" id="endDate" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="status" class="control-label mt-2 mb-2">Status</label>
                                            <input type="text" class="form-control form-control-sm rounded-0" name="status" id="status" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <?php
    include_once dirname(__DIR__) . "/models/Appointment.php";
    include_once dirname(__DIR__) . '/config/db-config.php';
    include_once dirname(__DIR__) . '/dao/AppointmentDAO.php';
    include_once dirname(__DIR__) . '/services/AppointmentServices.php';

    $dao = new AppointmentDAO($servername, $database, $username, $password);
    $services = new AppointmentServices($dao);

    $sched_res = $services->getAppointmentsByAccountId($user->getId());
    ?>
    <script>
        var scheds = $.parseJSON(JSON.stringify(<?= json_encode($sched_res) ?>));
    </script>
    <script src="/Ohana/src/dashboard/js/appointment-history.js"></script>
</body>

</html>