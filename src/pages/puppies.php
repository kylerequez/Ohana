<!DOCTYPE html>
<html lang="en">

<head>
    <title> OHANA PUPPIES </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        #header {
            color: #DB6551;
            font-size: 80px;
            font-family: 'Acme', sans-serif;
            font-weight: 800;
        }

        #ohanafooter {
            margin-top: 10%;
        }

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #header {
                font-size: 40px;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'Rnavbar.php'; ?>
        <div class="container-fluid">
            <div class="message" style="margin-top:10%;">
                <section class="services" id="services">
                    <?php
                    include_once dirname(__DIR__) . '/models/PetProfile.php';
                    $profiles = unserialize($_SESSION["rehoming"]);
                    if (empty($profiles)) {
                    ?>
                        <div class="service mb-4">
                            <h1 class="text-center fs-1 mt-5" style="color:#DB6551; font-family: 'Acme', sans-serif; "> There are currently NO AVAILABLE <br><br> french bulldog puppies for rehoming</h1>
                        </div>
                    <?php } else { ?>
                        <div class="service">
                            <h1 class="mb-4 text-center" id="header"> Add to your Ohana now!</h1>
                        </div>
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="row  d-flex justify-content-center">
                                <?php foreach ($profiles as $profile) { ?>
                                    <div class="card m-3 text-center" style="width: 20rem;">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top" alt="<?php echo $profile->getName(); ?> Image" width="250px" height="250px;" style="margin-top:10px;">
                                        <div class="card-body">
                                            <h5 class="card-title fs-2 fw-bold" style="font-family: 'Acme', sans-serif;"> <?php echo $profile->getName(); ?></h5>
                                            <p class="card-text"> <?php echo $profile->getBirthdate()->format('Y-m-d'); ?> </p>
                                            <p class="card-text"> <?php echo $profile->getPrice(); ?> </p>
                                            <div class="btn-Learn mt-3" name="btn-Learn">
                                                <center><a href="/rehoming/get/<?php echo $profile->getId(); ?>"><button id="btnLearn" name="btnLearn"><span> More Info! </span></button></a></center>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </section>
            </div>
        </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</body>

</html>