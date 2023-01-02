<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>
  <title> OHANA REGISTER </title>
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">

  <link rel="stylesheet" href="/Ohana/src/css/register.css">

  <?php include_once 'stylesheets.php'; ?>
  <style>
    #already {
      font-size: 20px;
    }

    #passwordreq {
      font-size: 18px;
    }

    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      .sign-up__title {
        font-size: 40px;
      }

      .sign-up__descr {
        font-size: 40px;
      }

      .register__desc {
        font-size: 20px;
      }

      .input__label {
        font-size: 15px;
      }

      .input-checkbox__label {
        font-size: 15px;
      }

      #passwordreq {
        font-size: 16px;
      }

      #message p {
        margin-top: 5px;
        font-size: 13px;
      }

      #letter {
        font-size: 20px;
      }

      .logbtn button {
        display: block;
        padding: 10px 60px;
        font-size: 15px;
        font-weight: 700;
      }

      #already {
        font-size: 15px;
      }
    }
  </style>
</head>

<body style="background-color: #FAF8F0;">
  <?php include_once dirname(__DIR__) . '/pages/navbar.php'; ?>
  <div class="container-fluid">
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <h1 class="sign-up__title mt-5">Welcome to Ohana!</h1>
            <p class="sign-up__descr">Create An Account</p>
            <p class="register__desc mt-3"> Fill up the fields below to create an account. </p>
            <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
              <div class="alert alert-warning mt-3" role="alert">
                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null; unset($_SESSION["msg"]); ?>
              </div>
            <?php
              session_destroy();
            }
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
                  <input class="input__field" id="middle-name" name="mname" placeholder="Middle Name" value="" type="text" /><label class="input__label" for="middle-name">Middle Name (Optional)</label>
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
                  <input class="input__field" id="contact-no" name="number" placeholder="Contact Number" type="text" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" /><label class="input__label" for="contact-no" required>Contact Number (+63)</label>
                </div>
              </div>
            </div>
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input type="email" class="input__field" id="email" name="email" placeholder="Email" required />
                  <label class="input__label" for="email">Email
                    <i class="uil uil-envelope email-icon"></i>
                  </label>
                </div>
              </div>
            </div>
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input class="input__field" id="password" name="password" placeholder="Password" required type="password" minlength="8" maxlength="49" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                  <label class="input__label" for="password">Password</label>
                </div>
              </div>
            </div>
            <div id="message" style="background: white;" class="mb-3">
              <h3 class="text-center mb-2" id="passwordreq" style="font-family: 'Acme', sans-serif;">Password must contain the following:</h3>
              <p id="letter" class="invalid">At least one <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">At least one <b>capital</b> letter</p>
              <p id="number" class="invalid">At least one <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input class="input__field" id="confirm-password" placeholder="Confirm password" name="confirm" required type="password" minlength="8" maxlength="49" />
                  <label class="input__label" for="confirm-password">Confirm password</label>
                </div>
              </div>
            </div>
            <div class="form__row">
              <div class="input-checkbox">
                <div class="input-checkbox__container">
                  <input type="checkbox" class="input-checkbox__field" id="agree" required /> <span class="input-checkbox__square"></span>
                  <label class="input-checkbox__label" for="agree"> I agree with the
                    <a style="text-decoration: none; color:#ff5757" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a> </label>
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
                <p id="already">Already have an account?&nbsp;<a class="link" name="login" style="text-decoration:none;" href="/login">Login</a></p>
              </div>
            </center>
          </form>
        </div>
      </div>
      <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
      </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      $("form").submit(function() {
        $(this).find(":submit").attr('disabled', 'disabled');
      });
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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>