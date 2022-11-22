<!DOCTYPE html>
<html lang="en">

<head>
    <title> USER PROFILE </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/userprofile.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
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
            <section class="userprofile" style="margin-top:10%;">
                <div class="userheader">
                    <h1> USER PROFILE </h1>
                </div>
            </section>
            <section class="profilesection">
                <form action="/accounts/update" method="POST">
                    <div class="container d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="p-3 py-5">
                                <div class="mb-3"></div>
                                <div class="row mt-3">
                                    <input type="hidden" name="status" value="<?php echo $user->getStatus(); ?>">
                                    <input type="hidden" name="type" value="<?php echo $user->getType(); ?>">
                                    <div class="col-md-12">
                                        <label class="labels" style="color:#c0b65a; font-size:20px">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user->getFname(); ?>" id="" name="fname">
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px">
                                        <label class="labels">Middle Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user->getMname(); ?>" id="" name="mname">
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px">
                                        <label class="labels">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user->getLname(); ?>" id="" name="lname">
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px">
                                        <label class="labels">Mobile Number (+63)</label>
                                        <input type="text" class="form-control" value="<?php echo str_replace("+63", "", $user->getNumber()); ?>" maxlength="10" ; oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="number">
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px">
                                        <label class="labels">Email</label>
                                        <span class="input-group-text" id="contact-no">+63</span>
                                        <input type="text" class="form-control" value="<?php echo $user->getEmail(); ?>" id="email" name="email">
                                    </div>
                                </div>
                                <span>
                                    <div class="text-center"><button class="btn profile-button" type="submit" style="background-color:#db6551; color:white; float:right">Save changes</button>
                                    </div>
                                    <div class="mt-5 text-center"><a href="/changepassword"><button class="btn profile-button" type="button" style="background-color:#db6551; color:white; float:right; margin-right:10px;"> Change Password</button></a></div>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="/Ohana/src/dashboard/js/script.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>