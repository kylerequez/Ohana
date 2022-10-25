<!DOCTYPE html>
<html lang="en">

<head>
    <!--meta tags-->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <!-- end of meta tags-->
    <title> ADMIN PROFILE </title>

    <!-- WEB ICON-->
    <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

    <!-- ICONS IMPORT  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- BOOTSTRAP CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Custom styles -->
    <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
</head>

<body>
    <?php
    if (!isset($_SESSION)) session_start();
    include_once dirname(__DIR__) . '/../models/Account.php';

    if (empty($_SESSION['user'])) {
        session_unset();
        session_destroy();
        header("Location: http://localhost/login");
        exit();
    } else {
        $user = unserialize($_SESSION['user']);
    ?>
        <div class="layer"> </div>

        <!-- Body -->

        <div class="page-flex">
            <!-- Dashboard Sidebar -->
            <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>

            <div class="main-wrapper">
                <!-- END OF ADMIN DASHBOARD SIDE-->

                <!-- ! Main nav -->
                <?php include_once dirname(__DIR__) . "/navbar.php" ?>

                <!-- CALENDAR Main content -->
                <main class="main users chart-page" id="skip-target">
                    <div class="container">
                        <br>
                        <center>
                            <h2 class="main-title"> Admin Profile </h2>
                        </center>
                        <!-- ADMIN PROFILE CONTENT -->
                        <div class="main">
                            <div class="container rounded mb-5">
                                <div class="row">
                                    <div class="col-md-3 border-right">
                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                            <span class="font-weight-bold">Admin Name</span><span class="text-black-50">Administrator</span><span> </span><br>
                                            <input type="file" id="myFile" name="filename" style="background-color: #FAF8F0;margin-left:25%">
                                        </div>
                                    </div>
                                    <div class="col-md-5" style="margin-left:5%">
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="First Name" value="<?php echo $user->getFname(); ?>"></div>
                                                <div class="col-md-12"><label class="labels">Middle Name</label><input type="text" class="form-control" placeholder="Middle Name" value="<?php echo $user->getMname(); ?>"></div>
                                                <div class="col-md-12"><label class="labels">Last Name</label><input type="text" class="form-control" placeholder="Last Name" value="<?php echo $user->getLname(); ?>"></div>
                                                <div class="col-md-12"><label class="labels">Mobile Number (+63)</label><input type="text" class="form-control" placeholder="+63" value="<?php echo $user->getNumber(); ?>"></div>
                                                <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Enter email " value="<?php echo $user->getEmail(); ?>"></div>
                                                <div class="text-center">
                                                    <a href="/dashboard/adminpass"><button class="btn profile-button" type="button" style="background-color:#db6551; color:white; float:left; margin-top:20px;">Change Password</button></a>
                                                </div>
                                            </div>
                                            <div class="mt-5 text-center"><button class="btn profile-button" type="button" style="background-color:#db6551; color:white; float:right">Save Profile</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- FOOTER -->
                <?php include_once dirname(__DIR__) . '/footer.php'; ?>

            </div>
        </div>

        <!-- SCRIPTS -->

        <!-- Chart library -->
        <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

        <!-- Icons library -->
        <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

        <!-- Custom scripts -->
        <script src="/Ohana/src/dashboard/js/script.js"></script>

        <!-- JavaScript BOOTSTRAP Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>

        <!--SCRIPT FOR BOOTSTRAP MODAL-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <?php
    }
    ?>
</body>

</html>