<!DOCTYPE html>
<html lang="en">

<head>
    <title> USER TRANSACTIONS </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/userprofile.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        .userprofile {
            margin-top: 10%;
        }

        #header {
            font-family: 'Acme', sans-serif;
        }

        #ohanafooter {
            margin-top: 10%;
        }

        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #header {
                margin-top: 50%;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'rnavbar.php'; ?>
        <div class="container-fluid">
            <section class="userprofile">
                <div class="userheader mb-5">
                    <h1 class="text-center" id="header" style="color:#db6551;"> My Transactions </h1>
                </div>
            </section>
            <center>
                <section class="orderhistory_section">
                    <div class="container">
                        <?php
                        include_once dirname(__DIR__) . '/models/Transaction.php';
                        include_once dirname(__DIR__) . '/config/db-config.php';
                        include_once dirname(__DIR__) . '/dao/OrderDAO.php';
                        include_once dirname(__DIR__) . '/dao/TransactionDAO.php';
                        include_once dirname(__DIR__) . '/services/TransactionServices.php';

                        $dao = new TransactionDAO($servername, $database, $username, $password);
                        $orderDAO = new OrderDAO($servername, $database, $username, $password);
                        $services = new TransactionServices($dao, $orderDAO);

                        $transactions = $services->getUserTransactions($user->getId());
                        if (!empty($transactions)) {
                            foreach ($transactions as $transaction) {
                        ?>
                                <div class="card rounded-3 mb-4">
                                    <div class="card-body p-4">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <p class="lead fw-normal mb-2"><?php echo $transaction->getDate()->format('M-d-y'); ?></p>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <p class="lead fw-normal mb-2"><?php echo $transaction->getId(); ?></p>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <p class="lead fw-normal mb-2"><?php echo $transaction->getStatus(); ?></p>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#orderModalId<?php echo $transaction->getId(); ?>" style="text-decoration:none; color:#c0b65a"><i class="uil uil-eye fs-3"></i> </a>
                                                <?php
                                                if ($transaction->getStatus() != "COMPLETED") {
                                                ?>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#uploadModalId<?php echo $transaction->getId(); ?>" style="text-decoration:none; color:#db6551"><i class="uil uil-upload-alt fs-3"></i> </a>
                                                <?php
                                                }
                                                ?>
                                                <form method="POST" action="/transactions/update/<?php echo $transaction->getId(); ?>">
                                                    <div class="modal fade" id="uploadModalId<?php echo $transaction->getId(); ?>" aria-hidden="true" aria-labelledby="uploadModal" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="ModalToggleLabel" style="font-family: 'Acme', sans-serif; "> Upload Proof of Payment </h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label for="proofOfPayment" class="my-2">Please upload your proof of payment for Transaction #<?php echo $transaction->getId(); ?></label>
                                                                    <input type="file" class="my-2" name="proofOfPayment" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn" data-bs-target="#ModalToggle<?php echo $transaction->getId(); ?>" data-bs-toggle="modal" style="background-color:#db6551;color:white;"> Confirm </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="ModalToggle<?php echo $transaction->getId(); ?>" aria-hidden="true" aria-labelledby="ModalToggleLabel2" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title text-danger fs-5" id="ModalToggleLabel2"> Warning! </h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Make sure that the image file contains the necessary information for the payment verification.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-dark" data-bs-target="#uploadModalId<?php echo $transaction->getId(); ?>" data-bs-toggle="modal">Go Back </button>
                                                                    <button type="submit" class="btn" style="background-color:#db6551;color:white;">Upload</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- VIEW MODAL -->
                                                <div class="modal modal-xl fade" id="orderModalId<?php echo $transaction->getId(); ?>" tabindex="-1" aria-labelledby="orderModal" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="transactionModalLabel" style="font-family: 'Acme', sans-serif;">Transaction #<?php echo $transaction->getId(); ?></h1>
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
                                                                        There are currently no orders within this transaction.
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                Total: <?php echo $transaction->getPrice(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            There are currently no Transactions.
                        <?php
                        }
                        ?>
                    </div>
                </section>
            </center>
        </div>
    </main>
    <div id="ohanafooter" class="fixed-bottom">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>