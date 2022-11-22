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
      #forgottitle2 {
        font-size: 35px;
        margin-top: 15%;
      }

      .sign-up__descr {
        font-size: 20px;
        margin-top: 10px;
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
          <h1 class="sign-up__title" style="font-size: 80px; margin-top: 5%;">
            FORGOT PASSWORD
          </h1><br>
          <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
            <div class="alert alert-warning" role="alert">
              <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
              unset($_SESSION["msg"]); ?>
            </div>
          <?php
            unset($_SESSION["msg"]);
          } else {
          ?>
            <p class="sign-up__descr" style="font-size: 20px;">A link to change your password has been sent in your email. </p>
            <p class="sign-up__descr" style="font-size: 20px;">Please check your inbox.</p>
          <?php
          }
          if (empty($_SESSION["email"]) || empty($_SESSION["token"])) {
            header("Location: http://localhost/forgot-password");
            session_destroy();
          }
          ?>
        </header>

        <form id="form" method="POST" action="/forgot3" class="sign-up__form form">
          <div class="form__row form__row--two">
            <div class="input form__inline-input">
              <div class="input__container">
                <div class="form__row sign-up__sign">
                  Did not receive an email? &nbsp;<a class="link" href="/forgot-password/resend/<?php echo $_SESSION["token"]; ?>" style="text-decoration: none;"> Resend Email </a><br><br>
                  Don't have an account? &nbsp;<a class="link" href="/register" style="text-decoration: none;"> Register Now! </a>
                </div>
        </form>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <?php include_once 'footer.php'; ?>

  <!-- SCIPTS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>