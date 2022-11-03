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
    <!-- Bootstrap CSS  CDN --><!-- 5.2.1 -->
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
                <div class="userheader">
                    <h1> USER PROFILE </h1>
                </div>
            </section>
            <section class="profilesection">
                <div class="container" style="margin-left:30%">
                    <div class="col-md-5" style="margin-left:7%">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3"></div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels" style="color:#c0b65a; font-size:20px">Name</label><input type="text" class="form-control" placeholder="First Name" value="" id="" name=""></div>
                                <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px"><label class="labels">Middle Name</label><input type="text" class="form-control" placeholder="Middle Name" value="" id="" name=""></div>
                                <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px"><label class="labels">Last Name</label><input type="text" class="form-control" placeholder="Last Name" value="" id="" name=""></div>
                                <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px"><label class="labels">Mobile Number (+63)</label><input type="text" class="form-control" placeholder="+63" value="" id="" name=""></div>
                                <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px"><label class="labels">Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email " value="" id="email" name="email">
                                </div>
                            </div>
                            <span>
                                <div class="text-center"><a href=""><button class="btn profile-button" type="button" style="background-color:#db6551; color:white; float:right">Save changes</button></a>
                                </div>
                                <div class="mt-5 text-center"><a href="/changepassword"><button class="btn profile-button" type="button" style="background-color:#db6551; color:white; float:right; margin-right:10px;"> Change Password</button></a></div>
                            </span>
                        </div>
                    </div>
                </div>
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