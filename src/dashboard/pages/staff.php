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

  <title> DASHBOARD - STAFF MANAGEMENT </title>

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
  <div class="layer"> </div>
  <!-- Body -->
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <!-- ! Main nav -->
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <!--  STAFF ACCOUNTS CONTENT -->
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title text-center mt-3"> STAFF ACCOUNTS </h2>
        </div>
        <div class="users-table table-wrapper">
          <div class="search-wrapper">
            <i data-feather="search" aria-hidden="true"></i>
            <input type="text" placeholder=" Search User Account">
            <button type="filter" style="color:white"> FILTER </button>
            <button type="sort" style="color:white"> SORT </button>
          </div>
          <?php
          if ($user->getType() == "ADMINISTRATOR") {
          ?>
            <div class="createstaff-wrapper">
              <a class="create-staff-btn" href="#" data-bs-toggle="modal" data-bs-target="#addModal"><button type="create" style="color:white"><i data-feather="plus" aria-hidden="true"></i>
                  Add Staff </button></a>
            </div>
          <?php
          }
          if (!isset($_GET['page'])) {
            $current_page = 1;
          } else {
            $current_page = $_GET['page'];
          }
          $results_per_page = _RESOURCE_PER_PAGE_;
          $count = $_SESSION["totalStaff"];
          $number_of_page = ceil($count / $results_per_page) > 1 ? ceil($count / $results_per_page) : 1;
          $staffs = unserialize($_SESSION["staff"]);
          if (!empty($staffs)) {
          ?>
            <table class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th><b>STAFF I.D</b> </th>
                  <th><b>FULL NAME </b></th>
                  <th><b>EMAIL ADDRESS</b></th>
                  <th><b>STATUS</b></th>
                  <?php
                  if ($user->getType() == "ADMINISTRATOR") {
                  ?>
                    <th>ACTION</th>
                  <?php
                  }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($staffs as $staff) {
                ?>
                  <tr>
                    <td><?php echo $staff->getId(); ?></td>
                    <td><?php echo $staff->getFullName(); ?></td>
                    <td><?php echo $staff->getEmail(); ?></td>
                    <td><?php echo $staff->getStatus(); ?></td>
                    <?php
                    if ($user->getType() == "ADMINISTRATOR") {
                    ?>
                      <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $staff->getId(); ?>"><button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"> </i> </button></a>
                        <a href="/dashboard/staff/delete/<?php echo $staff->getId(); ?>?page=<?php echo $current_page; ?>&limit=<?php echo $results_per_page; ?>&offset=<?php echo ($current_page == 1) ? 0 : $results_per_page * ($current_page - 1) ?>"><button class="delete-btn transparent-btn" onclick="return confirm('Are you sure you want to delete Account ID <?php echo $staff->getId(); ?>?');" type="delete" style="color:red; font-size: 25px;"><i class="uil uil-trash-alt"></i></button></a>
                      </td>
                    <?php
                    }
                    ?>
                    <!-- EDIT STAFF POP UP MODAL -->
                    <form method="POST" action="/dashboard/staff/update/<?php echo $staff->getId(); ?>?page=<?php echo $current_page; ?>&limit=<?php echo $results_per_page; ?>&offset=<?php echo ($current_page == 1) ? 0 : $results_per_page * ($current_page - 1) ?>">
                      <div class="modal fade" id="editModalId<?php echo $staff->getId(); ?>" tabindex="-1" aria-labelledby="editstaffmodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editingModal"> EDIT STAFF ACCOUNT </h5>
                              <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="type" value="<?php echo $staff->getType(); ?>">
                              <div class="mb-3">
                                <label for="fname" class="col-form-label"> First Name: </label>
                                <input type="text" class="form-control" name="fname" value="<?php echo $staff->getFname(); ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="mname" class="col-form-label"> Middle Name: </label>
                                <input type="text" class="form-control" name="mname" value="<?php echo $staff->getMname(); ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="lname" class="col-form-label"> Surname: </label>
                                <input type="text" class="form-control" name="lname" value="<?php echo $staff->getLname(); ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="email" class="col-form-label"> Email Address: </label>
                                <input type="email" class="form-control" name="email" value="<?php echo $staff->getEmail(); ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="number" class="col-form-label"> Contact Number: </label>
                                <input type="text" class="form-control" name="number" value="<?php echo $staff->getNumber(); ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="status" class="col-form-label"> Status: </label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                  <option <?php if ($staff->getStatus() === "ACTIVE") echo "selected"; ?> value="ACTIVE">Active</option>
                                  <option <?php if ($staff->getStatus() === "DISABLED") echo "selected"; ?> value="DISABLED">Disabled</option>
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn" style="background-color:#db6551;color:white;"> Save Changes </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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
                <li class="page-item <?php echo ($current_page == $page) ? "next-page" : "current-page"; ?>"><a class="page-link" href="/dashboard/staff/get?page=<?php echo $page; ?>&limit=<?php echo $results_per_page; ?>&offset=<?php echo ($page == 1) ? 0 : $results_per_page * ($page - 1) ?>"><?php echo $page; ?></a></li>
              <?php
              }
              ?>
            </div>
          <?php
          } else {
          ?>
            NULL
          <?php
          }
          ?>
        </div>
      </main>
      <!-- ! Footer -->
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <!-- ADD STAFF POP UP MODAL -->
  <form method="POST" action="/dashboard/staff/add?page=<?php echo $current_page; ?>&limit=<?php echo $results_per_page; ?>&offset=<?php echo ($current_page == 1) ? 0 : $results_per_page * ($current_page - 1) ?>">
          <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addStaffModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addStaffTitle"> ADD STAFF ACCOUNT </h5>
                  <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                </div>
                <div class="modal-body">
                  <input name="type" type="hidden" value="STAFF">
                  <input name="status" type="hidden" value="ACTIVE">
                  <div class="mb-3">
                    <label for="fname" class="col-form-label"> First Name: </label>
                    <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required style="background-color:#eed1c2; color:black">
                  </div>
                  <div class="mb-3">
                    <label for="mname" class="col-form-label"> Middle Name (optional): </label>
                    <input type="text" class="form-control" name="mname" placeholder="Enter Middle Name" style="background-color:#eed1c2; color:black">
                  </div>
                  <div class="mb-3">
                    <label for="lname" class="col-form-label"> Surname: </label>
                    <input type="text" class="form-control" name="lname" placeholder="Enter Surname" required style="background-color:#eed1c2; color:black">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="col-form-label"> Email Address: </label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email Address" required style="background-color:#eed1c2; color:black">
                  </div>
                  <div class="mb-3">
                    <label for="number" class="col-form-label"> Contact Number: </label>
                    <input type="text" class="form-control" name="number" placeholder="Enter Contact Number" required style="background-color:#eed1c2; color:black">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="col-form-label"> Password: </label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required style="background-color:#eed1c2; color:black">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn" id="ToastBtn" style="background-color:#db6551;color:white"> Add Staff </button>
                </div>
              </div>
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
  <script>
    //TOAST SCRIPT TRIGGER 
    const toastTrigger = document.getElementById('ToastBtn')
    const toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
      toastTrigger.addEventListener('click', () => {
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
      })
    }
  </script>
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