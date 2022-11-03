<!DOCTYPE html>
<html lang="en">

<head>
  <!-- META TAGS-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS-->

  <title> DASHBOARD - USER MANAGEMENT </title>

  <!-- WEB ICON-->
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

  <!-- ICONS IMPORT  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- BOOTSTRAP CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Custom styles -->
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
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
    // print_r($existingAccount);
    // echo "<br>" . $existingAccount->getType();
  ?>
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
              <h2 class="main-title"> REGISTERED USER ACCOUNTS </h2>
            </center>
          </div>

          <div class="users-table table-wrapper">
            <div class="search-wrapper">
              <i data-feather="search" aria-hidden="true"></i>
              <input type="text" placeholder=" Search User Account">
              <button type="filter"> FILTER </button>
              <button type="sort"> SORT </button>
            </div>
            <?php
            if (isset($_SESSION["users"])) {
              $users = unserialize($_SESSION["users"]);
            ?>
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                    <th><b>USER I.D </b></th>
                    <th><b>NAME OF USER</b></th>
                    <th><b>EMAIL ADDRESS</b></th>
                    <th><b>CONTACT NUMBER</b></th>
                    <th><b>STATUS</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($users as $user) {
                  ?>
                    <tr>
                      <td>
                        <?php echo $user->getId(); ?>
                      </td>
                      <td>
                        <?php echo $user->getFullName(); ?>
                      </td>
                      <td>
                        <div class="pages-table-img">
                          <?php echo $user->getEmail(); ?>
                        </div>
                      </td>
                      <td>
                        <?php echo $user->getNumber(); ?>
                      </td>
                      <td>
                        <?php echo $user->getStatus(); ?>
                      </td>
                      <?php
                      if ($user->getType() == "ADMINISTRATOR") {
                      ?>
                        <td>
                          <button class="edit-btn transparent-btn" type="edit" style="color:aqua; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"> </i> </button>
                          <button class="delete-btn transparent-btn" type="delete" style="color:red; font-size: 25px;"> <i class="uil uil-trash-alt"> </i>
                          </button>
                        </td>
                      <?php
                      }
                      ?>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            <?php
            } else {
            ?>

            <?php
            }
            ?>
          </div>

          <!-- <div class="paginations">
            <li class="page-item previous-page"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">1</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">2</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">3</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">4</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">5</a></li>
            <li class="page-item dots"><a class="page-link" href="#">...</a></li>
            <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
          </div> -->

        </main>
        <!-- ! Footer -->
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
  <?php
  }
  ?>
</body>

</html>