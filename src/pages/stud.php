<!DOCTYPE html>
<html lang="en">

<head>
    <title> STUD PROFILES </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        .card {
            width: 20rem;
        }

        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        @media screen and (min-width: 360px) and (max-width: 929.98px) {}
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'rnavbar.php'; ?>
        <div class="container-fluid">
            <div class="message">
                <section class="services" id="services">
                    <?php
                    include_once dirname(__DIR__) . '/models/PetProfile.php';
                    include_once dirname(__DIR__) . '/config/db-config.php';
                    include_once dirname(__DIR__) . '/database/Database.php';
                    include_once dirname(__DIR__) . '/dao/PetProfileDAO.php';
                    include_once dirname(__DIR__) . '/services/PetProfileServices.php';

                    $database = new Database($servername, $database, $username, $password);
                    $dao = new PetProfileDAO($database);
                    $services = new PetProfileServices($dao);

                    $profiles = $services->getStudPets();
                    if (empty($profiles)) {
                    ?>
                        <div class="service mb-4">
                            <h1 class="text-center fs-1 mt-5" style="color:#DB6551; font-family: 'Acme', sans-serif; "> There are currently NO AVAILABLE <br><br> french bulldog puppies for stud service</h1>
                        </div>
                    <?php } else { ?>
                        <div class="service">
                            <h1 class="mt-4 mb-5 text-center" id="studtitle"> Choose a perfect pair </h1>
                        </div>
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="row  d-flex justify-content-center">
                                <?php foreach ($profiles as $profile) { ?>
                                    <div class="card m-3 text-center" style="width: 20rem;">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top" alt="<?php echo $profile->getName(); ?> Image" width="250px" height="250px;" style="margin-top:10px;">
                                        <div class="card-body">
                                            <h5 class="card-title fs-2 fw-bold" style="font-family: 'Acme', sans-serif;"> <?php echo $profile->getName(); ?></h5>
                                            <p class="card-text mb-4 text-center"> Stud success rate: </p>
                                            <p class="card-text"> Price: <?php echo $profile->getPrice(); ?> </p>
                                            <div class="btn-Learn mt-3" name="btn-Learn">
                                                <center><a href="/stud/<?php echo $profile->getReference(); ?>/<?php echo $profile->getName(); ?>"><button id="btnLearn" name="btnLearn"><span> More Info! </span></button></a></center>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>



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