<!DOCTYPE html>
<html lang="en">

<head>
    <title> OHANA </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/index.css">
    <link rel="stylesheet" href="/Ohana/src/css/chatbot-ui.css">
    <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">
    <?php include_once dirname(__DIR__) . '/Ohana/src/pages/stylesheets.php'; ?>
    <style>
        #home {
            margin-top: 2%;
            background-position: center;
            background-repeat: no-repeat;

        }

        #toastbody {
            color: black;
            width: 500px;
        }

        #address {
            width: 750px;
            height: 750px;
        }

        @media screen and (max-width: 1366px) {
            #home {
                margin-top: 6%;
            }
        }

        @media screen and (min-width: 500px) and (max-width: 1350px) {
            #home {
                margin-top: 10%;
            }
        }

        @media screen and (min-width: 360px) and (max-width: 430px) {
            #home {
                margin-top: 40%;
            }

            #address {
                width: 300px;
                height: 300px;
            }

            #sectionheaders {
                color: #db6551;
                font-size: 40px;
                font-family: 'Acme', sans-serif;
            }

            .col {
                width: 200px;
                height: 200px;
                margin-left: auto;
                margin-right: auto;
            }

            #review {
                width: 50px;
                height: 50px;
            }

            .card-text {
                font-size: 12px;
            }

            .card-title {
                font-size: 16px;
            }

            #Send {
                background-color: #db6551;
                border-radius: 30px;
                border: 1px solid #ffffff;
                cursor: pointer;
                color: #ffffff;
                font-family: "Poppins";
                font-size: 12px;
                padding: 10px 40px;
                margin-top: 5%;
                margin-left: 50px;
            }

            .cr {
                color: #db6551;
                font-size: 35px;
            }

            .contact {
                color: #db6551;
                font-size: 35px;
            }

            #contact {
                margin-top: 5%;
            }

            #contactform {
                position: relative !important;
                margin-left: -70px;
                float: left;
                margin-top: 380px;
            }

            input {
                font-family: 'Poppins', sans-serif;
                font-size: 15px;
                width: 360px;
                height: 60px;
                padding: 0px 10px 0px 10px;
            }

            textarea {
                width: 360px;
                max-width: 900px;
                max-height: 200px;
                padding: 10px;
            }

            .about-us {
                background-image: url(/Ohana/src/images/Landing/mbaboutus.jpg);
                min-width: 360px;
                min-height: 500px;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            .reasons {
                background-image: url(/Ohana/src/images/Landing/mbreasons.png);
                min-height: 500px;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            .contact-us {
                background-image: url(/Ohana/src/images/mobile/contact.png);
                min-height: 700px;
                max-height: 700px;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            #contact-container {
                max-height: 500px;
            }

            #ohanafooter {
                margin-top: 120px;
            }
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-smooth-scroll="true" style="background-color: #FAF8F0;">
    <main>
        <?php include_once dirname(__DIR__) . '/Ohana/src/pages/navbar.php'; ?>
        <div class="container-fluid">

            <section class="introduction" id="home">
                <div class="intro text-center">
                    <img src="/Ohana/src/images/Landing/introduction.png" class="img-fluid" id="intro">
                </div>
            </section>
            <section class="about-us" id="about"></section>
            </section>
            <section class="services" id="services">
                <div class="service text-center">
                    <h1 class="title mb-3" id="sectionheaders"> Why Choose Us? </h1>
                </div>
                <div class="row text-center ms-4 me-4">
                    <div class="col-lg-4">
                        <img src="/Ohana/src/images/services/1.png" class="img-fluid" role="img" focusable="false"></img>
                        <h2 class="p-4" style="color:#7d605c;font-family: 'Acme', sans-serif;"> Pet Rehoming </h2>
                        <p class="p-2" style="color:#7d605c;"> Want to add another member to your family? We have the cutest and most loving frenchies waiting for you. </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="stud">
                            <img src="/Ohana/src/images/services/2.png" class="img-fluid" role="img" focusable="false"></img>
                            <h2 class="p-4" style="color:#7d605c;font-family: 'Acme', sans-serif;"> Stud Service </h2>
                            <p class="p-2" style="color:#7d605c;"> Want to produce quality and compact french bulldogs? Choose from any of our male frenchies ready for mating. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img src="/Ohana/src/images/services/3.png" class="img-fluid" role="img" focusable="false"></img>
                        <h2 class="p-4" style="color:#7d605c;font-family: 'Acme', sans-serif;   "> Pet Boarding </h2>
                        <p class="p-2" style="color:#7d605c;"> Want to increase chances of your pet fertility after stud? We offer pet boarding to prevent your pet from getting stressed. </p>
                    </div>
                </div>
            </section>
            <section class="reasons">
                <div class="reason" id="reason">
                    <form action="/login" method='get'>
                        <div class="btn-Adopt mb-5" name="btn-Adopt">
                            <button id="btnAdopt" name="btnAdopt"><span> Adopt one now! </span></button>
                        </div>
                    </form>
                </div>
                <br>
            </section>
            <section class="reviews">
                <div class="customer-review">
                    <h1 class="cr text-center mt-5" id="sectionheaders"> What our Customer Says </h1>
                </div>
                <div class="container-xl mt-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/icons/quote.png" id="review" class="me-3 img-fluid"></img>
                                    <h5 class="card-text text-center mt-2 mb-2"> Maraming Salamat! Alagaan ko to. Ang ganda niya. Thank you ulit! </h5><br>
                                    <h4 class="card-title text-center mt-2 mb-2 fw-bold fs-4"> - Edrich Pineda </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/icons/quote.png" id="review" class="me-3 img-fluid"></img>
                                    <h5 class="card-text text-center mt-2 mb-2">Thank you so much! So happy with my puppy!</h5><br>
                                    <h4 class="card-title text-center mb-2 fw-bold fs-4"> - Ron Ilao</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/icons/quote.png" id="review" class="me-3 img-fluid"></img>
                                    <h5 class="card-text text-center mt-2 mb-2">Thank you sir. Quality talaga yung puppy at napaka-cute. Solid!</h5><br>
                                    <h4 class="card-title text-center mb-2 fw-bold fs-4"> - Ralph Hernandez </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid" id="contact-container">
                <section class="contact-us" id="contact">
                    <div class="message text-center">
                        <h1 class="contact mt-5" id="sectionheaders"> Contact Us! </h1>
                        <?php
                        if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                            <center>
                                <div class="alert alert-warning text-center mt-5" role="alert" style="width:500px;">
                                    <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null; ?>
                                </div>
                            </center>
                        <?php
                            unset($_SESSION["msg"]);
                            session_destroy();
                        }
                        ?>
                    </div>
                    <form id="contactform" class="topBefore" method="POST" action="/contact-us/send">
                        <input id="name" name="name" type="text" placeholder="FULL NAME">
                        <input id="email" name="email" type="text" placeholder="E-MAIL ADDRESS ">
                        <textarea id="message" name="message" type="text" placeholder="ENTER MESSAGE"></textarea>
                        <div class="btn-Send mt-4 ms-3" name="btn-Send">
                            <button type="submit" id="Send"> Send </button>
                        </div>
                    </form>
            </div>
            </section>
            <section class="maps mb-5">
                <div class="message" id="find">
                    <h1 id="sectionheaders" class="mb-5 text-center"> You can find us here </h1>
                </div>
                <center>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1623.2871555101196!2d121.00392295489537!3d14.607660960531538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b61dfbade45d%3A0x87e58f7a0f4c89c3!2s1026%20Mindoro%2C%20Sampaloc%2C%20Maynila%2C%201008%20Kalakhang%20Maynila!5e0!3m2!1sen!2sph!4v1665068149424!5m2!1sen!2sph" style="border:0;" id="address" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </center>
            </section>
        </div>
        <div id="chat-container"> </div>
    </main>
    <div class="mt-5"> <?php include_once dirname(__DIR__) . '/Ohana/src/pages/footer.php'; ?> </div>

    <script src="/Ohana/src/js/chatbot-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $.ajax({
            url: '/chatbot/settings/get',
            type: "GET",
            error: function(error) {
                
            }
        }).done(function(data) {
            info = JSON.parse(data);
            avatar = info.avatar;
            name = info.name;
            intro = info.intro;
            noResponse = info.noResponse;
            createChatBot(host = '/chatbot/responses/get', botLogo = avatar,
                title = name, welcomeMessage = intro, inactiveMsg = noResponse, theme = "orange")
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>