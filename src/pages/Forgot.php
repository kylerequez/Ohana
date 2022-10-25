<!DOCTYPE html>
<html lang="en" class="sign-up_form">

<head>

  <title> OHANA- FORGOT PASSWORD </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>


  <!-- FONT AWESOME, UNICONS IMPORT -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- Web Icon -->
  <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">

  <!-- Bootstrap CSS  CDN -->
  <!-- 5.2.1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">

  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">

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
            <!-- <p class="sign-up__descr" style="font-size: 20px;">
            an <b>OTP</b> (One-Time Pin) will be sent to your email.
          </p>-->
          </header>

          <?php if(isset($_SESSION["msg"])){ ?>
          <h1><?php echo $_SESSION["msg"]; unset($_SESSION); ?></h1>
          <?php } ?>

          <form id="form" method="GET" action="/forgotpassword" class="sign-up__form form">
            <div class="form__row form__row--two">
              <div class="input form__inline-input">
                <div class="input__container">
                  <!-- EMAIL INPUT BOX -->
                  <div class="form__row">
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

    <!-- FOOTER -->
    <?php include_once 'footer.php'; ?>

    <!-- START OF JAVASCRIPT-->
    <script>
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