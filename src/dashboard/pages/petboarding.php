<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <title> DASHBOARD - PET BOARDING SLOTS </title>
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</head>

<body>
  <div class="layer"></div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title text-center mt-3"> Pet Boarding Slots </h2>
        </div>
        <div class="users-table table-wrapper">
          <!-- <div class="search-wrapper">
            <i data-feather="search" aria-hidden="true"></i>
            <input type="text" placeholder=" Search">
            <button type="filter" class="text-white"> FILTER </button>
            <button type="sort" class="text-white"> SORT </button>
          </div> -->
          <div class="createstaff-wrapper">
            <a class="create-staff-btn" href="#" data-bs-toggle="modal" data-bs-target="#addModal"><button type="create">
                <i data-feather="plus" aria-hidden="true"></i>
                Add Slot </button></a>
          </div>
          <?php
          require_once dirname(__DIR__) . '/../models/BoardingSlot.php';
          $slots = unserialize($_SESSION["slots"]);
          if (!empty($slots)) {
          ?>
            <table id="slots" class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th><b>SLOT I.D</b></th>
                  <th><b>SLOT IMAGE</b></th>
                  <th><b>SLOT NAME</b></th>
                  <th><b>STATUS</b></th>
                  <th><b>ACTION</b></th>
              </thead>
              <tbody>
                <?php
                foreach ($slots as $slot) {
                ?>
                  <tr>
                    <td><?php echo $slot->getId(); ?></td>
                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($slot->getImage()); ?>" class="rounded-3" style="width: 100px; height: 100px;"></td>
                    <td><?php echo $slot->getName(); ?></td>
                    <td><?php echo $slot->getIsAvailable() == 1 ? "AVAILABLE" : "UNAVAILABLE"; ?></td>
                    <td>
                      <a href="" data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $slot->getId(); ?>"><button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"></i></button></a>
                      <a href="/dashboard/petboarding/delete/<?php echo $slot->getId(); ?>"><button class="delete-btn transparent-btn" onclick="return confirm('Are you sure you want to delete Slot ID <?php echo $slot->getId(); ?>?');" type="delete" style="color:red; font-size: 25px;"><i class="uil uil-trash-alt"></i></button></a>
                    </td>
                  </tr>
                  <form method="POST" action="/dashboard/petboarding/update/<?php echo $slot->getId(); ?>" enctype="multipart/form-data">
                    <div class="modal fade" id="editModalId<?php echo $slot->getId(); ?>" tabindex="-1" aria-labelledby="editslotmodal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editingModal">EDIT BOARDING SLOT</h5>
                            <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="name" class="col-form-label"> SLOT NAME: </label>
                              <input type="text" class="form-control" name="name" value="<?php echo $slot->getName(); ?>" required style="background-color:#eed1c2; color:black">
                            </div>
                            <div class="mb-3">
                              <label for="information" class="col-form-label"> SLOT INFORMATION: </label>
                              <input type="text" class="form-control" name="information" value="<?php echo $slot->getInformation(); ?>" required style="background-color:#eed1c2; color:black">
                            </div>
                            <div class="mb-3">
                              <label for="isAvailable" class="col-form-label"> SLOT AVAILABILITY: </label><br>
                              <label for="yes" class="radio-inline"> <input type="radio" id="yes" <?php if ($slot->getIsAvailable() == 1) echo "checked"; ?> name="isAvailable" value="AVAILABLE"> Available </label>
                              <label for="no" class="radio-inline"> <input type="radio" id="no" <?php if ($slot->getIsAvailable() == 0) echo "checked"; ?> name="isAvailable" value="UNAVAILABLE"> Unavailable </label>
                            </div>
                            <div class="mb-3">
                              <label for="petName" class="col-form-label"> PET NAME: </label>
                              <input type="hidden" name="petId" value="<?php echo !is_null($slot->getPetId()) ? $slot->getPetId() : null; ?>">
                              <input disabled type="text" class="form-control" name="petName" value="<?php echo !is_null($slot->getPetName()) ? $slot->getPetName() : "N/A"; ?>">
                            </div>
                            <div class="mb-3">
                              <label for="image" class="col-form-label"> SLOT IMAGE: </label>
                              <input type="file" class="form-control" name="image">
                              <input type="hidden" class="form-control" name="old_image" value="<?php echo base64_encode($slot->getImage()); ?>">
                            </div>
                            <div class="mb-3">
                              <label for="original" class="col-form-label"> ORIGINAL IMAGE </label>
                              <center> <img src="data:image/jpeg;base64,<?php echo base64_encode($slot->getImage()); ?>" id="original" class="mt-3 rounded-3" style="width:200px;height:200px"> </center>
                              <p> NOTE: </p>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn" style="background-color:#db6551;color:white;"> Save Changes </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </form>
                <?php
                }
                ?>
              </tbody>
            </table>
          <?php
          } else {
          ?>
            <div class="alert text-light text-center ms-5 me-5" role="alert" style="margin-top:10%;background-color:#db6551">
              No existing Pet Boarding Slots
            </div>
          <?php
          }
          ?>
        </div>
      </main>
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
  <form method="POST" action="/dashboard/petboarding/add" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addSlotTitle" style="font-family:'Acme', sans-serif;"> ADD PET BOARDING SLOT </h5>
            <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="col-form-label"> SLOT NAME </label>
              <input type="text" class="form-control" name="name" placeholder="Enter Slot Name" required style="background-color:#eed1c2; color:black">
            </div>
            <div class="mb-3">
              <label for="information" class="col-form-label"> SLOT INFORMATION </label>
              <input type="text" class="form-control" name="information" placeholder="Enter Slot Information" required style="background-color:#eed1c2; color:black">
            </div>
            <input type="hidden" class="form-control" name="isAvailable" value="1">
            <div class="mb-3">
              <label for="image" class="col-form-label"> SLOT IMAGE </label><br>
              <input type="file" name="image" style="background-color:transparent;">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn" style="background-color:#db6551;color:white;"> Add Slot </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script>
    $(document).ready(function() {
      $('#slots').DataTable({
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