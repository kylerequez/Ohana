<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA CONTACT </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <!-- END OF META TAGS -->

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="/Ohana/src/css/Ucontact.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <div class="message" style="margin-top:10%">
                <h1 style="font-size:100px; font-family: 'Acme', sans-serif; font-weight:800; color:#db6551"> CONTACT US! </h1>
            </div>
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <section class="contact-us" id="contact" style="margin-top:5%">
                <div class="container-fluid">
                    <form id="contactform" class="topBefore">
                        <input id="name" type="text" placeholder="FULL NAME">
                        <input id="email" type="text" placeholder="E-MAIL ADDRESS ">
                        <textarea id="message" type="text" placeholder="ENTER FEEDBACK OR MESSAGE"></textarea>
                    </form>

                    <form action="/pages/login.php" method='get'>
                        <div class="btn-Send" name="btn-Send">
                            <button id="btnSend" name="btnSend" type="submit"><span> Send Message </span></button>
                        </div>
                    </form>
                </div>
        </div>
        </section>
        <section class="maps">
            <div class="message" style="margin-top:10%">
                <h1 style="font-size:80px; font-family: 'Acme', sans-serif; font-weight:800; color:#db6551"> YOU CAN FIND US HERE </h1>
            </div><br>
            <center>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1623.2871555101196!2d121.00392295489537!3d14.607660960531538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b61dfbade45d%3A0x87e58f7a0f4c89c3!2s1026%20Mindoro%2C%20Sampaloc%2C%20Maynila%2C%201008%20Kalakhang%20Maynila!5e0!3m2!1sen!2sph!4v1665068149424!5m2!1sen!2sph" width="800" height="650" style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </center>
        </section>
        </div>
    </main>

    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
    </div>

    <!-- SCIPTS -->

    <!-- Chart library -->
    <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

    <!-- Icons library -->
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>


    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>