<!DOCTYPE html>
<html lang="en">

<head>

    <title> UPLOAD PROOF </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        @media screen and (min-width: 375px) and (max-width: 767.98px) {}
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->

            <section class="carthead" style="margin-top:5%;">
                <div class="cartheader mb-4">
                    <img src="/Ohana/src/images/Pages/checkoutheader.png" class="img-fluid" width="100%">
                </div>
            </section>

            <div class="container">
                <section class="paymentnote">
                    <center>
                        <div class="card rounded-3 mb-4 p-4" style="width:75%;">
                            <h1 class="mt-2 mb-3"> Upload Proof of Payment </h1>
                            <form action="/action_page.php">
                                <div class="col">
                                    <input type="file" id="myfile" name="myfile">
                                </div>
                                <div class="col mt-5">
                                    <a href="/skip" style="text-decoration:none; color:#db6551"> -Skip this step- </a>
                                </div>
                            </form>
                        </div>
                        <div class="card rounded-3 mb-4 p-4" style="width:75%;">
                            <p class="mt-4" style="font-size:15px"> Note: TRANSACTIONS WILL BE DONE FACE TO FACE, YOU ONLY NEED TO SELECT A PAYMENT METHOD OF YOUR CHOICE </p>
                            <p class="mt-2" style="font-size:15px"> Friendly Reminder: Kindly Read the <b>Terms and Conditions for Cancellation and Payment Policy.</b> </p>
                        </div>
                        <a href="/checkout"><button type="button" class="btn btn-outline-dark btn-lg mt-2 mx-3" style="width:300px;">Go Back</button></a>
                        <a href="/invoice"><button type="button" name="btn-Payment" class="btn btn-block btn-lg mt-2 mx-3" style="background-color:#c0b65a; color:white; width:300px;">
                                Proceed </button></a>
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