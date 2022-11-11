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
                    <th><b>DOG I.D </b></th>
                    <th><b>DOG PICTURE </b></th>
                    <th><b>DOG NAME </b></th>
                    <th><b>OWNER </b></th>
                    <th><b>ACTION </b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($profiles as $profile) {
                  ?>
                    <tr>
                      <td><?php echo $profile->getId(); ?></td>
                      <td><img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" style="width: 100px; height: 100px;"></td>
                      <td><?php echo $profile->getName(); ?></td>
                      <td><?php echo $profile->getOwnerName(); ?></td>
                      <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $profile->getId(); ?>"><button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"></i></button></a>
                        <a href="/dashboard/petprofiles/delete/<?php echo $profile->getId(); ?>"><button class="delete-btn transparent-btn" onclick="return confirm('Are you sure you want to delete Pet Profile ID <?php echo $profile->getId(); ?>?');" type="delete" style="color:red; font-size: 25px;"><i class="uil uil-trash-alt"></i></button></a>
                      </td>
                      <!-- EDIT POP UP MODAL -->
                      <form method="POST" action="/dashboard/petprofiles/update/<?php echo $profile->getId(); ?>" enctype="multipart/form-data">
                        <div class="modal fade" id="editModalId<?php echo $profile->getId(); ?>" tabindex="-1" aria-labelledby="editprofilemodal" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editingModal">EDIT PET PROFILE</h5>
                                <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                              </div>
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="name" class="col-form-label">DOG NAME:</label>
                                  <input type="text" class="form-control" name="name" value="<?php echo $profile->getName(); ?>" required style="background-color:#eed1c2;">
                                </div>
                                <div class="mb-3">
                                  <label for="sex" class="col-form-label"> BIRTHDAY: </label>
                                  <input type="date" class="form-control" name="birthdate" value="<?php echo $profile->getBirthdate()->format('Y-m-d'); ?>" required style="background-color:#eed1c2;">
                                </div>
                                <div class="mb-3">
                                  <label> DOG GENDER </label><br>
                                  <label for="sex1" class="radio-inline"> <input type="radio" id="sex1" <?php if ($profile->getSex() == "MALE") echo "checked"; ?> name="sex" value="Male"> Male </label>
                                  <label for="sex2" class="radio-inline"> <input type="radio" id="sex2" <?php if ($profile->getSex() == "FEMALE") echo "checked"; ?> name="sex" value="Female"> Female </label>
                                </div>
                                <div class="mb-3">
                                  <label for="color" class="col-form-label"> COLOR: </label>
                                  <input type="text" class="form-control" name="color" value="<?php echo $profile->getColor(); ?>" required style="background-color:#eed1c2;">
                                </div>
                                <div class="mb-3">
                                  <label for="trait" class="col-form-label"> TRAIT: </label>
                                  <input type="text" class="form-control" name="trait" value="<?php echo $profile->getTrait(); ?>" required style="background-color:#eed1c2;">
                                </div>
                                <div class="mb-3">
                                  <label for="isVaccinated" class="col-form-label"> IS VACCINATED </label><br>
                                  <label for="yes" class="radio-inline"> <input type="radio" id="yes" <?php if ($profile->getIsVaccinated() == 1) echo "checked"; ?> name="isVaccinated" value="Yes">Yes </label>
                                  <label for="no" class="radio-inline"> <input type="radio" id="no" <?php if ($profile->getIsVaccinated() == 0) echo "checked"; ?> name="isVaccinated" value="No"> No </label>
                                </div>
                                <div class="mb-3">
                                  <label for="pcciStatus" class="col-form-label"> PCCI STATUS </label><br>
                                  <label for="pcci1" class="radio-inline"> <input type="radio" id="pcci1" <?php if ($profile->getPcciStatus() == "REGISTERED") echo "checked"; ?> name="pcciStatus" value="Registered"> Registered </label>
                                  <label for="pcci2" class="radio-inline"> <input type="radio" id="pcci2" <?php if ($profile->getPcciStatus() == "PENDING") echo "checked"; ?> name="pcciStatus" value="Pending"> Pending </label>
                                </div>
                                <div class="mb-3">
                                  <label for="ownerName" class="col-form-label"> OWNER NAME: </label>
                                  <input type="hidden" name="accountId" value="<?php echo $profile->getAccountId(); ?>">
                                  <input type="disabled" class="form-control" name="ownerName" value="<?php echo $profile->getOwnerName(); ?>" required style="background-color:#eed1c2;">
                                </div>
                                <div class="mb-3">
                                  <label for="price" class="col-form-label"> PRICE: </label>
                                  <input type="text" class="form-control" name="price" value="<?php echo $profile->getPrice(); ?>" required style="background-color:#eed1c2;">
                                </div>
                                <div class="mb-3">
                                  <label for="status" class="col-form-label"> STATUS: </label>
                                  <input type="text" class="form-control" name="status" value="<?php echo $profile->getStatus(); ?>" required style="background-color:#eed1c2;">
                                </div>
                                <div class="mb-3">
                                  <label for="fname" class="col-form-label"> DOG IMAGE: </label>
                                  <input type="file" class="form-control" name="image">
                                  <input type="hidden" class="form-control" name="old_image" value="<?php echo base64_encode($profile->getImage()); ?>">
                                  <!-- <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>"> -->
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn" style="background-color:#db6551"> Save Changes </button>
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
          </div>
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

    <!-- BOOTSTRAP LOGOUT MODAL -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutmodal" aria-hidden="true">
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
    <form method="POST" action="/dashboard/petprofiles/add" enctype="multipart/form-data">
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addProfileModal" aria-hidden="true">
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
                <input type="text" class="form-control" name="name" placeholder="Enter Dog Name" required style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label> DOG GENDER </label><br>
                <label for="sex1" class="radio-inline"> <input type="radio" id="sex1" name="sex" value="Male"> Male </label>
                <label for="sex2" class="radio-inline"> <input type="radio" id="sex2" name="sex" value="Female"> Female </label>
              </div>
              <div class="mb-3">
                <label for="birthdate" class="col-form-label"> BIRTHDAY </label>
                <input type="date" class="form-control" name="birthdate" required style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="color" class="col-form-label"> COLOR </label>
                <input type="text" class="form-control" name="color" placeholder="Enter Color" required style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="trait" class="col-form-label"> TRAIT: </label>
                <input type="text" class="form-control" name="trait" placeholder="Enter Trait" required style="background-color:#eed1c2;">
              </div>
              <div class="mb-3">
                <label for="isVaccinated" class="col-form-label"> IS VACCINATED </label><br>
                <label for="yes" class="radio-inline"> <input type="radio" id="yes" name="isVaccinated" value="Yes">Yes </label>
                <label for="no" class="radio-inline"> <input type="radio" id="no" name="isVaccinated" value="No"> No </label>
              </div>
              <div class="mb-3">
                <label for="pcciStatus" class="col-form-label"> PCCI STATUS </label><br>
                <label for="pcci1" class="radio-inline"> <input type="radio" id="pcci1" name="pcciStatus" value="Registered"> Registered </label>
                <label for="pcci2" class="radio-inline"> <input type="radio" id="pcci2" name="pcciStatus" value="Pending"> Pending </label>
              </div>
              <div class="mb-3">
                <label for="price" class="col-form-label"> PRICE </label>
                <input type="text" class="form-control" name="price" placeholder="Enter Price" required style="background-color:#eed1c2; color:black">
              </div>
              <input type="hidden" class="form-control" name="ownerName" value="Ohana">
              <div class="mb-3">
                <label for="image" class="col-form-label"> DOG IMAGE </label><br>
                <input type="file" name="image" id="image" style="background-color:transparent;">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn" id="ToastBtn" style="background-color:#db6551"> Add Pet </button>
            </div>
          </div>
        </div>
      </div>
    </form>

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