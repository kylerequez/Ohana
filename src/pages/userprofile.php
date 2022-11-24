<!DOCTYPE html>
<html lang="en">

<head>
    <title> USER PROFILE </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/userprofile.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #header {
                font-size: 40px;
                margin-top: 40%;
            }

            #labels {
                width: 200px;
            }

            #name {
                margin-top: -50px;
            }

            #save {
                max-width: 500px;
                margin-left: auto;
                margin-right: auto;
                float: none;
                margin-top: 40px;
            }

            #change {
                max-width: 500px;
                margin-left: auto;
                margin-right: auto;
                float: none;
                margin-top: -50px;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">

            <section class="userprofile">
                <div class="userheader">
                    <h1 id="header"> USER PROFILE </h1>
                    <!-- alert -->
                    <div class="container-sm">
                        <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                <p class="text-center fs-4"><?php echo $_SESSION["msg"] ?>
                            </div>
                        <?php
                        }
                        unset($_SESSION["msg"]);
                        ?>
                    </div>
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
                                        <label class="labels mb-3" id="name">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user->getFname(); ?>" id="fname" name="fname">
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <label class="labels mb-3" id="labels">Middle Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user->getMname(); ?>" id="mname" name="mname">
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <label class="labels mb-3" id="labels">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user->getLname(); ?>" id="lname" name="lname">
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <label class="labels mb-3" id="labels">Mobile Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="contact-no">+63</span>
                                            <input type="text" class="form-control" value="<?php echo str_replace("+63", "", $user->getNumber()); ?>" maxlength="10" ; oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="number">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <label class="labels mb-3" id="labels">Email</label>

                                        <input type="text" class="form-control" value="<?php echo $user->getEmail(); ?>" id="email" name="email">
                                    </div>
                                </div>
                                <span>
                                    <div class="text-center"><button class="btn profile-button" id="save" type="submit">Save changes</button>
                                    </div>
                                    <div class="mt-5 text-center"><a href="/change-password"><button class="btn btn-outline-dark" type="button" id="change"> Change Password</button></a></div>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>