<!DOCTYPE html>
<html lang="en">

<head>
    <title> USER PROFILE </title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="/Ohana/src/css/userprofile.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        @media screen and (min-width: 360px) and (max-width: 929.98px) {}
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <section class="userprofile" style="margin-top:10%;">
                <div class="container">
                    <div class="userheader mb-5">
                        <h1> APPOINTMENT CALENDAR</h1>
                    </div>
                    <div class="alert" role="alert" style="background-color:#eed1c2;">
                        Please be advised that your chosen time slot
                    </div>
                </div>
            </section>

            </section>
        </div>
    </main>
    <div class=" container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>
    <!-- SCIPTS -->
    <!-- Chart library -->
    <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>