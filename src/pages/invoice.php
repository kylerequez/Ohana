<!DOCTYPE html>
<html lang="en">

<head>
    <title> ORDER SUMMARY </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/pawcart.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        #btn-home {
            color: #db6551;
            background-color: transparent;
            background-image: none;
            border-color: #db6551;
            font-size: 12px;
            --bs-btn-hover-border-color: #c0b65a;
            --bs-btn-hover-bg: #c0b65a;
            --bs-btn-hover-color: white;
            border-radius: 30px;
            padding: 10px 40px;
        }

        #cartheader {
            margin-top: 0%;
        }

        #tq {
            margin-top: -2%;
        }

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #thank-you {
                font-size: 37px;
            }

            #tq {
                margin-top: 5%;
            }

            .row p {
                font-size: 15px;
            }

            #order {
                font-size: 20px;
            }

            #btnLearn {
                display: block;
                padding: 10px 60px;
                font-size: 15px;
            }
        }
    @media screen and (min-width: 1100px) and (max-width: 1366px) {
        
      }
</style>
</head>

<body style="background-color: #FAF8F0;">
    <?php
    require dirname(__DIR__) . '/config/db-config.php';
    require dirname(__DIR__) . '/dao/OrderDAO.php';
    require dirname(__DIR__) . '/dao/TransactionDAO.php';
    require dirname(__DIR__) . '/services/TransactionServices.php';

    $dao = new TransactionDAO($servername, $database, $username, $password);
    $orderDAO = new OrderDAO($servername, $database, $username, $password);
    $services = new TransactionServices($dao, $orderDAO, null, null, null);

    $transaction = $services->searchByReference($reference);
    if (is_null($transaction)) {
        $_SESSION['msg'] = "There was an error in accessing the transaction. Please try again.";
    ?>
        <script type="text/javascript">
            const url = "https://<?= DOMAIN_NAME ?>/pawcart";
            window.location.href = url;
        </script>
    <?php
        exit();
    }
    ?>
    <main>
        <div class="container-fluid">
            <img src="/Ohana/src/images/Pages/invoice.png" id="cartheader" class="img-responsive" width="100%">
            <div class="container">
                <section class="h-6 h-custom" id="tq">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-lg-8 col-xl-6">
                                <div class="card border-top border-bottom border-3" style="border-color: #db6551 !important;">
                                    <div class="card-body p-5">
                                        <p class="lead fw-bold mb-5 text-center" id="order"> TRANSACTION SUMMARY </p>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <p class="small text-muted mb-1">Date of Transaction:</p>
                                                <p><?php echo $transaction->getDate()->format('M-d-Y h:i:s A'); ?></p>
                                            </div>
                                            <div class="col mb-3">
                                                <p class="small text-muted mb-1">Reference No.</p>
                                                <p><?php echo $transaction->getReference(); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <p class="small text-muted mb-1"> Customer Name:</p>
                                                <p> <?php echo $transaction->getFname() . " " . $transaction->getMname() . " " . $transaction->getLname(); ?> </p>
                                            </div>
                                            <div class="col mb-3">
                                                <p class="small text-muted mb-1"> Payment Method:</p>
                                                <p> <?php echo $transaction->getMode(); ?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <p class="small text-muted mb-1"> Transaction Status:</p>
                                                <p> <?php echo $transaction->getStatus(); ?> </p>
                                            </div>
                                            <div class="col mb-3">

                                            </div>
                                        </div>
                                        <div class="mx-n5 px-5 py-4" style="background-color: #eed1c2;">
                                            <p class="lead fw-bold mb-3 fs-5" style="color: #db6551;"> DETAILS </p>
                                            <?php
                                            $type = null;
                                            foreach ($transaction->getListOfOrders() as $order) {
                                            ?>
                                                <div class="row">
                                                    <div class="col-md-8 ">
                                                        <p><?php echo $order->getPetName(); ?></p>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <p>₱ <?php echo number_format($order->getPrice(), 2); ?></p>
                                                    </div>
                                                </div>
                                            <?php
                                                $type = $order->getType();
                                            }
                                            ?>
                                        </div>
                                        <div class="row my-4">
                                            <p class="lead fw-bold mb-0"> TOTAL ₱ <?php echo number_format($transaction->getPrice(), 2); ?> </p>
                                        </div>
                                        <hr>

                                        <h2 class="mt-4 pt-2 mb-0"> Note: </a></h2>
                                        <p class="mt-3 pt-2 mb-0"> 1. Don't Forget to Screenshot this page and show it during your visit</a></p>
                                        <p class="mt-1 pt-2 mb-0"> 2. Book an appointment for dog pick-up. Must be 3 days from now.</a></p>
                                        <div class="btn-Learn mt-3" name="btn-Learn">
                                            <center><a href="/set-appointment?type=<?php echo $type; ?>"> <button type="button" id="btn-home" class="btn btn-outline-info"> Book Appointment </button></a></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>