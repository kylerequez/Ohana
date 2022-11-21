<!DOCTYPE html>
<html lang="en">

<head>

    <title> HOME </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/home.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">
    <link rel="stylesheet" href="/Ohana/src/css/chatbot-ui.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        #carouselCaptions {
            margin-left: 5%;
            margin-right: 5%;
        }

        @media screen and (min-width: 360px) and (max-width: 767.98px) {
            #slider {
                position: relative;
                width: 60%;
                height: 35vw;
                margin: 150px auto;
                transform-style: preserve-3d;

            }

            #h1 {
                font-size: 30px;
                color: #7d605c;
                font-family: 'Acme', sans-serif;
            }

            #welcome {
                font-size: 35px;
                Margin-top: 40%;
                color: #db6551;
                font-family: 'Acme', sans-serif;
            }

            #kauhale {
                font-size: 35px;
                font-family: 'Acme', sans-serif;
                margin-top: 30px;
                color: #7d605c;
            }

            .btn-Learn button {
                background-color: white;
                border: 1px solid #ffffff;
                display: inline-block;
                cursor: pointer;
                color: #7d605c;
                font-family: "Poppins";
                font-size: 12px;
                padding: 12px 30px;
                text-decoration: none;
                text-shadow: 0px 1px 0px #ffffff;
                text-align: center;
            }

            .card {
                margin-left: auto;
                margin-right: auto;
            }

        }
    </style>
</head>

<body style="background-color: #faf8f0">
    <main>
        <div class="container-fluid">

            <?php include_once 'Rnavbar.php'; ?>

            <div class="message">
                <h1 class="text-center" id="welcome"> WELCOME TO OHANA!</h1>
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
                            <img src="/Ohana/src/images/sliders/aboutus.png" class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="text-light" style="font-size:70px;font-family: 'Acme', sans-serif;"> About Us </h1>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/Ohana/src/images/sliders/visitslide.png" class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="text-light" style="font-size:70px;font-family: 'Acme', sans-serif;"> Kennel Visit</h1>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/Ohana/src/images/sliders/studslide.png" class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="text-light" style="font-size:70px;font-family: 'Acme', sans-serif;"> Stud Service</h1>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/Ohana/src/images/sliders/rehomeslide.png" class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="text-light" style="font-size:70px;font-family: 'Acme', sans-serif;"> Pet Rehoming </h1>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/Ohana/src/images/sliders/contactslide.png" class="d-block w-100 img-fluid" alt="...">
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

            <section>
                <h1 class="text-center" id="h1"> What our Customer Says </h1>
                <div class="container-xl mt-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <h5 class="card-text text-center mt-2 mb-2"> Maraming Salamat! Alagaan ko to. Ang ganda niya. Thank you ulit 👌🏻” </h5><br>
                                    <h4 class="card-title text-center mt-2"> Edrich Pineda </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">

                                    <h5 class="card-text text-center mt-2 mb-2">"Thank you so much! So happy with my puppy!”</h5><br>
                                    <h4 class="card-title text-center"> Ron Ilao</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">

                                    <h5 class="card-text text-center mt-2 mb-2">“Thank you sir. Quality talaga yung puppy at napaka-cute. Solid!”</h5><br>
                                    <h4 class="card-title text-center"> Ralph Hernandez </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <h1 class="text-center" id="kauhale"> I need a <strong style="color:#db6551"> KAUHALE </strong> </h1>
                <div class="container d-flex justify-content-center mt-5">

                    <div class="row">
                        <div class="col m-3">
                            <a href="/puppies" style="text-decoration: none;">
                                <div class=" card rounded" style="width: 15rem;background-color:#c0b65a">
                                    <img src="/Ohana/src/images/Ohanapups/trans2.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3 text-center" style="color:white"> FRENCH PUPPY 1 </h5>
                                        <div class="btn-Learn" name="btn-Learn">
                                            <center><a href="/dog1"><button id="btnLearn" name="btnLearn"><span> More Info! </span></button></a></center>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col m-3">
                            <a href="/puppies" style="text-decoration: none;">
                                <div class="card rounded" style="width: 15rem;background-color:#c0b65a">
                                    <img src=" /Ohana/src/images/Ohanapups/trans3.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3 text-center" style="color:white"> FRENCH PUPPY 2</h5>
                                        <div class="btn-Learn" name="btn-Learn">
                                            <center><a href="/dog1"><button id="btnLearn" name="btnLearn"><span> More Info! </span></button></a></center>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col m-3">
                            <a href="/puppies" style="text-decoration: none;">
                                <div class="card rounded" style="width: 15rem;background-color:#c0b65a">
                                    <img src=" /Ohana/src/images/Ohanapups/trans5.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3 text-center" style="color:white"> FRENCH PUPPY 3 </h5>
                                        <div class="btn-Learn" name="btn-Learn">
                                            <center><a href="/dog1"><button id="btnLearn" name="btnLearn"><span> More Info! </span></button></a></center>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <div id="chat-container"> </div>
        </div>
    </main>

    <?php include_once 'footer.php'; ?>

    <!-- SCIPTS -->
    <?php
    $test = file_get_contents('http:/localhost/dashboard/chatbot-responses/get');
    echo $test;
    ?>
    <script src="/Ohana/src/js/chatbot-ui.js"></script>
    <script>
        createChatBot(host = 'http://localhost:5005/webhooks/rest/webhook', botLogo = "/Ohana/src/images/Chatbot/bot-logo.png",
            title = "Lilo from Ohana", welcomeMessage = "Good Day, How can I help you?", inactiveMsg = "Waiting for the developers to update this", theme = "orange")
    </script>

    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>