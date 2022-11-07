<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'ohana_db';

$conn = new mysqli($host, $username, $password, $dbname);
if (!$conn) {
  die("Cannot connect to the database." . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--meta tags-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">

  <title> DASHBOARD - CALENDER </title>

  <!-- WEB ICON-->
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

  <!-- ICONS IMPORT  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- BOOTSTRAP CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Custom styles -->
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">

  <!-- <link rel="stylesheet" href="/Ohana/src/dashboard/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="/Ohana/src/dashboard/js/fullcalendar/lib/main.min.css">
  <script src="/Ohana/src/dashboard/js/jquery-3.6.0.min.js"></script>
  <!-- <script src="/Ohana/src/dashboard/js/bootstrap.min.js"></script> -->
  <script src="/Ohana/src/dashboard/js/fullcalendar/lib/main.min.js"></script>

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

<body>
  <?php
  if (!isset($_SESSION)) session_start();
  include_once dirname(__DIR__) . '/../models/Account.php';

  if (empty($_SESSION['user'])) {
    session_unset();
    session_destroy();
    header("Location: http://localhost/login");
    exit();
  } else {
    $user = unserialize($_SESSION['user']);
  ?>
    <div class="layer"> </div>
    <!-- Body -->
    <div class="page-flex">
      <!-- Dashboard Sidebar -->
      <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>

      <div class="main-wrapper">
        <!-- END OF ADMIN DASHBOARD SIDE-->

        <!-- ! Main nav -->
        <?php include_once dirname(__DIR__) . "/navbar.php" ?>

        <!-- CALENDAR Main content -->
        <main class="main users chart-page" id="skip-target">
          <div class="container">
            <br>
            <center>
              <h2 class="main-title"> CALENDAR </h2>
            </center>
          </div>
          <div class="container py-5" id="page-container" style="margin-top: 0%">
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
                      <form action="test.php" method="post" id="schedule-form">
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
                          <label for="start_datetime" class="control-label">Start Time</label>
                          <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                        </div>
                        <div class="form-group mb-2">
                          <label for="end_datetime" class="control-label">End Time</label>
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
                      <dt class="text-muted">Description</dt>
                      <dd id="description" class=""></dd>
                      <dt class="text-muted">Start Time</dt>
                      <input type="datetime-local" id="start" class="" disabled></input>
                      <dt class="text-muted">End Time</dt>
                      <input type="datetime-local" id="end" class="" disabled></input>
                    </dl>
                  </div>
                </div>
                <div class="modal-footer rounded-0">
                  <div class="text-end">
                    <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>

        <!-- FOOTER -->
        <?php include_once dirname(__DIR__) . '/footer.php'; ?>
      </div>
    </div>

    <!-- SCRIPTS -->
    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"> </script>
    <!-- JavaScript BOOTSTRAP Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <!--SCRIPT FOR BOOTSTRAP MODAL-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <?php
    // $schedules = $conn->query("SELECT * FROM `schedule_list`");
    // $sched_res = [];
    // foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
    //   $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
    //   $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
    //   $sched_res[$row['id']] = $row;
    // }
    ?>
    <?php
    //if (isset($conn)) $conn->close();
    include_once dirname(__DIR__) . "/../models/Appointment.php";
    $sched_res = unserialize($_SESSION["appointments"]);
    //print_r($sched_res);
    //$sched_res = json_encode($sched_res);
    //print_r($sched_res);
    ?>
    <script>
      var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
      console.log(scheds)
    </script>
    <script src="/Ohana/src/dashboard/js/calendar-script.js"></script>
  <?php
  }
  ?>
</body>

</html>