<!DOCTYPE html>
<html lang="en">

<head>
    <title> OHANA </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link rel="stylesheet" href="/Ohana/src/css/index.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/chatbot-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">

</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-smooth-scroll="true" style="background-color: #FAF8F0;">
    <main>

        <?php include_once dirname(__DIR__) . '/Ohana/src/pages/navbar.php'; ?>
        <div class="container-fluid">
            <section class="introduction" id="home">
                <div class="intro">
                    <img src="/Ohana/src/images/Landing/introduction.png" class="img-fluid" id="intro">
                </div>
            </section>
            <section class="about-us" id="about">
            </section>
            <section class="services" id="services">
                <div class="service text-center">
                    <h1 class="title mb-3" id="sectionheaders"> Why Choose Us? </h1>
                </div>
                <div class="row text-center ms-4 me-4">
                    <div class="col-lg-4">
                        <img src="/Ohana/src/images/services/1.png" class="img-fluid" role="img" focusable="false"></img>
                        <h2 class="p-4" style="color:#7d605c;"> Pet Rehoming </h2>
                        <p class="p-2" style="color:#7d605c;"> Want to add another member to your family? We have the cutest and most loving frenchies waiting for you. </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="stud">
                            <img src="/Ohana/src/images/services/2.png" class="img-fluid" role="img" focusable="false"></img>
                            <h2 class="p-4" style="color:#7d605c;"> Stud Service </h2>
                            <p class="p-2" style="color:#7d605c;"> Want to produce quality and compact french bulldogs? Choose from any of our male frenchies ready for mating. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img src="/Ohana/src/images/services/3.png" class="img-fluid" role="img" focusable="false"></img>
                        <h2 class="p-4" style="color:#7d605c;"> Pet Boarding </h2>
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
                                    <img src="/Ohana/src/images/icons/quote.png" class="me-3 img-fluid" width="50" height="50"></img>
                                    <h5 class="card-text text-center mt-2 mb-2"> Maraming Salamat! Alagaan ko to. Ang ganda niya. Thank you ulit! </h5><br>
                                    <h4 class="card-title text-center mt-2"> Edrich Pineda </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/icons/quote.png" class="me-3 img-fluid" width="50" height="50"></img>
                                    <h5 class="card-text text-center mt-2 mb-2">Thank you so much! So happy with my puppy!</h5><br>
                                    <h4 class="card-title text-center"> Ron Ilao</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100" style="background-color:#eed1c2">
                                <div class="card-body">
                                    <img src="/Ohana/src/images/icons/quote.png" class="me-3 img-fluid" width="50" height="50"></img>
                                    <h5 class="card-text text-center mt-2 mb-2">Thank you sir. Quality talaga yung puppy at napaka-cute. Solid!</h5><br>
                                    <h4 class="card-title text-center"> Ralph Hernandez </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-us" id="contact">
                <div class="container-fluid">
                    <div class="message text-center">
                        <h1 class="contact mt-5" id="sectionheaders"> Contact Us! </h1>
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
  
    <script src="/Ohana/src/js/chatbot-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $.ajax({
            url: '/chatbot/settings/get',
            type: "GET",
            error: function(error) {
                console.log("Error in retrieving the Chatbot Information.");
            }
        }).done(function(data) {
            info = JSON.parse(data);
            name = info.name;
            intro = info.intro;
            noResponse = info.noResponse;
            createChatBot(host = '/chatbot/responses/get', botLogo = "/Ohana/src/images/Chatbot/bot-logo.png",
                title = name, welcomeMessage = intro, inactiveMsg = noResponse, theme = "orange")
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>
</html>