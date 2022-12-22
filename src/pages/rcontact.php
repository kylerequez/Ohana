<!DOCTYPE html>
<html lang="en">

<head>
    <title> OHANA CONTACT </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/contactus.css">
    <link rel="stylesheet" href="/Ohana/src/css/chatbot-ui.css">

    <?php include_once 'stylesheets.php'; ?>
    <style>
        #contact-page {
            font-family: "Poppins";
        }

        #sectionheaders {
            margin-top: 20%;
            font-size: 80px;
            font-family: "Acme", sans-serif;
            font-weight: 800;
            color: #db6551;
        }

        #address {
            width: 800px;
            height: 650px;
        }

        #contact {
            margin-top: -10%;
        }

        #contactform {
            margin-top: -5%;
        }

        #find {
            margin-top: 5%;
            text-align: center;
        }

        #name {
            margin-top: 35%;
        }

        @media screen and (min-width: 360px) and (max-width: 500px) {
            #sectionheaders {
                font-size: 45px;
                margin-top: 50%;
            }

            .contact-us {
                background-image: url(/Ohana/src/images/mobile/contact.png);
                min-height: 700px;
                max-height: 700px;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            #contactform {
                position: relative !important;
                width: 10px;
                float: left;
                margin-left: 10px;
                margin-top: 380px;
            }

            textarea {
                width: 350px;
                max-width: 900px;
                max-height: 150px;
                padding: 10px;
            }

            #name {
                margin-top: -50px;
                width: 350px;
                max-width: 900px;
                max-height: 200px;
                padding: 10px;
            }

            #email {
                width: 350px;
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
                margin-left: 120px;
            }

            #address {
                max-width: 350px;
                max-height: 300px;
            }

            #find {
                font-size: 30px;
                margin-top: 30%;
                text-align: center;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main id="contact-page">
        <?php include_once 'navigationbar.php'; ?>
        <div class="container-fluid">
            <section class="contact-us" id="contact">
                <div class="container-fluid">
                    <div class="message text-center">
                        <h1 class="contact" id="sectionheaders"> Contact Us! </h1>
                    </div>
                    <form id="contactform" class="topBefore" method="POST" action="/contact-us/send">
                        <input id="name" name="name" type="text" placeholder="FULL NAME">
                        <input id="email" name="email" type="text" placeholder="E-MAIL ADDRESS ">
                        <textarea id="message" name="message" type="text" placeholder="ENTER MESSAGE"></textarea>
                        <div class="btn-Send mt-4 ms-3" name="btn-Send">
                            <button type="submit"><span> Send </span></button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <section class="maps mb-5">
            <div class="message" id="find">
                <h1 id="find" class="mb-5"> You can find us here </h1>
            </div>
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
    <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
        <div class="toast-container top-0 start-0 ms-2" style="margin-top:8%;">
            <div id="liveToast" class="toast show d-flex" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="4000">
                <div class="toast-body fs-6" id="toastbody" style="color:#db6551">
                    <p class="fs-5"> <?php echo $_SESSION["msg"] ?> </p>
                </div>
                <button type="button" class="btn-close m-2" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    <?php
        unset($_SESSION["msg"]);
    }
    ?>

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
            avatar = info.avatar;
            name = info.name;
            intro = info.intro;
            noResponse = info.noResponse;
            createChatBot(host = '/chatbot/responses/get', botLogo = avatar,
                title = name, welcomeMessage = intro, inactiveMsg = noResponse, theme = "orange")
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>