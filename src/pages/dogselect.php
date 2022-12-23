<!DOCTYPE html>
<html lang="en">

<head>
    <title> SELECT DOG FOR STUD </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/petprofiles.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        #selector {
            background-color: #c0b65a;
            border-color: #c0b65a;
        }

        .card {
            width: 20rem;
        }

        #header {
            font-family: 'Acme', sans-serif;
            font-size: 60px;
            color: #db6551;
            margin-top: 5%;
        }

        #offer {
            width: 40rem;
        }

        #proc {
            width: 40rem;
        }

        @media screen and (min-width: 500px) and (max-width: 1350px) {
            #header {
                margin-top: 15%;
            }
        }

        @media screen and (min-width: 360px) and (max-width: 430px) {
            #header {
                font-size: 37px;
                margin-top: 25%;
            }

            #proc {
                width: 20rem;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'navigationbar.php'; ?>
        <div class="container-fluid">
            <section class="abouthead">
                <h1 id="header" class="text-center mb-5"> Choose dog for Stud Service </h1>
                <div class="container-fluid">
                    <?php
                    require dirname(__DIR__) . '/models/PetProfile.php';
                    require dirname(__DIR__) . '/config/db-config.php';
                    require dirname(__DIR__) . '/dao/PetProfileDAO.php';
                    require dirname(__DIR__) . '/dao/LogDAO.php';
                    require dirname(__DIR__) . '/services/PetProfileServices.php';
                    require dirname(__DIR__) . '/services/LogServices.php';

                    $dao = new PetProfileDAO($servername, $database, $username, $password);
                    $logdao = new LogDAO($servername, $database, $username, $password);
                    $logservices = new LogServices($logdao);
                    $services = new PetProfileServices($dao, null);

                    $profiles = $services->getUserPetProfile($user->getId());
                    $_SESSION["profile"] = serialize($profiles);
                    if (!empty($profiles)) {
                    ?>
                        <form id="studForm" method="POST" action="/stud/book">
                            <input type="hidden" name="studReference" value="<?php echo $_GET["reference"]; ?>">
                            <div class="d-flex justify-content-center">
                                <?php
                                foreach ($profiles as $profile) {
                                ?>
                                    <div class="card m-3 mb-5" id="profilecard">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top" alt="<?php echo $profile->getName(); ?> Image" width="200px" height="250px;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fs-3" style="font-family: 'Acme', sans-serif; color:#db6551"> <?php echo $profile->getName(); ?></h5>
                                            <center><input class="form-check-input mt-3" type="radio" name="partnerReference" id="<?php echo $profile->getReference(); ?>" value="<?php echo $profile->getId(); ?>" required /></center>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="d-flex justify-content-center mb-5">
                                <div class="card text-center mx-3" id="offer">
                                    <h1 class="mt-4"> We offer pet boarding(optional) after availing our stud service for your dog<br><br>Would you like to avail this service? </h1>
                                    <div class="d-flex">
                                        <div class="card-body">
                                            <input class="form-check-input mt-3" type="radio" name="petBoardingChoice" id="yes" value="YES" />
                                            <label class="form-check-label mt-3 mb-3 ms-5" for="payment-method"> YES </label>
                                            <input class="form-check-input mt-3" type="radio" name="petBoardingChoice" id="no" value="NO" checked />
                                            <label class="form-check-label mt-3 mb-3" for="no">NO</label>
                                            <div id="slots"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center> <button type="submit" class="btn text-white p-3 mb-5" id="proc" style="background-color:#db6551;">Proceed</button></center>
                        </form>
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#studForm').find("input[name='petBoardingChoice']").click(function(e) {
                let buttonVal = $("input[type='radio'][name='petBoardingChoice']:checked").val();

                if (buttonVal == 'YES') {
                    $('#slots').empty();
                    $('#slots').append(`
                    <hr>
<?php
include_once dirname(__DIR__) . '/config/db-config.php';
include_once dirname(__DIR__) . '/dao/BoardingSlotDAO.php';
include_once dirname(__DIR__) . '/services/BoardingSlotServices.php';

$dao = new BoardingSlotDAO($servername, $database, $username, $password);
$services = new BoardingSlotServices($dao);

$slots = $services->getAvailableSlots();

if (is_null($slots)) {
?>
Sorry! We do not have an available pet boarding slot at the moment. Please try again later.
<?php
} else {
    foreach ($slots as $slot) { ?>

  <div class="row g-0">
    <div class="col-md-4">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($slot->getImage()); ?>" class="img-fluid rounded-start p-2" alt="<?php echo $slot->getName(); ?> Image">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $slot->getName(); ?></h5>
        <input class="form-check-input mt-1" type="radio" name="slotId" value="<?php echo $slot->getId(); ?>" />
      </div>
    </div>
  </div>

    <?php }
} ?> 
                    `);
                } else {
                    $('#slots').empty();
                }
            });
        });
    </script>
</body>

</html>