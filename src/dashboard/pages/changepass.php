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

        .password {
            width: 90%;
            padding: 15px 12px;
            margin-bottom: 5px;
            border: 1px solid #e5e5e5;
            border-bottom: 2px solid #ddd;
            background: rgba(255, 255, 255, 0.2) !important;
            color: #555;
        }

        .password+.unmask {
            position: absolute;
            right: 5%;
            top: 10px;
            width: 25px;
            height: 25px;
            background: transparent;
            border-radius: 50%;
            cursor: pointer;
            border: none;
            font-family: 'fontawesome';
            font-size: 14px;
            line-height: 24px;
            -webkit-appearance: none;
            outline: none
        }

        .password+.unmask:before {
            content: "\f06e";
            position: absolute;
            top: 0;
            left: 0;
            width: 25px;
            height: 25px;
            background: rgba(205, 205, 205, 0.2);
            z-index: 1;
            color: #aaa;
            border: 2px solid;
            border-radius: 50%;
        }

        .password[type="text"]+.unmask:before {
            content: "\f070";
            background: rgba(105, 205, 255, 0.2);
            color: #06a
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
    <div class="layer"> </div>
    <!-- Body -->
    <div class="page-flex">
        <!-- Dashboard Sidebar -->
        <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>

        <div class="main-wrapper">
            <!-- END OF ADMIN DASHBOARD SIDE-->
            <div class="layer"> </div>
            <!-- Body -->
            <div class="page-flex">
                <!-- Dashboard Sidebar -->
                <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
                <div class="main-wrapper">
                    <!-- ! Main nav -->
                    <?php include_once dirname(__DIR__) . "/navbar.php" ?>

                    <main class="main users chart-page" id="skip-target">
                        <div class="container d-flex justify-content-center">

                            <form id=" myform-search" method="post" autocomplete="off">
                                <h1 class="text-center mt-5" style="font-family: 'Acme', sans-serif; color:#db6551; font-size:70px;">Change your Password</h1>
                                <p class="text-center mb-5" style="font-size:20px;">Input a new password for your account</p>

                                <p><input type="password" value="" placeholder="Current Password" name="password" id="password" class="password" for="password" required style="background-color:#eed1c2"></p>
                                <p><input type="password" value="" placeholder="Enter New Password" name="new-password" id="new-password" class="password" for="password" required style="background-color:#eed1c2"></p>
                                <p><input type="password" value="" placeholder="Confirm Password" name="confirm-password" id="confirm-password" class="password" for="confirm-password" required style="background-color:#eed1c2">
                                <div class="d-flex justify-content-start mt-3">
                                    <input type="checkbox" name="" onclick="myFunction()">
                                    <label> Show Password </label>
                                </div>
                                </p>
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="/userprofile">
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
        </div>

        <!-- SCIPTS -->
        <script>
            //PASSWORD VALIDATION SCRIPT

            var myInput = document.getElementById("password"),
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

        <script>
            // Show Password
            const current = $("#password"),
                newpass = $("#new-password"),
                confirmpass = $("#confirm-password")

            function myFunction() {
                if (password.type == 'password') {
                    password.type = 'text';
                } else {
                    password.type = 'password';
                }
                if (confirmpass.type == 'password') {
                    confirmpass.type = 'text';
                } else {
                    confirmpass.type = 'password';
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
</body>

</html>