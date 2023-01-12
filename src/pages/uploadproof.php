<!DOCTYPE html>
<html lang="en">

<head>
    <title> UPLOAD PROOF </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        #skip {
            text-decoration: none;
            color: #db6551;
        }

        #chead {
            margin-top: 5%;
        }

        #note {
            font-size: 15px;
        }

        #back {
            width: 300px;
        }

        #pay {
            background-color: #c0b65a;
            color: white;
            width: 300px;
        }

        #ohanafooter {
            margin-top: 10%;
        }

        @media screen and (min-width: 360px) and (max-width: 929.98px) {
            #cardheader {
                margin-top: 500px;
                max-width: 200px;
                max-height: 100px;
            }

            #chead {
                margin-top: 40%;
            }

            #proof {
                font-size: 15px;
            }

            #note {
                font-size: 10px;
                font-weight: bold;
            }

            #back {
                font-size: 15px;
                width: 150px;
            }

            #pay {
                font-size: 15px;
                width: 150px;
            }
        }
    @media screen and (min-width: 1100px) and (max-width: 1366px) {
        
      }
</style>
</head>

<body style="background-color: #FAF8F0;">
    <?php
    if (!isset($_GET['reference']) && !isset($_GET['mode'])) {
        include_once dirname(__DIR__) . '/config/app-config.php';
    ?>
        <script type="text/javascript">
            const url = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
            window.location.href = url;
        </script>
    <?php
        exit();
    }

    if (isset($_GET["from"])) {
        $type = "stud";
    } else {
        $type = "rehoming";
    }
    ?>
    <main>
        <?php include_once 'navigationbar.php'; ?>
        <div class="container-fluid">
            <section class="carthead" id="chead">
                <div class="cartheader mb-4">
                    <img src="/Ohana/src/images/Pages/checkoutheader.png" class="img-fluid" id="#cartheader">
                </div>
            </section>
            <div class="container">
                <section class="paymentnote mb-5">
                    <center>
                        <form method="POST" action="/transaction/complete/<?php echo $type; ?>" enctype="multipart/form-data">
                            <div class="card rounded-3 mb-4 p-4" id="proof" style="width:75%;">
                                <h1 class="mt-2 mb-3 fs-3"> Upload Proof of Payment </h1>
                                <div class="col">
                                    <input type="hidden" name="reference" value="<?php echo $_GET['reference']; ?>">
                                    <input type="hidden" name="mode" value="<?php echo $_GET['mode']; ?>">
                                    <input type="file" id="image" name="image">
                                </div>
                                <div class="col mt-5">
                                    <button type="submit">-Skip this step-</button>
                                </div>
                            </div>
                            <div class="card rounded-3 mb-4 p-4" id="note" style="width:75%;">
                                <p class="mt-4"> Note: TRANSACTIONS WILL BE DONE FACE TO FACE, YOU ONLY NEED TO SELECT A PAYMENT METHOD OF YOUR CHOICE </p>
                                <p class="mt-2 mb-3"> Friendly Reminder: Kindly Read the <b>Terms and Conditions for Cancellation and Payment Policy.</b> </p>
                            </div>
                            <a href="javascript:history.go(-1)" class="text-light"><button type="button" id="back" class="btn btn-outline-dark btn-lg mt-2 mx-3">Go Back</button></a>
                            <button type="submit" id="pay" class="btn btn-block btn-lg mt-2 mx-3">
                                Proceed </button>
                        </form>
                    </center>
                </section>
            </div>
        </div>
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>