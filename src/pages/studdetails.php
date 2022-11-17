<!DOCTYPE html>
<html lang="en">

<head>

    <title> STUD PROFILES </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        @media screen and (min-width: 375px) and (max-width: 767.98px) { }
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
                    <div class="card mx-auto img-fluid" style="max-width: 60vw; max-height:60vh; background-color:#2f1f18">
                        <img class="card-img-top" src="/Ohana/src/images/Ohanapups/cardbg.png" alt="Card image" style="width:100%; height:70vh">
                        <div class="card-img-overlay">
                            <div class="card-header">
                                <p style="font-size: 40px; text-align:center"><b> FRENCH BULLDOG NAME </b></p>
                            </div>
                            <div class="row justify-content">
                                <hr style="color:white">
                                <div class="col-md-5 mx-auto">
                                    <img src="/Ohana/src/images/petprofile/studog.png" class="card-img">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body"><br>
                                        <p class="card-text"> <b>BIRTHDAY:</b> June 13, 2018 </p>
                                        <p class="card-text"> <b>COLOR:</b> Brown Tan </p>
                                        <p class="card-text"> <b>GENDER:</b> Male </p>
                                        <p class="card-text"> <b>WEIGHT:</b> 12 kg </p>
                                        <p class="card-text"> <b>GENES:</b> Lilac Tan Carrier & Isabella Carrier </p>
                                        <p class="card-text"> <b>PCCI PAPERS:</b> COMPLETE</p>
                                        <p class="card-text"> <b>Note: Our Adult Frenchies are fully vaccinated. </b></p>
                                    </div>
                                    <div name="buttons" style="margin-top:10%">
                                        <button type="button" class="btn btn-outline-secondary mt-5" style="margin-left:25%"> Back to Home</button>
                                        <button type="button" class="btn mt-5" style="margin-left:5%; background-color:#c0b65a"> Choose as Pair </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>