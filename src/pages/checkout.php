<!DOCTYPE html>
<html lang="en">

<head>
    <title> PAYMENT METHOD </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/pawcart.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        #head {
            margin-top: 10%;
        }

        @media screen and (min-width: 360px) and (max-width: 929.98px) {}
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'rnavbar.php'; ?>
        <?php
        include_once dirname(__DIR__) . '/models/Order.php';
        include_once dirname(__DIR__) . '/models/PetProfile.php';
        include_once dirname(__DIR__) . '/models/Cart.php';
        $cart = unserialize($_SESSION["cart"]);
        if (empty($cart->getCart())) {
            include_once dirname(__DIR__) . '/config/app-config.php';
            $_SESSION["msg"] = "You do not have any orders to proceed to the checkout page."
        ?>
            <script type="text/javascript">
                const url = "http://<?= DOMAIN_NAME ?>/pawcart";
                window.location.href = url;
            </script>
        <?php
        }
        ?>
        <div class="container-fluid">
            <section class="carthead" id="head">
                <div class="cartheader">
                    <img src="/Ohana/src/images/Pages/checkoutheader.png" class="img-fluid" width="100%">
                </div>
            </section>
            <div class="container">
                <section class="paymentsection">
                    <div class="paymentmethod" id="paymentmethod">
                        <div class="d-flex justify-content-center mb-5">
                            <div class="card text-center mx-3" style="width: 50rem;">
                                <div class="d-flex">
                                    <div class="card-body">
                                        <img src="/Ohana/src/images/payment/pay1.png" width="150px" height="150px">
                                        <p class="card-text"> No. of users who chose this: 5</p>
                                        <input class="form-check-input mt-3" type="radio" name="inlineRadioOptions" id="gcash" value="gcash" />
                                        <label class="form-check-label mt-3 mb-3" for="payment-method"> GCASH </label>
                                    </div>
                                    <div class="card-body">
                                        <img src="/Ohana/src/images/payment/pay2.png" width="150px" height="150px">
                                        <p class="card-text"> No. of users who chose this: 10</p>
                                        <input class="form-check-input mt-3" type="radio" name="inlineRadioOptions" id="bank" value="bank" />
                                        <label class="form-check-label mt-3 mb-3" for="payment-method"> BANK TRANSFER </label>
                                    </div>
                                    <div class="card-body">
                                        <img src="/Ohana/src/images/payment/pay3.png" width="150px" height="150px">
                                        <p class="card-text"> No. of users who chose this: 15</p>
                                        <input class="form-check-input mt-3" type="radio" name="inlineRadioOptions" id="cash" value="cash" />
                                        <label class="form-check-label mt-3 mb-3" for="payment-method"> CASH </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section class="paymentnote mb-5">
                <center>
                    <div class="card rounded-3 mb-5" style="width:75%;">
                        <p class="fs-6 mt-5"> Note: TRANSACTIONS WILL BE DONE FACE TO FACE, YOU ONLY NEED TO SELECT A PAYMENT METHOD OF YOUR CHOICE </p>
                        <p class="fs-6 mt-3 mb-5"> Friendly Reminder: Kindly Read the <b>Terms and Conditions for Cancellation and Payment Policy.</b> </p>
                    </div>
                    <a href="/upload-proof"><button type="button" name="btn-Payment" class="btn btn-block btn-lg" style="background-color:#c0b65a; color:white; width:300px;">
                            Proceed </button></a> <br><br>
                    <a href="/home"><button type="button" class="btn btn-outline-dark btn-lg" style="width:300px;"> Back to Home</button></a>
                </center>
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