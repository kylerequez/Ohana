<!DOCTYPE html>
<html lang="en" class="sign-up_form">
  
<head>

  <title> OHANA - LOGIN  </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="/Ohana/src/css/register.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

  <!-- FONT AWESOME ICONS IMPORT -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
  <!-- Web Icon -->
  <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">

  <!-- Bootstrap CSS  CDN -->
   <!-- 5.2.1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" 
  integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">

  <!-- MORE icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body style="background-color: #FAF8F0;">
  
  <!-- UNREGISTERED USERS NAVIGATION BAR-->
  <?php include_once 'navbar.php'; ?>

  <!-- MAIN CONTENT -->
  <div class=container-fluid>
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <h1 class="sign-up__title" style="font-size: 60px; margin-top: 15%; color:#ff914d">
              Let's meet your new 
            </h1>
            <h1 class="sign-up__title" style="font-size: 120px; color:#ff5757;">
              OHANA! 
            </h1>
          </header>
          
          <form id="form" method="POST" action="/accounts/login" class="sign-up__form form">
            <div class="form__row form__row--two">
              <div class="input form__inline-input">
                <div class="input__container">

            <!-- EMAIL INPUT BOX -->
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input type="email" class="input__field" id="email" name="email" placeholder="Email/Contact Number" required=""  />
                
                  <label class="input__label" for="email/contact-no">Email/Contact Number  
                    <i class="uil uil-envelope email-icon"></i> 
                  </label>
                </div>
              </div>
            </div>

            <!-- PASSWORD INPUT BOX -->
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input class="input__field" id="password" name="password" placeholder="Password" required="" type="password" />
                  <label class="input__label" for="password">Password</label>
                </div>
              </div>
            </div>

            <center> <div class="form__row">
            <form action="HOME.php" method="post"> <!-- FOR TESTING PURPOSES ONLY -->
              <div class="logbtn">
                <button type="submit" name="btnLogin"><span> Login </span></button>
              </div>
            </form>
            </div></center>

            <hr style="width:100%"><br>
            <div class="form__row sign-up__sign">
              Dont have an account? &nbsp;<a class="link" href="/register" style="text-decoration: none;"> Register Now! </a>
            <div class="form__row">
              <br><a class="link" href="forgot.php" style="text-decoration: none;">Forgot your password?</a>
            </div>
            </div>
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

          input.addEventListener("keyup", () =>{
            let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            if(input.value === ""){
              return console.log("input is empty")
            }
            if(input.value.match(pattern)){
              emailIcon.classList.replace("uil-envelope","uil-check-circle");
              return emailIcon.style.color ="green"
            }
              emailIcon.classList.replace("uil-check-circle","uil-envelope");
              return emailIcon.style.color ="red"
          })

  </script>
</main>

<!-- SCIPTS -->

  <!-- Chart library -->
  <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

  <!-- Icons library -->
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

  <!-- Custom scripts -->
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  
  <!-- JAVASCRIPT IMPORTS -->
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>

</body>
</html>
