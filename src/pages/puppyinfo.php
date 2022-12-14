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
        #pupcontainer {
            margin-top: 10%;
        }

        #pupcard {
            max-width: 55vw;
            max-height: 50vh;
            border-style: solid;
            border-color: #eed1c2;
            border-width: 5px;
        }

        #pupname {
            font-family: 'Acme', sans-serif;
            color: #db6551;
        }

        #buttons {
            margin-top: -20px;
        }

        #ohanafooter {
            position: relative;
            margin-top: 7%;
        }

        #links {
            text-decoration: none;
        }

        .img-fluid {
            height: 500px;
            width: 100%;
        }

        b {
            font-family: 'Acme', sans-serif;
            color: #7d6056;
        }

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #pupcard {
                max-height: 60vh;
                margin-top: 35%;
            }

            #buttons {
                margin-top: -20px;
                align-items: center;
                margin-left: 10px;
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
    $profile = $services->getOhanaRehomingPet($reference, $name);
    if (is_null($profile)) {
    ?>
        <script>
            window.location = 'http://<?php echo DOMAIN_NAME; ?>/puppies';
        </script>
    <?php
    } else if ($profile->getReference() != $reference) {
    ?>
        <script>
            window.location = 'http://<?php echo DOMAIN_NAME; ?>/puppies';
        </script>
    <?php
    } else if ($profile->getName() !=  $name) {
    ?>
        <script>
            window.location = 'http://<?php echo DOMAIN_NAME; ?>/puppies';
        </script>
    <?php
    } else if ($profile->getStatus() != 'AVAILABLE') {
    ?>
        <script>
            window.location = 'http://<?php echo DOMAIN_NAME; ?>/puppies';
        </script>
    <?php
    }
    ?>
    <main>
        <?php include_once 'rnavbar.php'; ?>
        <div class="container-fluid" id="pupcontainer">
            <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                <center>
                    <div class="alert alert-warning text-center" role="alert" style="width:400px;margin-top:5%;">
                        <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                        unset($_SESSION["msg"]); ?>
                    </div>
                </center>
            <?php
                unset($_SESSION["msg"]);
            }
            ?>
            <div class="container h-90">
                <div class="card mx-auto" id="pupcard">
                    <div class="row g-0">
                        <div class="col-md-6 d-none d-md-block">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="img-fluid p-5" id="picture" />
                        </div>
                        <div class="col-md-6">
                            <div class="card-body p-md-5 text-black">
                                <p class="text-center fs-1" id="pupname"><b> <?php echo $profile->getName(); ?> </b></p>
                                <div class="card-body">
                                    <p class="card-text"> <b class="ms-2">BIRTHDAY:</b> <?php echo $profile->getBirthdate()->format('M-d-Y'); ?> </p>
                                    <p class="card-text"> <b class="ms-2">COLOR:</b> <?php echo $profile->getColor(); ?> </p>
                                    <p class="card-text"> <b class="ms-2">GENDER:</b> <?php echo $profile->getSex(); ?> </p>
                                    <p class="card-text"> <b class="ms-2">GENES:</b> <?php echo $profile->getTrait(); ?> </p>
                                    <p class="card-text"> <b class="ms-2">PCCI PAPERS:</b> <?php echo ($profile->getPcciStatus() == 'REGISTERED') ? 'Registered' : 'Pending'; ?></p>
                                    <p class="card-text"> <b class="ms-2">VACCINE:</b> <?php echo ($profile->getIsVaccinated() == '1') ? 'Vaccinated' : 'Not Vaccinated'; ?></p>
                                    <p class="card-text"> <b class="ms-2">PRICE:</b> ₱ <?php echo number_format($profile->getPrice(), 2); ?></p>
                                    <p class="card-text fw-bold mt-3"> - All french bulldog puppies are fully vaccinated before release.</p>
                                    <p class="card-text fw-bold"> Note: Message us on social media for more pictures. </p>
                                </div>
                            </div>
                            <div class="me-5 mb-5" id="buttons">
                                <a id="links" href="/puppies">
                                    <button type="button" class="btn-outline-dark btn mt-3 me-3 ms-2"> Go Back </button>
                                </a>
                                <a id="links" href="/set-appointment?type=VISIT&reference=<?php echo $profile->getReference(); ?>">
                                    <button type="button" class="btn mt-3 ms-2" style="background-color:#db6551;color:white;"> Book Kennel Visit </button>
                                </a>
                                <a id="links" href="/add-to-cart/<?php echo $profile->getId(); ?>">
                                    <button type="button" class="btn mt-3" style="background-color:#c0b65a; color:white;"> Add to Paw Cart </button>
                                </a>
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
</body>

</html>