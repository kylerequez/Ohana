<!DOCTYPE html>
<html lang="en">
<head>
    <title> STUD PROFILES </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        #paragraph {
            font-family: 'Acme', sans-serif;
        }
        .card-img-top {
            width:100%; 
            height:70vh;
        }
        #studinfo {
            max-width: 60vw;
            max-height: 80vh;
            background-color: #2f1f18;
        }
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            .card-img-top {
            width:100%; 
            height:30vh;
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
                    <div class="card mx-auto img-fluid" id="studinfo">
                        <img class="card-img-top img-fluid" src="/Ohana/src/images/Ohanapups/cardbg.png" alt="Card image">
                        <div class="card-img-overlay">
                            <p class="text-center fs-2 fw-bold" id="paragraph"><b> FRENCH BULLDOG NAME </b></p>
                            <div class="row justify-content">
                                <div class="col-md-5 mx-auto">
                                    <img src="/Ohana/src/images/petprofile/studog.png" class="card-img">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body mt-5"><br>
                                        <p class="card-text"> <b>BIRTHDAY:</b> insert php code here </p>
                                        <p class="card-text"> <b>COLOR:</b>
                                        <p class="card-text"> <b>GENDER:</b> </p>
                                        <p class="card-text"> <b>GENES:</b> </p>
                                        <p class="card-text"> <b>PCCI PAPERS:</b> </p>
                                        <p class="card-text"> <b>SUCCESS RATE:</b> </p>
                                        <p class="card-text fw-bold mt-3"> <b>Note: Our Adult Frenchies are fully vaccinated. </b></p>
                                    </div>
                                    <div id="buttons">
                                        <a href="/stud"><button type="button" class="btn btn-outline-dark mt-3" style="margin-left:5%"> Go Back</button></a>
                                        <a href="/select-stud-dog"><button type="button" class="btn mt-3 text-white" style="margin-left:5%; background-color:#c0b65a; "> Book as Stud</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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