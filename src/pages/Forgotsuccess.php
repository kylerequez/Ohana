<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>
  <title> OHANA- FORGOT PASSWORD </title>
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">

  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">
  <?php include_once 'stylesheets.php'; ?>
</head>

<body style="background-color: #FAF8F0;">

  <?php include_once 'navbar.php'; ?>

  <div class="container-fluid">

    <?php unset($_SESSION);
    session_destroy(); ?>
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <img src="/Ohana/src/images/pages/check.png" width="250" height="250" style="margin-top: 5%;">
            <h1 class="sign-up__title" style="font-size: 80px; margin-top: 5%;">
              PASSWORD UPDATED!
            </h1>
            <p style="font-size:20px;"> Your Ohana account password has been Successfully Updated. </p>
          </header>

          <center>
            <div class="form__row">
              <div class="logbtn">
                <a href="/login" style="text-decoration:none;"><button type="submit" name="btnSubmit"><span> Login </span></button></a>
              </div>
            </div>
          </center>

        </div>
    </main>

    <!-- FOOTER -->
    <?php include_once 'footer.php'; ?>
    </main>

</body>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>