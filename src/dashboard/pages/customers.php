<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <title> DASHBOARD - USER MANAGEMENT </title>
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
        <div class="container">
          <h2 class="main-title text-center mt-3">Registered User Accounts</h2>
        </div>
        <div class="users-table table-wrapper">
          <?php
          include_once dirname(__DIR__) . '/../config/db-config.php';
          include_once dirname(__DIR__) . '/../dao/AccountDAO.php';
          include_once dirname(__DIR__) . '/../services/AccountServices.php';

          $dao = new AccountDAO($servername, $database, $username, $password);
          $services = new AccountServices($dao);
          $users = $services->getUserAccounts();
          if (!empty($users)) {
          ?>
            <table id="customers">
              <thead>
                <tr class="users-table-info">
                  <th><b>NAME OF USER</b></th>
                  <th><b>EMAIL ADDRESS</b></th>
                  <th><b>CONTACT NUMBER</b></th>
                  <th><b>STATUS</b></th>
                </tr>
                <tr>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Full Name..." data-column="0">
                  </th>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Email Address..." data-column="1">
                  </th>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Email Address..." data-column="2">
                  </th>
                  <th>
                    <select data-column="3" class="form-control filter-select">
                      <option value="">Select a status...</option>
                      <option value="ACTIVE">Active</option>
                      <option value="DISABLED">Disabled</option>
                      <option value="UNREGISTERED">Unregistered</option>
                    </select>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($users as $user) {
                ?>
                  <tr>
                    <td>
                      <?php echo $user->getFullName(); ?>
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <?php echo $user->getEmail(); ?>
                      </div>
                    </td>
                    <td>
                      <?php echo $user->getNumber(); ?>
                    </td>
                    <td>
                      <?php echo $user->getStatus(); ?>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          <?php
          } else {
          ?>
            <div class="alert text-light text-center ms-5 me-5" role="alert" style="margin-top:10%;background-color:#db6551;">
              No existing Registered Users
            </div>
          <?php
          }
          ?>
        </div>
      </main>
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      var table = $('#customers').DataTable({
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
    });
  </script>
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>