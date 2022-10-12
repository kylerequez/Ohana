<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <!-- END OF META TAGS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="/Ohana/src/css/index.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

    <!-- FONT AWESOME ICONS IMPORT -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Web Icon -->
    <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">

    <!-- Bootstrap CSS  CDN -->
    <!-- 5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">

    <!-- MORE icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-smooth-scroll="true" style="background-color: #FAF8F0;">
    <main>
        <!-- UNREGISTERED USERS NAVIGATION BAR-->
        <?php include_once dirname(__DIR__) . '/Ohana/src/pages/navbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <section class="introduction" id="home">
                <div class="intro">
                    <img src="/Ohana/src/images/Landing/introduction.png" width="100%" height="80%">
                </div>
            </section>

            <section class="about-us" id="about">
                <div class="about">
                    <img src="/Ohana/src/images/Landing/about-us.png" style="width: 100%;">
                </div>
            </section>

            <section class="services" id="services">
                <div class="service">
                    <h1 style="color:#C0B65A; font-size: 100px; font-family: 'Karla', sans-serif; font-weight:800"> WHY CHOOSE US? </h1>
                </div><br><br>
                <div class="row" style="text-align:center; margin-left:10%; margin-right:10%;">
                    <div class="col-lg-4">
                        <img src="/Ohana/src/images/services/rehome.png" width="540" height="400" role="img" focusable="false">
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>

                        <h2 class="p-4" style="color:#7d605c; font-size: 60px; font-weight:bolder;"> Pet Rehoming </h2>
                        <p style="color:#7d605c; font-size: 25px;"> Want to add another member to your family? We have the cutest and most loving frenchies waiting for you. </p>

                    </div>
                    <div class="col-lg-4">
                        <div class="stud">
                            <img src="/Ohana/src/images/services/stud.png" width="540" height="400" role="img" focusable="false">
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        </div>
                        <h2 class="p-4" style="color:#7d605c; font-size: 60px; font-weight:bolder;"> Stud Service </h2>
                        <p style="color:#7d605c; font-size: 25px;"> Want to produce quality and compact french bulldogs? Choose from any of our male frenchies ready for mating. </p>
                    </div>

                    <div class="col-lg-4">
                        <img src="/Ohana/src/images/services/boarding.png" width="540" height="400" role="img" focusable="false">
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        <h2 class="p-4" style="color:#7d605c; font-size: 60px; font-weight:bolder;"> Pet Boarding </h2>
                        <p style="color:#7d605c; font-size: 25px;"> Want to increase chances of your pet fertility after stud? We offer pet boarding to prevent your pet from getting stressed. </p>

                    </div>
                </div>
            </section><br><br>
            <section class="reasons">
                <div class="reason">
                    <img src="/Ohana/src/images/Landing/reasons.png" style="width: 100%;">

                    <form action="/login" method='get'>
                        <div class="btn-Adopt" name="btn-Adopt" style="margin-left: 25%;">
                            <button id="btnAdopt" name="btnAdopt"><span> Adopt one now! </span></button>
                        </div>
                    </form>

                </div>
                <br>
            </section>

            <section class="amenities">
                <div class="amenity">
                    <h1 class="amenity" style="font-family: 'DM Sans', sans-serif; font-size:70px;"> your <strong style="font-family: 'Karla', sans-serif; font-weight:800">KAUHALE</strong> away from home </h1>
                </div>
                <br>
                <div class="row" style="text-align:center; margin-left:10%; margin-right:10%;">
                    <div class="col-lg-3">
                        <img src="/Ohana/src/images/services/amenity.png" width="400" height="400" role="img" focusable="false">
                        <title>Placeholder</title>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        <br><br>
                        <p> DESCRIPTION OF AMENITIES</p>

                    </div>
                    <div class="col-lg-3">
                        <img src="/Ohana/src/images/services/amenity.png" width="400" height="400" role="img" focusable="false">
                        <title>Placeholder</title>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        <br><br>
                        <p> DESCRIPTION OF AMENITIES</p>
                    </div>

                    <div class="col-lg-3">
                        <img src="/Ohana/src/images/services/amenity.png" width="400" height="400" role="img" focusable="false">
                        <title>Placeholder</title>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        <br><br>
                        <p> DESCRIPTION OF AMENITIES</p>
                    </div>

                    <div class="col-lg-3">
                        <img src="/Ohana/src/images/services/amenity.png" width="400" height="400" role="img" focusable="false">
                        <title>Placeholder</title>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
                        <br><br>
                        <p> DESCRIPTION OF AMENITIES</p>
                    </div>
                </div>

                <form action="/login" method='get'>
                    <div class="btn-Learn" name="btn-Learn">
                        <button id="btnLearn" name="btnLearn"><span> Learn More! </span></button>
                    </div>
                </form>

                <br><br>
            </section>

            <section class="contact-us" id="contact">
                <div class="container-fluid">
                    <div class="message" style="margin-left:32%;">
                        <h1 style="font-size:100px; font-family: 'Karla', sans-serif;"> CONTACT US! </h1>
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
             </div>
            </section>

    </main>

    <?php include_once dirname(__DIR__) . '/Ohana/src/pages/footer.php'; ?>


    <!-- SCIPTS -->

    <!-- JAVASCRIPT IMPORTS -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>