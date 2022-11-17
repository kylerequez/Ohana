<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>

  <title> CHANGE PASSWORD </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">

  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">
  <?php include_once 'stylesheets.php'; ?>

  <style>
    @media screen and (min-width: 375px) and (max-width: 767.98px) {
      .sign-up__title {
        font-size: 30px;
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

  <!-- UNREGISTERED USERS NAVIGATION BAR-->
  <?php include_once 'navbar.php'; ?>
  <!-- MAIN CONTENT -->
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
          <!-- ALERT -->
          <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
              unset($_SESSION["msg"]); ?>
            </div>
          <?php
          }
          unset($_SESSION["msg"]);
          ?>
        </header>

        <?php
        if ($token != $_SESSION["token"]) {
          header("Location: http://localhost/forgot-password/confirm");
          session_destroy();
        }
        ?>
        <form id="form" method="POST" action="/forgotpassword" class="sign-up__form form">
          <div class="form__row form__row--two">
            <div class="input form__inline-input">
              <div class="input__container">

                <!-- PASSWORD INPUT BOX -->
                <div class="form__row">
                  <div class="input">
                    <div class="input__container">
                      <input class="input__field" id="password" name="password" placeholder="Password" required="" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                      <label class="input__label" for="password">Password</label>
                    </div>
                  </div>
                </div>

                <!-- VALIDATION BOX-->
                <div id="message" style="background: white;">
                  <h3 class="text-center" style="font-size: 20px; color:#c0b65a;">Password must contain the following:</h3>
                  <p id="letter" class="invalid">At least one <b>lowercase</b> letter</p>
                  <p id="capital" class="invalid">At least one <b>capital</b> letter</p>
                  <p id="number" class="invalid">At least one <b>number</b></p>
                  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
                <br>
                <!-- PASSWORD INPUT BOX -->
                <div class="form__row">
                  <div class="input">
                    <div class="input__container">
                      <input class="input__field" id="confirm-password" placeholder="Confirm password" required="" type="password" />
                      <label class="input__label" for="confirm-password">Confirm password</label>
                    </div>
                  </div>
                </div>
                <center><br>
                  <div class="form__row">
                    <div class="logbtn">
                      <button name="btnChange" type="submit" id="btncpass"> <span> Change Password </span></button>
                    </div>
                  </div>
                </center>
                <hr style="width:100%"><br>
                <div class="form__row sign-up__sign">
                  Don't have an account? &nbsp;<a class="link" href="/register" style="text-decoration: none;"> Register Now! </a>
                </div>
        </form>
      </div>
    </div>
  </main>
  <!-- FOOTER -->
  <div name="footer" style="margin-top:15%">
    <?php include_once 'footer.php'; ?>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- START OF JAVASCRIPT-->
  <script>
    //PASSWORD VALIDATION SCRIPT
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

</body>

<!-- SCIPTS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>