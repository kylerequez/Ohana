<!DOCTYPE html>
<html lang="en">

<head>

    <title> OWNED PETS </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/petprofiles.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">

    <?php include_once 'stylesheets.php'; ?>
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

            <section class="abouthead" style="margin-top:10%;">
                <h1 class="text-center" style="color:#DB6551; font-size: 80px; font-family: 'Acme', sans-serif; font-weight:800"> Your Pets </h1><br>
                <div class="form__row text-center mb-5">
                    <p style="font-size:20px;">Do not have a pet profile?&nbsp;<a class="link" name="login" style="text-decoration:none; color:#db6551" href="/createpetprofile">Create now!</a></p>
                    <p style="font-size:20px;"><a class="text-decoration-none" name="login" style="color:#db6551" href="/createpetprofile">Add another Pet Profile</a></p>
                </div>

                <div class="container-fluid d-flex justify-content-center">
                    <?php
                    include_once dirname(__DIR__) . '/models/PetProfile.php';
                    $profiles = unserialize($_SESSION["profiles"]);

                    if (!empty($profiles)) {
                        foreach ($profiles as $profile) {
                    ?>
                            <a href="/ownedpets/profile/<?php echo $profile->getId(); ?>" style="text-decoration: none; color:black">
                                <div class="card m-3" style="width: 20rem;">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top" alt="<?php echo $profile->getName(); ?> Image" width="250px" height="250px;">
                                    <div class="card-body">
                                        <h5 class="card-title"> <?php echo $profile->getName(); ?></h5>
                                        <p class="card-text"> <?php echo $profile->getBirthdate()->format('Y-m-d'); ?> </p>
                                        <p class="card-text"> <?php echo $profile->getPrice(); ?> </p>
                                    </div>
                                </div>
                            </a>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-info">You currently do not have any pet profiles</div>
                    <?php
                    }
                    ?>
                </div>
            </section>

        </div>
    </main>

    <div class="container-fluid" style="margin-top:10%">
        <?php include_once 'footer.php'; ?>
    </div>

    <!-- SCIPTS -->
    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>
    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>


</body>

</html>