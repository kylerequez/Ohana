<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>

  <title> OHANA REGISTER </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS -->

  <!-- AJAX LIBRARY IMPORTS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

  <!-- FONT IMPORT -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>

  <!-- EXTERNAL CSS IMPORT-->
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">

  <!-- FONT AWESOME ICONS IMPORT -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Web Icon -->
  <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">

  <!-- Bootstrap CSS  CDN -->
  <!-- 5.2.1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">

  <!-- MORE icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body style="background-color: #FAF8F0;">
  <!-- UNREGISTERED USERS NAVIGATION BAR-->
  <?php include_once dirname(__DIR__) . '/pages/navbar.php'; ?>

  <div class="container-fluid">
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">

            <h1 class="sign-up__title" style="font-size: 100px; margin-top: 10%; font-family: 'Acme', sans-serif;">
              Create An Account
            </h1>
            <p class="sign-up__descr" style="font-size: 70px; color:#c0b65a; font-family: 'Acme', sans-serif;">
              Welcome to Ohana!
            </p>
            <p style="font-size:20px;"> Fill up the fields below to create an account. </p>

            <!-- ALERT -->
            <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
              <div class="alert alert-success" role="alert">
                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                unset($_SESSION["msg"]); ?>
              </div>
            <?php
            }
            unset($_SESSION["msg"]);
            session_destroy();
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
                  <input class="input__field" id="contact-no" name="number" placeholder="Contact Number" required type="text" /><label class="input__label" for="contact-no">Contact Number</label>
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
              <center>
                <h3 style="font-size: 20px; color:#c0b65a;">Password must contain the following:</h3>
              </center>
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
            </center>
            <hr style="width:100%"><br>
            <center>
              <div class="form__row">
                <p style="font-size:20px;">Already have an account?&nbsp;<a class="link" name="login" style="text-decoration:none;" href="/login">Login</a></p>
              </div>
            </center>
          </form>
        </div>
      </div>
      <!-- FOOTER -->
      <?php include_once dirname(__DIR__) . '/pages/footer.php';; ?>
    </main>

    <a href="#" style="text-decoration: none; color:#ff5757" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions </a>


    <!-- START OF JAVASCRIPT-->
    <script>
      const input = document.querySelector("input"),
        emailIcon = document.querySelector(".emailico")

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

    <script>
    </script>


    <!-- SCRIPTS IMPORT-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>