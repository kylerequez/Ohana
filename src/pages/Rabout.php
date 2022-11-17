<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA ABOUT </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/about.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        @media screen and (min-width: 375px) and (max-width: 767.98px) {
            .mainabout {
                background-image: url(/Ohana/src/images/Pages/mbaboutdesc.jpg);
                min-width:375px;
                min-height:400px; 
            }

            .values {
                background-image: url(/Ohana/src/images/Pages/valuesmb.jpg);
                min-width:375px;
                min-height:400px; 
            }

            #aboutheading {
                font-size:50px;
                font-family: 'Acme', sans-serif; 
                color:#DB6551; 
                margin-top:40%;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <h1 id="aboutheading" class="text-center" id="head"> ABOUT US </h1>
            <section class="mainabout">
            </section>
            <section class="values">
            </section>
        </div>
    </main>

    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>

    <script src="/Ohana/src/dashboard/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>