<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA SERVICES </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/service.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

    <?php include_once 'stylesheets.php'; ?>

    <style>
        .btn-outline-info {
            color: #db6551;
            background-color: transparent;
            background-image: none;
            border-color: #db6551;
            font-size:25px;
            --bs-btn-hover-border-color: #c0b65a;
            --bs-btn-hover-bg: #c0b65a;
            --bs-btn-hover-color: white;
            border-radius: 30px;
            padding: 15px 70px;
        }

        @media screen and (min-width: 360px) and (max-width: 929.98px) {}
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <div class="message">
                <section class="services" id="services">
                    <div class="service">
                        <h1 id="serviceheader" class="text-center mb-3"> SERVICES </h1>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-6">
                            <a href="/puppies/rehoming/get" style="text-decoration:none;">
                                <img src="/Ohana/src/images/services/1.png" class="img-fluid" role="img" focusable="false"></img>
                                <center><button type="button" class="btn btn-outline-info"> PET REHOMING </button></center>
                                <p class="mt-4" id="paragraph" style="color:#7d605c;"> Want to add another member to your family? We have the cutest and most loving frenchies waiting for you. </p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a href="/stud" style="text-decoration:none;">
                                <img src="/Ohana/src/images/services/2.png" class="img-fluid" role="img" focusable="false"></img>
                                <center><button type="button" class="btn btn-outline-info"> STUD SERVICE </button></center>
                                <p class="mt-4" id="paragraph" style="color:#7d605c;"> Want to produce quality and compact french bulldogs? Choose from any of our male frenchies ready for mating. </p>
                            </a>
                        </div>
                    </div>
                </section>
                <section class="reason">
                    <div class="reasons">
                        <img src="/Ohana/src/images/Landing/reasonsmain.png" class="img-fluid" style="width: 100%;">
                    </div>
                </section>
                <section class="pair-section">
                    <div class="pair-section">
                        <form action="/stud" method='get'>
                            <div class="btn-Learn" name="btn-Checkout" style="float:right; margin-right:17%; margin-top:13%;">
                                <button id="btnCheckout" name="btnPair"><span> Find the perfect pair now </span></button>
                            </div>
                        </form>
                        <form action="/stud" method='get'>
                            <div class="btn-Learn" name="btn-Checkout" style="float:right; margin-right:12%; margin-top:30%;">
                                <button id="btnCheckout" name="btnPair"><span> Find the perfect pair now </span></button>
                            </div>
                        </form>
                    </div>
                </section>


            </div>

        </div>
    </main>

    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>

    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>