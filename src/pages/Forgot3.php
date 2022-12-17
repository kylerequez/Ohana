<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>
  <title> CHANGE PASSWORD </title>
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <?php include_once 'stylesheets.php'; ?>
  <style>
    .sign-up__title {
      font-size: 80px;
      margin-top: 5%;
    }

    #ohanafooter {
      margin-top: 8%;
    }

    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      .sign-up__title {
        font-size: 37px;
        margin-top: 25%;
      }

      #btncpass {
        display: block;
        padding: 10px 60px;
        font-size: 18px;
        font-weight: 700;
      }

      .input__label {
        font-size: 15px;
      }

      #message p {
        margin-top: 5px;
        font-size: 14px;
      }
    }
  </style>
</head>

<body style="background-color: #FAF8F0;">
  <?php
  include_once 'navbar.php';
  include_once dirname(__DIR__) . '/config/app-config.php';
  ?>
  <main class="sign-up">
    <div class="sign-up__container">
      <div class="sign-up__content">
        <header class="sign-up__header">
          <h1 class="sign-up__title">
            FORGOT PASSWORD
          </h1>
          <p class="sign-up__descr" style="font-size: 25px;">
            Input a new password for your account.
          </p>

          <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
            <div class="alert alert-warning mt-5" role="alert">
              <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
              unset($_SESSION["msg"]); ?>
            </div>
          <?php
          }
          unset($_SESSION["msg"]);
          ?>
        </header>
        <?php
        if ($token != $_SESSION["token"] || !isset($_SESSION['token'])) {
          session_destroy();
        ?>
          <script>
            window.location = 'https://<?php echo DOMAIN_NAME; ?>/forgot-password';
          </script>
        <?php
        }
        ?>
        <form id="form" method="POST" action="/forgotpassword" class="sign-up__form form">
          <div class="form__row form__row--two">
            <div class="input form__inline-input">
              <div class="input__container">
                <div class="form__row">
                  <div class="input">
                    <div class="input__container">
                      <input class="input__field" id="password" name="password" placeholder="Password" required="" type="password" minlength="8" maxlength="49" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                      <label class="input__label" for="password">Password</label>
                    </div>
                  </div>
                </div>
                <div id="message" style="background: white;">
                  <h3 class="text-center fs-5" style="font-family: 'Acme', sans-serif;">Password must contain the following:</h3>
                  <p id="letter" class="invalid">At least one <b>lowercase</b> letter</p>
                  <p id="capital" class="invalid">At least one <b>capital</b> letter</p>
                  <p id="number" class="invalid">At least one <b>number</b></p>
                  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
                <br>
                <div class="form__row">
                  <div class="input">
                    <div class="input__container">
                      <input class="input__field" id="confirm-password" name="confirm-password" placeholder="Confirm password" required="" type="password" minlength="8" maxlength="49" />
                      <label class="input__label" for="confirm-password">Confirm password</label>
                    </div>
                  </div>
                </div>
                <center><br>
                  <div class="form__row">
                    <div class="logbtn">
                      <button name="btnChange" id="btncpass" type="submit"> <span> Change Password </span></button>
                    </div>
                  </div>
                </center>
                <hr style="width:100%"><br>
                <div class="form__row sign-up__sign">
                  Don't have an account? &nbsp;<a class="link" href="/register" style="text-decoration: none;"> Register Now! </a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
  <div id="ohanafooter">
    <?php include_once 'footer.php'; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
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
    });
    confirmpassInput.keyup(() => {
      if (confirmpassInput.val() != passwordInput.val()) {
        confirmpass.get(0).setCustomValidity("Password does not match");
      } else {
        confirmpass.get(0).setCustomValidity("");
      }
    });
  </script>
  </main>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</body>

</html>