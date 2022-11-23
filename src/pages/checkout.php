<!DOCTYPE html>
<html lang="en">

<head>

    <title> PAYMENT METHOD </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="/Ohana/src/css/pawcart.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">


    <?php include_once 'stylesheets.php'; ?>
    <style>
        @media screen and (min-width: 360px) and (max-width: 929.98px) {}
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->

            <section class="carthead" style="margin-top:5%; ">
                <div class="cartheader">
                    <img src="/Ohana/src/images/Pages/checkoutheader.png" class="img-fluid" width="100%">
                </div>
            </section>

            <div class="container">
                <section class="paymentsection" style="margin-top:5%;">

                    <div class="paymentmethod" id="paymentmethod">
                        <div class="d-flex justify-content-center mb-5">
                            <div class="card text-center mx-3" style="width: 18rem;">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/payment/pay1.png" width="150px" height="150px">
                                    <h5 class="card-title"> GCASH</h5>
                                    <p class="card-text"> No. of users who chose this: 5</p>
                                    <a href="#" class="btn" style="background-color:#db6551; color:white;"> Select </a>
                                </div>
                            </div>

                            <div class="card text-center mx-3" style="width: 18rem;">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/payment/pay2.png" width="150px" height="150px">
                                    <h5 class="card-title"> BANK TRANSFER </h5>
                                    <p class="card-text"> No. of users who chose this: 10</p>
                                    <a href="#" class="btn" style="background-color:#db6551; color:white;"> Select</a>
                                </div>
                            </div>

                            <div class="card text-center mx-3" style="width: 18rem;">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/payment/pay3.png" width="150px" height="150px">
                                    <h5 class="card-title"> CASH </h5>
                                    <p class="card-text"> No. of users who chose this: 15</p>
                                    <a href="#" class="btn" style="background-color:#db6551; color:white;"> Select</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="paymentselected">
                        <h1 class="text-center mt-3 mb-5" style="font-size:20px"> YOU HAVE SELECTED: *PAYMENT METHOD* </h1>
                    </div>

                </section>
                <section class="paymentnote">
                    <center>
                        <div class="card rounded-3 mb-4" style="width:75%;">
                            <p style="font-size:15px"> Note: TRANSACTIONS WILL BE DONE FACE TO FACE, YOU ONLY NEED TO SELECT A PAYMENT METHOD OF YOUR CHOICE </p>
                            <p style="font-size:15px"> Friendly Reminder: Kindly Read the <b>Terms and Conditions for Cancellation and Payment Policy.</b> </p>
                        </div>
                        <a href="/upload-proof"><button type="button" name="btn-Payment" class="btn btn-block btn-lg" style="background-color:#c0b65a; color:white; width:300px;">
                                Proceed </button></a> <br><br>
                        <a href="/home"><button type="button" class="btn btn-outline-dark btn-lg" style="width:300px;"> Back to Home</button></a>
                    </center>
                </section>
            </div>

        </div>
    </main>

    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>

    <!-- SCIPTS -->

    <!-- Chart library -->
    <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

    <!-- Icons library -->
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>


    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>


</body>

</html>