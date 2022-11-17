<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>
  <title> OHANA REGISTER </title>
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
        font-size: 40px;
      }

      .sign-up__descr {
        font-size: 25px;
      }

      .register__desc {
        font-size: 17px;
      }

      .input__label {
        font-size: 15px;
      }

      .input__field {
        font-size: 15px;
      }

      #passwordreq {
        font-size: 15px;
      }

      .input-checkbox__label {
        font-size: 15px;
      }

      #loginq {
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
  <?php include_once dirname(__DIR__) . '/pages/navbar.php'; ?>

  <div class="container-fluid">
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <h1 class="sign-up__title mt-5">
              Create An Account
            </h1>
            <p class="sign-up__descr">
              Welcome to Ohana!
            </p>
            <p class="register__desc mt-3"> Fill up the fields below to create an account. </p>

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
          <form class="sign-up__form form" action="/accounts/register" method="POST">
            <input type="hidden" name="type" value="USER">
            <input type="hidden" name="status" value="UNREGISTERED">
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input class="input__field" id="first-name" name="fname" placeholder="First Name" required type="text" /><label class="input__label" for="first-name">First Name</label>
                </div>
              </div>
            </div>
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input class="input__field" id="middle-name" name="mname" placeholder="Middle Name" type="text" /><label class="input__label" for="middle-name">Middle Name (Optional)</label>
                </div>
              </div>
            </div>
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input class="input__field" id="last-name" name="lname" placeholder="Last Name" required type="text" /><label class="input__label" for="last-name">Last Name</label>
                </div>
              </div>
            </div>
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input class="input__field" id="contact-no" name="number" placeholder="Contact Number" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" /><label class="input__label" for="contact-no">Contact Number (+63)</label>
                </div>
              </div>
            </div>
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input type="email" class="input__field" id="email" name="email" placeholder="Email" required="" />
                  <label class="input__label" for="email">Email
                    <i class="uil uil-envelope email-icon"></i>
                  </label>
                </div>
              </div>
            </div>

            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input class="input__field" id="password" name="password" placeholder="Password" required="" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                  <label class="input__label" for="password">Password</label>
                </div>
              </div>
            </div>
            <div id="message" style="background: white;">
              <h3 class="text-center" id="passwordreq" style="color:#c0b65a;">Password must contain the following:</h3>
              <p id="letter" class="invalid">At least one <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">At least one <b>capital</b> letter</p>
              <p id="number" class="invalid">At least one <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            <br>
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input class="input__field" id="confirm-password" placeholder="Confirm password" required="" type="password" />
                  <label class="input__label" for="confirm-password">Confirm password</label>
                </div>
              </div>
            </div>
            <div class="form__row">
              <div class="input-checkbox">
                <!-- CHECKBOX -->
                <div class="input-checkbox__container">
                  <input type="checkbox" class="input-checkbox__field" id="agree" required="true;" /> <span class="input-checkbox__square"></span>
                  <label class="input-checkbox__label" for="agree"> I agree with the
                    <a href="#" style="text-decoration: none; color:#ff5757" data-bs-toggle="modal" data-bs-target="#termsModal">
                      Terms and Conditions </a> </label>
                </div>
              </div>
            </div>
            <center>
              <div class="form__row">
                <div class="logbtn">
                  <button type="submit"><span>Register</span></button>
                </div>
              </div>
              <hr style="width:100%"><br>
              <div class="form__row">
                <p id="loginq">Already have an account?&nbsp;<a class="link" name="login" style="text-decoration:none;" href="/login">Login</a></p>
              </div>
            </center>
          </form>
        </div>
      </div>
      <!-- FOOTER -->
      <div name="pagefooter">
        <?php include_once dirname(__DIR__) . '/pages/footer.php';; ?>
      </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- START OF JAVASCRIPT-->
    <script>
      const emailInput = $("#email"),
        emailIcon = $(".email-icon");

      emailInput.change("autocompletechange",
        function(event, ui) {
          let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

          if (emailInput.val() === "") {}

          if (emailInput.val().match(pattern)) {
            emailIcon.removeClass('uil-envelope');
            emailIcon.addClass('uil-check-circle');
            return emailIcon.css('color', 'green');
          }
          emailIcon.removeClass('uil-check-circle');
          emailIcon.addClass('uil-envelope');
          return emailIcon.css('color', 'red');
        });
      emailInput.keypress(() => {
        let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

        if (emailInput.val() === "") {}

        if (emailInput.val().match(pattern)) {
          emailIcon.removeClass('uil-envelope');
          emailIcon.addClass('uil-check-circle');
          return emailIcon.css('color', 'green');
        }
        emailIcon.removeClass('uil-check-circle');
        emailIcon.addClass('uil-envelope');
        return emailIcon.css('color', 'red');
      });

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
          confirmpass.setCustomValidity("Password does not match");
        } else {
          confirmpass.setCustomValidity("");
        }
      });
    </script>

    <!-- SCRIPTS IMPORT-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>