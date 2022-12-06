<!DOCTYPE html>
<html lang="en">

<head>
    <title> OWNED PETS </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/petprofiles.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        #profilecard {
            width: 20rem;
        }

        #ohanafooter {
            margin-top: 10%;
        }

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #header {
                font-size: 40px;
                margin-top: 30%;
            }

            .card {
                margin-top: -20px;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'Rnavbar.php'; ?>
        <section class="abouthead">
            <h1 id="header" class="text-center mb-2"> Your Pets </h1>
            <?php
            include_once dirname(__DIR__) . '/models/PetProfile.php';
            include_once dirname(__DIR__) . '/config/db-config.php';
            include_once dirname(__DIR__) . '/database/Database.php';
            include_once dirname(__DIR__) . '/dao/PetProfileDAO.php';
            include_once dirname(__DIR__) . '/services/PetProfileServices.php';

            $database = new Database($servername, $database, $username, $password);
            $dao = new PetProfileDAO($database);
            $services = new PetProfileServices($dao);

            $profiles = $services->getUserPetProfile($user->getId());
            if (empty($profiles)) {
            ?>
                <div class="form__row text-center mb-5">
                    <p class="fs-4">Do not have a pet profile?&nbsp;<a class="link" name="login" style="text-decoration:none; color:#db6551" href="/createpetprofile">Create now!</a></p>
                </div>
                <?php } else {
                if ($user->getType() == "USER") {
                    if (count($profiles) < 3) { ?>
                        <div class="form__row text-center mb-5">
                            <p class="text-center fs-4"><a class="text-decoration-none" name="login" style="color:#db6551" href="/createpetprofile">Add another Pet Profile</a></p>
                        </div>
                        <?php
                        if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null; ?>
                            </div>
                    <?php
                            unset($_SESSION["msg"]);
                        }
                    } ?>
                    <div class="container-fluid d-flex justify-content-center">
                        <div class="row d-flex justify-content-center">
                            <?php foreach ($profiles as $profile) { ?>
                                <div class="card m-3 mb-5" id="profilecard">
                                    <a href="/ownedpets/<?php echo $profile->getId(); ?>/<?php echo $profile->getName(); ?>" style="text-decoration: none; color:black">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top" alt="<?php echo $profile->getName(); ?> Image" width="200px" height="250px;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fs-3" style="font-family: 'Acme', sans-serif; color:#db6551"> <?php echo $profile->getName(); ?></h5>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form__row text-center mb-5 mt-3">
                        <p class="text-center fs-4"><a name="login" style="color:#c0b65a;font-family: 'Acme', sans-serif;" href="/createpetprofile">Add another Pet Profile</a></p>
                    </div>
                    <?php
                    if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                        <center>
                            <div class="alert alert-warning text-center" role="alert" style="width:400px;">
                                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null; ?>
                            </div>
                        </center>
                    <?php
                        unset($_SESSION["msg"]);
                    }
                    ?>
                    <div class="container-fluid justify-content-center">
                        <div class="row justify-content-center">
                            <?php foreach ($profiles as $profile) { ?>
                                <div class="card m-3 mb-5" style="width: 20rem;">
                                    <a href="/ownedpets/profile/<?php echo $profile->getId(); ?>" style="text-decoration: none; color:black">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top p-2" alt="<?php echo $profile->getName(); ?> Image" width="200px" height="250px;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fs-3" style="font-family: 'Acme', sans-serif; color:#db6551"> <?php echo $profile->getName(); ?></h5>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
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