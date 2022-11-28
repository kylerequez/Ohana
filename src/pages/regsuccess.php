<!DOCTYPE html>
<html lang="en" class="sign-up_form">
<head>
  <title> ACCOUNT CREATED </title>
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <?php include_once 'stylesheets.php'; ?>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    #accdesc {
      font-size: 25px;
    }
    #check {
      width: 250px;
      height: 250px;
      margin-top: 5%;
    }
    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      #check {
        width: 185px;
        height: 185px;
      }
      .sign-up__title {
        font-size: 42px;
      }
      #accdesc {
        font-size: 20px;
        margin-top: 10px;
      }
      #btnLogin {
        display: block;
        padding: 10px 60px;
        font-size: 18px;
        font-weight: 700;
      }
      #ohanafooter {
        margin-top: -30%;
      }
    }
  </style>
</head>
<body style="background-color: #FAF8F0;">
  <?php include_once 'navbar.php'; ?>
  <?php unset($_SESSION);
  session_destroy(); ?>
  <div class="container-fluid">
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <img src="/Ohana/src/images/pages/check.png" id="check">
            <h1 class="sign-up__title mt-3" style="font-family: 'Acme', sans-serif;">Account Created!</h1>
            <p id="accdesc"> Your Ohana account has been Successfully Created. </p>
          </header>
          <center>
            <div class="form__row">
              <div class="logbtn">
                <a href="/login" style="text-decoration: none;"><button id="btnLogin"><span>Login</span></button></a>
              </div>
            </div>
          </center>
        </div>
      </div>
      <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
      </div>
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>