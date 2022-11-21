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
  <div class="layer"></div>
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
          <h2 class="main-title text-center mt-3">REGISTERED USER ACCOUNTS</h2>
        </div>
        <div class="users-table table-wrapper">
          <div class="search-wrapper">
            <i data-feather="search" aria-hidden="true"></i>
            <input type="text" placeholder=" Search User Account">
            <button type="filter" style="color:white"> FILTER </button>
            <button type="sort" style="color:white"> SORT </button>
          </div>
          <?php
          $users = unserialize($_SESSION["users"]);

          if (!isset($_GET['page'])) {
            $current_page = 1;
          } else {
            $current_page = $_GET['page'];
          }

          $results_per_page = _RESOURCE_PER_PAGE_;
          $count = $_SESSION["totalUsers"];
          $number_of_page = ceil($count / $results_per_page) > 1 ? ceil($count / $results_per_page) : 1;

          if (!empty($users)) {
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
            <div class="paginations">
              <?php
              for ($page = 1; $page <= $number_of_page; $page++) {
              ?>
                <li class="page-item <?php echo ($current_page == $page) ? "next-page" : "current-page"; ?>"><a class="page-link" href="/dashboard/customers/get?page=<?php echo $page ?>&limit=<?php echo $results_per_page ?>&offset=<?php echo ($page == 1) ? 0 : $results_per_page * ($page - 1) ?>"><?php echo $page ?></a></li>
              <?php
              }
              ?>
            </div>
          <?php
          } else {
          ?>

          <?php
          }
          ?>
        </div>
      </main>
      <!-- ! Footer -->
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <!-- TOAST -->
  <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
    <div class="toast-container top-0 end-0 p-3">
      <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
        <div class="toast-header">
          <img src="/Ohana/src/dashboard/img/main/notification.png" width="25px" height="25px" alt="">
          <strong class="me-auto" style="font-size:20px;"> &nbsp; Notification </strong>
          <small> JUST NOW </small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="color:#db6551; font-size:15px;"><?php echo $_SESSION["msg"] ?></div>
      </div>
    </div>
  <?php
  }
  unset($_SESSION["msg"]);
  ?>
  <!-- SCRIPTS -->

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