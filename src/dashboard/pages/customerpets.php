<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <title> DASHBOARD - CUSTOMER PET PROFILES </title>
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</head>

<body>
  <div class="layer"> </div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title text-center mt-3">Customer Pet Profiles</h2>
        </div>
        <div class="users-table table-wrapper">
          <?php
          include_once dirname(__DIR__) . '/../models/PetProfile.php';
          include_once dirname(__DIR__) . '/../config/db-config.php';
          include_once dirname(__DIR__) . '/../database/Database.php';
          include_once dirname(__DIR__) . '/../dao/PetProfileDAO.php';
          include_once dirname(__DIR__) . '/../services/PetProfileServices.php';

          $database = new Database($servername, $database, $username, $password);
          $dao = new PetProfileDAO($database);
          $services = new PetProfileServices($dao);

          $profiles = $services->getCustomerPets();
          if (!empty($profiles)) {
          ?>
            <table id="profiles" class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th><b>DOG PICTURE </b></th>
                  <th><b>DOG NAME </b></th>
                  <th><b>DOG COLOR </b></th>
                  <th><b>DOG TRAIT </b></th>
                  <th><b>OWNER </b></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($profiles as $profile) {
                ?>
                  <tr>
                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="rounded-3" style="width: 100px; height: 100px;"></td>
                    <td><?php echo $profile->getName(); ?></td>
                    <td><?php echo $profile->getColor(); ?></td>
                    <td><?php echo $profile->getTrait(); ?></td>
                    <td><?php echo $profile->getOwnerName(); ?></td>
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
    ?>
      <div class="alert text-light text-center ms-5 me-5" role="alert" style="margin-top:10%;background-color:#db6551">
        No existing Customer Pet Profiles
      </div>
    <?php
          }
    ?>
    <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
    <div class="toast-container top-0 end-0 p-3">
      <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
        <div class="toast-header">
          <img src="/Ohana/src/dashboard/img/main/notification.png" width="25px" height="25px" alt="">
          <strong class="me-auto fs-4"> &nbsp; Notification </strong>
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
  <form method="POST" action="/dashboard/petprofiles/add" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addProfileModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addStaffTitle"> ADD STUD PROFILE </h5>
            <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="col-form-label"> DOG NAME </label>
              <input type="text" class="form-control" name="name" placeholder="Enter Dog Name" required style="background-color:#eed1c2; color:black">
            </div>
            <div class="mb-3">
              <label> DOG TYPE </label><br>
              <label for="rehoming" class="radio-inline"> <input type="radio" id="rehoming" name="type" value="REHOMING"> Rehoming </label>
              <label for="stud" class="radio-inline"> <input type="radio" id="stud" name="type" value="STUD"> Stud </label>
            </div>
            <div class="mb-3">
              <label> DOG GENDER </label><br>
              <label for="sex1" class="radio-inline"> <input type="radio" id="sex1" name="sex" value="MALE"> Male </label>
              <label for="sex2" class="radio-inline"> <input type="radio" id="sex2" name="sex" value="FEMALE"> Female </label>
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
              <label for="yes" class="radio-inline"> <input type="radio" id="yes" name="isVaccinated" value="YES">Yes </label>
              <label for="no" class="radio-inline"> <input type="radio" id="no" name="isVaccinated" value="NO"> No </label>
            </div>
            <div class="mb-3">
              <label for="pcciStatus" class="col-form-label"> PCCI STATUS </label><br>
              <label for="pcci1" class="radio-inline"> <input type="radio" id="pcci1" name="pcciStatus" value="REGISTERED"> Registered </label>
              <label for="pcci2" class="radio-inline"> <input type="radio" id="pcci2" name="pcciStatus" value="PENDING"> Pending </label>
            </div>
            <div class="mb-3">
              <label for="price" class="col-form-label"> PRICE </label>
              <input type="text" class="form-control" name="price" placeholder="Enter Price" required style="background-color:#eed1c2; color:black">
            </div>
            <input type="hidden" class="form-control" name="ownerName" value="OHANA KENNEL BUSINESS">
            <div class="mb-3">
              <label for="image" class="col-form-label"> DOG IMAGE </label><br>
              <input type="file" name="image" id="image" style="background-color:transparent;">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn" id="ToastBtn" style="background-color:#db6551;color:white"> Add Pet </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script>
    $(document).ready(function() {
      $('#profiles').DataTable({
        "searching": true,
        "processing": true,
      });
    });
  </script>
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>