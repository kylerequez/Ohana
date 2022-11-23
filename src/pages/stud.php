<!DOCTYPE html>
<html lang="en">

<head>

    <title> STUD PROFILES </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
   
    <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  
    <?php include_once 'stylesheets.php'; ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        @media screen and (min-width: 360px) and (max-width: 929.98px) {

        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <div class="message">
                <section class="services" id="services">
                    <div class="service">
                        <h1 class="mt-4" id="studtitle"> CHOOSE THE PERFECT PAIR </h1>
                    </div>
                    <!-- AVAILABLE PUPPIES CARD -->
                    <div class="container-fluid d-flex justify-content-center">
                        <div class="card mt-5" style="width: 20rem;">
                            <a href="/stud-profile"><img src="/Ohana/src/images/petprofile/stud.jpg" class="card-img-top" alt="Dog for Stud Service"></a>
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bold"> FRENCH BULLDOG NAME </h5>
                                <p class="card-text mb-4 text-center"> Stud success rate: 90% </p>
                                <form action="/stud-profile" method='get'>
                                    <div class="btn-Learn" name="btn-Learn">
                                        <center><button id="btnLearn" name="btnLearn"><span> More Info! </span></button></center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>

    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>