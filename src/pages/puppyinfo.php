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
        .card {
            max-width: 60vw;
            max-height: 60vh;
            background-color: #2f1f18;
            border-color: none;
        }

        .message {
            margin-top: 10%;
        }

        #cardbg {
            width: 100%;
            height: 70vh;
        }

        #ohanafooter {
            margin-top: 20%;
        }

        #links {
            text-decoration: none;
        }

        .img-fluid {
            height: 300px;
        }

        @media screen and (min-width: 360px) and (max-width: 929.98px) {}
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'rnavbar.php'; ?>
        <?php
        include_once dirname(__DIR__) . '/models/PetProfile.php';
        include_once dirname(__DIR__) . '/config/app-config.php';
        $profile = isset($_SESSION["rehoming-profile"]) ? unserialize($_SESSION["rehoming-profile"]) : null;
        if (empty($profile)) {
            unset($_SESSION["profile"]);
        ?>
            <script type="text/javascript">
                const url = "http://<?= DOMAIN_NAME ?>/ownedpets";
                window.location.href = url;
            </script>
        <?php
        } else if ($profile->getName() != str_replace("%20", " ", $name)) {
            unset($_SESSION["profile"]);
        ?>
            <script type="text/javascript">
                const url = "http://<?= DOMAIN_NAME ?>/ownedpets";
                window.location.href = url;
            </script>
        <?php } ?>
        <div class="container-fluid">
            <div class="message">
                <section class="services" id="services">
                    <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                        <center>
                            <div class="alert alert-warning text-center" role="alert" style="width:400px;">
                                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                                unset($_SESSION["msg"]); ?>
                            </div>
                        </center>
                    <?php
                        unset($_SESSION["msg"]);
                    }
                    ?>
                    <div class="card mx-auto img-fluid">
                        <img class="card-img-top" src="/Ohana/src/images/Ohanapups/cardbg.png" alt="Card image" id="cardbg">
                        <div class="card-img-overlay">
                            <div class="header">
                                <p class="text-center fs-1" style="font-family: 'Acme', sans-serif;"><b> <?php echo $profile->getName(); ?> </b></p>
                            </div>
                            <div class="row justify-content">
                                <div class="col-md-5 mx-auto">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img img-fluid mt-5" width="200px" height="250px;">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body mt-5 mb-5">
                                        <p class="card-text"> <b>BIRTHDAY:</b> <?php echo $profile->getBirthdate()->format('M-d-Y'); ?> </p>
                                        <p class="card-text"> <b>COLOR:</b> <?php echo $profile->getColor(); ?> </p>
                                        <p class="card-text"> <b>GENDER:</b> <?php echo $profile->getSex(); ?> </p>
                                        <p class="card-text"> <b>GENES:</b> <?php echo $profile->getTrait(); ?> </p>
                                        <p class="card-text"> <b>PCCI PAPERS:</b> <?php echo $profile->getPcciStatus(); ?></p>
                                        <p class="card-text"> <b>VACCINE:</b></p>
                                        <p class="card-text"> <b>PRICE:</b></p>
                                        <p class="card-text fw-bold"> Note: All french bulldog puppies are fully vaccinated before release.</p>
                                    </div>
                                    <div name="buttons" style="margin-top:10%">
                                        <a id="links" href="/puppies">
                                            <button type="button" class="btn-outline-dark btn mt-3 me-3 ms-2"> Go Back </button>
                                        </a>
                                        <a id="links" href="/set-appointment?type=VISIT">
                                            <button type="button" class="btn mt-3 ms-2" style="background-color:#db6551;color:white;"> Book Kennel Visit </button>
                                        </a>
                                        <a id="links" href="/add-to-cart/<?php echo $profile->getId(); ?>">
                                            <button type="button" class="btn mt-3" style="background-color:#c0b65a; color:white;"> Add to Paw Cart </button>
                                        </a>
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
</body>

</html>