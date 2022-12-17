<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <title> DASHBOARD - CUSTOMER TRANSACTIONS </title>
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

    input[type="date"]:hover::-webkit-calendar-picker-indicator {
      color: red;
    }

    input[type="date"]:hover:after {
      content: " Date Picker ";
      color: #555;
      padding-right: 5px;
    }

    input[type="date"]::-webkit-inner-spin-button {
      /* display: none; <- Crashes Chrome on hover */
      -webkit-appearance: none;
      margin: 0;
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
          <h2 class="main-title text-center mt-3"> Customer Transactions</h2>
        </div>
        <div class="users-table table-wrapper">
          <div class="createstaff-wrapper">
            <button type="submit" data-bs-toggle="modal" data-bs-target="#modalCenter"><i data-feather="bar-chart" aria-hidden="true"></i> Generate Sales Report </button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Sales Report: Select Range</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="date" class="form-label">From:</label>
                      <input class="form-control" type="date" value="2022-12-18" id="date" />
                      <span><i class="fa fa-calendar"></i></span>
                    </div>
                    <div class="col mb-0">
                      <label for="date" class="form-label">To:</label>
                      <input class="form-control" type="date" value="2022-12-18" id="date" />
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" style="background-color:#db6551;color:white;"><a href="/dashboard/sales"> Generate </a></button>
                </div>
              </div>
            </div>
          </div>
          <br>
          <?php
          include_once dirname(__DIR__) . '/../models/Transaction.php';
          include_once dirname(__DIR__) . '/../models/Order.php';
          require dirname(__DIR__) . '/../config/db-config.php';
          require dirname(__DIR__) . '/../dao/LogDAO.php';
          require dirname(__DIR__) . '/../dao/OrderDAO.php';
          require dirname(__DIR__) . '/../dao/TransactionDAO.php';
          require dirname(__DIR__) . '/../services/TransactionServices.php';

          $dao = new TransactionDAO($servername, $database, $username, $password);
          $orderDAO = new OrderDAO($servername, $database, $username, $password);
          $services = new TransactionServices($dao, $orderDAO, null);

          $transactions = $services->getAllTransactions();
          if (!empty($transactions)) {
          ?>
            <table id="transactions" class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th><b>TRANSACTION REFERENCE </b></th>
                  <th><b>EMAIL ADDRESS</b></th>
                  <th><b>NAME OF USER</b></th>
                  <th><b>DATE</b></th>
                  <th><b>STATUS</b></th>
                  <th><b>ACTION</b></th>
                </tr>
                <tr>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Transaction Reference..." data-column="0">
                  </th>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Email Address..." data-column="1">
                  </th>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Full Name..." data-column="2">
                  </th>
                  <th></th>
                  <th>
                    <select data-column="4" class="form-control filter-select">
                      <option value="">Select a status...</option>
                      <option value="COMPLETED">Completed</option>
                      <option value="PENDING">Pending</option>
                      <option value="CANCELLED">Cancelled</option>
                    </select>
                  </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($transactions as $transaction) {
                ?>
                  <tr>
                    <td><?php echo $transaction->getReference(); ?></td>
                    <td><?php echo $transaction->getEmail(); ?></td>
                    <td><?php echo $transaction->getFname() . " " . $transaction->getMname() . " " . $transaction->getLname(); ?></td>
                    <td><?php echo $transaction->getDate()->format('M-d-Y H:i:s'); ?></td>
                    <td><?php echo $transaction->getStatus(); ?></td>
                    <td>
                      <button class="view-btn transparent-btn fs-4" type="view" style="color:#7d605c; margin-right: 15px;" data-bs-toggle="modal" data-bs-target="#viewModalId<?php echo $transaction->getId(); ?>"><i class="uil uil-eye"></i></button>
                      <button class="view-btn transparent-btn fs-4" type="view" style="color:#7d605c; margin-right: 15px;" data-bs-toggle="modal" data-bs-target="#confirmationModalId<?php echo $transaction->getId(); ?>"><i class="uil uil-image-v"></i></button>
                      <button class="edit-btn transparent-btn fs-4" type="edit" style="color:#C0B65A; margin-right: 15px;" data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $transaction->getId(); ?>"><i class="uil uil-edit"></i></button>
                      <div class="modal fade" id="viewModalId<?php echo $transaction->getId(); ?>" tabindex="-1" aria-labelledby="editprofilemodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="viewModal" style="font-family:'Acme', sans-serif;">List of Orders for Transaction #<?php echo $transaction->getId() ?></h5>
                              <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                              <?php
                              $orders = $transaction->getListOfOrders();
                              if (!empty($orders)) {
                                foreach ($orders as $order) {
                              ?>
                                  <div class="card rounded-3 mb-4">
                                    <div class="card-body p-4">
                                      <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col">
                                          <img src="data:image/jpeg;base64,<?php echo base64_encode($order->getImage()); ?>" style="width:200px;height:200px;" class="rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col">
                                          <p class="lead fw-normal mb-2"><?php echo $order->getPetName(); ?></p>
                                        </div>
                                        <div class="col">
                                          <p class="lead fw-normal mb-2"><?php echo $order->getType(); ?></p>
                                        </div>
                                        <div class="col">
                                          <p class="lead fw-normal mb-2"><?php $order->getPrice(); ?></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                              } else {
                                ?>
                                <div class="row m-auto">
                                  There are currently no orders within the transaction.
                                </div>
                              <?php
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="confirmationModalId<?php echo $transaction->getId(); ?>" tabindex="-1" aria-labelledby="editprofilemodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="viewModal">Payment Confirmation for Transaction #<?php echo $transaction->getId() ?></h5>
                              <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                              <?php
                              if (!empty($transaction->getPaymentConfirmation())) {
                              ?>
                                <div class="mb-3">
                                  <img class="h-100 w-100 rounded-4 img-responsive" id="paymentConfirmation" name="paymentConfirmation" src="data:image/jpeg;base64,<?php echo base64_encode($transaction->getPaymentConfirmation()); ?>">
                                </div>
                              <?php
                              } else {
                              ?>
                                <div class="row m-auto">
                                  There is currently no proof of payment sent by <?php echo $transaction->getFname() . " " . $transaction->getMname() . " " . $transaction->getLname(); ?>.
                                </div>
                              <?php
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <form method="POST" action="/dashboard/transactions/update/<?php echo $transaction->getId(); ?>">
                        <div class="modal fade" id="editModalId<?php echo $transaction->getId(); ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editModal" style="font-family:'Acme', sans-serif;"> EDIT TRANSACTION </h5>
                                <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                              </div>
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="fname" class="col-form-label"> TRANSACTION I.D </label>
                                  <input type="text" class="form-control text-dark" name="transactionId" value="<?php echo $transaction->getId(); ?>" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="mname" class="col-form-label"> FULL NAME </label>
                                  <input type="text" class="form-control text-dark" name="accountName" value="<?php echo $transaction->getFname() . " " . $transaction->getMname() . " " . $transaction->getLname(); ?>" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="lname" class="col-form-label"> EMAIL ADDRESS </label>
                                  <input type="text" class="form-control text-dark" name="email" value="<?php echo $transaction->getEmail(); ?>" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="email" class="col-form-label"> CONTACT NUMBER </label>
                                  <input type="email" class="form-control text-dark" name="number" value="<?php echo $transaction->getNumber(); ?>" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="status" class="col-form-label"> Status: </label>
                                  <select class="form-control" name="status" aria-label="Default select example">
                                    <option value="PENDING" <?php if ($transaction->getStatus() == "PENDING") echo "selected"; ?>>PENDING</option>
                                    <option value="COMPLETED" <?php if ($transaction->getStatus() == "COMPLETED") echo "selected"; ?>>COMPLETED</option>
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
              No existing transactions.
            </div>
          <?php
          }
          ?>
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
    unset($_SESSION["msg"]);
  }
  ?>
  <script>
    $(document).ready(function() {
      var table = $('#transactions').DataTable({
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