<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>

  <title> OHANA- FORGOT PASSWORD </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">

  <?php include_once 'stylesheets.php'; ?>
  <style>
    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      #forgottitle {
        font-size: 35px;
        margin-top: 15%;
      }

      #forgotdesc {
        font-size: 20px;
        margin-top: 10px;
      }

      #btnReset {
        display: block;
        padding: 10px 60px;
        font-size: 18px;
        font-weight: 700;
      }

      .input__label {
        font-size: 15px;
      }
    }
  </style>
</head>

<body style="background-color: #FAF8F0;">

  <!-- UNREGISTERED USERS NAVIGATION BAR-->
  <?php include_once 'navbar.php'; ?>

  <div class="container-fluid">

    <!-- MAIN CONTENT -->
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <h1 class="sign-up__title" style="font-size: 80px; margin-top: 5%;">
              FORGOT PASSWORD
            </h1>
            <p class="sign-up__descr" style="font-size: 20px;">
              To reset your password, please enter your <b>Email</b> and click reset password.
            </p>
            <!-- ALERT -->
            <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
              <div class="alert alert-warning" role="alert">
                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                unset($_SESSION["msg"]); ?>
              </div>
            <?php
            }
            unset($_SESSION["msg"]);
            session_destroy();
            ?>
          </header>

          <form id="form" method="GET" action="/forgotpassword" class="sign-up__form form">
            <div class="form__row form__row--two">
              <div class="input form__inline-input">
                <div class="input__container">
                  <!-- EMAIL INPUT BOX -->
                  <div class="form__row mt-4">
                    <div class="input">
                      <div class="input__container">
                        <input type="email" class="input__field" id="email" name="email" placeholder="Email/Contact Number" required="" />
                        <label class="input__label" for="email">Email Address
                          <i class="uil uil-envelope email-icon"></i>
                        </label>
                      </div>
                    </div>
                  </div>

                  <center>
                    <div class="form__row">
                      <div class="logbtn">
                        <button type="submit" name="btnSubmit"><span> Reset password </span></button>
                      </div>
                    </div>
                  </center>

                  <hr style="width:100%"><br>
                  <div class="form__row sign-up__sign">
                    Dont have an account? &nbsp;<a class="link" href="/register" style="text-decoration: none;"> Register Now! </a>
          </form>
        </div>
      </div>
    </main>

    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
      </div>

    <!-- START OF JAVASCRIPT-->
    <script>
      $("form").submit(function() {
        $(this).find(":submit").attr('disabled', 'disabled');
      });

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
    </main>

</body>

<!-- SCIPTS -->
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>