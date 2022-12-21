<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>
  <title> CONFIRM LOGIN </title>
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <?php include_once 'stylesheets.php'; ?>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

    #cnfrmtitle {
      font-size: 100px;
      color: #db6551;
    }

    #cnfrmcontent {
      font-size: 20px;
      color: #c0b65a;
    }

    #ohanafooter {
      margin-top: 5%;
    }

    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      #cnfrmtitle {
        font-size: 50px;
        margin-top: 5%;
      }

      #cnfrmcontent {
        font-size: 12px;
      }

      #resend {
        margin-top: 5%;
      }

      .input__label {
        font-size: 20px;
      }

      #rsnd {
        margin-top: 10px;
      }

      #sbmt {
        display: block;
        padding: 10px 60px;
        font-size: 18px;
        font-weight: 700;
      }
    }
  </style>
</head>

<body style="background-color: #FAF8F0;">
  <?php
  include_once dirname(__DIR__) . '/config/app-config.php';

  date_default_timezone_set('Asia/Manila');
  if (!isset($_SESSION['time']) || $_SESSION['time'] + (5 * 60) < time()) {
    $_SESSION['msg'] = "You have exceeded the maximum time period (5 minutes) to enter the OTP. Please login again.";
    unset($_SESSION["email"]);
    unset($_SESSION["userOtp"]);
    unset($_SESSION["token"]);
  ?>
    <script>
      window.location = 'https://<?php echo DOMAIN_NAME; ?>/login';
    </script>
  <?php
    exit();
  }
  if (empty($_SESSION["email"]) && empty($_SESSION["userOtp"]) && empty($_SESSION["token"])) {
    session_destroy();
  ?>
    <script>
      window.location = 'https://<?php echo DOMAIN_NAME; ?>/login';
    </script>
  <?php
    exit();
  }
  ?>
  <?php include_once 'navbar.php'; ?>
  <div class="container-fluid">
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <h1 class="sign-up__title" id="cnfrmtitle"> Welcome Back! </h1>
            <p class="mt-2 mb-4" id="cnfrmcontent"> Please enter the OTP sent to your email to proceed. </p>

            <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
              <div class="alert alert-warning mt-3" role="alert">
                <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                unset($_SESSION["msg"]); ?>
              </div>
            <?php
            }
            unset($_SESSION["msg"]);
            ?>
          </header>
          <form class="sign-up__form form" method="GET" action="/accounts/login">
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <label class="input__label" for="confirm-password"> <b>Enter OTP <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                                                                                    unset($_SESSION["msg"]); ?></b> </label>
                  <div id="otp" class="inputs d-flex flex-row justify-content-center mt-3 mb-3">
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
            <center>
              <div class="form__row">
                <p class="mt-5 fs-5">Did not receive OTP? &nbsp;<a class="link" name="login" style="text-decoration:none;" href="/login/resend/<?php echo $_SESSION["token"] ?>" id="rsnd">Resend OTP</a></p>
              </div>
              <div class="form__row">
                <div class="logbtn">
                  <button id="sbmt"><span>Submit</span></button>
                </div>
              </div>
            </center>
          </form>
        </div>
      </div>
      <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
      </div>
    </main>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>