<!DOCTYPE html>
<html lang="en">

<head>
    <title> HOME </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/home.css">
    <link rel="stylesheet" href="/Ohana/src/css/chatbot-ui.css">
    <?php include_once 'stylesheets.php'; ?>

    <style>
        #pupcard {
            width: 15rem;
            background-color: #c0b65a;
            opacity: 90%;
        }

        @media screen and (min-width: 500px) and (max-width: 1090px) {
            #welcome {
                font-size:50px;
                margin-top:150px;
            }
            #h1 {
                font-size:50px;
            }
        }
    </style>
</head>

<body style="background-color: #faf8f0">
    <main>
        <div class="container-fluid">
            <?php include_once 'navigationbar.php'; ?>
            <div class="message">
                <h1 class="text-center" id="welcome"></h1>
            </div>
            <section id="carousels">
                <div id="carouselCaptions" class="carousel slide mt-5" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/Ohana/src/images/sliders/aboutus.png" class="d-block w-100 img-fluid">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="text-light" style="font-size:70px;font-family: 'Acme', sans-serif;"> About Us </h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/Ohana/src/images/sliders/visitslide.png" class="d-block w-100 img-fluid">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="text-light" style="font-size:70px;font-family: 'Acme', sans-serif;"> Kennel Visit</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/Ohana/src/images/sliders/studslide.png" class="d-block w-100 img-fluid">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="text-light" style="font-size:70px;font-family: 'Acme', sans-serif;"> Stud Service</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/Ohana/src/images/sliders/rehomeslide.png" class="d-block w-100 img-fluid">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="text-light" style="font-size:70px;font-family: 'Acme', sans-serif;"> Pet Rehoming </h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/Ohana/src/images/sliders/contactslide.png" class="d-block w-100 img-fluid">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                </div>
            </section>
            <section class="mb-5">
                <h1 class="text-center" id="h1"> What our Customer Says </h1>
                <div class="container-xl mt-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/icons/quote.png" class="me-3 img-fluid" width="50" height="50"></img>
                                    <h5 class="card-text text-center mt-2 mb-2"> Maraming Salamat! Alagaan ko to. Ang ganda niya. Thank you ulit!</h5><br>
                                    <h4 class="card-title text-center mt-2 fw-bold fs-4 align-text-bottom"> - Edrich Pineda </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/icons/quote.png" class="me-3 img-fluid" width="50" height="50"></img>
                                    <h5 class="card-text text-center mt-2 mb-2">Thank you so much! So happy with my puppy!</h5><br>
                                    <h4 class="card-title text-center fw-bold fs-4 align-text-bottom"> - Ron Ilao</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/icons/quote.png" class="me-3 img-fluid" width="50" height="50"></img>
                                    <h5 class="card-text text-center mt-2 mb-2">Thank you sir. Quality talaga yung puppy at napaka-cute. Solid!</h5><br>
                                    <h4 class="card-title text-center fw-bold fs-4 align-text-bottom"> - Ralph Hernandez </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php
            include_once dirname(__DIR__) . '/models/PetProfile.php';
            include_once dirname(__DIR__) . '/config/db-config.php';
            include_once dirname(__DIR__) . '/dao/PetProfileDAO.php';
            include_once dirname(__DIR__) . '/services/PetProfileServices.php';

            $dao = new PetProfileDAO($servername, $database, $username, $password);
            $services = new PetProfileServices($dao, null);

            $profiles = $services->getThreeRehomingPets();
            if (!is_null($profiles)) {
            ?>
                <section class="mb-5">
                    <h1 class="text-center mt-5" id="kauhale"> I need a <strong style="color:#db6551"> KAUHALE </strong> </h1>
                    <div class="container d-flex justify-content-center mt-5">
                        <div class="row">
                            <?php foreach ($profiles as $profile) { ?>
                                <div class="col m-3">
                                    <a href="/puppies" style="text-decoration: none;">
                                        <div class="card rounded" id="pupcard">
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="card-img-top p-2" width="250px" height="250px;" alt="<?php echo $profile->getName() . " Image"; ?>">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3 text-center fs-4" style="color:white;font-family: 'Acme', sans-serif;"> <?php echo $profile->getName(); ?> </h5>
                                                <div class="btn-Learn" name="btn-Learn">
                                                    <center><a href="/puppies"><button id="btnLearn" name="btnLearn"><span> More Info! </span></button></a></center>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <div id="chat-container"> </div>
        </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/Ohana/src/js/chatbot-ui.js"></script>
    <script src="/Ohana/src/js/chatbot-init.js"></script>
    <script>
      var id = document.getElementById("welcome");
      var text = "WELCOME TO OHANA!"; 
      var result = "";
      window.addEventListener("load", (event) => {
        for (let i = 0; i < text.length; i++) {
          setTimeout(function() {
            result += text[i];
            id.innerHTML = result;
          }, 60 * i);
        }
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>