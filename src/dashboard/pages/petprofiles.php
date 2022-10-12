<!DOCTYPE html>
<html lang="en">

<head>
  <!-- START OF META TAGS-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS-->

  <title> DASHBOARD - PET PROFILES </title>

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
  include_once dirname(__DIR__) . '/../models/PetProfile.php';

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

        <!--  PET PROFILES MAIN CONTENT -->
        <main class="main users chart-page" id="skip-target">
          <div class="container">
            <br>
            <center>
              <h2 class="main-title"> INVENTORY - PET PROFILES </h2>
            </center>
          </div>

          <div class="users-table table-wrapper">
            <div class="search-wrapper">
              <i data-feather="search" aria-hidden="true"></i>
              <input type="text" placeholder=" Search Dog">
            </div>
            <div class="createstaff-wrapper">
              <a class="create-staff-btn" href="#" data-bs-toggle="modal" data-bs-target="#addModal"><button type="create">
                  <i data-feather="plus" aria-hidden="true"></i>
                  Add Pet </button></a>
            </div>
            <br>

            <?php
            $profiles = unserialize($_SESSION["profiles"]);
            if (!empty($profiles)) {
            ?>
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                    <th>DOG PICTURE </th>
                    <th>DOG I.D </th>
                    <th>DOG NAME</th>
                    <th>OWNER</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($profiles as $profile) {
                  ?>
                    <tr>
                      <td><img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" style="width: 100px; height: 100px;"></td>
                      <td><?php echo $profile->getId(); ?></td>
                      <td><?php echo $profile->getName(); ?></td>
                      <td><?php echo $profile->getOwnerName(); ?></td>
                      <td>
                      <button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"> </i> </button>
                        <button class="delete-btn transparent-btn" type="delete" style="color:red; font-size: 25px;"> <i class="uil uil-trash-alt"> </i> </button>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
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
      <?php
            } else {
              echo "<h1>NULL</h1>";
            }
      ?>

      <!-- FOOTER -->
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>

      </div><!-- main wrapper END -->
    </div> <!-- PAGE FLEX END-->
    <!-- MODALS -->

    <!-- BOOTSTRAP LOGOUT MODAL -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby=logoutmodal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Do you want to logout? </h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Make sure to double check the changess made in the system. All the unsaved changes will be lost.
          </div>
          <div class="modal-footer">
            <a href="/landing.html"><button type="button" class="btn btn-secondary ">Logout</button></a>
          </div>
        </div>
      </div>
    </div>

    <!-- ADD PET PROFILE MODAL -->
    <form method="POST" action="/dashboard/petprofiles/add">
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addStaffModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addStaffTitle"> ADD PET PROFILE </h5>
              <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <div class="modal-body">
              <input name="type" type="hidden" value="STAFF">
              <div class="mb-3">
                <label for="name" class="col-form-label"> DOG NAME </label>
                <input type="text" class="form-control" name="name" placeholder="Enter Dog Name" required>
              </div>
              <div class="mb-3">
                <label for="age" class="col-form-label"> DOG AGE</label>
                <input type="text" class="form-control" name="age" placeholder="Enter Dog Age" required>
              </div>

              <div class="mb-3">
                <label> DOG GENDER </label><br> <!-- RADIO BUTTON -->
                <label for="sex1" class="radio-inline"> <input type="radio" id="sex1" name="sex" value="Male"> Male </label>
                <label for="sex2" class="radio-inline"> <input type="radio" id="sex2" name="sex" value="Female"> Female </label>
              </div>

              <div class="mb-3">
                <label for="birthdate" class="col-form-label"> BIRTHDAY </label> <!-- DATE SELECTOR-->
                <input type="date" class="form-control" name="birthdate" required>
              </div>
              <div class="mb-3">
                <label for="color" class="col-form-label"> COLOR/TRAIT </label>
                <input type="text" class="form-control" name="color" placeholder="Enter Color/Trait" required>
              </div>
              <div class="mb-3">

                <label for="isVaccinated" class="col-form-label"> IS VACCINATED </label><br> <!-- RADIO BUTTON -->
                <label for="yes" class="radio-inline"> <input type="radio" id="yes" name="isVaccinated" value="Yes">Yes </label>
                <label for="no" class="radio-inline"> <input type="radio" id="no" name="isVaccinated" value="No"> No </label>
              </div>

              <div class="mb-3">
                <label for="hasPCCI" class="col-form-label"> PCCI STATUS </label><br> <!-- RADIO BUTTON -->

                <label for="pcci1" class="radio-inline"> <input type="radio" id="pcci1" name="pcciStatus" value="Registered"> Registered </label>
                <label for="pcci2" class="radio-inline"> <input type="radio" id="pcci2" name="pcciStatus" value="Pending"> Pending </label>

              </div>
              <div class="mb-3">
                <label for="price" class="col-form-label"> PRICE </label>
                <input type="text" class="form-control" name="price" placeholder="Enter Price" required>
              </div>

              <input type="hidden" class="form-control" name="status"> <!-- FOR OHANA OWNER -->
              <div class="mb-3">
                <label for="image" class="col-form-label"> DOG IMAGE </label><br>
                <input type="file" name="fileToUpload" id="fileToUpload" style="background-color:transparent;">
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary"> Add Pet </button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- DELETE Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Delete Item Confirmation </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this item?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary"> Delete </button>
          </div>
        </div>
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