<!DOCTYPE html>
<html lang="en">

<head>
    <title> OHANA SERVICES </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
 
    <link rel="stylesheet" href="/Ohana/src/css/service.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        @media screen and (min-width: 360px) and (max-width: 767.98px) {
            #servicesheader {
                font-size:50px;
                font-family: 'Acme', sans-serif; 
                color:#DB6551; 
                margin-top:40%;
            }
            .p-4 {
                font-size: 30px;
                font-weight: bolder;
            }

            .p-2 {
                font-size: 20px;
            }

            .reasons {
                background-image: url(/Ohana/src/images/Landing/mbreasons.png);
                min-height: 510px;
            }
            .pair-section {
                /* background-image: url(/Ohana/src/images/Landing/mbreasons.png);
                min-height: 510px; */
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main> 
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">    
            <div class="message">
                <section class="services" id="services">
                    <div class="service">
                        <h1 id="servicesheader" class="text-center mb-3"> SERVICES </h1>
                    </div>

                    <div class="row" style="text-align:center; margin-left:10%; margin-right:10%;">
                        <div class="col-lg-6">
                            <a href="/puppies/rehoming/get" style="text-decoration:none;">
                                <img src="/Ohana/src/images/services/1.png" class="img-fluid" focusable="false"></img>
                                <h2 class="p-4" style="color:#7d605c;"> Pet Rehoming </h2>
                                <p class="p-2" style="color:#7d605c;"> Want to add another member to your family? We have the cutest and most loving frenchies waiting for you. </p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a href="/stud" style="text-decoration:none;">
                                <img src="/Ohana/src/images/services/2.png" class="img-fluid" focusable="false"></img>
                                <h2 class="p-4" style="color:#7d605c;"> Stud Service </h2>
                                <p class="p-2" style="color:#7d605c; "> Want to produce quality and compact french bulldogs? Choose from any of our male frenchies ready for mating. </p>
                            </a>
                           
                        </div>
                    </div>
                </section>
                <section class="reason">
                    <div class="reasons">
                   <!-- bg image is declared in css -->
                    </div>
                </section>
                <section class="pair-section">
                    <div class="pair-section">
                        <form action="/stud" method='get'>
                            <div class="btn-Learn" name="btn-Checkout" style="float:right; margin-right:17%; margin-top:13%;">
                                <button id="btnCheckout" name="btnCheckout"><span> Find the perfect pair now </span></button>
                            </div>
                        </form>
                        <form action="/stud" method='get'>
                            <div class="btn-Learn" name="btn-Checkout" style="float:right; margin-right:12%; margin-top:30%;">
                                <button id="btnCheckout" name="btnCheckout"><span> Find the perfect pair now </span></button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>