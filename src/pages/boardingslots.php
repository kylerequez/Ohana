<!DOCTYPE html>
<html lang="en">

<head>

    <title> BOARDING SLOTS </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
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

            <div class="message" style="margin-top:10%;">
                <section class="services" id="services">
                    <?php
                    include_once dirname(__DIR__) . '/models/PetProfile.php';
                    $profiles = unserialize($_SESSION["profiles"]);
                    if (empty($profiles)) {
                    ?>
                        <div class="service">
                            <h1 class="mb-2 text-center" style="color:#DB6551; font-size: 80px; font-family: 'Acme', sans-serif; font-weight:800;"> THERE IS CURRENTLY NO AVAILABLE SLOTS FOR PET BOARDING</h1>
                        </div>
                    <?php } else { ?>
                        <div class="service">
                            <h1 class="mb-2 text-center" style="color:#DB6551; font-size: 80px; font-family: 'Acme', sans-serif; font-weight:800;"> CHOOSE PET BOARDING SLOT </h1>
                        </div>
                        <!-- AVAILABLE PUPPIES CARD -->
                        <div class="container d-flex justify-content-center">
                            <div class="row">
                                <?php foreach ($profiles as $profile) { ?>
                                    <div class="card m-3" style="width: 20rem;">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top" alt="<?php echo $profile->getName(); ?> Image" width="250px" height="250px;" style="margin-top:10px;">
                                        <div class="card-body">
                                            <h5 class="card-title"> <?php echo $profile->getName(); ?></h5>
                                            <p class="card-text"> <?php echo $profile->getBirthdate()->format('Y-m-d'); ?> </p>
                                            <p class="card-text"> <?php echo $profile->getPrice(); ?> </p>
                                            <div class="btn-Learn" name="btn-Learn">
                                                <center><a href="/puppy1"><button id="btnLearn" name="btnLearn"><span> Select </span></button></a></center>
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
    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>

    <!-- SCIPTS -->
    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>