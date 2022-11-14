<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA PUPPIES </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>

        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">

            <div class="message" style="margin-top:10%;">
                <section class="services" id="services">
                    <div class="card mx-auto img-fluid" style="max-width: 60vw; max-height:60vh; background-color:#2f1f18">
                        <img class="card-img-top" src="/Ohana/src/images/Ohanapups/cardbg.png" alt="Card image" style="width:100%; height:70vh">
                        <div class="card-img-overlay">
                            <div class="card-header">
                                <p style="font-size: 50px; text-align:center; font-family: 'Acme', sans-serif;"><b> KEONE </b></p>
                            </div>
                            <div class=" row justify-content">
                                <hr style="color:white">
                                <div class="col-md-5 mx-auto">
                                    <img src="/Ohana/src/images/Ohanapups/trans2.png" class="card-img">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body"><br>
                                        <p class="card-text"> <b>BIRTHDAY:</b> June 13, 2022 </p>
                                        <p class="card-text"> <b>COLOR:</b> Choco Tan Merle </p>
                                        <p class="card-text"> <b>GENDER:</b> Male </p>
                                        <p class="card-text"> <b>WEIGHT:</b> 6.1kg </p>
                                        <p class="card-text"> <b>GENES:</b> Lilac Tan Carrier & Isabella Carrier </p>
                                        <p class="card-text"> <b>PCCI PAPERS:</b> COMPLETE</p>
                                        <p class="card-text"> <b>Note: All french bulldog puppies are fully vaccinated before release.</b></p>
                                    </div>
                                    <div name="buttons" style="margin-top:10%">
                                        <a href="/set-appointment">
                                            <button type="button" class="btn mt-3" style="margin-left:25%; background-color:#db6551;color:white;"> Book Kennel Visit </button>
                                        </a>
                                        <button type="button" class="btn mt-3" style="margin-left:5%; background-color:#c0b65a; color:white;"> Add to Paw Cart </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>

    <!-- SCIPTS -->
    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>

    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>