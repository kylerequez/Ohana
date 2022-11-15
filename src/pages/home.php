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
</head>

<body style="background-color: #faf8f0">
    <main>
        <div class="container-fluid">

            <!-- REGISTERED USERS NAVIGATION BAR-->
            <?php include_once 'Rnavbar.php'; ?>

            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <div class="message">
                <h1 style="font-size:80px; Margin-top:10%; color:#c0b65a; font-family: 'Acme', sans-serif;"> WELCOME TO OHANA!</h1>
            </div>
            <section id="slider">
                <input type="radio" name="slider" id="s1" checked>
                <input type="radio" name="slider" id="s2">
                <input type="radio" name="slider" id="s3">
                <input type="radio" name="slider" id="s4">
                <input type="radio" name="slider" id="s5">

                <label for="s1" id="slide1"><img src="/Ohana/src/images/sliders/aboutslide.png" class="img-fluid" alt=""></label>
                <label for="s2" id="slide2"><img src="/Ohana/src/images/sliders/visit.png" class="img-fluid" alt=""></label>
                <label for="s3" id="slide3"><img src="/Ohana/src/images/sliders/studservice.png" class="img-fluid" alt=""></label>
                <label for="s4" id="slide4"><img src="/Ohana/src/images/sliders/rehome.png" class="img-fluid" alt=""></label>
                <label for="s5" id="slide5"><img src="/Ohana/src/images/sliders/socialmed.png" class="img-fluid" alt=""></label>
            </section>
            <section>
                <h1 style="font-size:90px; Margin-top:10%; color:#7d605c; font-family: 'Acme', sans-serif;"> Customer Reviews </h1>
                <div class="container-xl mt-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body m-3">
                                    <h5 class="card-title"> NAME OF CUSTOMER </h5>
                                    <p class="card-text">customer review to be inserted</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body m-3">
                                    <h5 class="card-title"> NAME OF CUSTOMER </h5>
                                    <p class="card-text">customer review to be inserted</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body m-3">
                                    <h5 class="card-title"> NAME OF CUSTOMER </h5>
                                    <p class="card-text">customer review to be inserted</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <h1 style="font-size:90px; Margin-top:10%; color:#7d605c; font-family: 'Acme', sans-serif;"> I need a <strong style="color:#db6551"> KAUHALE </strong> </h1>
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