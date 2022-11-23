<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>


  <title> OHANA REGISTER </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">

  <!-- EXTERNAL CSS IMPORT-->
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

  <?php include_once 'stylesheets.php'; ?>
  <style>
    @media screen and (min-width: 360px) and (max-width: 929.98px) {}
  </style>
</head>

<body style="background-color: #FAF8F0;">

  <?php include_once 'navbar.php'; ?>

  <div class="container-fluid">
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <h1 id="header" class="sign-up__title" style="font-size: 100px; margin-top: 10%; font-family: 'Acme', sans-serif;">
              Welcome to Ohana!
            </h1>
            <!-- ALERT -->
            <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
              <div class="alert alert-warning" role="alert">
                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                unset($_SESSION["msg"]); ?>
              </div>
            <?php
              unset($_SESSION["msg"]);
            } else {
            ?>
              <p style="font-size:20px;"> Complete registration by entering the OTP sent to your email. </p>
            <?php
            }
            if (empty($_SESSION["email"]) && empty($_SESSION["userOtp"]) && empty($_SESSION["token"])) {
              header("Location: http://localhost/register");
              session_destroy();
            }
            ?>
          </header>
          <form class="sign-up__form form" method="GET" action="/accounts/register">
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <label class="input__label" for="confirm-password"><b>Enter OTP</b></label><br>
                  <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                    <!-- OTP 6 BOXES FOR USER INPUT -->
                    <input class="m-2 text-center form-control rounded" type="text" name="otpFirst" id="otpFirst" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" name="otpSecond" id="otpSecond" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" name="otpThird" id="otpThird" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" name="otpFourth" id="otpFourth" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" name="otpFifth" id="otpFifth" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" name="otpSixth" id="otpSixth" maxlength="1" />
                  </div>
                </div>
              </div>
            </div>
            <center><br>
              <div class="form__row">
                <p style="font-size:20px;">Did not receive an OTP? &nbsp;<a class="link" name="login" style="text-decoration:none;" href="/register/resend/<?php echo $_SESSION["token"] ?>">Resend OTP</a></p>
              </div>
            </center>
            <center>
              <div class="form__row">
                <div class="logbtn">
                  <button><span> Submit </span></button>
                </div>
              </div>
            </center>
            <hr style="width:100%"><br>
            <div class="form__row">
              <p class="text-center" style="font-size:20px;">Already have an account? &nbsp;<a class="link" name="login" style="text-decoration:none;" href="/login">Login</a></p>
            </div>
          </form>
        </div>
      </div>

      <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
      </div>
    </main>


    <!-- SCRIPTS IMPORT-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</body>

</html>