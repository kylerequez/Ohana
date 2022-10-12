<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA CART </title>

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
    <link rel="stylesheet" href="/Ohana/src/css/pawcart.css">
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
            <img src="/Ohana/src/images/Pages/cartheader.png" width="100%" style="margin-top:7%">

            <section class="h-100">
                <div class="container h-100 py-5">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-10">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black"> ORDER DESCRIPTION</h3>
                                <div>
                                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                </div>
                            </div>

                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/Ohana/src/images/Dogs/pup1.png" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">Basic T-shirt</p>
                                            <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="2" type="number" class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">P100,000</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/Ohana/src/images/Dogs/pup1.png" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">Basic T-shirt</p>
                                            <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="2" type="number" class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">P100,000</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/Ohana/src/images/Dogs/pup1.png" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">Basic T-shirt</p>
                                            <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="2" type="number" class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">P100,000</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="margin-top:10%; height:100px;">
                                <div class="card-body" style="margin-top:10px;"><center>
                                    <button type="button" class="btn btn-dark btn-lg me-2"> Back to Home</button>
                                    <button type="button" name="btn-Payment" class="btn btn-warning btn-block btn-lg"> Proceed to Select Payment Method </button></center>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div><!-- END OF CONTAINER FLUID -->
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