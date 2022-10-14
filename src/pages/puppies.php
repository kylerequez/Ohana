<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA PUPPIES </title>

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
    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

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
                        <h1 style="color:#DB6551; font-size: 100px; font-family: 'Karla', sans-serif; font-weight:800"> ADD TO YOUR OHANA NOW</h1>
                    </div><br><br>
                    <!-- AVAILABLE PUPPIES CARD -->
                    <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col" style="margin-top:5%;">
                            <div class="card h-100">
                                <img src="/Ohana/src/images/Ohanapups/trans2.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">PUPPY</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                                <div class="card-footer">
                                    <form action="/" method='get'>
                                        <div class="btn-Learn" name="btn-Learn">
                                            <button id="btnLearn" name="btnLearn"><span> More Info! </span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="margin-top:5%;">
                            <div class="card h-100">
                                <img src="/Ohana/src/images/Ohanapups/trans3.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">PUPPY</h5>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="card-footer">
                                    <form action="/" method='get'>
                                        <div class="btn-Learn" name="btn-Learn">
                                            <button id="btnLearn" name="btnLearn"><span> More Info! </span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- 2ND ROW -->
                        <div class="col" style="margin-top:5%;">
                            <div class="card h-100">
                                <img src="/Ohana/src/images/Ohanapups/trans5.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">PUPPY</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                                <div class="card-footer">
                                    <form action="/" method='get'>
                                        <div class="btn-Learn" name="btn-Learn">
                                            <button id="btnLearn" name="btnLearn"><span> More Info! </span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="margin-top:5%;">
                            <div class="card h-100">
                                <img src="/Ohana/src/images/Ohanapups/trans6.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"> PUPPY </h5>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="card-footer">
                                    <form action="/" method='get'>
                                        <div class="btn-Learn" name="btn-Learn">
                                            <button id="btnLearn" name="btnLearn"><span> More Info! </span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="reason" style="margin-top:5%;">

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