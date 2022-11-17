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

        @media screen and (min-width: 375px) and (max-width: 767.98px) { 
           .userheader{
            font-size:20px;
           } 
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">

            <section class="userprofile" style="margin-top:10%;">
                <div class="userheader">
                    <h1> USER PROFILE </h1>
                </div>
            </section>
            <section class="profilesection">
                <form action="" method="">
                    <div class="container d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="p-3 py-5">
                                <div class="mb-3"></div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels" style="color:#c0b65a; font-size:20px">Name</label><input type="text" class="form-control" placeholder="<?php echo $account->getFname(); ?>" value="<?php echo $account->getFname(); ?>" id="" name=""></div>
                                    <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px"><label class="labels">Middle Name</label><input type="text" class="form-control" placeholder="<?php echo $account->getMname(); ?>" value="<?php echo $account->getMname(); ?>" id="" name=""></div>
                                    <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px"><label class="labels">Last Name</label><input type="text" class="form-control" placeholder="<?php echo $account->getLname(); ?>" value="<?php echo $account->getLname(); ?>" id="" name=""></div>
                                    <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px"><label class="labels">Mobile Number (+63)</label><input type="text" class="form-control" placeholder="+63<?php echo $account->getNumber(); ?>" value="<?php echo $account->getNumber(); ?>" id="" name=""></div>
                                    <div class="col-md-12" style="margin-top:10px;color:#c0b65a; font-size:20px"><label class="labels">Email</label><input type="text" class="form-control" placeholder="<?php echo $account->getEmail(); ?>" value="<?php echo $account->getEmail(); ?>" id="email" name="email"></div>
                                </div>
                                <span>
                                    <div class="text-center"><button class="btn profile-button" type="button" style="background-color:#db6551; color:white; float:right">Save changes</button>
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