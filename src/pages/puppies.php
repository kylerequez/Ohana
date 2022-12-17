<!DOCTYPE html>
<html lang="en">

<head>
    <title> OHANA PUPPIES </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        #header {
            color: #DB6551;
            font-size: 80px;
            font-family: 'Acme', sans-serif;
            font-weight: 800;
        }

        #puppycard {
            width: 20rem;
            border-style: solid;
            border-color: #eed1c2;
            border-width: 2px;
        }

        .btn-warning {
            color: white;
            background-color: #DB6551;
            background-image: none;
            border-color: #db6551;
            font-size: 16px;
            --bs-btn-hover-border-color: #c0b65a;
            --bs-btn-hover-bg: #c0b65a;
            --bs-btn-hover-color: white;
            border-radius: 30px;
            padding: 7px 40px;
        }

        #ohanafooter {
            margin-top: 10%;
        }

        @media screen and (min-width: 360px) and (max-width: 429px) {
            #header {
                font-size: 40px;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'navigationbar.php'; ?>
        <div class="container-fluid">
            <div class="message" style="margin-top:10%;">
                <section class="services" id="services">
                    <?php
                    include_once dirname(__DIR__) . '/models/PetProfile.php';
                    include_once dirname(__DIR__) . '/config/db-config.php';
                    include_once dirname(__DIR__) . '/dao/PetProfileDAO.php';
                    include_once dirname(__DIR__) . '/services/PetProfileServices.php';

                    $dao = new PetProfileDAO($servername, $database, $username, $password);
                    $services = new PetProfileServices($dao, null);

                    if (!isset($_GET['trait'])) $_GET['trait'] = 'All';
                    if (!isset($_GET['sex'])) $_GET['sex'] = 'All';

                    $profiles = $services->filterRehomingPets($_GET['trait'], $_GET['sex']);

                    if (is_null($profiles)) {
                    ?>
                        <div class="service mb-4">
                            <h1 class="text-center fs-2 mt-5" style="color:#DB6551; font-family: 'Acme', sans-serif;"> There are currently NO AVAILABLE <br><br> french bulldog puppies for rehoming</h1>
                        </div>
                        <form method="GET" action="/puppies">
                            <div class="container-md d-flex justify-content-center">
                                <div class="row d-flex justify-content-center">
                                    <div class="card mt-4 mb-4">
                                        <div class="card-body">
                                            <div class="filtering-inline-spacing">
                                                <div class="btn-group mx-2">
                                                    <select class="btn rounded-pill text-dark dropdown-toggle" style="border-color:#DB6551;" name="trait" required>
                                                        <option value="All" <?php if ($_GET['trait'] == 'All') echo 'selected'; ?>>All</option>
                                                        <option class="text-center" style="color:#DB6551" disabled>Standard</option>
                                                        <option value="Fawn" <?php if ($_GET['trait'] == 'Fawn') echo 'selected'; ?>>Fawn</option>
                                                        <option value="Sable" <?php if ($_GET['trait'] == 'Sable') echo 'selected'; ?>>Sable</option>
                                                        <option value="Brindle" <?php if ($_GET['trait'] == 'Brindle') echo 'selected'; ?>>Brindle</option>
                                                        <option class="text-center" style="color:#DB6551" disabled>Exotic</option>
                                                        <option value="Blue" <?php if ($_GET['trait'] == 'Blue') echo 'selected'; ?>>Blue</option>
                                                        <option value="Chocolate" <?php if ($_GET['trait'] == 'Chocolate') echo 'selected'; ?>>Chocolate</option>
                                                        <option value="Lilac" <?php if ($_GET['trait'] == 'Lilac') echo 'selected'; ?>>Lilac</option>
                                                        <option value="Isabella" <?php if ($_GET['trait'] == 'Isabella') echo 'selected'; ?>>Isabella</option>
                                                        <option value="Newshade Isabella" <?php if ($_GET['trait'] == 'Newshade Isabella') echo 'selected'; ?>>Newshade Isabella</option>
                                                        <option value="Newshade" <?php if ($_GET['trait'] == 'Newshade') echo 'selected'; ?>>Newshade</option>
                                                        <option value="Black Tan" <?php if ($_GET['trait'] == 'Black Tan') echo 'selected'; ?>>Black Tan</option>
                                                        <option value="Blue Tan" <?php if ($_GET['trait'] == 'Blue Tan') echo 'selected'; ?>>Blue Tan</option>
                                                        <option value="Choco Tan" <?php if ($_GET['trait'] == 'Choco Tan') echo 'selected'; ?>>Choco Tan</option>
                                                        <option value="Isabella Tan" <?php if ($_GET['trait'] == 'Isabella Tan') echo 'selected'; ?>>Isabella Tan</option>
                                                        <option value="Newshade Isabella Tan" <?php if ($_GET['trait'] == 'Newshade Isabella Tan') echo 'selected'; ?>>Newshade Isabella Tan</option>
                                                        <option class="text-center" style="color:#DB6551" disabled>Platinum</option>
                                                        <option value="Lilac Plat" <?php if ($_GET['trait'] == 'Lilac Plat') echo 'selected'; ?>>Lilac Plat</option>
                                                        <option value="Champaigne Plat" <?php if ($_GET['trait'] == 'Champaigne Plat') echo 'selected'; ?>>Champaigne Plat</option>
                                                        <option value="Newshade Plat" <?php if ($_GET['trait'] == 'Newshade Plat') echo 'selected'; ?>>Newshade Plat</option>
                                                        <option value="Merle" <?php if ($_GET['trait'] == 'Merle') echo 'selected'; ?>>Merle</option>
                                                    </select>
                                                </div>
                                                <div class="btn-group mx-2">
                                                    <select class="btn rounded-pill text-dark dropdown-toggle" style="border-color:#DB6551;" name="sex" required>
                                                        <option value="All" <?php if ($_GET['sex'] == 'All') echo 'selected'; ?>>All</option>
                                                        <option value="MALE" <?php if ($_GET['sex'] == 'MALE') echo 'selected'; ?>>Male</option>
                                                        <option value="FEMALE" <?php if ($_GET['sex'] == 'FEMALE') echo 'selected'; ?>>Female</option>
                                                    </select>
                                                </div>
                                                <div class="btn-group mx-2">
                                                    <button type="submit" class="btn rounded-pill btn-warning"> Search </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <div class="service">
                            <h1 class="mb-4 text-center" id="header"> Add to your Ohana now!</h1>
                        </div>
                        <form method="GET" action="/puppies">
                            <div class="container-md d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mt-4 mb-4">
                                            <div class="card-body">
                                                <div class="filtering-inline-spacing">
                                                    <div class="btn-group mx-2">
                                                        <select class="btn rounded-pill text-dark dropdown-toggle" style="border-color:#DB6551;" name="trait" required>
                                                            <option value="All" <?php if ($_GET['trait'] == 'All') echo 'selected'; ?>>All</option>
                                                            <option class="text-center" style="color:#DB6551" disabled>Standard</option>
                                                            <option value="Fawn" <?php if ($_GET['trait'] == 'Fawn') echo 'selected'; ?>>Fawn</option>
                                                            <option value="Sable" <?php if ($_GET['trait'] == 'Sable') echo 'selected'; ?>>Sable</option>
                                                            <option value="Brindle" <?php if ($_GET['trait'] == 'Brindle') echo 'selected'; ?>>Brindle</option>
                                                            <option class="text-center" style="color:#DB6551" disabled>Exotic</option>
                                                            <option value="Blue" <?php if ($_GET['trait'] == 'Blue') echo 'selected'; ?>>Blue</option>
                                                            <option value="Chocolate" <?php if ($_GET['trait'] == 'Chocolate') echo 'selected'; ?>>Chocolate</option>
                                                            <option value="Lilac" <?php if ($_GET['trait'] == 'Lilac') echo 'selected'; ?>>Lilac</option>
                                                            <option value="Isabella" <?php if ($_GET['trait'] == 'Isabella') echo 'selected'; ?>>Isabella</option>
                                                            <option value="Newshade Isabella" <?php if ($_GET['trait'] == 'Newshade Isabella') echo 'selected'; ?>>Newshade Isabella</option>
                                                            <option value="Newshade" <?php if ($_GET['trait'] == 'Newshade') echo 'selected'; ?>>Newshade</option>
                                                            <option value="Black Tan" <?php if ($_GET['trait'] == 'Black Tan') echo 'selected'; ?>>Black Tan</option>
                                                            <option value="Blue Tan" <?php if ($_GET['trait'] == 'Blue Tan') echo 'selected'; ?>>Blue Tan</option>
                                                            <option value="Choco Tan" <?php if ($_GET['trait'] == 'Choco Tan') echo 'selected'; ?>>Choco Tan</option>
                                                            <option value="Isabella Tan" <?php if ($_GET['trait'] == 'Isabella Tan') echo 'selected'; ?>>Isabella Tan</option>
                                                            <option value="Newshade Isabella Tan" <?php if ($_GET['trait'] == 'Newshade Isabella Tan') echo 'selected'; ?>>Newshade Isabella Tan</option>
                                                            <option class="text-center" style="color:#DB6551" disabled>Platinum</option>
                                                            <option value="Lilac Plat" <?php if ($_GET['trait'] == 'Lilac Plat') echo 'selected'; ?>>Lilac Plat</option>
                                                            <option value="Champaigne Plat" <?php if ($_GET['trait'] == 'Champaigne Plat') echo 'selected'; ?>>Champaigne Plat</option>
                                                            <option value="Newshade Plat" <?php if ($_GET['trait'] == 'Newshade Plat') echo 'selected'; ?>>Newshade Plat</option>
                                                            <option value="Merle" <?php if ($_GET['trait'] == 'Merle') echo 'selected'; ?>>Merle</option>
                                                        </select>
                                                    </div>
                                                    <div class="btn-group mx-2">
                                                        <select class="btn rounded-pill text-dark dropdown-toggle" style="border-color:#DB6551;" name="sex" required>
                                                            <option value="All" <?php if ($_GET['sex'] == 'All') echo 'selected'; ?>>All</option>
                                                            <option value="MALE" <?php if ($_GET['sex'] == 'MALE') echo 'selected'; ?>>Male</option>
                                                            <option value="FEMALE" <?php if ($_GET['sex'] == 'FEMALE') echo 'selected'; ?>>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="btn-group mx-2">
                                                        <button type="submit" class="btn rounded-pill btn-warning"> Search </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="row  d-flex justify-content-center">
                                <?php foreach ($profiles as $profile) { ?>
                                    <div class="card m-3 text-center" id="puppycard">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top" alt="<?php echo $profile->getName(); ?> Image" width="250px" height="250px;" style="margin-top:10px;">
                                        <div class="card-body">
                                            <h5 class="card-title fs-2 fw-bold" style="font-family: 'Acme', sans-serif;"> <?php echo $profile->getName(); ?></h5>
                                            <p class="card-text"> <?php echo $profile->getTrait() . ' - ' . $profile->getSex(); ?> </p>
                                            <p class="card-text"> ₱ <?php echo number_format($profile->getPrice(), 2); ?> </p>
                                            <div class="btn-Learn mt-3" name="btn-Learn">
                                                <center><a href="/puppy-info/<?php echo $profile->getReference(); ?>/<?php echo $profile->getName(); ?>"><button id="btnLearn" name="btnLearn"><span> More Info! </span></button></a></center>
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