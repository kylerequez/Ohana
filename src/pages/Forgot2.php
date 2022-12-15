<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>
  <title> OHANA- FORGOT PASSWORD </title>
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <?php include_once 'stylesheets.php'; ?>
  <style>
    #forgottitle2 {
      font-size: 80px;
    }

    .sign-up__descr {
      font-size: 25px;
      margin-top: 25px;
    }

    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      #forgottitle2 {
        font-size: 37px;
        margin-top: 35%;
      }

      .sign-up__descr {
        font-size: 20px;
        margin-top: 15px;
      }

      #checkinbx {
        margin-top: 10%;
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
          <h1 class="sign-up__title" id="forgottitle2">
            FORGOT PASSWORD
          </h1><br>
          <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
            <div class="alert alert-warning mt-5" role="alert">
              <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
              unset($_SESSION["msg"]); ?>
            </div>
          <?php
            unset($_SESSION["msg"]);
          } else {
          ?>
            <p class="sign-up__descr">A link to change your password has been sent in your email. </p>
            <p class="sign-up__descr" id="checkinbx">Please check your inbox.</p>
          <?php
          }
          if (empty($_SESSION["email"]) || empty($_SESSION["token"])) {
            session_destroy();
          ?>
            <script>
              window.location = 'http://<?php echo DOMAIN_NAME; ?>/forgot-password';
            </script>
          <?php
          }
          ?>
        </header>
        <div class="form__row form__row--two">
          <div class="input form__inline-input">
            <div class="input__container">
              <div class="form__row sign-up__sign">
                Did not receive an email? &nbsp;<a class="link" href="/forgot-password/resend/<?php echo $_SESSION["token"]; ?>" style="text-decoration: none;"> Resend Email </a><br><br>
                Don't have an account? &nbsp;<a class="link" href="/register" style="text-decoration: none;"> Register Now! </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div id="ohanafooter">
    <?php include_once 'footer.php'; ?>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>