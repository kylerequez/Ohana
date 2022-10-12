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

  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="../css/register.css">

  <!-- FONT AWESOME ICONS IMPORT -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
  <!-- Web Icon -->
  <link rel="shortcut icon" href="../images/templogo.png" type="image/x-icon">

  <!-- Bootstrap CSS  CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous">
   
  <!-- MORE icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body style="background-color: #FAF8F0;">
      
    <!-- UNREGISTERED USERS NAVIGATION BAR-->
    <?php include_once 'Navigation.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="sign-up">
      <div class="sign-up__container">
        <div class="sign-up__content">
          <header class="sign-up__header">
            <h1 class="sign-up__title" style="font-size: 80px; margin-top: 20%; font-family: Bantayog-Regular;">
              FORGOT PASSWORD
            </h1>
            <p class="sign-up__descr" style="font-size: 20px;">
              Enter the OTP that was sent to your email. 
            </p>
          </header>
          
          <form id="form" method="POST" action="Forgot3.html" class="sign-up__form form">
            <div class="form__row form__row--two">
              <div class="input form__inline-input">
                <div class="input__container">

            <!-- EMAIL INPUT BOX -->
            <div class="form__row">
              <div class="input">
                <div class="input__container">
                  <input type="email" class="input__field" id="email" name="email" placeholder="Email/Contact Number" required=""  />
                  <label class="input__label" for="email/contact-no"> Input OTP Here</label>
                </div>
              </div>
            </div>
            <center> <div class="form__row">
              <div class="logbtn">
                <button><span> Proceed to reset </span></button>
              </div>
            </div></center>
            <hr style="width:100%"><br>
            <div class="form__row sign-up__sign">
              Did not recieve OTP? &nbsp;<a class="link" href="register.html" style="text-decoration: none;"> Resend OTP </a><br><br>
              Dont have an account? &nbsp;<a class="link" href="register.html" style="text-decoration: none;"> Register Now! </a>
        </form>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <?php include_once 'pagesfooter.php'; ?>

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
  
<!--
  <script type="text/javascript">
    function validation()
    {
      var form = document.getElementbyId("form");
      var email = document.getElementbyId("email").value;
      var message = document.getElementbyId("message");
      var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

      if(email(pattern)){
        form.classList.add("valid");
        form.classList.remove("invalid");
        message.innerHTML = "Your Email Address is Valid.";
        text.style.color = "#000000";
      }
      else {
        form.classList.remove("valid");
        form.classList.remove("invalid");
        message.innerHTML = " Please enter Valid Email.";
        text.style.color = "#000000";
      }
      if (email== ""){
        form.classList.remove("valid");
        form.classList.remove("invalid");
        message.innerHTML = " Please enter Valid Email.";
        text.style.color = "#000000";
      }
    }
  </script>
  -->
</body>

<!-- SCIPTS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>
</html>
