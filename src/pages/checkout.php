<!DOCTYPE html>
<html lang="en">

<head>
    <title> PAYMENT METHOD </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/pawcart.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        #head {
            margin-top: 10%;
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'navigationbar.php'; ?>
        <?php
        include_once dirname(__DIR__) . '/models/Order.php';
        include_once dirname(__DIR__) . '/models/PetProfile.php';
        include_once dirname(__DIR__) . '/models/Cart.php';

        include_once dirname(__DIR__) . '/config/db-config.php';
        include_once dirname(__DIR__) . '/dao/OrderDAO.php';
        include_once dirname(__DIR__) . '/dao/TransactionDAO.php';
        include_once dirname(__DIR__) . '/services/TransactionServices.php';

        $dao = new TransactionDAO($servername, $database, $username, $password);
        $orderDAO = new OrderDAO($servername, $database, $username, $password);
        $services = new TransactionServices($dao, $orderDAO, null);

        $cart = unserialize($_SESSION["cart"]);

        if (empty($cart->getCart()) && !isset($_GET['from'])) {
            include_once dirname(__DIR__) . '/config/app-config.php';
            $_SESSION["msg"] = "You do not have any orders to proceed to the checkout page."
        ?>
            <script type="text/javascript">
                const url = "https://<?= DOMAIN_NAME ?>/pawcart";
                window.location.href = url;
            </script>
        <?php
        }

        if (!isset($_GET['from'])) {
            $action = "/checkout/$reference/rehoming";
        } else {
            $action = "/checkout/$reference/stud";
        }
        ?>
        <div class="container-fluid">
            <section class="carthead" id="head">
                <div class="cartheader">
                    <img src="/Ohana/src/images/Pages/checkoutheader.png" class="img-fluid" width="100%">
                </div>
            </section>
            <form id="paymentForm" method="GET" action="<?php echo $action; ?>">
                <div class="container">
                    <section class="paymentsection">
                        <div class="paymentmethod" id="paymentmethod">
                            <div class="d-flex justify-content-center mb-5">
                                <div class="card text-center mx-3" style="width: 50rem;">
                                    <div class="d-flex">
                                        <div class="card-body">
                                            <img src="/Ohana/src/images/payment/pay1.png" width="150px" height="150px">
                                            <p class="card-text"> No. of users who chose this: <?php echo $services->getModeOfPaymentCount("GCASH"); ?></p>
                                            <input class="form-check-input mt-3" type="radio" name="mode" id="gcash" value="GCASH" />
                                            <label class="form-check-label mt-3 mb-3" for="payment-method"> GCASH </label>
                                        </div>
                                        <div class="card-body">
                                            <img src="/Ohana/src/images/payment/pay2.png" width="150px" height="150px">
                                            <p class="card-text"> No. of users who chose this: <?php echo $services->getModeOfPaymentCount("BANK TRANSFER"); ?></p>
                                            <input class="form-check-input mt-3" type="radio" name="mode" id="bank" value="BANK TRANSFER" />
                                            <label class="form-check-label mt-3 mb-3" for="payment-method"> BANK TRANSFER </label>
                                        </div>
                                        <div class="card-body">
                                            <img src="/Ohana/src/images/payment/pay3.png" width="150px" height="150px">
                                            <p class="card-text"> No. of users who chose this: <?php echo $services->getModeOfPaymentCount("CASH"); ?></p>
                                            <input class="form-check-input mt-3" type="radio" name="mode" id="cash" value="CASH" checked />
                                            <label class="form-check-label mt-3 mb-3" for="payment-method"> CASH </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <section class="paymentnote mb-5">
                    <div class="container">
                        <center>
                            <div class="card rounded-3 mb-5 " style="width:60%;">
                                <h1 class="fs-3 mt-3 mb-3 fw-bold" style="color:#db6551"> IMPORTANT NOTE: </h1>
                                <p class="fs-6 mt-2 me-2 ms-2"> TRANSACTIONS WILL BE DONE FACE TO FACE <br><br> YOU ONLY NEED TO SELECT A PAYMENT METHOD OF YOUR CHOICE </p>
                                <p class="fs-6 mt-3 me-2 ms-2"> <b style="color:#db6551"> Additional: </b> If you wish to pay right away, please do not hesitate to contact us.</p>
                                <p class="fs-6 mt-5 mb-5"> Friendly Reminder: Kindly Read the <b>Terms and Conditions for Cancellation and Payment Policy.</b> </p>
                            </div>
                            <div class="card rounded-3 mb-5" style="width:60%;" id="paymentInstruction"></div>
                            <a href="javascript:history.go(-1)" class="text-light"><button type="button" class="btn btn-outline-dark btn-lg mx-2" style="width:200px;"> Go Back </button></a>
                            <button type="submit" class="btn btn-block btn-lg text-light mx-2" style="background-color:#c0b65a; width:200px;"> Proceed </button></a>
                        </center>
                    </div>
                </section>
            </form>
        </div>
    </main>

    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#paymentInstruction").append(`
                <h1 class="fs-3 mt-4 mb-3 fw-bold" style="color:#db6551"> Payment Instructions </h1>
                <hr>
                <p class="fs-6 mt-3"> <b class="fw-bold">Cash Payment on Dog Pickup</b> </p>
                <p class="fs-6 mt-3"> 1. Bring the necessary amount in full for cash payment </p>
                <p class="fs-6 mt-3 pb-5"> 2. We do not accept installment.</p>
            `);

            $('#paymentForm').find("input[name='mode']").click(function(e) {
                let buttonVal = $("input[type='radio'][name='mode']:checked").val();
                if (buttonVal === "GCASH") {
                    $("#paymentInstruction").empty();
                    $("#paymentInstruction").append(`
                        <h1 class="fs-3 mt-4 mb-3 fw-bold" style="color:#db6551"> Payment Instructions </h1>
                        <hr>
                        <p class="fs-6 mt-3"><b class="fw-bold">Gcash (E-Wallet)</b></p>
                        <p class="fs-6 mt-3 "> 1. Open GCash mobile app </p>
                        <p class="fs-6 mt-3 "> 2. Select Send Money and click Express Send</p>
                        <p class="fs-6 mt-3 "> 3. SCAN QR CODE or enter the recipient’s mobile number </p>
                        <p class="fs-6 mt-3 "> a. 09190638560 - Giancarlo Calma</p>
                        <p class="fs-6 mt-3 "> b. Message us on facebook for Payment via QR CODE</p>
                        <p class="fs-6 mt-4 mx-5 pb-5" style="color:#db6551"> Note: Kindly take a screenshot of the receipt </p>
                    `);
                } else if (buttonVal === "BANK TRANSFER") {
                    $("#paymentInstruction").empty();
                    $("#paymentInstruction").append(`
                        <h1 class="fs-3 mt-4 mb-3 fw-bold" style="color:#db6551"> Payment Instructions </h1>
                        <hr>
                        <p class="fs-6 mt-3"> <b class="fw-bold">Online Bank Transfer or Over-the-counter</b> </p>
                        <p class="fs-6 mt-3 "> 1. Deposit amount to the following BPI bank account: </p>
                        <p class="fs-6 mt-3 "> Account Name: Giancarlo Calma </p>
                        <p class="fs-6 mt-3 "> Account Number: 4409218178 </p>
                        <p class="fs-6 mt-3 "> 2. Message us on facebook for Payment via QR CODE</p>
                        <p class="fs-6 mt-3 "> 3. Over-the-counter: Write you full name onto the deposit slip.</p>
                        <p class="fs-6 mt-4 mx-5 pb-5" style="color:#db6551"> Note: Scan or take a photograph of the deposit slip </p>
                    `);
                } else if (buttonVal === "CASH") {
                    $("#paymentInstruction").empty();
                    $("#paymentInstruction").append(`
                        <h1 class="fs-3 mt-4 mb-3 fw-bold" style="color:#db6551"> Payment Instructions </h1>
                        <hr>
                        <p class="fs-6 mt-3"> <b class="fw-bold">Cash Payment on Dog Pickup</b> </p>
                        <p class="fs-6 mt-3"> 1. Bring the necessary amount in full for cash payment </p>
                        <p class="fs-6 mt-3 pb-5"> 2. We do not accept installment.</p>
                    `);
                }
            });
        });
    </script>
</body>

</html>