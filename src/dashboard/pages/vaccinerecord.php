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

    #recordbutton {}
  </style>
</head>

<body>
  <div class="layer"></div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
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
      <main class="main users chart-page" id="skip-target">
        <div class="container-fluid">
          <div class="card mb-4 mx-5" style="background:none;border:none;">
            <div class="card-body">
              <h2 class="main-title text-center mt-3">Vaccination Records</h2>
              <div class="createstaff-wrapper" id="recordbutton">
                <a class="create-staff-btn ms-5" data-bs-toggle="modal" data-bs-target="#addModal"><button type="create" style="color:white">
                    <i data-feather="plus" aria-hidden="true"></i>Add Vaccine Record </button></a>
              </div>
            </div>
          </div>
          <div class="users-table table-wrapper"><br>
            <?php
            include_once dirname(__DIR__) . '/../models/VaccineRecord.php';
            include_once dirname(__DIR__) . '/../config/db-config.php';
            include_once dirname(__DIR__) . '/../dao/VaccineRecordDAO.php';
            include_once dirname(__DIR__) . '/../services/VaccineRecordServices.php';

            $dao = new VaccineRecordDAO($servername, $database, $username, $password);
            $services = new VaccineRecordServices($dao);

            $records = $services->getAllVaccineRecordsByPetReference($reference);

            if (!is_null($records)) {
            ?>
              <table id="profiles" class="posts-table">
                <thead>
                  <tr class="users-table-info">
                    <th><b>VACCINE RECORD</b></th>
                    <th><b>VACCINE NAME</b></th>
                    <th><b>DATE OF VACCINATION</b></th>
                    <th><b>REVACCINATION DATE</b></th>
                    <th><b>ACTION</b></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>
                      <input type="text" class="form-control filter-input" placeholder="Enter Vaccine Name" data-column="1">
                    </th>
                    <th>
                      <input type="text" class="form-control filter-input" placeholder="Enter Vaccine Date" data-column="2">
                    </th>
                    <th>
                      <input type="text" class="form-control filter-input" placeholder="Enter Revaccination Date" data-column="3" </th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($records as $record) { ?>
                    <tr>
                      <td><img src="data:image/jpeg;base64,<?php echo base64_encode($record->getImage()); ?>" class="rounded-3" style="width: 100px; height: 100px;"></td>
                      <td><?php echo $record->getName(); ?></td>
                      <td><?php echo $record->getVaccineDate()->format("M-d-Y"); ?></td>
                      <td><?php echo $record->getRevaccinationDate()->format("M-d-Y"); ?></td>
                      <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $record->getId(); ?>"><button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"></i></button></a>
                        <a href="/dashboard/pet-profiles/vaccine-records/delete/<?php echo $record->getId(); ?>"><button class="delete-btn transparent-btn" onclick="return confirm('Are you sure you want to delete Vaccine Record ID <?php echo $record->getId(); ?>?');" type="delete" style="color:red; font-size: 25px;">
                            <i class="uil uil-trash-alt"></i></button>
                        </a>
                      </td>
                    </tr>
                    <form method="POST" action="/dashboard/pet-profiles/vaccine-records/update/<?php echo $record->getId(); ?>" enctype="multipart/form-data">
                      <div class="modal fade" id="editModalId<?php echo $record->getId(); ?>" tabindex="-1" aria-labelledby="editrecordmodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editingModal">EDIT VACCINE RECORD</h5>
                              <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="name" class="col-form-label"> VACCINE NAME </label>
                                <input type="text" id="name" class="form-control" name="name" value="<?php echo $record->getName(); ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="date" class="col-form-label"> DATE OF VACCINATION: </label>
                                <input type="date" id="date" class="form-control" name="revaccinationdate" value="<?php echo $record->getVaccineDate()->format("Y-m-d"); ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="revaccination" class="col-form-label"> REVACCINATION DATE </label>
                                <input type="date" id="revaccination" class="form-control" name="revaccination" value="<?php echo $record->getRevaccinationDate()->format("Y-m-d"); ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="image" class="col-form-label"> VACCINE RECORD: </label>
                                <input type="file" id="image" class="form-control" name="image">
                                <input type="hidden" class="form-control" name="old_image" value="<?php echo base64_encode($record->getImage()); ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn" style="background-color:#db6551;color:white;"> Save Changes </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  <?php } ?>
                </tbody>
              </table>
            <?php } else { ?>
              <div class="alert text-light text-center ms-5 me-5" role="alert" style="margin-top:10%;background-color:#db6551">
                No existing Vaccine Records available for this dog.
              </div>
            <?php } ?>
          </div>

        </div>
      </main>
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <form method="POST" action="/dashboard/pet-profiles/vaccine-records/add" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addSlotTitle" style="font-family:'Acme', sans-serif;"> ADD VACCINE RECORD </h5>
            <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
          </div>
          <div class="modal-body">
            <input type="hidden" name="reference" value="<?php echo $reference; ?>">
            <div class="mb-3">
              <label for="information" class="col-form-label"> VACCINE NAME </label>
              <input type="text" class="form-control" name="name" placeholder="Enter VACCINE NAME" required>
            </div>
            <div class="mb-3">
              <label for="name" class="col-form-label"> DATE OF VACCINATION </label>
              <input type="date" class="form-control" name="vaccineDate" required>
            </div>
            <div class="mb-3">
              <label for="information" class="col-form-label"> REVACCINATION DATE </label>
              <input type="date" class="form-control" name="revaccinationDate" required>
            </div>
            <div class="mb-3">
              <label for="image" class="col-form-label"> RECORD IMAGE: </label>
              <input type="file" class="form-control" name="image" required>
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