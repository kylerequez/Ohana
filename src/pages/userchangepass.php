<!DOCTYPE html>
<html lang="en">

<head>

    <title> USER PROFILE </title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <!-- END OF META TAGS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="/Ohana/src/css/changepass.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
    <link rel="stylesheet" href="/Ohana/src/css/footer.css">
    <!-- FONT AWESOME ICONS IMPORT -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Web Icon -->
    <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <!-- Bootstrap CSS  CDN -->
    <!-- 5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <section class="userprofile">

                <div class="container" style="margin-top:5%"><br>
                    <div id="box">
                        <form id="myform-search" method="post" autocomplete="off">
                            <h1 style="font-family: 'Acme', sans-serif; color:#c0b65a; font-size:50px; text-align:center">Change Password</h1><br>
                            <p><input type="password" value="" placeholder="Enter Password" name="password" id="password" class="password" for="password" required></p>
                            <p>
                                <input type="password" value="" placeholder="Confirm Password" name="confirm-password" id="confirm-password" class="password" for="confirm-password" required>
                                <br>
                            <div style="margin-right: 70%;">
                                <label> Show Password </label>
                                <input type="checkbox" name="" onclick="myFunction()">
                                <br> <br>
                            </div>
                            <p>Must be 6+ characters long and contain at least 1 upper case letter, 1 number, 1 special character</p>
                            </p>
                            <span>
                                <div class="mb-5 text-center"><a href="/userprofile">
                                <button class="btn profile-button" type="button" style="background-color:#db6551; color:white; float:left">Back to profile</button></a></div>
                                <div class="mb-5 text-center">
                                <button class="btn profile-button" type="submit" style="background-color:#db6551; color:white; float:right">Save Changes</button></div>
                            </span>
                            <br><br>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <div class="container-fluid">
        <?php include_once 'footer.php'; ?>
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

    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>

    <!-- JAVASCRIPT IMPORTS -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>



</body>

</html>