<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <title> DASHBOARD - PET PROFILES </title>
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
</head>

<body>
  <div class="layer"> </div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title text-center mt-3">PET PROFILES</h2>
        </div>
        <div class="users-table table-wrapper">
          <div class="search-wrapper">
            <i data-feather="search" aria-hidden="true"></i>
            <input type="text" placeholder=" Search Dog">
          </div>
          <div class="createstaff-wrapper">
            <a class="create-staff-btn" href="#" data-bs-toggle="modal" data-bs-target="#addModal"><button type="create" style="color:white">
                <i data-feather="plus" aria-hidden="true"></i>
                Add Pet </button></a>
          </div>
          <br>
          <?php
          include_once dirname(__DIR__) . '/../models/PetProfile.php';
          $profiles = unserialize($_SESSION["profiles"]);
          if (!isset($_GET['page'])) {
            $current_page = 1;
          } else {
            $current_page = $_GET['page'];
          }
          $results_per_page = _RESOURCE_PER_PAGE_;
          $count = $_SESSION["totalProfiles"];
          $number_of_page = ceil($count / $results_per_page) > 1 ? ceil($count / $results_per_page) : 1;
          if (!empty($profiles)) {
          ?>
            <table class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th><b>DOG I.D </b></th>
                  <th><b>DOG TYPE </b></th>
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
                    <td><?php echo $profile->getType(); ?></td>
                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="rounded-3" style="width: 100px; height: 100px;"></td>
                    <td><?php echo $profile->getName(); ?></td>
                    <td><?php echo $profile->getOwnerName(); ?></td>
                    <td>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $profile->getId(); ?>"><button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"></i></button></a>
                      <a href="/dashboard/petprofiles/delete/<?php echo $profile->getId(); ?>?page=<?php echo $current_page; ?>&limit=<?php echo $results_per_page; ?>&offset=<?php echo ($current_page == 1) ? 0 : $results_per_page * ($current_page - 1) ?>"><button class="delete-btn transparent-btn" onclick="return confirm('Are you sure you want to delete Pet Profile ID <?php echo $profile->getId(); ?>?');" type="delete" style="color:red; font-size: 25px;"><i class="uil uil-trash-alt"></i></button></a>
                    </td>
                    <form method="POST" action="/dashboard/petprofiles/update/<?php echo $profile->getId(); ?>?page=<?php echo $current_page; ?>&limit=<?php echo $results_per_page; ?>&offset=<?php echo ($current_page == 1) ? 0 : $results_per_page * ($current_page - 1) ?>" enctype="multipart/form-data">
                      <div class="modal fade" id="editModalId<?php echo $profile->getId(); ?>" tabindex="-1" aria-labelledby="editprofilemodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editingModal" style="font-family:'Acme', sans-serif;">EDIT PET PROFILE</h5>
                              <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="name" class="col-form-label">DOG NAME:</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $profile->getName(); ?>" required style="background-color:#eed1c2;">
                              </div>
                              <div class="mb-3">
                                <label for="type" class="col-form-label"> DOG TYPE </label><br>
                                <label for="rehoming" class="radio-inline"> <input type="radio" id="rehoming" <?php if ($profile->getType() == "REHOMING") echo "checked"; ?> name="type" value="REHOMING">Rehoming</label>
                                <label for="stud" class="radio-inline"> <input type="radio" id="stud" <?php if ($profile->getType() == "STUD") echo "checked"; ?> name="type" value="STUD">Stud</label>
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
                                <label for="dogimage" class="col-form-label"> DOG IMAGE: </label>
                                <input type="file" class="form-control" name="image">
                                <input type="hidden" class="form-control" name="old_image" value="<?php echo base64_encode($profile->getImage()); ?>">
                              </div>
                              <div class="mb-3">
                                <label for="original" class="col-form-label"> ORIGINAL IMAGE: </label>
                                <center> <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="mt-3 rounded-3" style="width:200px;height:200px"> </center>
                                <p> NOTE:</p>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn text-light" style="background-color:#db6551"> Save Changes </button>
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
                <li class="page-item <?php echo ($current_page == $page) ? "next-page" : "current-page"; ?>"><a class="page-link" href="/dashboard/petprofiles/get?page=<?php echo $page ?>&limit=<?php echo $results_per_page ?>&offset=<?php echo ($page == 1) ? 0 : $results_per_page * ($page - 1) ?>"><?php echo $page ?></a></li>
              <?php
              }
              ?>
            </div>
        </div>
      </main>
    <?php
          } else {
    ?>
      <div class="alert text-light text-center ms-5 me-5" role="alert" style="margin-top:10%;background-color:#db6551">
        No existing Pet Profiles
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
  <form method="POST" action="/dashboard/petprofiles/add?page=<?php echo $current_page; ?>&limit=<?php echo $results_per_page; ?>&offset=<?php echo ($current_page == 1) ? 0 : $results_per_page * ($current_page - 1) ?>" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addProfileModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addStaffTitle"> ADD PET PROFILE </h5>
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
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>

</html>