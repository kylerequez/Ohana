<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>
  <title> ACCOUNT CREATED </title>

  <!-- META TAGS -->
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
  <!-- UNREGISTERED USERS NAVIGATION BAR-->
  <?php include_once 'navbar.php'; ?>

  <?php unset($_SESSION);
  session_destroy(); ?>
  <div class="container-fluid">
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <img src="/Ohana/src/images/pages/check.png" id="check" style="margin-top: 5%;">
            <h1 class="sign-up__title" style="margin-top: 5%; font-family: 'Acme', sans-serif;">
              Account Created!
            </h1>
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

      <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
      </div>

    </main>
  </div>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>