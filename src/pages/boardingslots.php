<!DOCTYPE html>
<html lang="en">

<head>
    <title> BOARDING SLOTS </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        .message {
            margin-top: 10%;
        }

        #header {
            font-size: 80px;
            color: #DB6551;
            font-family: 'Acme', sans-serif;
        }

        .card {
            width: 20rem;
        }

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            .card {
                width: 10rem;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'rnavbar.php'; ?>
        <div class="container-fluid">
            <div class="message">
                <section class="services" id="services">
                    <?php
                    require dirname(__DIR__) . '/models/BoardingSlot.php';
                    require dirname(__DIR__) . '/config/db-config.php';
                    require dirname(__DIR__) . '/dao/BoardingSlotDAO.php';
                    require dirname(__DIR__) . '/services/BoardingSlotServices.php';

                    $dao = new BoardingSlotDAO($servername, $database, $username, $password);
                    $services = new BoardingSlotServices($dao);

                    $slots = $services->getAvailableSlots();
                    if (empty($slots)) {
                    ?>
                        <div class="service">
                            <h1 class="mb-2 text-center fs-4"> There is currenly no available slots for pet boarding</h1>
                        </div>
                    <?php } else { ?>
                        <div class="service">
                            <h1 class="mb-2 text-center" id="header"> Choose a pet boarding slot </h1>
                        </div>
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="row d-flex justify-content-center">
                                <?php foreach ($slots as $slot) { ?>
                                    <div class="card m-3 mt-5">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($slot->getImage()); ?>" class="card-img-top" alt="<?php echo $slot->getName(); ?> Image" width="250px" height="250px;" style="margin-top:10px;">
                                        <div class="card-body">
                                            <h5 class="card-title text-center mb-3"> Slot: <?php echo $slot->getName(); ?></h5>
                                            <center>
                                                <input class="form-check-input mt-3" type="radio" name="inlineRadioOptions" id="<?php echo $slot->getId(); ?>" value="<?php echo $slot->getId(); ?>" />
                                                <label class="form-check-label mt-3 mb-3" for="payment-method"> Select <?php echo $slot->getName(); ?></label>
                                            </center>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </section>
                <center> <a href="/select-stud-dog"><button class="btn btn-outline-dark mt-5 px-4 py-2 ms-3"> Go Back </button> </a>
                    <button type="submit" class="btn mt-5 text-light px-4 py-2" style="background-color:#DB6551"> Proceed </button>
                </center>
            </div>
        </div>
    </main>

    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>