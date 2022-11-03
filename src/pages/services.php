<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA SERVICES </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <!-- END OF META TAGS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="/Ohana/src/css/service.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">

    <!-- FONT AWESOME ICONS IMPORT -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Web Icon -->
    <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">

    <!-- Bootstrap CSS  CDN -->
    <!-- 5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">

    <!-- MORE icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <div class="message" style="margin-top:10%;">
            <section class="services" id="services">
                <div class="service">
                    <center><h1 style="color:#DB6551; font-size: 120px; font-family: 'Acme', sans-serif; font-weight:800"> SERVICES </h1></center>
                </div><br><br>
                <div class="row" style="text-align:center; margin-left:10%; margin-right:10%;">
                    <div class="col-lg-4">
                    <a href="/puppies" style="text-decoration:none;">
                    <img src="/Ohana/src/images/services/rehome.png" width="540" height="400" role="img" focusable="false">
                    </a>
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>

                        <a href="/puppies" style="text-decoration:none;"><h2 class="p-4" style="color:#7d605c; font-size: 60px; font-weight:bolder;"> Pet Rehoming </h2></a>
                        <p style="color:#7d605c; font-size: 25px;"> Want to add another member to your family? We have the cutest and most loving frenchies waiting for you. </p>

                    </div>
                    <div class="col-lg-4">
                    <a href="/stud" style="text-decoration:none;">
                        <img src="/Ohana/src/images/services/stud.png" width="540" height="400" role="img" focusable="false">
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        </a>
                        <a href="/stud" style="text-decoration:none;"><h2 class="p-4" style="color:#7d605c; font-size: 60px; font-weight:bolder;"> Stud Service </h2></a>
                        <p style="color:#7d605c; font-size: 25px;"> Want to produce quality and compact french bulldogs? Choose from any of our male frenchies ready for mating. </p>
                    </div>

                    <div class="col-lg-4">
                    <a href="#" style="text-decoration:none;">
                        <img src="/Ohana/src/images/services/boarding.png" width="540" height="400" role="img" focusable="false">
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        </a>
                        <a href="/appointment" style="text-decoration:none;"><h2 class="p-4" style="color:#7d605c; font-size: 60px; font-weight:bolder;"> Pet Boarding </h2></a>
                        <p style="color:#7d605c; font-size: 25px;"> Want to increase chances of your pet fertility after stud? We have an optional pet boarding service to prevent your pet from getting stressed. </p>

                    </div>
                </div>
            </section>
            <section class="reason" style="margin-top:5%;">
                    <div class="reasons">
                        <img src="/Ohana/src/images/services/reasons.png" style="width: 100%;">
                    </div>
                </section>
                <section class="pair-section">
                    <div class="pair-section">
                        <form action="/stud" method='get'>
                            <div class="btn-Learn" name="btn-Checkout" style="float:right; margin-right:17%; margin-top:13%;">
                                <button id="btnCheckout" name="btnCheckout"><span> Find the perfect pair now </span></button>
                            </div>
                        </form>
                        <form action="/stud" method='get'>
                            <div class="btn-Learn" name="btn-Checkout" style="float:right; margin-right:12%; margin-top:30%;">
                                <button id="btnCheckout" name="btnCheckout"><span> Find the perfect pair now </span></button>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- 
                <section class="reason"> 
                    <div class="reasons">
                        <img src="/Ohana/src/images/services/reasons.png" style="width: 100%;">
                    </div>
                </section>-->
            </div>

        </div>
    </main>

    <div class="container-fluid">
    <?php include_once 'footer.php'; ?>
    </div>

    <!-- SCIPTS -->

    <!-- Chart library -->
    <script src="../plugins/chart.min.js"></script>

    <!-- Icons library -->
    <script src="../plugins/feather.min.js"></script>

    <!-- Custom scripts -->
    <script src="../js/script.js"></script>
    <script src="../js/privacyscript.js"></script>
    <script src="../js/termsscript.js"></script>

    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>