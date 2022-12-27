<!DOCTYPE html>
<html lang="en">

<head>
    <title> OHANA ABOUT </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/aboutus.css">
    <link rel="stylesheet" href="/Ohana/src/css/chatbot-ui.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        @media screen and (max-width: 1366px) {
            #header {
                margin-top:20%;
                font-size: 60px;
            }
        }
        @media screen and (min-width: 360px) and (max-width: 500px) {
            #header {
                margin-top:12%;
            }
            #mainabout {
                background-image: url(/Ohana/src/images/Pages/mbaboutmain.png);
                min-width: 360px;
                max-width: 500px;
                min-height: 500px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            #values {
                background-image: url(/Ohana/src/images/Pages/mbvalues.png);
                min-width: 360px;
                min-height: 500px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            #header {
                font-size: 50px;
                margin-top: 40%;
                margin-bottom: 30px;
            }
        }
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <?php include_once 'navigationbar.php'; ?>

        <div class="container-fluid">
            <h1 id="header" class="text-center"> About Us </h1>
            <section class="mainabout" id="mainabout">
            </section>
            <section class="values" id="values">
            </section>

            <div id="chat-container"> </div>
        </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="/Ohana/src/js/chatbot-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $.ajax({
            url: '/chatbot/settings/get',
            type: "GET",
            error: function(error) {
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