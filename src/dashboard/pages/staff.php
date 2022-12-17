<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <title> DASHBOARD - STAFF MANAGEMENT </title>
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
          <h2 class="main-title text-center mt-3"> Staff Accounts</h2>
        </div>
        <div class="users-table table-wrapper">

          <?php
          if ($user->getType() == "ADMINISTRATOR") {
          ?>
            <div class="createstaff-wrapper">
              <a class="create-staff-btn" data-bs-toggle="modal" data-bs-target="#addModal"><button type="create" style="color:white"><i data-feather="plus" aria-hidden="true"></i>
                  Add Staff </button></a>
            </div>
          <?php
          }

          include_once dirname(__DIR__) . '/../config/db-config.php';
          include_once dirname(__DIR__) . '/../dao/AccountDAO.php';
          include_once dirname(__DIR__) . '/../services/AccountServices.php';

          $dao = new AccountDAO($servername, $database, $username, $password);
          $services = new AccountServices($dao);
          $staffs = $services->getStaffAccounts();
          if (!empty($staffs)) {
          ?>
            <table id="staff" class="posts-table">
              <thead>
                <tr class="users-table-info">
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
                <tr>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Full Name..." data-column="0">
                  </th>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Email Address..." data-column="1">
                  </th>
                  <th>
                    <select data-column="2" class="form-control filter-select">
                      <option value="">Select a status...</option>
                      <option value="ACTIVE">Active</option>
                      <option value="DISABLED">Disabled</option>
                    </select>
                  </th>
                  <?php
                  if ($user->getType() == "ADMINISTRATOR") {
                  ?>
                    <th></th>
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
                    <td><?php echo $staff->getFullName(); ?></td>
                    <td><?php echo $staff->getEmail(); ?></td>
                    <td><?php echo $staff->getStatus(); ?></td>
                    <?php
                    if ($user->getType() == "ADMINISTRATOR") {
                    ?>
                      <td>
                        <a data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $staff->getId(); ?>"><button class="edit-btn transparent-btn fs-4" type="edit" style="color:#C0B65A; margin-right: 15px;"> <i class="uil uil-edit"> </i> </button></a>
                        <a href="/dashboard/staff/delete/<?php echo $staff->getId(); ?>" type="delete"><button onclick="return confirm('Are you sure you want to delete Account ID <?php echo $staff->getId(); ?>?');" style="background:transparent;color:red"><i class="uil uil-trash-alt fs-4"></i></button></a>
                        <form method="POST" action="/dashboard/staff/update/<?php echo $staff->getId(); ?>">
                          <div class="modal fade" id="editModalId<?php echo $staff->getId(); ?>" tabindex="-1" aria-labelledby="editstaffmodal" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="editingModal"> EDIT STAFF ACCOUNT </h5>
                                  <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="type" value="<?php echo $staff->getType(); ?>">
                                  <div class="row input-group mb-3">
                                    <label for="fname" class="col-3 col-form-label "> First Name: </label>
                                    <input type="text" class="col-9 form-control" name="fname" value="<?php echo $staff->getFname(); ?>" required>
                                  </div>
                                  <div class="row input-group mb-3">
                                    <label for="mname" class="col-3 col-form-label "> Middle Name: </label>
                                    <input type="text" class="col-9 form-control" name="mname" value="<?php echo $staff->getMname(); ?>" required>
                                  </div>
                                  <div class="row input-group mb-3">
                                    <label for="lname" class="col-3 col-form-label "> Surname: </label>
                                    <input type="text" class="col-9 form-control" name="lname" value="<?php echo $staff->getLname(); ?>" required>
                                  </div>
                                  <div class="row input-group mb-3">
                                    <label for="email" class="col-3 col-form-label "> Email Address: </label>
                                    <input type="email" class="col-9 form-control" name="email" value="<?php echo $staff->getEmail(); ?>" required>
                                  </div>
                                  <div class="row input-group mb-3">
                                    <label for="number" class="col-3 col-form-label "> Contact Number: </label>
                                    <span class="col-1 input-group-text" id="contact-no">+63</span>
                                    <input type="text" class="col-8 form-control" name="number" minlength="9" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo str_replace("+63", "", $staff->getNumber()); ?>" required>
                                  </div>
                                  <div class="row input-group mb-3">
                                    <label for="status" class="col-3 col-form-label "> Status: </label>
                                    <select class="form-control" name="status" aria-label="Default select example">
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
            <div class="alert text-light text-center ms-5 me-5" role="alert" style="margin-top:10%;background-color:#db6551">
              No existing Staff Account
            </div>
          <?php
          }
          ?>
        </div>
      </main>
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <form method="POST" action="/dashboard/staff/add">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addStaffModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addStaffTitle" style="font-family:'Acme', sans-serif;"> ADD STAFF ACCOUNT </h5>
            <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
          </div>
          <div class="modal-body">
            <input name="type" type="hidden" value="STAFF">
            <input name="status" type="hidden" value="ACTIVE">
            <div class="mb-3">
              <label for="fname" class="col-form-label"> First Name: </label>
              <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required>
            </div>
            <div class="mb-3">
              <label for="mname" class="col-form-label"> Middle Name (optional): </label>
              <input type="text" class="form-control" name="mname" placeholder="Enter Middle Name">
            </div>
            <div class="mb-3">
              <label for="lname" class="col-form-label"> Surname: </label>
              <input type="text" class="form-control" name="lname" placeholder="Enter Surname" required>
            </div>
            <div class="mb-3">
              <label for="email" class="col-form-label"> Email Address: </label>
              <input type="email" class="form-control" name="email" placeholder="Enter Email Address" required>
            </div>
            <div class="mb-3">
              <label for="number" class="col-form-label"> Contact Number(+63): </label>
              <input type="text" class="form-control" name="number" placeholder="Enter Contact Number" minlength="10" maxlength="10" required>
            </div>
            <div class="mb-3">
              <label for="password" class="col-form-label"> Password: </label>
              <input type="password" class="form-control" name="password" placeholder="Enter Password" minlength="8" maxlength="50" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn" id="ToastBtn" style="background-color:#db6551;color:white"> Add Staff </button>
          </div>
        </div>
      </div>
    </div>
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
    <script>
      $(document).ready(function() {
        var table = $('#staff').DataTable({
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
          alert('test');
          table.column($(this).data('column'))
            .search($(this).val())
            .draw();
        });

        $('.filter-select').change(function() {
          table.column($(this).data('column'))
            .search($(this).val())
            .draw();
        });
      });
    </script>
    <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
    <script src="/Ohana/src/dashboard/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>