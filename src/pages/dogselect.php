<!DOCTYPE html>
<html lang="en">

<head>

    <title> SELECT DOG FOR STUD </title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/petprofiles.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        #selector{
            background-color: #c0b65a;
            border-color: #c0b65a;
        }
        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #header {
                font-size: 37px;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <section class="abouthead">
                <h1 id="header" class="text-center mb-5"> Choose dog for Stud Service </h1>
                <div class="container-fluid">
                    <?php
                    include_once dirname(__DIR__) . '/models/PetProfile.php';

                    $profiles = unserialize($_SESSION["profiles"]);
                    if (!empty($profiles) && count($profiles) <= 3) {
                        if (count($profiles) < 3) {
                    ?>

                        <?php
                        }
                        ?>
                        <div class="d-flex justify-content-center" style="margin-bottom:5%">
                            <?php
                            foreach ($profiles as $profile) {
                            ?>

                                <div class="card m-3 mb-5" style="width: 20rem;">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top" alt="<?php echo $profile->getName(); ?> Image" width="200px" height="250px;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fs-3" style="font-family: 'Acme', sans-serif; color:#db6551"> <?php echo $profile->getName(); ?></h5>
                                        <center><button type="button" id="selector" class="btn btn-outline-warning text-white mt-3 mb-2"> Select Dog </button></center>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    } else if (empty($profiles)) {
                    ?>
                        <div class="form__row text-center mb-5">
                            <p class="fs-4">Do not have a pet profile?&nbsp;<a class="link" name="login" style="text-decoration:none; color:#db6551" href="/createpetprofile">Create now!</a></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>
        </div>
    </main>

    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>