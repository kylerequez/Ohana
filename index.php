<!DOCTYPE html>
<html lang="en">

<head>
    <title> OHANA </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link rel="stylesheet" href="/Ohana/src/css/index.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">
    <link rel="stylesheet" href="/Ohana/src/css/chatbot-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        @media screen and (min-width: 380px) and (max-width: 767.98px) {
            .title {
                font-size: 40px;
                color: #db6551;
            }

            .btn-Adopt button {
                background-color: #7d605c;
                border-radius: 30px;
                border: 1px solid #ffffff;
                display: inline-block;
                cursor: pointer;
                color: #ffffff;
                font-family: "Poppins";
                font-size: 10px;
                padding: 10px 40px;
                text-decoration: none;
                text-shadow: 0px 1px 0px #ffffff;
                text-align: center;
                margin-left: 28%;
            }

            .btn-Adopt button:hover {
                background-color: #c0b65a;
            }

            .btn-Adopt button:active {
                position: relative;
                top: 1px;
            }

            .btn-Send button {
                background-color: #db6551;
                border-radius: 30px;
                border: 1px solid #ffffff;
                display: inline-block;
                cursor: pointer;
                color: #ffffff;
                font-family: "Poppins";
                font-size: 12px;
                padding: 10px 40px;
                text-decoration: none;
                text-shadow: 0px 1px 0px #ffffff;
                text-align: center;
            }

            .btn-Send button:hover {
                background-color: #c0b65a;
            }

            .btn-Send button:active {
                position: relative;
                top: 1px;
            }

            .intro {
                margin-top: 15%;
            }

            .contact-us {
                background-color: #faf8f0;
                height: auto;
            }

            #intro {
                margin-top: 20%;
            }

            #contactform {
                position: relative !important;
                width: 10px;
                float: left;

            }

            input {
                font-family: "Lato", sans-serif;
                font-size: 15px;
                width: 340px;
                height: 75px;
                padding: 0px 15px 0px 15px;

            }

            textarea {
                width: 340px;
                max-width: 900px;
                max-height: 200px;
                padding: 15px;
            }

            .btn-Send button {
                background-color: #db6551;
                border-radius: 30px;
                border: 1px solid #ffffff;
                display: inline-block;
                cursor: pointer;
                color: #ffffff;
                font-family: "Poppins";
                font-size: 12px;
                padding: 10px 40px;
                text-decoration: none;
                text-shadow: 0px 1px 0px #ffffff;
                text-align: center;
                margin-top: 10px;
            }

            .p-4 {
                font-size: 30px;
                font-weight: bolder;
            }

            .p-2 {
                font-size: 20px;
            }

            #footer {
                position: relative;
                left: 0;
                bottom: 0;
                width: 50%;
                height: 50px;
            }
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-smooth-scroll="true" style="background-color: #FAF8F0;">
    <main>

        <?php include_once dirname(__DIR__) . '/Ohana/src/pages/navbar.php'; ?>
        <div class="container-fluid">
            <section class="introduction" id="home">
                <div class="intro mt-3">
                    <img src="/Ohana/src/images/Landing/introduction.png" class="img-fluid" id="intro">
                </div>
            </section>
            <section class="about-us" id="about">
                <div class="about">
                    <img src="/Ohana/src/images/pages/aboutindex.png" class="img-fluid" style="width: 100%;">
                </div>
            </section>
            <section class="services" id="services">
                <div class="service text-center">
                    <h1 class="title mb-2"> WHY CHOOSE US? </h1>
                </div>
                <div class="row" style="text-align:center; margin-left:10%; margin-right:10%;">
                    <div class="col-lg-4">
                        <img src="/Ohana/src/images/services/1.png" class="img-fluid" role="img" focusable="false">
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        <h2 class="p-4" style="color:#7d605c;"> Pet Rehoming </h2>
                        <p class="p-2" style="color:#7d605c;"> Want to add another member to your family? We have the cutest and most loving frenchies waiting for you. </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="stud">
                            <img src="/Ohana/src/images/services/2.png" class="img-fluid" role="img" focusable="false">
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        </div>
                        <h2 class="p-4" style="color:#7d605c;"> Stud Service </h2>
                        <p style="color:#7d605c;"> Want to produce quality and compact french bulldogs? Choose from any of our male frenchies ready for mating. </p>
                    </div>
                    <div class="col-lg-4">
                        <img src="/Ohana/src/images/services/3.png" class="img-fluid" role="img" focusable="false">
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        <h2 class="p-4" style="color:#7d605c;"> Pet Boarding </h2>
                        <p style="color:#7d605c;"> Want to increase chances of your pet fertility after stud? We offer pet boarding to prevent your pet from getting stressed. </p>
                    </div>
                </div>
            </section><br><br>
            <section class="reasons">
                <div class="reason" id="reason">
                    <form action="/login" method='get'>
                        <div class="btn-Adopt mb-5" name="btn-Adopt" style="margin-left: 25%;">
                            <button id="btnAdopt" name="btnAdopt" style="margin-top:60%;"><span> Adopt one now! </span></button>
                        </div>
                    </form>
                </div>
                <br>
            </section><br>
            <section class="reviews">
                <div class="reviews">
                    <h1 class="text-center">CUSTOMER REVIEWS </h1>
                </div>
                <div class="container-xl mt-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <h5 class="card-title"> NAME OF CUSTOMER </h5>
                                    <p class="card-text">customer review to be inserted</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <h5 class="card-title"> NAME OF CUSTOMER </h5>
                                    <p class="card-text">customer review to be inserted</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <h5 class="card-title"> NAME OF CUSTOMER </h5>
                                    <p class="card-text">customer review to be inserted</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
            </section>

            <section class="contact-us" id="contact">
                <div class="container-fluid">
                    <div class="message text-center">
                        <h1> CONTACT US! </h1>
                    </div>

                    <form id="contactform" class="topBefore">
                        <input id="name" type="text" placeholder="FULL NAME">
                        <input id="email" type="text" placeholder="E-MAIL ADDRESS ">
                        <textarea id="message" type="text" placeholder="ENTER MESSAGE"></textarea>
                    </form>

                    <form action="/pages/login.php" method='get'>
                        <div class="btn-Send" name="btn-Send">
                            <button id="btnSend" name="btnSend" type="submit"><span> Send Message </span></button>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <div id="chat-container"> </div>
    </main>

    <?php include_once dirname(__DIR__) . '/Ohana/src/pages/footer.php'; ?>
    <!-- JAVASCRIPT IMPORTS -->
    <script src="/Ohana/src/js/chatbot-ui.js"></script>
    <script>
        createChatBot(host = 'http://localhost:5005/webhooks/rest/webhook', botLogo = "/Ohana/src/images/Chatbot/bot-logo.png",
            title = "Lilo from Ohana", welcomeMessage = "Good Day, How can I help you?", inactiveMsg = "Waiting for the developers to update this", theme = "orange")
    </script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>