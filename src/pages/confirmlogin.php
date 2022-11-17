<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>


  <title> CONFIRM LOGIN </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- EXTERNAL CSS IMPORT-->
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">

  <?php include_once 'stylesheets.php'; ?>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    
    @media screen and (min-width: 375px) and (max-width: 767.98px) { }
  </style>
</head>

<body style="background-color: #FAF8F0;">

  <?php include_once 'navbar.php'; ?>

  <div class="container-fluid">
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <h1 class="sign-up__title" style="font-size: 80px; margin-top: 10%; font-family: 'Acme', sans-serif;">
              Welcome Back!
            </h1>
            <p style="font-size:20px;"> Please enter the OTP sent to your email to proceed. </p>
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
          <form class="sign-up__form form" method="GET" action="/accounts/login">
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <label class="input__label" for="confirm-password"> <b>Enter OTP <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                                                                                    unset($_SESSION["msg"]); ?></b> </label><br>
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
            <center><br><br>
              <div class="form__row">
                <p style="font-size:20px;">Did not receive OTP? &nbsp;<a class="link" name="login" style="text-decoration:none;" href="##">Resend OTP</a></p>
              </div>
            </center>
            <center>
              <div class="form__row">
                <div class="logbtn">
                  <button><span>Submit</span></button>
                </div>
              </div>
            </center>
          </form>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"> OHANA KENNEL PH</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left:800px"></button>
            </div>
            <div class="modal-body">
              <?php include_once 'terms.php'; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- FOOTER -->
      <?php include_once 'footer.php'; ?>
    </main>
  </div>

  <!-- SCRIPTS IMPORT-->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>