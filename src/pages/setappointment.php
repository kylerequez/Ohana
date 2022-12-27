<!DOCTYPE html>
<html lang="en">

<head>
    <title> USER PROFILE </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/userprofile.css">
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
            border: none;
        }

        .fc .fc-button-primary:not(:disabled).fc-button-active,
        .fc .fc-button-primary:not(:disabled):active,
        .fc .fc-button-primary:disabled {
            background-color: #c0b65a;
            color: white;
        }

        .fc-daygrid-event {
            text-decoration: none;
            color: black;
        }

        .fc-event-time {
            text-decoration: none;
            color: black;
        }

        .fc-event-title {
            text-decoration: none;
            color: black;
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

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #header {
                font-size: 37px;
                margin-top: 40%;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <?php if (!isset($_GET['type']) || !isset($_GET['reference'])) { ?>

    <?php } ?>
    <main>
        <?php include_once 'navigationbar.php'; ?>
        <div class="container-fluid">
            <section class="set-appointment" id="customer-book">
                <div class="container">
                    <div class="userheader mb-5">
                        <h1 class="text-center" id="header"> Appointment Calendar </h1>
                    </div>
                    <div class="alert" role="alert" style="background-color:#eed1c2;">
                        NOTE: Please be advised that your chosen time slot should be at least 4 days from now. <?php date_default_timezone_set('Asia/Manila');
                                                                                                                echo date('(M d, Y)', time()); ?>
                    </div>
                </div>
            </section>
            <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                <center>
                    <div class="alert alert-warning text-center" role="alert" style="width:500px;">
                        <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                        unset($_SESSION["msg"]); ?>
                    </div>
                </center>
            <?php
                unset($_SESSION["msg"]);
            }
            ?>
            <section>
                <div class="container py-5 mb-5" id="page-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="/appointment/set/<?php echo $_GET["type"]; ?>">
                    <div class="modal fade" tabindex="-1" id="day-details-modal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fs-2" style="font-family: 'Acme', sans-serif;"> Book Appointment </h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="type" value="<?php echo $_GET["type"]; ?>">
                                    <?php if ($_GET["type"] == "VISIT") { ?>
                                        <input type="hidden" name="reference" value="<?php echo $_GET["reference"]; ?>">
                                    <?php } ?>
                                    <div class="form-group mb-2">
                                        <label for="appointmentTime" class="control-label mt-2 mb-2">Appointment Date</label>
                                        <input class="form-control form-control-sm rounded-0" type="date" id="date" name="date" value="" readonly="readonly">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="appointmentTime" class="control-label mt-2 mb-2">Appointment Time</label>
                                        <select class="form-control form-control-sm rounded-0" name="appointmentTime" id="appointmentTime" required>
                                            <option id="" value="">-- PLEASE CHOOSE A TIME --</option>
                                            <option id="a" value="9:30 - 10:30">9:30 AM - 10:30 AM</option>
                                            <option id="b" value="10:30 - 11:30">10:30 AM - 11:30 AM</option>
                                            <option id="c" value="13:30 - 14:30">1:30 PM - 2:30 PM</option>
                                            <option id="d" value="14:30 - 15:30">2:30 PM - 3:30 PM</option>
                                            <option id="e" value="15:30 - 16:30">3:30 PM - 4:30 PM</option>
                                            <option id="f" value="16:30 - 17:30">4:30 PM - 5:30 PM</option>
                                        </select>
                                    </div>
                                    <div id="note" class="form-group mb-2"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                                    <button id="bookButton" type="button" data-bs-toggle="modal" data-bs-target="#appointmentConfirmation" class="btn text-light" style="background-color:#db6551">Book Appointment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="appointmentConfirmation" tabindex="-1" aria-labelledby="appointmentConfirmation" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-2" id="appointmentConfirmationTitle" style="font-family: 'Acme', sans-serif;"> Appointment Confirmation </h1>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure about the appointment details?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" data-bs-dismiss="modal" class="btn btn-outline-dark">Cancel</button>
                                    <button type="submit" class="btn text-light" style="background-color:#db6551">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <?php
    include_once dirname(__DIR__) . "/models/Appointment.php";
    require dirname(__DIR__) . '/config/db-config.php';
    require dirname(__DIR__) . '/dao/AppointmentDAO.php';
    require dirname(__DIR__) . '/services/AppointmentServices.php';
    $dao = new AppointmentDAO($servername, $database, $username, $password);
    $services = new AppointmentServices($dao, null);
    $allScheds = $services->getAllAppointments();
    $ownSched = $services->getAppointmentsByAccountId($user->getId());
    ?>
    <script>
        var scheds = JSON.parse(JSON.stringify(<?= json_encode($ownSched) ?>));
        var allScheds = JSON.parse(JSON.stringify(<?= json_encode($allScheds) ?>));
    </script>
    <script src="/Ohana/src/dashboard/js/customer-calendar-booking.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>