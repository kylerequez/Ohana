<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>
  <title> OHANA - LOGIN </title>
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <?php include_once 'stylesheets.php'; ?>
  <style>
    @keyframes fadeIn {
      0% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    #signup_title {
      animation: fadeIn 3s;
    }
    #ohanatitle {
      animation: fadeIn 3s;
    }
    #ohanafooter {
      margin-top: 12%;
    }

    @media screen and (min-width: 360px) and (max-width: 520px) {

      .container-fluid {
        margin-top: -5%;
      }

      #signup_title {
        font-size: 33px;
        margin-top: 15%;
      }

      .logbtn button {
        display: block;
        padding: 10px 60px;
        font-size: 15px;
        font-weight: 700;
      }

      .input__label {
        font-size: 15px;
      }

      @media screen and (min-width: 521px) and (max-width: 1090px) {
        #ohanafooter {
          margin-top: 15%;
        }
      }

      @media screen and (min-width: 1100px) and (max-width: 1366px) {
        #signup_title {
          font-size: 60px;
        }
      }
    }
  </style>
</head>

<body style="background-color: #FAF8F0;">
  <?php include_once 'navbar.php'; ?>
  <div class="container-fluid">
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <h1 class="sign-up__title" id="signup_title" style="color:#ff914d">Let's meet your new</h1>
            <h1 class="sign-up__title mt-3" id="ohanatitle"> OHANA! </h1>
            <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
              <div class="alert alert-warning mt-5" role="alert">
                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                unset($_SESSION["msg"]); ?>
              </div>
            <?php
            }
            unset($_SESSION["msg"]);
            session_destroy();
            ?>
          </header>
          <form id="form" method="POST" action="/accounts/login" class="sign-up__form form">
            <div class="form__row form__row--two">
              <div class="input form__inline-input">
                <div class="input__container">
                  <div class="form__row">
                    <div class="input">
                      <div class="input__container">
                        <input type="email" class="input__field" id="email" autocomplete="email" name="email" placeholder="Email" required="" />
                        <label class="input__label" for="email">Email
                          <i class="uil uil-envelope email-icon"></i>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form__row">
                    <div class="input">
                      <div class="input__container">
                        <input class="input__field" id="password" name="password" placeholder="Password" autocomplete="current-password" minlength="8" maxlength="49" required="" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                        <label class="input__label" for="password">Password</label>
                      </div>
                    </div>
                  </div>
                  <div class="form__row">
                    <div class="logbtn">
                      <center><button type="submit" name="btnLogin"><span>
                            Login
                          </span></button></center>
                    </div>
                  </div>
                  <hr style="width:100%"><br>
                  <div class="form__row sign-up__sign mb-5">
                    Dont have an account? &nbsp;<a class="link" href="/register" style="text-decoration: none;"> Register Now! </a>
                    <div class="form__row">
                      <a class="link mt-3 mb-5" href="/forgot-password" style="text-decoration: none;">Forgot your password?</a>
                    </div>
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
      const emailInput = $("#email"),
        emailIcon = $(".email-icon");
      emailInput.change("autocompletechange",
        function(event, ui) {
          let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
          if (emailInput.val() === "") {
            emailIcon.removeClass('uil-check-circle');
            emailIcon.addClass('uil-envelope');
            return emailIcon.css("color", "");
          }
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
        if (emailInput.val() === "") {
          emailIcon.removeClass('uil-check-circle');
          emailIcon.addClass('uil-envelope');
          return emailIcon.css("color", "");
        }
        if (emailInput.val().match(pattern)) {
          emailIcon.removeClass('uil-envelope');
          emailIcon.addClass('uil-check-circle');
          return emailIcon.css('color', 'green');
        }
        emailIcon.removeClass('uil-check-circle');
        emailIcon.addClass('uil-envelope');
        return emailIcon.css('color', 'red');
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>