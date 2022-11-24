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

  <?php include_once 'stylesheets.php'; ?>
  <style>
    #changeheader {
      font-size: 60px;
      margin-top: 10%;
    }

    .sign-up__descr {
      font-size: 25px;
    }

    h3 {
      font-size: 20px;
    }

    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      #changeheader {
        margin-top: 20%;
        font-size: 35px;
      }

      .sign-up__descr {
        font-size: 20px;
      }

      .input__label {
        font-size: 15px;
      }

      #ohanafooter {
        margin-top: 50%;
      }

      h3 {
        font-size: 15px;
      }

      .logbtn button {
        display: block;
        padding: 10px 60px;
        font-size: 15px;
        font-weight: 700;
      }

      #message p {
        font-size: 15px;
      }
    }
  </style>
</head>

<body style="background-color: #FAF8F0;">
  <?php include_once 'Rnavbar.php'; ?>
  <main class="sign-up">
    <div class="sign-up__container">
      <div class="sign-up__content">
        <header class="sign-up__header">
          <h1 class="sign-up__title" id="changeheader">
            CHANGE PASSWORD
          </h1>
          <p class="sign-up__descr">
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

        <form id="form" method="GET" action="/accounts/update" class="sign-up__form form">
          <div class="form__row form__row--two">
            <div class="input form__inline-input">
              <div class="input__container">

                <div class="form__row">
                  <div class="input">
                    <div class="input__container mt-2">
                      <input class="input__field" id="password" name="old-password" placeholder="Current password" required type="password" />
                      <label class="input__label" for="password">Current Password</label>
                    </div>
                  </div>
                </div>

                <!-- PASSWORD INPUT BOX -->
                <div class="form__row">
                  <div class="input">
                    <div class="input__container mt-2">
                      <input class="input__field" id="new-password" name="password" placeholder="Password" required type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                      <label class="input__label" for="new-password"> New Password</label>
                    </div>
                  </div>
                </div>

                <!-- VALIDATION BOX-->
                <div id="message" style="background: white;">
                  <h3 class="text-center">Password must contain the following:</h3>
                  <p id="letter" class="invalid">At least one <b>lowercase</b> letter</p>
                  <p id="capital" class="invalid">At least one <b>capital</b> letter</p>
                  <p id="number" class="invalid">At least one <b>number</b></p>
                  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>

                <div class="form__row">
                  <div class="input">
                    <div class="input__container mt-3">
                      <input class="input__field" id="confirm-password" name="confirm-password" placeholder="Confirm password" required type="password" />
                      <label class="input__label" for="confirm-password">Confirm password</label>
                    </div>
                  </div>
                </div>

                <center>
                  <div class="form__row mt-2">
                    <div class="logbtn">
                      <button type="submit" style="border-radius:30px;"> <span> Change Password </span></button>
                    </div>
                  </div>
                  <hr>
                  <div class="form__row mt-4">
                    <a href="/userprofile" class="fs-4" style="text-decoration:none;color:#db6551"> Go Back </a>
                  </div>
                </center>


        </form>
      </div>
    </div>
  </main>
  <!-- FOOTER -->
  <div id="ohanafooter">
    <?php include_once 'footer.php'; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
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

  </main>

</body>

<!-- SCIPTS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>