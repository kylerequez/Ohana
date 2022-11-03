<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>

  <title> CHANGE PASSWORD </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

  <!-- FONT AWESOME ICONS IMPORT -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Web Icon -->
  <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous">

  <!-- MORE icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">

</head>

<body style="background-color: #FAF8F0;">

  <!-- UNREGISTERED USERS NAVIGATION BAR-->
  <?php include_once 'navbar.php'; ?>
  <!-- MAIN CONTENT -->
  <main class="sign-up">
    <div class="sign-up__container">
      <div class="sign-up__content">
        <header class="sign-up__header">
          <h1 class="sign-up__title" style="font-size: 80px; margin-top: 5%;">
            FORGOT PASSWORD
          </h1>
          <p class="sign-up__descr" style="font-size: 25px;">
            Input a new password for your account.
          </p>
           <!-- ALERT -->
           <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
              <div class="alert alert-success" role="alert">
              <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null; unset($_SESSION["msg"]); ?>
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

                <!-- PASSWORD INPUT BOX -->
                <div class="form__row">
                  <div class="input">
                    <div class="input__container">
                      <input type="hidden" name="email" value="<?php echo trim($email); ?>">
                      <input class="input__field" id="password" name="password" placeholder="Password" required="" type="password" />
                      <label class="input__label" for="password"> Enter New Password</label>
                    </div>
                  </div>
                </div>

                <!-- VALIDATION BOX-->
                <div id="message">
                  <center>
                    <p>Password must contain the following:</p>
                  </center>
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
                      <button name="btnChange" type="submit"> <span> Change Password </span></button>
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
  

  <!-- START OF JAVASCRIPT-->
  <script>
    const input = document.querySelector("input"),
      emailIcon = document.querySelector(".email-icon")

    input.addEventListener("keyup", () => {
      let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

      if (input.value === "") {
        return console.log("input is empty")
      }
      if (input.value.match(pattern)) {
        emailIcon.classList.replace("uil-envelope", "uil-check-circle");
        return emailIcon.style.color = "green"
      }
      emailIcon.classList.replace("uil-check-circle", "uil-envelope");
      return emailIcon.style.color = "red"
    })
  </script>

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

    // Validate if passwords match
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
  </main>

</body>

<!-- SCIPTS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>