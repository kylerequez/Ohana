<!DOCTYPE html>
<html lang="en">

<head>
    <title> USER PROFILE </title>
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
    <link rel="stylesheet" href="/Ohana/src/css/userprofile.css">
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
            <section class="userprofile" style="margin-top:10%;">
                <div class="userheader mb-5">
                    <h1> My Transactions </h1>
                </div>
            </section>
            <center>
                <section class="orderhistory_section">

                    <div class="container">
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <p class="lead fw-normal mb-2"> Date </p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">Reference Number</p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <p class="lead fw-normal mb-2">Status</p>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#orderModal" style="text-decoration:none; color:green"><i class="uil uil-eye"></i> </a>
                                        &nbsp;&nbsp; &nbsp;
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" style="text-decoration:none; color:#db6551"><i class="uil uil-upload-alt"></i> </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel"> Upload Proof of Payment</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="proofOfPayment" class="my-2">Please upload your proof of payment for Transaction #</label>
                                                        <input type="file" class="my-2" name="proofOfPayment">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn" style="background-color:#db6551;color:white;">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- VIEW MODAL -->
                                        <div class="modal modal-xl fade" id="orderModal" tabindex="-1" aria-labelledby="orderModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Transaction #</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card rounded-3 mb-4">
                                                            <div class="card-body p-4">
                                                                <div class="row d-flex justify-content-between align-items-center">
                                                                    <div class="col">
                                                                        <p class="lead fw-normal mb-2">Order ID.</p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <img src="/Ohana/src/images/Dogs/pup1.png" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="lead fw-normal mb-2">French Puppy</p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="lead fw-normal mb-2">Quantity: 1</p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5 class="mb-0">P80,000</h5>
                                                                    </div>
                                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        Total:
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </center>

            </section>
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
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>