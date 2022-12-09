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
        #paragraph {
            font-family: 'Acme', sans-serif;
        }

        .card-img-overlay {
            width: 100%;
            height: 70vh;
        }

        .card {
            border: none;
        }

        #studinfo {
            max-width: 50vw;
            max-height: 80vh;
            background-color: #2f1f18;

        }

        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            .card-img-overlay {
                width: 100%;
                height: 30vh;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <?php
    include_once dirname(__DIR__) . '/models/PetProfile.php';
    include_once dirname(__DIR__) . '/config/db-config.php';
    include_once dirname(__DIR__) . '/config/app-config.php';
    include_once dirname(__DIR__) . '/database/Database.php';
    include_once dirname(__DIR__) . '/dao/PetProfileDAO.php';
    include_once dirname(__DIR__) . '/services/PetProfileServices.php';

    $database = new Database($servername, $database, $username, $password);
    $dao = new PetProfileDAO($database);
    $services = new PetProfileServices($dao);

    $profile = $services->getOhanaStudPet($reference, $name);
    if (is_null($profile)) {
    ?>
        <script>
            window.location = 'http://<?php echo DOMAIN_NAME; ?>/stud';
        </script>
    <?php
    } else if ($profile->getReference() != $reference) {
    ?>
        <script>
            window.location = 'http://<?php echo DOMAIN_NAME; ?>/stud';
        </script>
    <?php
    } else if ($profile->getName() !=  $name) {
    ?>
        <script>
            window.location = 'http://<?php echo DOMAIN_NAME; ?>/stud';
        </script>
    <?php
    } else if ($profile->getStatus() != 'AVAILABLE') {
    ?>
        <script>
            window.location = 'http://<?php echo DOMAIN_NAME; ?>/stud';
        </script>
    <?php
    }
    ?>
    <main>
        <?php include_once 'rnavbar.php'; ?>
        <div class="container-fluid">
            <div class="message">
                <section class="services" id="services">
                    <div class="card mx-auto img-fluid" id="studinfo">
                        <img class="card-img-top img-fluid" src="/Ohana/src/images/Ohanapups/cardbg.png" alt="Card image">
                        <div class="card-img-overlay">
                            <p class="text-center fs-2 fw-bold mb-3" id="paragraph"><b><?php echo $profile->getName(); ?></b></p>
                            <div class="row justify-content">
                                <div class="col-md-5 mx-auto mt-5">
                                    <center> <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="img-fluid" style="width:200px;height:200px"> </center>
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body"><br>
                                        <p class="card-text"> <b>BIRTHDAY:</b><?php echo $profile->getBirthdate()->format('M-d-Y'); ?></p>
                                        <p class="card-text"> <b>COLOR:</b><?php echo $profile->getColor(); ?></b>
                                        <p class="card-text"> <b>TRAIT:</b><?php echo $profile->getTrait(); ?></p>
                                        <p class="card-text"> <b>PCCI PAPERS:</b><?php echo ($profile->getPcciStatus() == "REGISTERED") ? "Registered" : "Pending"; ?></p>
                                        <p class="card-text"> <b>SUCCESS RATE:</b><?php //echo $profile->getSuccessRate(); 
                                                                                    ?></p>
                                        <p class="card-text fw-bold mt-3"> <b>NOTE: Our Adult Frenchies are fully vaccinated. </b></p>
                                    </div>
                                    <div id="buttons">
                                        <a href="/stud"><button type="button" class="btn btn-outline-dark" style="margin-left:5%"> Go Back</button></a>
                                        <a href="/select-stud-dog?id=<?php echo $profile->getId(); ?>"><button type="button" class="btn text-white" style="margin-left:5%; background-color:#c0b65a; ">Book as Stud</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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