<!DOCTYPE html>
<html lang="en">

<head>

    <title> OHANA CONTACT </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <link rel="stylesheet" href="/Ohana/src/css/Ucontact.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/chatbot-ui.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        #address {
            width: 800px;
            height: 650px;
        }
        #contact {
            margin-top:-10%;
        }
        #find {
            margin-top: 5%;
        }
        #name {
            margin-top: 35%;
        }
        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #header {
                font-size: 45px;
                margin-top: 40%;
            }

            .reasons {
                background-image: url(/Ohana/src/images/Pages/rcontact.png);
                max-height: 700px;
            }
            #contactform {
                position: relative !important;
                width: 10px;
                float: left;
                margin-left:10px;
            }

            textarea {
                width: 330px;
                max-width: 900px;
                max-height: 150px;
                padding: 10px;
            }

            #name {
                margin-top: -50px;
                width: 330px;
                max-width: 900px;
                max-height: 200px;
                padding: 10px;
            }

            #email {
                width: 330px;
                max-width: 900px;
                max-height: 200px;
                padding: 10px;
            }

            .btn-Send button {
                background-color: #db6551;
                border-radius: 30px;
                border: 1px solid #ffffff;
                display: inline-block;
                cursor: pointer;
                color: #ffffff;
                font-family: "Poppins";
                font-size: 12px;
                padding: 10px 40px;
                text-decoration: none;
                text-shadow: 0px 1px 0px #ffffff;
                margin-top: 90%;
                margin-right: 67px;
                margin-left: auto;
            }

            #address {
                max-width: 320px;
                max-height: 300px;
                margin-left: auto;
                margin-right: auto;
            }

            #find {
                font-size: 45px;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>

        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <div class="message">
                <h1 id="header" class="text-center"> Contact Us! </h1>
            </div>
            <section class="contact-us" id="contact">
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
            </section>
        </div>
        <section class="maps mb-5">
            <div class="message" id="find">
                <h1 id="find" class="mb-5 text-center"> You can find us here </h1>
            </div><br>
            <center>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1623.2871555101196!2d121.00392295489537!3d14.607660960531538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b61dfbade45d%3A0x87e58f7a0f4c89c3!2s1026%20Mindoro%2C%20Sampaloc%2C%20Maynila%2C%201008%20Kalakhang%20Maynila!5e0!3m2!1sen!2sph!4v1665068149424!5m2!1sen!2sph" style="border:0;" id="address" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </center>
        </section>
        <div id="chat-container"> </div>
        </div>
    </main>

    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>

    <!-- JAVASCRIPT IMPORTS -->
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
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>