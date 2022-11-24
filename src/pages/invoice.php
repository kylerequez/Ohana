<!DOCTYPE html>
<html lang="en">

<head>

    <title> ORDER SUMMARY </title>

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
        <?php include_once 'Rnavbar.php'; ?>

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
                                                <p>10 April 2022</p>
                                            </div>
                                            <div class="col mb-3">
                                                <p class="small text-muted mb-1">Reference No.</p>
                                                <p>012j1gvs356c</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <p class="small text-muted mb-1"> Customer Name:</p>
                                                <p> customer full name </p>
                                            </div>
                                            <div class="col mb-3">
                                                <p class="small text-muted mb-1"> Payment Method:</p>
                                                <p> *Chosen payment method*</p>
                                            </div>
                                        </div>
                                        <div class="mx-n5 px-5 py-4" style="background-color: #eed1c2;">
                                            <p class="lead fw-bold mb-3 fs-5" style="color: #db6551;"> DETAILS </p>
                                            <div class="row">
                                                <div class="col-md-8 col-lg-9">
                                                    <p>FRENCH PUPPY</p>
                                                </div>
                                                <div class="col-md-4 col-lg-3">
                                                    <p>P80,000</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row my-4">
                                            <p class="lead fw-bold mb-0 text-center"> TOTAL AMOUNT TO PAY: P260,000 </p>
                                        </div>
                                        <hr>
                                        <p class="lead fw-bold mb-4 pb-2"> Order Status: PENDING </p>
                                        <p class="lead fw-bold mb-4 pb-2"> Appointment Date and Time: <br> mm/dd/yyyy - 12:34pm </p>
                                        <p class="mt-4 pt-2 mb-0"> Don't Forget to Screenshot this page and show it during your scheduled appointment. </a></p>

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
    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>


</body>

</html>