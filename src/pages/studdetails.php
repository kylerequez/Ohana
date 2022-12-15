<!DOCTYPE html>
<html lang="en">

<head>
    <title> STUD PROFILES </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        .card-img-overlay {
            width: 100%;
            height: 70vh;
        }

        #pupcard {
            max-width: 55vw;
            max-height: 50vh;
            border-style: solid;
            border-color: #eed1c2;
            border-width: 5px;
            margin-top: 15%;
        }

        #editcard {
            margin-top: 15%;
            margin-bottom: 10%;
            max-width: 65vw;
            max-height: 80vh;
            border-style: solid;
            border-color: #c0b65a;
            border-width: 5px;
        }

        b {
            font-family: 'Acme', sans-serif;
            color: #7d6056;
        }

        #ohanafooter {
            margin-top: 7%;
        }

        @media screen and (min-width: 360px) and (max-width: 429px) {
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
    include_once dirname(__DIR__) . '/dao/PetProfileDAO.php';
    include_once dirname(__DIR__) . '/services/PetProfileServices.php';

    $dao = new PetProfileDAO($servername, $database, $username, $password);
    $services = new PetProfileServices($dao);

    $name = str_replace("%20", " ", $name);
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
    <?php include_once 'navigationbar.php'; ?>
        <div class="container-fluid">
            <div class="container h-90">
                <div class="card mx-auto" id="pupcard">
                    <div class="row g-0">
                        <div class="col-md-6 d-none d-md-block">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="img-fluid p-5" id="picture" />
                        </div>
                        <div class="col-md-6">
                            <div class="card-body p-md-5 text-black">
                                <p class="text-center fs-1"><b> <?php echo $profile->getName(); ?> </b></p>
                                <div class="card-body">
                                    <p class="card-text"> <b class="ms-2">BIRTHDAY:</b> <?php echo $profile->getBirthdate()->format('M-d-Y'); ?> </p>
                                    <p class="card-text"> <b class="ms-2">COLOR:</b> <?php echo $profile->getColor(); ?> </p>
                                    <p class="card-text"> <b class="ms-2">GENDER:</b> <?php echo $profile->getSex(); ?> </p>
                                    <p class="card-text"> <b class="ms-2">GENES:</b> <?php echo $profile->getTrait(); ?> </p>
                                    <p class="card-text"> <b class="ms-2">PCCI PAPERS:</b> <?php echo ($profile->getPcciStatus() == 'REGISTERED') ? 'Registered' : 'Pending'; ?></p>
                                    <p class="card-text"> <b class="ms-2">SUCCESS RATE:</b> <?php //echo $profile->getSuccessRate(); 
                                                                                            ?></p>
                                    <p class="card-text fw-bold mt-3"> Our Adult Frenchies are fully vaccinated.</p>
                                    <p class="card-text fw-bold"> Note: Message us on social media for more pictures. </p>
                                </div>
                                <div class="buttons mt-5">
                                    <a href="/stud"><button class="btn btn-outline-dark" style="margin-left:5%"> Go Back</button></a>
                                    <a href="/select-stud-dog?reference=<?php echo $profile->getReference(); ?>"><button type="button" class="btn text-white" style="margin-left:5%; background-color:#c0b65a; ">Book as Stud</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
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