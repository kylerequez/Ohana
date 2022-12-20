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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background-color: #db6551;
      border: #db6551;
      border-radius: 30px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
      color: white !important;
      background-color: #C0B65A;
      border: #C0B65A;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
      cursor: default;
      color: white !important;
      background-color: #C0B65A;
      box-shadow: none;
      margin-left: 10px;
      margin-right: 10px;
      border-radius: 30px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
      cursor: default;
      color: white !important;
      border: none;
      background: #db6551;
      box-shadow: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      box-sizing: border-box;
      display: inline-block;
      min-width: 1.5em;
      padding: 0.5em 1em;
      margin-left: 2px;
      text-align: center;
      text-decoration: none !important;
      cursor: pointer;
      color: white !important;
      border: 1px solid #db6551;
      border-radius: 30px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background-color: #C0B65A;
    }

    .paginate_button {
      background-color: #db6551;
      border-radius: 30px;
      margin-top: 20px;
    }

    .paginate_button:hover {
      background-color: #C0B65A;
    }

    #logs_next {
      background: #C0B65A;
      border-radius: 30px;
      margin-top: 20px;
      border: none;
    }

    #logs_previous {
      background: #C0B65A;
      border-radius: 30px;
      margin-top: 20px;
      border: none;
    }

    .form-control {
      border-color: #db6551;
      border-style: solid;
      border-width: 2px;
      background-color: white;
    }

    #recordbtn {
      width: 150px;
      height: 50px;
    }
  </style>
</head>

<body>
  <div class="layer"> </div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title text-center mt-3">Ohana Pet Profiles</h2>
        </div>
        <div class="users-table table-wrapper">
          <div class="createstaff-wrapper">
            <a class="create-staff-btn" data-bs-toggle="modal" data-bs-target="#addModal"><button type="create" style="color:white">
                <i data-feather="plus" aria-hidden="true"></i>Add Pet </button></a>
          </div>
          <br>
          <?php
          include_once dirname(__DIR__) . '/../models/PetProfile.php';
          include_once dirname(__DIR__) . '/../config/db-config.php';
          include_once dirname(__DIR__) . '/../dao/PetProfileDAO.php';
          include_once dirname(__DIR__) . '/../dao/StudHistoryDAO.php';
          include_once dirname(__DIR__) . '/../services/PetProfileServices.php';

          $dao = new PetProfileDAO($servername, $database, $username, $password);
          $history = new StudHistoryDAO($servername, $database, $username, $password);
          $services = new PetProfileServices($dao, $history);

          $profiles = $services->getOhanaPets();
          if (!empty($profiles)) {
          ?>
            <table id="profiles" class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th><b>DOG TYPE </b></th>
                  <th><b>DOG TRAIT </b></th>
                  <th><b>DOG PICTURE </b></th>
                  <th><b>DOG NAME </b></th>
                  <th><b>ACTION </b></th>
                </tr>
                <tr>
                  <th>
                    <select data-column="0" class="form-control filter-select">
                      <option value="">Select a Pet Type...</option>
                      <option value="REHOMING">Rehoming</option>
                      <option value="STUD">Stud</option>
                    </select>
                  </th>
                  <th>
                    <select data-column="1" class="form-control filter-select">
                      <option value="">Select a Pet Trait...</option>
                      <option class="text-center" style="color:#DB6551" disabled>Standard</option>
                      <option value="Fawn">Fawn</option>
                      <option value="Sable">Sable</option>
                      <option value="Brindle">Brindle</option>
                      <option class="text-center" style="color:#DB6551" disabled>Exotic</option>
                      <option value="Blue">Blue</option>
                      <option value="Chocolate">Chocolate</option>
                      <option value="Lilac">Lilac</option>
                      <option value="Isabella">Isabella</option>
                      <option value="Newshade Isabella">Newshade Isabella</option>
                      <option value="Newshade">Newshade</option>
                      <option value="Black Tan">Black Tan</option>
                      <option value="Blue Tan">Blue Tan</option>
                      <option value="Choco Tan">Choco Tan</option>
                      <option value="Isabella Tan">Isabella Tan</option>
                      <option value="Newshade Isabella Tan">Newshade Isabella Tan</option>
                      <option class="text-center" style="color:#DB6551" disabled>Platinum</option>
                      <option value="Lilac Plat">Lilac Plat</option>
                      <option value="Champaigne Plat">Champaigne Plat</option>
                      <option value="Newshade Plat">Newshade Plat</option>
                      <option value="Merle">Merle</option>
                    </select>
                  </th>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Pet Name..." data-column="2">
                  </th>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Owner Name..." data-column="3">
                  </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($profiles as $profile) {
                ?>
                  <tr>
                    <td><?php echo $profile->getType(); ?></td>
                    <td><?php echo $profile->getTrait(); ?></td>
                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="rounded-3" style="width: 100px; height: 100px;"></td>
                    <td><?php echo $profile->getName(); ?></td>
                    <td>
                      <?php if ($profile->getType() == 'STUD') { ?>
                        <a href="/dashboard/stud-history/<?php echo $profile->getReference(); ?>/<?php echo $profile->getName(); ?>" style="color:#7d605c; margin-right: 15px;  font-size: 25px;"><i class="uil uil-eye"></i></a>
                      <?php } ?>
                      <a data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $profile->getId(); ?>"><button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"></i></button></a>
                      <a href="/dashboard/pet-profiles/delete/<?php echo $profile->getId(); ?>"><button class="delete-btn transparent-btn" onclick="return confirm('Are you sure you want to delete Pet Profile ID <?php echo $profile->getId(); ?>?');" type="delete" style="color:red; font-size: 25px;"><i class="uil uil-trash-alt"></i></button></a>
                      <form method="POST" action="/dashboard/pet-profiles/update/<?php echo $profile->getId(); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="reference" value="<?php echo $profile->getReference(); ?>">
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
                                  <input type="text" class="form-control" name="name" value="<?php echo $profile->getName(); ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="type" class="col-form-label"> DOG TYPE </label>
                                  <select class="form-control" name="type">
                                    <option value="REHOMING" for="rehoming" id="rehoming" <?php if ($profile->getType() == "REHOMING") echo "selected"; ?>>Rehoming</option>
                                    <option value="STUD" for="stud" id="stud" <?php if ($profile->getType() == "STUD") echo "selected"; ?>>Stud</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="birthdate" class="col-form-label"> BIRTHDAY: </label>
                                  <input type="date" class="form-control" name="birthdate" value="<?php echo $profile->getBirthdate()->format('Y-m-d'); ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="sex" class="col-form-label"> DOG GENDER </label><br>
                                  <select class="form-control" name="sex">
                                    <option value="Male" <?php if ($profile->getSex() == "MALE") echo "selected"; ?>>Male</option>
                                    <option value="Female" <?php if ($profile->getSex() == "FEMALE") echo "selected"; ?>>Female</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="color" class="col-form-label"> COLOR: </label>
                                  <input type="text" class="form-control" name="color" value="<?php echo $profile->getColor(); ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="trait" class="col-form-label"> TRAIT: </label>
                                  <select class="form-control" name="trait" required>
                                    <option class="text-center" style="color:#DB6551" disabled>Standard</option>
                                    <option value="Fawn" <?php if ($profile->getTrait() == 'Fawn') echo 'selected'; ?>>Fawn</option>
                                    <option value="Sable" <?php if ($profile->getTrait() == 'Sable') echo 'selected'; ?>>Sable</option>
                                    <option value="Brindle" <?php if ($profile->getTrait() == 'Brindle') echo 'selected'; ?>>Brindle</option>
                                    <option class="text-center" style="color:#DB6551" disabled>Exotic</option>
                                    <option value="Blue" <?php if ($profile->getTrait() == 'Blue') echo 'selected'; ?>>Blue</option>
                                    <option value="Chocolate" <?php if ($profile->getTrait() == 'Chocolate') echo 'selected'; ?>>Chocolate</option>
                                    <option value="Lilac" <?php if ($profile->getTrait() == 'Lilac') echo 'selected'; ?>>Lilac</option>
                                    <option value="Isabella" <?php if ($profile->getTrait() == 'Isabella') echo 'selected'; ?>>Isabella</option>
                                    <option value="Newshade Isabella" <?php if ($profile->getTrait() == 'Newshade Isabella') echo 'selected'; ?>>Newshade Isabella</option>
                                    <option value="Newshade" <?php if ($profile->getTrait() == 'Newshade') echo 'selected'; ?>>Newshade</option>
                                    <option value="Black Tan" <?php if ($profile->getTrait() == 'Black Tan') echo 'selected'; ?>>Black Tan</option>
                                    <option value="Blue Tan" <?php if ($profile->getTrait() == 'Blue Tan') echo 'selected'; ?>>Blue Tan</option>
                                    <option value="Choco Tan" <?php if ($profile->getTrait() == 'Choco Tan') echo 'selected'; ?>>Choco Tan</option>
                                    <option value="Isabella Tan" <?php if ($profile->getTrait() == 'Isabella Tan') echo 'selected'; ?>>Isabella Tan</option>
                                    <option value="Newshade Isabella Tan" <?php if ($profile->getTrait() == 'Newshade Isabella Tan') echo 'Newshade Isabella Tan'; ?>>Newshade Isabella Tan</option>
                                    <option class="text-center" style="color:#DB6551" disabled>Platinum</option>
                                    <option value="Lilac Plat" <?php if ($profile->getTrait() == 'Lilac Plat') echo 'selected'; ?>>Lilac Plat</option>
                                    <option value="Champaigne Plat" <?php if ($profile->getTrait() == 'Champaigne Plat') echo 'selected'; ?>>Champaigne Plat</option>
                                    <option value="Newshade Plat" <?php if ($profile->getTrait() == 'Newshade Plat') echo 'selected'; ?>>Newshade Plat</option>
                                    <option value="Merle" <?php if ($profile->getTrait() == 'Merle') echo 'selected'; ?>>Merle</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="isVaccinated" class="col-form-label"> IS VACCINATED </label>
                                  <select class="form-control" name="isVaccinated">
                                    <option <?php if ($profile->getIsVaccinated() == 1) echo "selected"; ?> name="isVaccinated" value="1">Yes </option>
                                    <option <?php if ($profile->getIsVaccinated() == 0) echo "selected"; ?> name="isVaccinated" value="0"> No </option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="pcciStatus" class="col-form-label"> PCCI STATUS </label><br>
                                  <select class="form-control" name="pcciStatus">
                                    <option <?php if ($profile->getPcciStatus() == "REGISTERED") echo "selected"; ?> name="pcciStatus" value="Registered"> Registered </option>
                                    <option <?php if ($profile->getPcciStatus() == "PENDING") echo "selected"; ?> name="pcciStatus" value="Pending"> Pending </option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="ownerName" class="col-form-label"> OWNER NAME: </label>
                                  <input type="hidden" name="accountId" value="<?php echo $profile->getAccountId(); ?>">
                                  <input type="text" class="form-control" name="ownerName" value="<?php echo $profile->getOwnerName(); ?>" readonly="readonly">
                                </div>
                                <div class="mb-3">
                                  <label for="price" class="col-form-label"> PRICE: </label>
                                  <input type="text" class="form-control" name="price" value="<?php echo $profile->getPrice(); ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="status" class="col-form-label"> STATUS: </label>
                                  <select class="form-control" id="status" name="status">
                                    <option value="AVAILABLE" <?php if ($profile->getStatus() == "AVAILABLE") echo "selected"; ?>>Available</option>
                                    <option value="UNAVAILABLE" <?php if ($profile->getStatus() == "UNAVAILABLE") echo "selected"; ?>>Unavailable</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="dogimage" class="col-form-label"> DOG IMAGE: </label>
                                  <input type="file" class="form-control" name="image">
                                  <input type="hidden" class="form-control" name="old_image" value="<?php echo base64_encode($profile->getImage()); ?>">
                                </div>
                                <div class="mb-3">
                                  <label for="original" class="col-form-label"> ORIGINAL IMAGE: </label>
                                  <center> <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="mt-3 rounded-3" style="width:200px;height:200px"> </center>
                                  <p> NOTE: Current image will retain if there is no new image file chosen. </p>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn text-light" style="background-color:#db6551"> Save Changes </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </td>
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
      <div class="container-fluid">
        <div class="alert text-light text-center ms-5 me-5" role="alert" style="margin-top:10%;background-color:#db6551">
          No existing customer Pet Profiles
        </div>
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
  <form method="POST" action="/dashboard/pet-profiles/add" enctype="multipart/form-data">
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
              <input type="text" class="form-control" name="name" placeholder="Enter Dog Name" required>
            </div>
            <div class="mb-3">
              <label> DOG TYPE </label>
              <select class="form-control" name="type">
                <option value="REHOMING">Rehoming</option>
                <option value="STUD">Stud</option>
              </select>
            </div>
            <div class="mb-3">
              <label> DOG GENDER </label>
              <select class="form-control" name="sex">
                <option value="MALE">Male</option>
                <option value="FEMALE">Female</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="birthdate" class="col-form-label"> BIRTHDAY </label>
              <input type="date" class="form-control" name="birthdate" required>
            </div>
            <div class="mb-3">
              <label for="color" class="col-form-label"> COLOR </label>
              <input type="text" class="form-control" name="color" placeholder="Enter Color" required>
            </div>
            <div class="mb-3">
              <label for="trait" class="col-form-label"> TRAIT: </label>
              <select class="form-control" name="trait" required>
                <option class="text-center" style="color:#DB6551" disabled>Standard</option>
                <option value="Fawn">Fawn</option>
                <option value="Sable">Sable</option>
                <option value="Brindle">Brindle</option>
                <option class="text-center" style="color:#DB6551" disabled>Exotic</option>
                <option value="Blue">Blue</option>
                <option value="Chocolate">Chocolate</option>
                <option value="Lilac">Lilac</option>
                <option value="Isabella">Isabella</option>
                <option value="Newshade Isabella">Newshade Isabella</option>
                <option value="Newshade">Newshade</option>
                <option value="Black Tan">Black Tan</option>
                <option value="Blue Tan">Blue Tan</option>
                <option value="Choco Tan">Choco Tan</option>
                <option value="Isabella Tan">Isabella Tan</option>
                <option value="Newshade Isabella Tan">Newshade Isabella Tan</option>
                <option class="text-center" style="color:#DB6551" disabled>Platinum</option>
                <option value="Lilac Plat">Lilac Plat</option>
                <option value="Champaigne Plat">Champaigne Plat</option>
                <option value="Newshade Plat">Newshade Plat</option>
                <option value="Merle">Merle</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="isVaccinated" class="col-form-label"> IS VACCINATED </label>
              <select class="form-control" name="isVaccinated">
                <option name="isVaccinated" value="1">Yes </option>
                <option name="isVaccinated" value="0"> No </option>
              </select>
            </div>
            <div class="mb-3">
              <label for="pcciStatus" class="col-form-label"> PCCI STATUS </label>
              <select class="form-control" name="pcciStatus">
                <option value="REGISTERED"> Registered </option>
                <option value="PENDING"> Pending </option>
              </select>
            </div>
            <div class="mb-3">
              <label for="price" class="col-form-label"> PRICE </label>
              <input type="text" class="form-control" name="price" placeholder="Enter Price" required>
            </div>
            <input type="hidden" class="form-control" name="ownerName" value="OHANA KENNEL BUSINESS">
            <div class="mb-3">
              <label for="dogimage" class="col-form-label"> DOG IMAGE: </label>
              <input type="file" class="form-control" name="image">
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
    var table = $('#profiles').DataTable({
      orderCellsTop: true,
      fixedHeader: true,
      searching: true,
      responsive: true,
      initComplete: function() {
        var api = this.api();
        api
          .columns()
          .eq(0)
          .each(function(colIdx) {
            var cell = $('.filters th').eq(
              $(api.column(colIdx).header()).index()
            );
            var title = $(cell).text();
            $(cell).html('<input type="text" placeholder="' + title + '" />');
            $(
                'input',
                $('.filters th').eq($(api.column(colIdx).header()).index())
              )
              .off('keyup change')
              .on('change', function(e) {
                $(this).attr('title', $(this).val());
                var regexr = '({search})';
                var cursorPosition = this.selectionStart;
                api
                  .column(colIdx)
                  .search(
                    this.value != '' ?
                    regexr.replace('{search}', '(((' + this.value + ')))') :
                    '',
                    this.value != '',
                    this.value == ''
                  )
                  .draw();
              })
              .on('keyup', function(e) {
                e.stopPropagation();
                $(this).trigger('change');
                $(this)
                  .focus()[0]
                  .setSelectionRange(cursorPosition, cursorPosition);
              });
          });
      },
    });

    $('.filter-input').keyup(function() {
      table.column($(this).data('column'))
        .search($(this).val())
        .draw();
    });

    $('.filter-select').change(function() {
      table.column($(this).data('column'))
        .search($(this).val())
        .draw();
    });
  </script>
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>