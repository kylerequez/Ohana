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
  <title> DASHBOARD - CUSTOMER TRANSACTIONS </title>
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
  <div class="layer"> </div>
  <!-- Body -->
  <div class="page-flex">
    <!-- Dashboard Sidebar -->
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <!-- ! Main nav -->
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <!--  TRANSACTIONS CONTENT -->
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <br>
          
            <h2 class="main-title text-center"> CUSTOMER TRANSACTIONS </h2>
   
        </div>
        <div class="users-table table-wrapper">
          <div class="search-wrapper">
            <i data-feather="search" aria-hidden="true"></i>
            <input type="text" placeholder=" Search User Account">
          </div>
          <div class="createstaff-wrapper">
            <button type="create" style="color:white"><i data-feather="bar-chart" aria-hidden="true"></i><a class="generate-sales-btn" href="/dashboard/sales"> Generate Sales Report </a></button>
            <button type="create" style="color:white"><i data-feather="file-text" aria-hidden="true"></i><a class="export-btn" href="/"> Export Report </a></button>
          </div>
          <br>
          <table class="posts-table">
            <thead>
              <tr class="users-table-info">
                <th><b>TRANSACTION I.D </b></th>
                <th><b>EMAIL ADDRESS</b></th>
                <th><b>NAME OF USER</b></th>
                <th><b>DATE</b></th>
                <th><b>ACTION</b></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  I.D NUMBER 12345
                </td>
                <td>
                  CUSTOMER EMAIL ADDRESS
                </td>
                <td>
                  <div class="pages-table-img">
                    Jenny Wilson
                  </div>
                </td>
                <td>17.04.2021</td>
                <td>
                  <button class="view-btn transparent-btn" type="view" style="color:#7d605c; margin-right: 15px; font-size: 25px;"> <i class="uil uil-eye"></i> </button>
                  <button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"> </i> </button>

<<<<<<< HEAD
                </td>
              </tr>
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
=======
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
        <!--  TRANSACTIONS CONTENT -->
        <main class="main users chart-page" id="skip-target">
          <div class="container">

            <h2 class="main-title text-center mt-4"> CUSTOMER TRANSACTIONS </h2>

          </div>
          <div class="users-table table-wrapper">
            <div class="search-wrapper">
              <i data-feather="search" aria-hidden="true"></i>
              <input type="text" placeholder=" Search User Account">
            </div>
            <div class="createstaff-wrapper">
              <button type="create" style="color:white"><i data-feather="bar-chart" aria-hidden="true"></i><a class="generate-sales-btn" href="/dashboard/sales"> Generate Sales Report </a></button>
              <button type="create" style="color:white"><i data-feather="file-text" aria-hidden="true"></i><a class="export-btn" href="/"> Export Report </a></button>
            </div>
            <br>
            <table class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th><b>TRANSACTION I.D </b></th>
                  <th><b>EMAIL ADDRESS</b></th>
                  <th><b>NAME OF USER</b></th>
                  <th><b>DATE</b></th>
                  <th><b>ACTION</b></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    I.D NUMBER 12345
                  </td>
                  <td>
                    CUSTOMER EMAIL ADDRESS
                  </td>
                  <td>
                    <div class="pages-table-img">
                      Jenny Wilson
                    </div>
                  </td>
                  <td>17.04.2021</td>
                  <td>
                    <button class="view-btn transparent-btn" type="view" data-bs-toggle="modal" data-bs-target="#viewModal" style="color:#7d605c; margin-right: 15px; font-size: 25px;"> <i class="uil uil-eye"></i> </button>
                    <button class="edit-btn transparent-btn" type="edit" data-bs-toggle="modal" data-bs-target="#editModal" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"> </i> </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="paginations">
            <li class="page-item previous-page"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">1</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">2</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">3</a></li>
            <li class="page-item dots"><a class="page-link" href="#">...</a></li>
            <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
          </div>
        </main>
        <!-- ! Footer -->
        <?php include_once dirname(__DIR__) . '/footer.php'; ?>
      </div>
    </div>

    <!-- VIEW MODAL -->
    <form method="POST" action="">
      <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewTransactionsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addStaffTitle"> Customer Transaction </h5>
              <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <div class="modal-body">
              <input name="type" type="hidden" value="TRANSACTIONS">
              <div class="mb-3">
                <label for="number" class="col-form-label"> Date </label>
                <input type="text" class="form-control" name="number" disabled style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="fname" class="col-form-label"> Transaction I.D </label>
                <input type="text" class="form-control" name="fname" disabled style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="mname" class="col-form-label"> Email Address </label>
                <input type="text" class="form-control" name="mname" disabled style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="lname" class="col-form-label"> Name of User </label>
                <input type="text" class="form-control" name="lname" disabled style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="email" class="col-form-label"> Email Address: </label>
                <input type="email" class="form-control" name="email" disabled style="background-color:#eed1c2; color:black">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- EDIT MODAL -->
    <form method="POST" action="">
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editTransactionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addStaffTitle"> Customer Transaction </h5>
              <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <div class="modal-body">
              <input name="type" type="hidden" value="TRANSACTIONS">
              <div class="mb-3">
                <label for="number" class="col-form-label"> Date </label>
                <input type="text" class="form-control" name="number" style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="fname" class="col-form-label"> Transaction I.D </label>
                <input type="text" class="form-control" name="fname" style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="mname" class="col-form-label"> Email Address </label>
                <input type="text" class="form-control" name="mname" style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="lname" class="col-form-label"> Name of User </label>
                <input type="text" class="form-control" name="lname" style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="email" class="col-form-label"> Email Address: </label>
                <input type="email" class="form-control" name="email" style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="status" class="col-form-label"> Status: </label>
                <select class="form-select" name="status" aria-label="Default select example" style="background-color:#eed1c2;">
                  <option value="PENDING">PENDING</option>
                  <option value="COMPLETED">COMPLETED</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn" style="background-color:#db6551;color:white;"> Save Changes </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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
>>>>>>> da2961b4d47efe43c4a6928f4fc4c2acc83e0dd4
  <?php
  }
  unset($_SESSION["msg"]);
  ?>
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