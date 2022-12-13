<!DOCTYPE html>
<html lang="en">

<head>
    <title> ORDER SUMMARY </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/pawcart.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
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

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #thank-you {
                font-size: 37px;
            }

            #tq {
                margin-top: 45%;
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
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- <?php include_once 'rnavbar.php'; ?> -->
        <?php
        require dirname(__DIR__) . '/config/db-config.php';
        require dirname(__DIR__) . '/dao/OrderDAO.php';
        require dirname(__DIR__) . '/dao/TransactionDAO.php';
        require dirname(__DIR__) . '/services/TransactionServices.php';

        $dao = new TransactionDAO($servername, $database, $username, $password);
        $orderDAO = new OrderDAO($servername, $database, $username, $password);
        $services = new TransactionServices($dao, $orderDAO, null);

        $transaction = $services->searchByReference($reference);

        if (is_null($transaction)) {
            $_SESSION['msg'] = "There was an error in accessing the transaction. Please try again.";
        ?>
            <script type="text/javascript">
                const url = "http://<?= DOMAIN_NAME ?>/pawcart";
                window.location.href = url;
            </script>
        <?php } ?>
        <div class="container-fluid">
            <div class="container">
                <section class="h-6 h-custom" id="tq">
                    <div class="service">
                        <h1 class="text-center" id="thank-you"> THANK YOU FOR TRUSTING OHANA </h1>
                    </div>
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-lg-8 col-xl-6">
                                <div class="card border-top border-bottom border-3" style="border-color: #db6551 !important;">
                                    <div class="card-body p-5">
                                        <p class="lead fw-bold mb-5 text-center" id="order"> ORDER SUMMARY </p>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <p class="small text-muted mb-1">Date of Order:</p>
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
                                        <div class="mx-n5 px-5 py-4" style="background-color: #eed1c2;">
                                            <p class="lead fw-bold mb-3 fs-5" style="color: #db6551;"> DETAILS </p>
                                            <?php
                                            foreach ($transaction->getListOfOrders() as $order) {
                                            ?>
                                                <div class="row">
                                                    <div class="col-md-8 col-lg-9">
                                                        <p><?php echo $order->getPetName(); ?></p>
                                                    </div>
                                                    <div class="col-md-4 col-lg-3">
                                                        <p>₱ <?php echo number_format($order->getPrice(), 2); ?></p>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="row my-4">
                                            <p class="lead fw-bold mb-0 text-center"> TOTAL AMOUNT TO PAY: ₱ <?php echo number_format($transaction->getPrice(), 2); ?> </p>
                                        </div>
                                        <hr>
                                        <p class="lead fw-bold mb-4 pb-2"> Order Status: <?php echo $transaction->getStatus(); ?></p>
                                        <h2 class="mt-4 pt-2 mb-0"> Note: </a></h2>
                                        <p class="mt-3 pt-2 mb-0"> 1. Don't Forget to Screenshot this page and show it during your visit</a></p>
                                        <p class="mt-1 pt-2 mb-0"> 2. You can pick up your dog anytime. Do not hesitate to contact us for questions.</a></p>
                                        <div class="btn-Learn mt-3" name="btn-Learn">
                                            <center><a href="/home"> <button type="button" id="btn-home" class="btn btn-outline-info"> Back to Home </button></a></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        </section>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>