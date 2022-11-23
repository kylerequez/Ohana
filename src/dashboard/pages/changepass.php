<!DOCTYPE html>
<html lang="en">

<head>
    <!--meta tags-->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <!-- end of meta tags-->
    <title> CHANGE PASSWORD </title>

    <!-- WEB ICON-->
    <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

    <!-- ICONS IMPORT  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- BOOTSTRAP CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Custom styles -->
    <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    </style>

    <style>
        h1 {
            margin-bottom: .75em;
            font-size: 50px;
            color: #db6551;
            font-weight: bold;
        }

        h1 span,
        small {
            display: block;
            font-size: 14px;
            color: #989598;
        }

        small {
            font-style: italic;
            font-size: 11px;
        }

        form p {
            position: relative;
        }

        #valid {
            font-size: 12px;
            color: #daa;
            height: 15px
        }

        #strong {
            height: 20px;
            font-size: 12px;
            color: #daa;
            text-transform: capitalize;
            background: rgba(205, 205, 205, 0.1);
            border-radius: 5px;
            overflow: hidden
        }

        #strong span {
            display: block;
            box-shadow: 0 0 0 #fff inset;
            height: 100%;
            transition: all 0.8s
        }

        #strong .weak {
            box-shadow: 5em 0 0 #daa inset;
        }

        #strong .medium {
            color: #da6;
            box-shadow: 10em 0 0 #da6 inset
        }

        #strong .strong {
            color: #595;
            box-shadow: 50em 0 0 #ada inset
        }

        .lists {
            padding: 0%;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_SESSION)) session_start();
    include_once dirname(__DIR__) . '/../models/Account.php';

    if (empty($_SESSION['user'])) {
        session_unset();
        session_destroy();
        header("Location: http://localhost/login");
        exit();
    } else {
        $user = unserialize($_SESSION['user']);
    ?>
        <div class="layer"> </div>
        <!-- Body -->
        <div class="page-flex">
            <!-- Dashboard Sidebar -->
            <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>

            <div class="main-wrapper">
                <!-- END OF ADMIN DASHBOARD SIDE-->

                <!-- ! Main nav -->
                <?php include_once dirname(__DIR__) . "/navbar.php" ?>

                <main class="main users chart-page" id="skip-target">
                    <div class="container d-flex justify-content-center">

                        <form id="myform-search" method="GET" action="/accounts/update" autocomplete="off">
                            <h1 class="text-center mt-5" style="font-family: 'Acme', sans-serif; color:#db6551; font-size:70px;">Change your Password</h1>
                            <p class="text-center mb-5" style="font-size:20px;">Input a new password for your account</p>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2" for="name" style="font-size:20px;display:block"> <b>Current Password:</b> </label>
                                    <input type="password" value="" name="password" id="password" class="password" for="password" required style="background-color:#eed1c2;width:100%" minlength="8"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2 mt-4" for="name" style="font-size:20px;display:block"> <b>New Password:</b> </label>
                                    <input type="password" value="" name="new-password" id="new-password" class="password" for="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" style="background-color:#eed1c2;width:100%" minlength="8" maxlength="49">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2 mt-4" for="name" style="font-size:20px;display:block"> <b>Confirm Password:</b> </label>
                                    <input type="password" value="" name="confirm-password" id="confirm-password" class="password" for="confirm-password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" style="background-color:#eed1c2;;width:100%" minlength="8" maxlength="49">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-5">
                                <a href="/dashboard/profile">
                                    <button class="btn btn-outline-dark m-3" type="button">Back to profile</button></a>
                                <button class="btn profile-button m-3" type="submit" style="background-color:#db6551; color:white; ">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- CHANGE PASSWORD CONTENT -->
                </main>
                <!-- FOOTER -->
                <?php include_once dirname(__DIR__) . '/footer.php'; ?>
            </div>
        </div>

        <!-- SCIPTS -->
        <script>
            //PASSWORD VALIDATION SCRIPT

            var myInput = document.getElementById("new-password"),
                letter = document.getElementById("letter"),
                capital = document.getElementById("capital"),
                number = document.getElementById("number"),
                length = document.getElementById("length"),
                confirmpass = document.getElementById("confirm-password");

            // When the user clicks on the password field, show the message box
            myInput.onfocus = function() {
                document.getElementById("message").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function() {
                document.getElementById("message").style.display = "none";
            }

            // When the user starts to type something inside the password field
            myInput.onkeyup = function() {
                // Validate lowercase letters
                var lowerCaseLetters = /[a-z]/g;
                if (myInput.value.match(lowerCaseLetters)) {
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                }

                // Validate capital letters
                var upperCaseLetters = /[A-Z]/g;
                if (myInput.value.match(upperCaseLetters)) {
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                }

                // Validate numbers
                var numbers = /[0-9]/g;
                if (myInput.value.match(numbers)) {
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }

                // Validate length
                if (myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }

            //Validate if passwords match
            confirmpass.onkeyup = function validatePassword() {
                var pass = document.getElementById("password");
                var confirmpass = document.getElementById("confirm-password");
                if (confirmpass.value != pass.value) {
                    confirmpass.setCustomValidity("Password does not match");
                } else {
                    confirmpass.setCustomValidity("");
                }
            }
        </script>



        <!-- Icons library -->
        <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

        <!-- Custom scripts -->
        <script src="/Ohana/src/dashboard/js/script.js"></script>

        <!-- JavaScript BOOTSTRAP Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>

        <!--SCRIPT FOR BOOTSTRAP MODAL-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <?php
    }
    ?>
</body>

</html>