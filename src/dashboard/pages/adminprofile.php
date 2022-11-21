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
    <div class="layer"> </div>
    <!-- Body -->
    <div class="page-flex">
        <!-- Dashboard Sidebar -->
        <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
        <div class="main-wrapper">
            <!-- END OF ADMIN DASHBOARD SIDE-->
            <!-- ! Main nav -->
            <?php include_once dirname(__DIR__) . "/navbar.php" ?>
            <main class="main users chart-page" id="skip-target">
                <div class="container">
                    <h2 class="main-title mt-2 text-center"> Admin Profile </h2>
                </div>
                <!-- ADMIN PROFILE CONTENT -->
                <div class="main">
                    <div class="container rounded mb-5">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="/Ohana/src/dashboard/img/avatar/administrator.png">
                                    <span class="font-weight-bold">Admin Name</span><span class="text-black-50">Administrator</span><span> </span><br>
                                    <input type="file" id="myFile" name="filename" style="background-color: #FAF8F0;margin-left:25%">
                                </div>
                            </div>
                            <div class="col-md-5" style="margin-left:5%">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="First Name" value="<?php echo $user->getFname(); ?>" style="background-color:#eed1c2;"></div>
                                        <div class="col-md-12 mt-3"><label class="labels">Middle Name</label><input type="text" class="form-control" placeholder="Middle Name" value="<?php echo $user->getMname(); ?>" style="background-color:#eed1c2;"></div>
                                        <div class="col-md-12 mt-3"><label class="labels">Last Name</label><input type="text" class="form-control" placeholder="Last Name" value="<?php echo $user->getLname(); ?>" style="background-color:#eed1c2;"></div>
                                        <div class="col-md-12 mt-3"><label class="labels">Mobile Number (+63)</label><input type="text" class="form-control" placeholder="+63" value="<?php echo $user->getNumber(); ?>" style="background-color:#eed1c2;"></div>
                                        <div class="col-md-12 mt-3"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Enter email " value="<?php echo $user->getEmail(); ?>" style="background-color:#eed1c2;"></div>
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
            </main>
            <!-- FOOTER -->
            <?php include_once dirname(__DIR__) . '/footer.php'; ?>
        </div>
    </div>
    <!-- TOAST -->
    <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
        <div class="toast-container top-0 end-0 p-3">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="toast-header">
                    <img src="/Ohana/src/dashboard/img/main/notification.png" width="25px" height="25px" alt="">
                    <strong class="me-auto" style="font-size:20px;"> &nbsp; Notification </strong>
                    <small> JUST NOW </small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" style="color:#db6551; font-size:15px;"><?php echo $_SESSION["msg"] ?></div>
            </div>
        </div>
    <?php
    }
    unset($_SESSION["msg"]);
    ?>
    <!-- SCRIPTS -->

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
</body>

</html>