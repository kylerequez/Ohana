<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title> DASHBOARD - CALENDER </title>

  <!-- WEB ICON-->
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

  <!-- ICONS IMPORT  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- BOOTSTRAP CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- CALENDAR BS-->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

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

<body>
  <div class="layer"> </div>

  <!-- Body -->

  <div class="page-flex">
    <!-- Dashboard Sidebar -->
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>

    <div class="main-wrapper">

      <!-- ! Main nav -->
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>

      <!--  CUSTOMER ACCOUNTS CONTENT -->
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <br>
          <center>
            <h2 class="main-title"> APPOINTMENTS</h2>
          </center>
        </div>
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
                        <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                      </div>
                      <div class="form-group mb-2">
                        <label for="description" class="control-label">Description</label>
                        <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                      </div>
                      <div class="form-group mb-2">
                        <label for="startDate" class="control-label">Start Time</label>
                        <input type="datetime-local" class="form-control form-control-sm rounded-0" name="startDate" id="startDate" required>
                      </div>
                      <div class="form-group mb-2">
                        <label for="endDate" class="control-label">End Time</label>
                        <input type="datetime-local" class="form-control form-control-sm rounded-0" name="endDate" id="endDate" required>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-center">
                    <button class="btn btn-md rounded-0 my-4" type="submit" form="schedule-form" style="background-color:#db6551;color:white"><i class="fa fa-save"></i> Save</button>
                    <button class="btn btn-default border btn-md rounded-0 my-4" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
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


      </main>

      <!-- ! Footer -->
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>

    </div>
  </div>

  <!-- SCRIPTS -->
  <!-- Custom scripts -->
  <script src="/Ohana/src/dashboard/js/script.js"></script>

  <!-- JavaScript BOOTSTRAP Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>


  <?php
  include_once dirname(__DIR__) . "/../models/Appointment.php";
  $sched_res = unserialize($_SESSION["appointments"]);
  ?>
  <script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
    console.log(scheds)
  </script>
  <script src="/Ohana/src/dashboard/js/calendar-script.js"></script>
</body>

</html>