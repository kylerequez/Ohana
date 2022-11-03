<!DOCTYPE html>
<html lang="en">

<head>
  <!-- META TAGS -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS-->

  <title> DASHBOARD - LOGS </title>

  <!-- WEB ICON-->
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

  <!-- VERSION 4.5.3 FOR MODAL-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- BOOTSTRAP CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Custom styles -->
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">

  <!-- ICONS IMPORT  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body>
  <?php
  if (!isset($_SESSION)) session_start();
  include_once dirname(__DIR__) . '/../models/Account.php';
  include_once dirname(__DIR__) . '/../models/Log.php';

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
        <!-- ! Main nav -->
        <?php include_once dirname(__DIR__) . "/navbar.php" ?>
        <!--  SYSTEM LOGS MAIN CONTENT -->
        <main class="main users chart-page" id="skip-target">
          <div class="container">
            <br>
            <center>
              <h2 class="main-title"> SYSTEM LOGS </h2>
            </center>
          </div>
          <?php
          if (isset($_SESSION["logs"]) && !empty($_SESSION["logs"])) {
            $logs = unserialize($_SESSION["logs"]);
          ?>
            <div class="users-table table-wrapper">
              <div class="search-wrapper">
                <i data-feather="search" aria-hidden="true"></i>
                <input type="text" placeholder=" Search ">
                <button class="btn dropdown-toggle" type="filter" data-bs-toggle="dropdown" aria-expanded="false"> FILTER </button><!-- TESTING FILTER BUTTON -->
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">DATE</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                <button type="sort"> SORT </button>
              </div>
              <br>
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                    <th><b>LOG I.D </b></th>
                    <th><b>DESCRIPTION</b></th>
                    <th><b>DATE</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($logs as $log) {
                  ?>
                    <tr>
                      <td><?php echo $log->getId(); ?></td>
                      <td><?php echo $log->getLog(); ?></td>
                      <td><?php echo $log->getDate()->format('m-d-Y H:i:s'); ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <div class="paginations">
              <li class="page-item previous-page"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item current-page"><a class="page-link" href="#">1</a></li>
              <li class="page-item current-page"><a class="page-link" href="#">2</a></li>
              <li class="page-item current-page"><a class="page-link" href="#">3</a></li>
              <li class="page-item current-page"><a class="page-link" href="#">4</a></li>
              <li class="page-item current-page"><a class="page-link" href="#">5</a></li>
              <li class="page-item dots"><a class="page-link" href="#">...</a></li>
              <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
            </div>

          <?php
          } else {
            echo "EMPTY";
          }
          ?>
        </main>

      <?php
    }
      ?>
      <!-- FOOTER -->
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>

      </div>
    </div>

    <!-- SCRIPTS -->

    <!-- Chart library -->
    <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

    <!-- Icons library -->
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>

    <!-- JavaScript BOOTSTRAP Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <!--SCRIPT FOR BOOTSTRAP MODAL-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
</body>

</html>