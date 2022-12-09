<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <title> CHANGE PASSWORD </title>
    <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
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
    <div class="layer"> </div>
    <div class="page-flex">
        <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
        <div class="main-wrapper">
            <?php include_once dirname(__DIR__) . "/navbar.php" ?>
            <main class="main users chart-page" id="skip-target">
                <div class="container d-flex justify-content-center">
                    <form id="myform-search" method="GET" action="/accounts/update" autocomplete="off">
                        <h1 class="text-center mt-5" style="font-family: 'Acme', sans-serif; color:#db6551; font-size:70px;">Change your Password</h1>
                        <p class="text-center mb-5 fs-5">Input a new password for your account</p>
                        <div class="row">
                            <div class="col">
                                <label class="mb-2" for="name" style="display:block"> <b>Current Password:</b> </label>
                                <input type="password" value="" name="old-password" id="password" class="password" for="password" required style="background-color:white;width:100%" minlength="8"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="mb-2 mt-4" for="name" style="display:block"> <b>New Password:</b> </label>
                                <input type="password" value="" name="password" id="new-password" class="password" for="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" style="background-color:white;width:100%" minlength="8" maxlength="49">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="mb-2 mt-4" for="name" style="display:block"> <b>Confirm Password:</b> </label>
                                <input type="password" value="" name="confirm-password" id="confirm-password" class="password" for="confirm-password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" style="background-color:white;width:100%" minlength="8" maxlength="49">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <a href="/dashboard/profile">
                                <button class="btn btn-outline-dark m-3" type="button">Back to profile</button></a>
                            <button class="btn profile-button m-3" type="submit" style="background-color:#db6551; color:white; ">Save Changes</button>
                        </div>
                    </form>
                </div>
            </main>
            <?php include_once dirname(__DIR__) . '/footer.php'; ?>
        </div>
    </div>
    <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
        <div class="toast-container top-0 end-0 p-3">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="toast-header">
                    <img src="/Ohana/src/dashboard/img/main/notification.png" width="25px" height="25px" alt="">
                    <strong class="me-auto fs-4"> &nbsp; Notification </strong>
                    <small> JUST NOW </small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" style="color:#db6551; font-size:15px;"><?php echo $_SESSION["msg"] ?></div>
            </div>
        </div>
    <?php
    }
    unset($_SESSION["msg"]);
    ?>
    <script>
        var myInput = document.getElementById("new-password"),
            letter = document.getElementById("letter"),
            capital = document.getElementById("capital"),
            number = document.getElementById("number"),
            length = document.getElementById("length"),
            confirmpass = document.getElementById("confirm-password");
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }
        const passwordInput = $("#password"),
            letter = $("#letter"),
            capital = $("#capital"),
            number = $("#number"),
            length = $("#length"),
            confirmpassInput = $("#confirm-password");
        passwordInput.focus(() => {
            $("#message").css("display", "block");
        });
        passwordInput.blur(() => {
            $("#message").css("display", "none");
        });
        passwordInput.keyup(() => {
            const lowerCaseLetters = /[a-z]/g;
            if (passwordInput.val().match(lowerCaseLetters)) {
                letter.removeClass("invalid");
                letter.addClass("valid");
            } else {
                letter.removeClass("valid");
                letter.addClass("invalid");
            }
            const upperCaseLetters = /[A-Z]/g;
            if (passwordInput.val().match(upperCaseLetters)) {
                capital.removeClass("invalid");
                capital.addClass("valid");
            } else {
                capital.removeClass("valid");
                capital.addClass("invalid");
            }
            const numbers = /[0-9]/g;
            if (passwordInput.val().match(numbers)) {
                number.removeClass("invalid");
                number.addClass("valid");
            } else {
                number.removeClass("valid");
                number.addClass("invalid");
            }
            if (passwordInput.val().length >= 8) {
                length.removeClass("invalid");
                length.addClass("valid");
            } else {
                length.removeClass("valid");
                length.addClass("invalid");
            }
            if (confirmpassInput.val() != passwordInput.val()) {
                confirmpass.setCustomValidity("Password does not match");
            } else {
                confirmpass.setCustomValidity("");
            }
        });
        confirmpassInput.keyup(() => {
            if (confirmpassInput.val() != passwordInput.val()) {
                confirmpass.setCustomValidity("Password does not match");
            } else {
                confirmpass.setCustomValidity("");
            }
        });
    </script>
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
    <script src="/Ohana/src/dashboard/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>

</html>