<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>
  <title> CHANGE PASSWORD </title>
  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Kennel Business, French Bulldogs">

  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">
  <?php include_once 'stylesheets.php'; ?>
  <style>
    @media screen and (min-width: 375px) and (max-width: 767.98px) {
      .sign-up__title {
        font-size: 20px;
      }
    }
  </style>

</head>

<body style="background-color: #FAF8F0;">

  <!-- UNREGISTERED USERS NAVIGATION BAR-->
  <?php include_once 'Rnavbar.php'; ?>
  <!-- MAIN CONTENT -->
  <main class="sign-up">
    <div class="sign-up__container">
      <div class="sign-up__content">
        <header class="sign-up__header">
          <h1 class="sign-up__title mt-5" style="font-size: 80px;">
            CHANGE PASSWORD
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

        <form id="form" method="POST" action="/forgotpassword" class="sign-up__form form">
          <div class="form__row form__row--two">
            <div class="input form__inline-input">
              <div class="input__container">

                <div class="form__row">
                  <div class="input">
                    <div class="input__container mt-2">
                      <input class="input__field" id="password" placeholder="Current password" required="" type="password" />
                      <label class="input__label" for="password">Current Password</label>
                    </div>
                  </div>
                </div>

                <!-- PASSWORD INPUT BOX -->
                <div class="form__row">
                  <div class="input">
                    <div class="input__container mt-2">
                      <input class="input__field" id="new-password" name="new-password" placeholder="Password" required="" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                      <label class="input__label" for="new-password"> New Password</label>
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

                <div class="form__row">
                  <div class="input">
                    <div class="input__container mt-3">
                      <input class="input__field" id="confirm-password" placeholder="Confirm password" required="" type="password" />
                      <label class="input__label" for="confirm-password">Confirm password</label>
                    </div>
                  </div>
                </div>
                <div class="form__row">
                  <div class="input-checkbox">
                    <!-- CHECKBOX -->
                    <div class="input-checkbox__container">

                      <input type="checkbox" class="input-checkbox__field" id="agree" required="true;" name="" onclick="myFunction()" /> <span class="input-checkbox__square"></span>

                      <label class="input-checkbox__label" for="agree"> Show Password </label>
                    </div>
                  </div>
                </div>
                <center><br>
                  <div class="form__row">
                    <div class="logbtn">
                      <button name="btnChange" type="submit"> <span> Change Password </span></button>
                    </div>
                  </div>
                </center>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
  <!-- FOOTER -->
  <div name="footer" style="margin-top:20%">
    <?php include_once 'footer.php'; ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- START OF JAVASCRIPT-->
  <script>
    //PASSWORD VALIDATION SCRIPT
    const currentpassword = $("#password"),
      passwordInput = $("#new-password"),
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
        confirmpass.setCustomValidity("Password does not match");
      } else {
        confirmpass.setCustomValidity("");
      }
    });
  </script>

  <script>
    // Show Password
    function myFunction() {
      if (currentpassword.type == 'password') {
        currentpassword.type = 'text';
      } else {
        currentpassword.type = 'password';
      }
      if (password.type == 'new-password') {
        password.type = 'text';
      } else {
        password.type = 'new-password';
      }
      if (confirmpass.type == 'confirm-password') {
        confirmpass.type = 'text';
      } else {
        confirmpass.type = 'confirm-password';
      }
    }
  </script>
  </main>

</body>

<!-- SCIPTS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>