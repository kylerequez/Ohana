<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <title> ADMIN PROFILE </title>
    <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
    <style>
        .labels {
            font-size: 20px;
        }

        #adminp {
            width:380px;
        }

        #mob {
            width:328px;
        }
    </style>
</head>
<body>

    <div class="layer"> </div>
    <div class="page-flex">
        <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
        <div class="main-wrapper">
            <?php include_once dirname(__DIR__) . "/navbar.php" ?>
            <main class="main users chart-page" id="skip-target">
                <div class="main">
                    <div class="container rounded">
                    <h2 class="main-title text-center mt-3">Admin Profile</h2>
                        <div class="container-sm">
                            <form action="/accounts/update" method="POST">
                                <div class="d-flex justify-content-center">
                                    <center>
                                    <div class="container">
                                        <input type="hidden" name="status" value="<?php echo $user->getStatus(); ?>">
                                        <input type="hidden" name="type" value="<?php echo $user->getType(); ?>">
                                        <div class="row">
                                            <div class="col me-5 ms-5">
                                                <label class="labels">Name</label><br>
                                                <input type="text" id="adminp" name="fname" value="<?php echo $user->getFname(); ?>" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mt-3 me-5 ms-5">
                                                <label class="labels">Middle Name</label><br>
                                                <input type="text" id="adminp" name="mname" value="<?php echo $user->getMname(); ?>" >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mt-3 me-5 ms-5">
                                                <label class="labels">Last Name</label><br>
                                                <input type="text" id="adminp" name="lname" value="<?php echo $user->getLname(); ?>" >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mt-3 me-5 ms-5">
                                                <label class="labels">Mobile Number</label><br>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="contact-no">+63</span>
                                                    <input type="text" id="mob" name="number" value="<?php echo str_replace("+63", "", $user->getNumber()); ?>" maxlength="10" ; oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mt-3 me-5 ms-5">
                                                <label class="labels">Email</label><br>
                                                <input type="text" id="adminp" name="email" value="<?php echo $user->getEmail(); ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="text-center ms-5">
                                                <a href="/dashboard/adminpass"><button class="btn btn-outline-dark mt-4" type="button" style="float:left;">Change Password</button></a>
                                                <button class="btn profile-button mt-4 ms-3" type="submit" style="background-color:#db6551; color:white;">Save Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once dirname(__DIR__) . '/footer.php'; ?>
        </div>
    </div>
    <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
        <div class="toast-container top-0 end-0 p-3">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="toast-header">
                    <img src="/Ohana/src/dashboard/img/main/notification.png" width="25px" height="25px" alt="">
                    <strong class="me-auto fs-4"> &nbsp; Notification </strong>
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
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
    <script src="/Ohana/src/dashboard/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>