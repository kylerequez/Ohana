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
            <button type="create"><i data-feather="bar-chart" aria-hidden="true"></i><a class="generate-sales-btn" href="/dashboard/sales"> Generate Sales Report </a></button>
            <button type="create"><i data-feather="file-text" aria-hidden="true"></i><a class="export-btn" href="##"> Export Report </a></button>
          </div>
          <br>
          <?php
          include_once dirname(__DIR__) . '/../models/Transaction.php';
          include_once dirname(__DIR__) . '/../models/Order.php';
          if (!isset($_GET['page'])) {
            $current_page = 1;
          } else {
            $current_page = $_GET['page'];
          }
          $results_per_page = _RESOURCE_PER_PAGE_;
          $count = $_SESSION["totalTransactions"];
          $number_of_page = ceil($count / $results_per_page) > 1 ? ceil($count / $results_per_page) : 1;
          $transactions = unserialize($_SESSION["transactions"]);
          if (!empty($transactions)) {
          ?>
            <table class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th><b>TRANSACTION I.D </b></th>
                  <th><b>EMAIL ADDRESS</b></th>
                  <th><b>NAME OF USER</b></th>
                  <th><b>DATE</b></th>
                  <th><b>STATUS</b></th>
                  <th><b>ACTION</b></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($transactions as $transaction) {
                ?>
                  <tr>
                    <td><?php echo $transaction->getId(); ?></td>
                    <td><?php echo $transaction->getEmail(); ?></td>
                    <td><?php echo $transaction->getFname() . " " . $transaction->getMname() . " " . $transaction->getLname(); ?></td>
                    <td><?php echo $transaction->getDate()->format('M-d-Y H:i:s'); ?></td>
                    <td><?php echo $transaction->getStatus(); ?></td>
                    <td>
                      <button class="view-btn transparent-btn fs-4" type="view" style="color:#7d605c; margin-right: 15px;" data-bs-toggle="modal" data-bs-target="#viewModalId<?php echo $transaction->getId(); ?>"><i class="uil uil-eye"></i></button>
                      <button class="view-btn transparent-btn fs-4" type="view" style="color:#7d605c; margin-right: 15px;" data-bs-toggle="modal" data-bs-target="#confirmationModalId<?php echo $transaction->getId(); ?>"><i class="uil uil-image-v"></i></button>
                      <button class="edit-btn transparent-btn fs-4" type="edit" style="color:#C0B65A; margin-right: 15px;" data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $transaction->getId(); ?>"><i class="uil uil-edit"></i></button>
                    </td>
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
                    <form method="POST" action="/dashboard/transactions/update/<?php echo $transaction->getId(); ?>?page=<?php echo $current_page; ?>&limit=<?php echo $results_per_page; ?>&offset=<?php echo ($current_page == 1) ? 0 : $results_per_page * ($current_page - 1) ?>">
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
                                <input type="text" class="form-control text-dark" name="transactionId" value="<?php echo $transaction->getId(); ?>" disabled style="background-color:#eed1c2; ">
                              </div>
                              <div class="mb-3">
                                <label for="mname" class="col-form-label"> FULL NAME </label>
                                <input type="text" class="form-control text-dark" name="accountName" value="<?php echo $transaction->getFname() . " " . $transaction->getMname() . " " . $transaction->getLname(); ?>" disabled style="background-color:#eed1c2; ">
                              </div>
                              <div class="mb-3">
                                <label for="lname" class="col-form-label"> EMAIL ADDRESS </label>
                                <input type="text" class="form-control text-dark" name="email" value="<?php echo $transaction->getEmail(); ?>" disabled style="background-color:#eed1c2; ">
                              </div>
                              <div class="mb-3">
                                <label for="email" class="col-form-label"> CONTACT NUMBER </label>
                                <input type="email" class="form-control text-dark" name="number" value="<?php echo $transaction->getNumber(); ?>" disabled style="background-color:#eed1c2; ">
                              </div>
                              <div class="mb-3">
                                <label for="status" class="col-form-label"> Status: </label>
                                <select class="form-select" name="status" aria-label="Default select example">
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
                <li class="page-item <?php echo ($current_page == $page) ? "next-page" : "current-page"; ?>"><a class="page-link" href="/dashboard/transactions/get?page=<?php echo $page ?>&limit=<?php echo $results_per_page ?>&offset=<?php echo ($page == 1) ? 0 : $results_per_page * ($page - 1) ?>"><?php echo $page ?></a></li>
              <?php
              }
              ?>
            </div>
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
  }
  unset($_SESSION["msg"]);
  ?>
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>

</html>