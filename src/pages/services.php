<!DOCTYPE html>
<html lang="en">

<head>
    <title> OHANA SERVICES </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/service.css">
    <link rel="stylesheet" href="/Ohana/src/css/chatbot-ui.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        .btn-outline-warning {
            color: #db6551;
            background-color: transparent;
            background-image: none;
            border-color: #db6551;
            font-size: 20px;
            --bs-btn-hover-border-color: #c0b65a;
            --bs-btn-hover-bg: #c0b65a;
            --bs-btn-hover-color: white;
            border-radius: 30px;
            padding: 15px 70px;
        }

        #links {
            text-decoration: none;
        }

        #perfectpair {
            margin-top: 47%;
            align-items: center;
        }
        @media screen and (min-width: 360px) and (max-width: 500px) {
            #serviceheader {
                font-size: 50px;
                margin-top: 50%;
            }

            #phrase {
                font-size: 16px;
            }

            .reasons {
                background-image: url(/Ohana/src/images/Landing/mbreasons.png);
                min-height: 500px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            .pair-section {
                background-image: url(/Ohana/src/images/Pages/mbpalua.png);
                min-height: 460px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            #perfectpair {
                margin-top: 130%;
                padding: 10px 35px;
                font-size: 15px;
            }
        }

        @media screen and (min-width: 1100px) and (max-width: 1600px) {
            .reasons {
                background-image: url(/Ohana/src/images/laptops/info.png);
                width:100%;
                min-height: 766px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            .pair-section {
                background-image: url(/Ohana/src/images/laptops/services1.png);
                width:100%;
                min-height: 766px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            #perfectpair.btn-outline-warning {
                margin-top: 45%;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'navigationbar.php'; ?>
        <div class="container-fluid">
            <div class="message">
                <section class="services" id="services">
                    <div class="service">
                        <h1 id="serviceheader" class="text-center mb-3"> Services </h1>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-6">
                            <a href="/puppies" id="links">
                                <img src="/Ohana/src/images/services/1.png" class="img-fluid" role="img" focusable="false"></img>
                                <center><button type="bFutton" class="btn btn-outline-warning"> PET REHOMING </button></center>
                                <p class="mt-4" id="phrase" style="color:#7d605c;"> Want to add another member to your family? We have the cutest and most loving frenchies waiting for you. </p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a href="/stud" id="links">
                                <img src="/Ohana/src/images/services/2.png" class="img-fluid" role="img" focusable="false"></img>
                                <center><button type="button" class="btn btn-outline-warning"> STUD SERVICE </button></center>
                                <p class="mt-4" id="phrase" style="color:#7d605c;"> Want to produce quality and compact french bulldogs? Choose from any of our male frenchies ready for mating. </p>
                            </a>
                        </div>
                    </div>
                </section>
                <section class="reason">
                    <div class="reasons">
                    </div>
                </section>
                <section class="pair-section">
                    <div class="pair-section">
                        <a href="/stud" id="links">
                            <center><button type="button" class="btn btn-outline-warning" id="perfectpair"> Find the perfect pair now! </button></center>
                        </a>
                    </div>
                </section>
            </div>
            <div id="chat-container"> </div>
        </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/Ohana/src/js/chatbot-ui.js"></script>
    <script src="/Ohana/src/js/chatbot-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>